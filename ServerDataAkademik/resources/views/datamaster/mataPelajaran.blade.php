@extends('layout.master')

@section('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="row">
    <div class="col-md 12">
        <div class="panel">
            <div class="panel-heading">
                <h1>{{ __('tabel.mata_pelajaran') }}</h1>
            </div>
            <div class="panel-body">
                <table class="table table-hover overflow-auto" id="table_mataPelajaran">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('tabel.kode')." ". __('tabel.mata_pelajaran') }}</th>
                            <th scope="col">{{ __('tabel.Nama')." ". __('tabel.mata_pelajaran') }}</th>
                            <th scope="col">{{ __('tabel.Aksi') }}
                                {{-- Create data --}}
                                <a class="badge badge-info"
                                name="createRecordMapel"
                                id="createRecordMapel"
                                >+</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 {{-- Create --}}
 <div class="modal fade" id="formModalMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">&times;</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-label="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form id="form_mapel" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="kode_mapel">Kode Mapel</label>
                    <input type="text" class="form-control" name="kode_mapel" id="kode_mapel" placeholder="{{ __('tabel.kode')." ". __('tabel.mata_pelajaran') }}">
                </div>
                <div class="form-group">
                    <label for="nama_mapel">Nama Ruangan</label>
                    <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" placeholder="{{ __('tabel.Nama')." ". __('tabel.mata_pelajaran') }}">
                </div>
                <input type="hidden" name="hidden_id" id="hidden_id" />
                <input type="hidden" name="action" id="action" />
                <button type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Add">{{ __('tabel.Simpan') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

    {{-- confirm hapus --}}
    <div class="modal fade" id="confirmModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">{{ __('tabel.msg_konfirmasi') }}</h2>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">{{ __('tabel.msg_confirmHapus') }}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">{{ __('tabel.msg_ya') }}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {{ __('tabel.msg_tidak') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">

     // menampilkan data
     $(document).ready(function(){
        $('#table_mataPelajaran').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('ajax-mapel.index') }}",
            },
            columns:[
                {
                    data: 'kode_mapel',
                    name: 'kode_mapel'
                },
                {
                    data: 'nama_mapel',
                    name: 'nama_mapel'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                }
            ]
        });
    });

    // memunculkan modal
    $('#createRecordMapel').click(function(){
        $('.modal-title').text("{{ __('tabel.Input')." ".__('tabel.mata_pelajaran') }}");
        $('#action').val("Add");
        $('#action_button').val("Add");
        $('#formModalMapel').modal('show');
    });

   // simpan dan update data
   $('#form_mapel').on('submit',function(event){
        event.preventDefault();

        // simpan data
        if($('#action').val() == 'Add'){
            $.ajax({
                url: "{{ route('ajax-mapel.store') }}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success:function(data)
                {
                    var html = '';
                    if(data.errors){
                        html = '<div class="alert alert-danger">';
                        for(var count = 0; count < data.errors.length; count++){
                            html += '<p>' +data.errors[count]+ '</p>';
                        }
                        html += '</div>';
                    }
                    if(data.success)
                    {
                        html = '<div class="alert alert-success">' + data.success + '</div>';
                        $('#form_mapel')[0].reset();
                        $('#table_mataPelajaran').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                }
            })
        }

        // update data
        if($('#action').val() == "Edit"){
            $.ajax({
                url: "{{ route('ajax-mapel.update') }}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {
                    var html = '';
                    if(data.errors){
                        html = '<div class="alert alert-danger">';
                        for(var count = 0; count < data.errors.length; count++){
                            html += '<p>'+data.errors[count]+'</p>';
                        } 
                        html += '</div>';
                    }
                    if(data.success)
                    {
                        html = '<div class="alert alert-success" >'+data.success+'</div>';
                        $('#form_mapel')[0].reset();
                        $('#table_mataPelajaran').DataTable().ajax.reload();
                    }
                    $('#form_result').html(html);
                }
            });
        }
        
    });

    // edit data
    $(document).on('click','.edit', function(){
        var id = $(this).attr('id');
        $('#form_result').html('');
        $.ajax({
            url: "/ajax-mapel/"+id+"/edit",
            dataType: "json",
            success: function(html){
                $('#kode_mapel').val(html.data.kode_mapel);
                $('#nama_mapel').val(html.data.nama_mapel);
                $('#hidden_id').val(html.data.id);
                $('#action_button').val("Edit");
                $('.modal-title').text("{{ __('tabel.Edit')." ".__('tabel.mata_pelajaran') }}");
                $('#action').val("Edit");
                $('#formModalMapel').modal('show');
            }
        })
    });

    var user_id;

    $(document).on('click','.delete', function(){
        user_id = $(this).attr('id');
        $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function(){
        $.ajax({
            url: "ajax-mapel/destroy/"+user_id,
            success:function(data){
                setTimeout(function(){
                    $('#confirmModal').modal('hide');
                    $('#table_mataPelajaran').DataTable().ajax.reload();
                }, 2000);
            }
        })
    });

</script>

@endsection