<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Laporan_covid;

use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Laporan_covid::all();
        $data = json_decode($laporan);
        // dd($data);
        return view('page.dashboard')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Berita::create($data);
        return redirect()->route('admin')->with('create', 'Data Berhasil DiUpdate!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Berita::all();
        // dd($laporan);
        return view('page.update')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Berita::findOrFail($id);
        $data->delete();
        return redirect()->route('history')->with('create', 'Data Berhasil Dihapus!!');
    }

    public function delete($id)
    {
        $data = Laporan_covid::findOrFail($id);
        $data->delete();
        return redirect()->route('admin')->with('create', 'Data Berhasil Dihapus!!');
    }
}
