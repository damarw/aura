@extends('master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('theme/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('js_asset')
 <script src="{{asset('theme/js/dataTables.bootstrap.min.js')}}"></script>
 <script src="{{asset('theme/js/parsley.min.js')}}"></script>
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
                        <button class="btn btn-primary btn-lg" id="tambah-btn">Tambah</button>
                        <div class="clearfix"></div>
                        <div id="keterangan">
                          
                        </div>
                    </div>
                    <div class="x_content">
                       <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           <thead>
                               <th>Id</th>
                               <th>Nama Service</th>
                               <th style="width: 50px;">Action</th>
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

<!-- modal tambah data -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <form id="form-data" data-parsley-validate name="add-data" role="form" class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="col-md-3 control-label" for="">Nama Service</label>
              <div class="col-md-9 col-lg-9">
                <input type="text" name="nama_service" value="" class="form-control" id="nama_service" placeholder="Input field" required >
              </div>
            </div>
             
           
            <input type="hidden" name="pm-key" id="pm-key" value="">
            <div class="metod">
              
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="metode" value="simpan" >Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->

<!-- modal hapus data -->
<div class="modal fade" id="hapusdata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <p><strong>Anda yakin akan menghapus data ini??</strong></p>
        <form name="hapus" id="hapus-data">
          <input type="hidden" name="_method" value="delete">
          <input type="hidden" id="primary" name="primary" value="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="tombol-hapus" class="btn btn-danger" >Hapus Data</button>
      </div>
    </div>
  </div>
</div>
<!--end modal -->
@endsection
@section('js')
<script>
$(document).ready(function() {
    var url = '{{ url('service/jenis-service') }}'

     
        var table = $('#datatable-responsive').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": url + '/' + 'data-table',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama_service', name: 'nama_service' },
            { data: 'action', name: 'action', orderable: false, searchable: false},
            
        ]
    });
        
    
    //------------ hapus data -------------------\\
      $(document).on('click', '.delete-data' , function() {
        var task_id = $(this).val();
          $('#primary').val(task_id);
          $('#hapusdata').modal('show');
        })

      $('#tombol-hapus').click(function(){
        var pk= $('#primary').val();
        var datastring = $('#hapus-data').serialize();
        var useUrl = url + '/' + pk;
          $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

          $.ajax({
            method:'delete',
            url: useUrl ,
            data : datastring,
            dataType: 'json',
            success: function(data){
              table.ajax.reload( null, false );
              $("#keterangan").html(data);
              $("#keterangan").addClass("alert alert-success");
              $(".alert").show();
              $('.alert').delay(5000).fadeOut('slow');
            }
          });   
          $('#hapusdata').modal('hide'); 

      });
    
    //--------------- end ----------------------\\


    //------------ edit data ----------------------\\
      $(document).on('click', '.edit-data' , function() {
        var task_id = $(this).val();
        $.get(url + '/' + task_id + '/' + 'edit', function(data){
          $('#pm-key').val(task_id);
          $('#nama_service').val(data.nama_service);
          $('#metode').val('edit');
          $('#tambahdata').modal('show');
        })
      });


//------------ tambah data ------------------\\
    $('#tambah-btn').click(function(){
        $('#metode').val("simpan");
        $('#form-data').trigger("reset");
        $(".metod").empty();
        $('#tambahdata').modal('show');
    });
    //------------- end --------------------------\\

    $(function() { 
    $('#form-data').submit(function(e) { 
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
         // alert('asu lah koe');
              var task_id = $('#pm-key').val();
              var datastring = $("#form-data").serialize();
              var metode =$('#metode').val();
              var type ='post'; 
              var useUrl = url;
              if(metode == 'edit'){
                  type = 'put';
                  useUrl += '/'+ task_id;
              }

              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

              $.ajax({
                method:type,
                url: useUrl,
                data : datastring,
                dataType: 'json',
                success: function(data){
                  table.ajax.reload( null, false );
                  $("#keterangan").html(data);
                  $("#keterangan").addClass("alert alert-info");
                  $(".alert").show();
                  $('.alert').delay(5000).fadeOut('slow');
                },
                error:function(data){
                  var errors = data.responseJSON;
                   errorsHtml = '<div class="alert alert-danger"><ul>';
                   errorsHtml += '<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>';
                    $.each(errors, function(key,value){
                      errorsHtml += '<li>'+ value[0] + '</li>';
                    });
                     errorsHtml += '</ul></div>';
                     $( '#keterangan' ).html( errorsHtml );
                     $(".alert").show();
                     $('.alert').delay(5000).fadeOut('slow'); 
                }
              });   
              $('#tambahdata').modal('hide');    
        }
    });
}); 
   
}); 

</script>
@endsection