<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Poling;
use App\Models\Polingdua;
use App\Models\Siswa;
use App\Models\Feed;
use Carbon\Carbon;
use App\Http\Requests\Admin\PolingRequest;
use App\Http\Requests\Admin\PolingsiswaRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\PolingkExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PolingController extends Controller
{
    public function home()
    {
        return view('pages.poling.home');
    }

    // Data Kelas Kecil
    public function reportKecil()
    {
        $feed = Feed::where('status', '=', 'kecil')->get();
        $siswa = Siswa::where('kelas', '=', auth()->user()->guru[0]->kelas)->get();

        return view('pages.poling.report', compact('feed', 'siswa'));
    }
    
    public function cobadata(Request $request)
    {
        if(request()->ajax())
        {
            $poling = Poling::with('siswa', 'feed')->orderBy('id', 'DESC')->where('kelas', '=', auth()->user()->guru[0]->kelas)->get();
            if($request->filled('start_date') && $request->filled('end_date'))
            {
                $poling = $poling->whereBetween('tglcek', [$request->start_date, $request->end_date]);
            }

            return Datatables::of($poling)
            ->addColumn('waktu', function($item) {
                return $item->created_at->translatedFormat('H:i:s');
            })
            ->addColumn('tanggal', function($item) {
                return $item->created_at->format('d-m-Y');
            })
            ->addColumn('aksi', function($item) {
                $button = '
                <a href="' . route('cetakPdf', $item->siswa_id) . '" class="btn btn-danger btn-sm">Cetak PDF</a>
                ';
                return $button;
            })
            ->addIndexColumn()
            ->rawColumns(['waktu', 'tanggal', 'aksi'])
            ->make();
        }
    }

    // Data Kelas Besar
    public function reportBesar()
    {
        $feed = Feed::where('status', '=', 'besar')->get();
        $siswa = Siswa::where('kelas', '=', auth()->user()->guru[0]->kelas)->get();

        return view('pages.poling.reportbesar', compact('feed', 'siswa'));
    }

    public function cobadatabesar(Request $request)
    {
        if(request()->ajax())
        {
            $poling = Polingdua::with('feed', 'siswa')->orderBy('id', 'DESC')->where('kelas', '=', auth()->user()->guru[0]->kelas)->get();
            if($request->filled('start_date') && $request->filled('end_date'))
            {
                $poling = $poling->whereBetween('tglcek', [$request->start_date, $request->end_date]);
            }

            return Datatables::of($poling)
            ->addColumn('waktu', function($item) {
                return $item->created_at->translatedFormat('H:i:s');
            })
            ->addColumn('tanggal', function($item) {
                return $item->created_at->format('d-m-Y');
            })
            ->addColumn('aksi', function($item) {
                $button = '
                <a href="' . route('cetakPdfBesar', $item->siswa_id) . '" class="btn btn-danger btn-sm">Cetak PDF</a>
                ';
                return $button;
            })
            ->addIndexColumn()
            ->rawColumns(['waktu', 'tanggal', 'aksi'])
            ->make();
        }
    }

    // Data Siswa
    public function reportSiswa()
    {
        if(request()->ajax())
        {
            
            $query = Polingdua::where('siswa_id', '=', auth()->user()->siswa[0]->id)->orderBy('id', 'DESC');

            return Datatables::of($query)
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->addColumn('siswa_id', function($item) {
                    return $item->siswa->nama;
                })
                ->addColumn('feed_id', function($item) {
                    return $item->feed->nama;
                })
                ->addColumn('waktu', function($item) {
                    return $item->created_at->translatedFormat('l, d M Y H:i:s');
                })
                ->rawColumns(['number', 'siswa_id', 'feed_id', 'waktu'])
                ->make();
        }

        return view('pages.poling.reportsiswa');
    }

    // Index Poling
    public function index()
    {
        $siswa = Siswa::all();
        $feed = Feed::where('status', '=', 'kecil')->get();
        $tgl = Carbon::now()->translatedFormat('l, d M Y');
        $waktu = Carbon::now();
        $waktuCek = $waktu->toTimeString();

        return view('pages.poling.index', compact('siswa', 'feed', 'tgl', 'waktuCek'));
    }
    
    public function indexBesar()
    {
        $siswa = Siswa::all();
        $feed = Feed::where('status', '=', 'besar')->get();
        $tgl = Carbon::now()->translatedFormat('l, d M Y');
        $waktu = Carbon::now();
        $waktuCek = $waktu->toTimeString();

        return view('pages.poling.indexbesar', compact('siswa', 'feed', 'tgl', 'waktuCek'));
    }

    public function indexsiswa()
    {
        $siswa = Siswa::all();
        $feed = Feed::where('status', '=', 'besar')->get();
        $tgl = Carbon::now()->translatedFormat('l, d M Y');
        $tanggal = Carbon::now()->toDateString();
        $ceknama = auth()->user()->siswa[0]->id;
        $cektgl = Polingdua::where('tglcek', $tanggal)->where('siswa_id', $ceknama)->first();
        $waktu = Carbon::now();
        $waktuCek = $waktu->toTimeString();

        return view('pages.poling.indexsiswa', compact('siswa', 'feed', 'tgl', 'tanggal', 'ceknama', 'waktuCek', 'cektgl'));
    }

    // Proses Simpan Data
    public function store(PolingRequest $request)
    {
        $data = $request->all();
        $data['tglcek'] = Carbon::now()->toDateString();
        $data['kelas'] = auth()->user()->guru[0]->kelas;
        $data['unit'] = auth()->user()->guru[0]->unit;
        Poling::create($data);
        
        return redirect()->route('polingTq');
    }
    
    public function storeBesar(PolingRequest $request)
    {
        $data = $request->all();
        $data['tglcek'] = Carbon::now()->toDateString();
        $data['kelas'] = auth()->user()->guru[0]->kelas;
        $data['unit'] = auth()->user()->guru[0]->unit;
        $data['siswa_id'] = $request->siswa_id;
        Polingdua::create($data);
        
        return redirect()->route('polingTq');
    }

    public function storeSiswa(PolingsiswaRequest $request)
    {
        $ceknama = auth()->user()->siswa[0]->id;
        $tanggal = Carbon::now()->toDateString();
        $cektgl = Polingdua::where('tglcek', $tanggal)->where('siswa_id', $ceknama)->first();
        
        $data = $request->all();
        $data['tglcek'] = Carbon::now()->toDateString();
        $data['siswa_id'] = auth()->user()->siswa[0]->id;
        $data['kelas'] = auth()->user()->siswa[0]->kelas;
        $data['unit'] = auth()->user()->siswa[0]->unit;
        $data['siswa_id'] = auth()->user()->siswa[0]->id;
        
        if($cektgl) {
            return redirect()->route('polingTq');
        } else {
            Polingdua::create($data);
        }
        
        return redirect()->route('polingTq');
    }

    // Feedback Tq
    public function tq()
    {
        return view('pages.poling.tq');
    }

    // Cetak Excel
    public function cetakExcel(Request $request)
    {
        return (new PolingkExport($request->siswa_id))->download('siswa.xlsx');
    }

    // Cetak PDF Kecil
    public function cetakPdf($id)
    {
        $siswa = Siswa::findOrFail($id);
        $poling = Poling::orderBy('id', 'DESC')->get();
        $pdf = PDF::loadview('pages.poling.pdf.pdfkecil', compact('poling', 'siswa'));
        return $pdf->stream();
    }

    // Cetak PDF Besar
    public function cetakPdfBesar($id)
    {
        $siswa = Siswa::findOrFail($id);
        $poling = Polingdua::orderBy('id', 'DESC')->get();
        $pdf = PDF::loadview('pages.poling.pdf.pdfbesar', compact('poling', 'siswa'));
        return $pdf->stream();
    }

    // Report Per Siswa
    public function reportPerSiswa()
    {
        $siswa = Siswa::where('kelas', '=', auth()->user()->guru[0]->kelas)->get();

        return view('pages.poling.PerSiswa.index', compact('siswa'));
    }

    public function ambilDataSiswa(Request $request)
    {
        if(request()->ajax())
        {
            $siswa = Siswa::where('kelas', '=', auth()->user()->guru[0]->kelas)->get();

            return Datatables::of($siswa)
            ->addColumn('aksi', function($item) {
                $button = '
                <a href="' . route('detailSiswa', $item->id) . '" class="btn btn-danger btn-sm">Detail</a>
                ';
                return $button;
            })
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make();
        }
    }

    public function detailSiswa($id)
    {
        $item = Siswa::findOrFail($id);

        // Excellent
        $exc_pol = Polingdua::with('feed')->where('feed_id', '10')->first();
        $hasil = $exc_pol->feed->gambar;
        $exc = $item->polingdua->where('feed_id', '10');
        $exc_count = count($exc);
        $exc_perc = $exc_count / 5 * 100;

        // Good
        $good = $item->polingdua->where('feed_id', '11');
        $good_count = count($good);
        $good_perc = $good_count / 5 * 100;

        // Medium
        $medium = $item->polingdua->where('feed_id', '12');
        $medium_count = count($medium);
        $medium_perc = $medium_count / 5 * 100;

        // Bad
        $bad = $item->polingdua->where('feed_id', '13');
        $bad_count = count($bad);
        $bad_perc = $bad_count / 5 * 100;

        // Very Bad
        $vb = $item->polingdua->where('feed_id', '14');
        $vb_count = count($vb);
        $vb_perc = $vb_count / 5 * 100;
        
        return view('pages.poling.PerSiswa.show', compact('item', 'exc_count', 'good_count', 'medium_count', 'bad_count', 'vb_count', 'hasil'));
    }
}
