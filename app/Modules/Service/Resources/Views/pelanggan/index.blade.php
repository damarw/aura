@extends('master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('js_asset')
 <script src="{{asset('theme/js/dataTables.bootstrap.min.js')}}"></script>
@endsection
@section('content')
<div class="right_col" role="main">
 
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Plain Page <small>Page subtile </small>
                </h3>
            </div>
 
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input class="form-control" placeholder="Search for..." type="text">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Page title <small>Page subtile </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a></li>
                                    <li><a href="#">Settings 2</a></li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                       <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           <thead>
                               <th>No</th>
                               <th>Nama Pelanggan</th>
                               <th>Alamat</th>
                               <th>No Telepon</th>
                               <th>Action</th>
                           </thead>
                           <tbody>
                               
                           </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
$(document).ready(function() {
    

     
        var table = $('#datatable-responsive').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{url('service/pelanggan/data-table/')}}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama_pelanggan', name: 'nama_pelanggan' },
            { data: 'alamat_pelanggan', name: 'alamat_pelanggan' },
            { data: 'no_telepon', name: 'no_telepon' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
            
        ]
    });

   
}); 

</script>
@endsection