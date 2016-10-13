<?php

namespace App\Modules\Service\Http\Controllers;

use App\Modules\Service\Models\Pelanggan;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('service::pelanggan.index');
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
        //
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
        //
    }
    public function getdatatable()
    {
        
             $fetch=Pelanggan::all();
           // dd($fetch);
       // return $fetch;

         return Datatables::of($fetch)
    
            ->addColumn('action', function ($data) {
                return '<button class="btn btn-info  open-modal" value="'.$data->id.'"> Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>' . '
                <button class="btn btn-danger delete-dokter" value="'.$data->id.'"> Delete <i class="fa fa-trash-o"> </button>';
            })
            ->make(true);
    }
}
