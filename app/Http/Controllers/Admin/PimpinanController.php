<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pimpinan;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PimpinanImport;

class PimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Pimpinan::query();

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a href="' . route('pimpinan.edit', $item->id) . '" class="btn btn-warning btn-sm">
                            <i class="fa fa-fw fa-pencil-alt"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm delete" data-id="'. $item->id .'">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                    ';
                })
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->rawColumns(['aksi', 'number'])
                ->make();
        }

        return view('pages.admin.pimpinan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.pimpinan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->unit === 'MANAJERIAL') {
            $role = 'manajerial';
        } else {
            $role = 'pimpinan';
        }

        // INSERT TABLE USER
        $user = new \App\Models\User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('pimpinan123**');
        $user->role = $role;
        $user->save();

        // INSERT TABLE PIMPINAN
        $request->request->add(['user_id' => $user->id]);
        Pimpinan::create($request->all());

        return redirect()->route('pimpinan.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Pimpinan::findOrFail($id);

        return view('pages.admin.pimpinan.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        if ($request->unit === 'MANAJERIAL') {
            $role = 'manajerial';
        } else {
            $role = 'pimpinan';
        }
        
        $data = Pimpinan::findOrFail($id);
        $update_pimpin = $data->user_id;

        $data->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'unit' => $request->unit,
            'status' => $request->status,
        ]);

        $baru = User::find($update_pimpin);
        $baru->name = $request->nama;
        $baru->email = $request->email;
        $baru->password = bcrypt('pimpinan123**');
        $baru->role = $role;
        $baru->save();
        // $data = $request->all();
        // $item = Pimpinan::findOrFail($id);
        // $item->update($data);

        return redirect()->route('pimpinan.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $item = Pimpinan::findOrFail($id);
        $item->delete();

        $hapus_pimpinan = $item->user_id;
        User::where('id', $hapus_pimpinan)->delete();

        return redirect()->route('pimpinan.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataPimpinan', $namaFile);

        Excel::import(new PimpinanImport, public_path('/DataPimpinan/'.$namaFile));

        return redirect()->route('pimpinan.index')->with('success', 'Data Berhasil Diimport');
    }
}
