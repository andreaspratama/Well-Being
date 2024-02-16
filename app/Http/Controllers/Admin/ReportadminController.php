<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poling;
use App\Models\Polingdua;
use App\Models\Feed;
use Yajra\DataTables\Facades\DataTables;

class ReportadminController extends Controller
{
    public function index()
    {
        $feed = Feed::all();

        if(request()->ajax())
        {
            $query = Poling::with('feed', 'siswa')->orderBy('id', 'DESC');

            return Datatables::of($query)
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->addColumn('waktu', function($item) {
                    return $item->created_at->translatedFormat('l, d M Y H:i:s');
                })
                ->rawColumns(['number', 'siswa_id', 'feed_id', 'waktu'])
                ->make();
        }

        return view('pages.admin.report.index', compact('feed'));
    }
    
    public function indexBesar()
    {
        $feed = Feed::all();

        if(request()->ajax())
        {
            $query = Polingdua::with('feed', 'siswa')->orderBy('id', 'DESC');

            return Datatables::of($query)
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->addColumn('waktu', function($item) {
                    return $item->created_at->translatedFormat('l, d M Y H:i:s');
                })
                ->rawColumns(['number', 'siswa_id', 'feed_id', 'waktu'])
                ->make();
        }

        return view('pages.admin.report.indexBesar', compact('feed'));
    }
    
    // REPORT SMA
    public function dataBesarSMA(Request $request)
    {
        $poling = Polingdua::with('feed', 'siswa')->orderBy('id', 'DESC')->where('unit', '=', 'SMA')->get();

        return DataTables($poling)
            ->addColumn('waktu', function($item) {
                return $item->created_at->translatedFormat('H:i:s');
            })
            ->addColumn('tanggal', function($item) {
                return $item->created_at->format('d-m-Y');
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function reportBesarSMA()
    {
        $feed = Feed::where('status', '=', 'besar')->get();

        return view('pages.admin.report.sma', compact('feed'));
    }

    // REPORT SMP
    public function dataBesarSMP(Request $request)
    {
        $poling = Polingdua::with('feed', 'siswa')->orderBy('id', 'DESC')->where('unit', '=', 'SMP')->get();

        return DataTables($poling)
            ->addColumn('waktu', function($item) {
                return $item->created_at->translatedFormat('H:i:s');
            })
            ->addColumn('tanggal', function($item) {
                return $item->created_at->format('d-m-Y');
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function reportBesarSMP()
    {
        $feed = Feed::where('status', '=', 'besar')->get();

        return view('pages.admin.report.smp', compact('feed'));
    }

    // REPORT K3
    public function dataBesarK3(Request $request)
    {
        $poling = Polingdua::with('feed', 'siswa')->orderBy('id', 'DESC')->where('unit', '=', 'K3')->get();

        return DataTables($poling)
            ->addColumn('waktu', function($item) {
                return $item->created_at->translatedFormat('H:i:s');
            })
            ->addColumn('tanggal', function($item) {
                return $item->created_at->format('d-m-Y');
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function reportBesarK3()
    {
        $feed = Feed::where('status', '=', 'besar')->get();

        return view('pages.admin.report.k3', compact('feed'));
    }

    // REPORT K2
    public function dataBesarK2(Request $request)
    {
        $poling = Polingdua::with('feed', 'siswa')->orderBy('id', 'DESC')->where('unit', '=', 'K2')->get();

        return DataTables($poling)
            ->addColumn('waktu', function($item) {
                return $item->created_at->translatedFormat('H:i:s');
            })
            ->addColumn('tanggal', function($item) {
                return $item->created_at->format('d-m-Y');
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function reportBesarK2()
    {
        $feed = Feed::where('status', '=', 'besar')->get();

        return view('pages.admin.report.k2', compact('feed'));
    }

    // REPORT K1
    public function dataBesarK1(Request $request)
    {
        $poling = Polingdua::with('feed', 'siswa')->orderBy('id', 'DESC')->where('unit', '=', 'K1')->get();

        return DataTables($poling)
            ->addColumn('waktu', function($item) {
                return $item->created_at->translatedFormat('H:i:s');
            })
            ->addColumn('tanggal', function($item) {
                return $item->created_at->format('d-m-Y');
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function reportBesarK1()
    {
        $feed = Feed::where('status', '=', 'besar')->get();

        return view('pages.admin.report.k1', compact('feed'));
    }

    // REPORT K3 Kecil
    public function dataKecilK3(Request $request)
    {
        $poling = Poling::with('feed', 'siswa')->orderBy('id', 'DESC')->where('unit', '=', 'K3')->get();

        return DataTables($poling)
            ->addColumn('waktu', function($item) {
                return $item->created_at->translatedFormat('H:i:s');
            })
            ->addColumn('tanggal', function($item) {
                return $item->created_at->format('d-m-Y');
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function reportKecilK3()
    {
        $feed = Feed::where('status', '=', 'kecil')->get();

        return view('pages.admin.report.k3kecil', compact('feed'));
    }

    // REPORT K2 Kecil
    public function dataKecilK2(Request $request)
    {
        $poling = Poling::with('feed', 'siswa')->orderBy('id', 'DESC')->where('unit', '=', 'K2')->get();

        return DataTables($poling)
            ->addColumn('waktu', function($item) {
                return $item->created_at->translatedFormat('H:i:s');
            })
            ->addColumn('tanggal', function($item) {
                return $item->created_at->format('d-m-Y');
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function reportKecilK2()
    {
        $feed = Feed::where('status', '=', 'kecil')->get();

        return view('pages.admin.report.k2kecil', compact('feed'));
    }

    // REPORT K1 Kecil
    public function dataKecilK1(Request $request)
    {
        $poling = Poling::with('feed', 'siswa')->orderBy('id', 'DESC')->where('unit', '=', 'K1')->get();

        return DataTables($poling)
            ->addColumn('waktu', function($item) {
                return $item->created_at->translatedFormat('H:i:s');
            })
            ->addColumn('tanggal', function($item) {
                return $item->created_at->format('d-m-Y');
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function reportKecilK1()
    {
        $feed = Feed::where('status', '=', 'kecil')->get();

        return view('pages.admin.report.k1kecil', compact('feed'));
    }
}
