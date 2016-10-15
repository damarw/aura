<?php

namespace App\Modules\Service\Http\Controllers;

use App\Modules\Service\Models\Pelanggan as DataUtama;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class PelangganController extends Controller
{

    private $folder ='pelanggan';
    private $route='pelanggan';
    private 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('service::'.$this->folder.'.'.'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
        'nama_pelanggan' => 'required',
        'alamat_pelanggan' => 'required',
        'no_telepon'=> 'required',
        ]);
        $data = new Pelanggan();
        $data->nama_pelanggan = $request->nama_pelanggan;
        $data->alamat_pelanggan = $request->alamat_pelanggan;
        $data->no_telepon= $request->no_telepon;
        $data->save();
        return ['<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> Data berhasil di tambahkan !'];
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
        $data = DataUtama::find($id);
        return $data;
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
        $data = DataUtama::find($id);
        $data->nama_pelanggan = $request->nama_pelanggan;
        $data->alamat_pelanggan = $request->alamat_pelanggan;
        $data->no_telepon= $request->no_telepon;
        $data->save();

        return ['<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> Data berhasil di rubah !'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataUtama::find($id);
        $data->delete();
        return ['<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> Data berhasil di hapus !'];
    }
    public function getdatatable()
    {
        
             $fetch=DataUtama::all();
           // dd($fetch);
       // return $fetch;

         return Datatables::of($fetch)
    
            ->addColumn('action', function ($data) {
                return '<button class="btn btn-info  edit-data" value="'.$data->id.'"> Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>' . '
                <button class="btn btn-danger delete-data" value="'.$data->id.'"> Delete <i class="fa fa-trash-o"> </button>';
            })
            ->make(true);
    }
}
