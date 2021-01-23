@extends('layout.master')

@section('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            @if(Session::has('berhasil'))
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <i class="fa fa-check-circle"></i> {{ Session::get('berhasil') }}
                </div>
            @endif
            <div class="panel-heading">
                <h1>{{ __('tabel.DataSiswa') }}</h1>
            </div>
            <div class="panel-body">

                <table class="table table-hover overflow-auto" id="user_table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('tabel.Nama') }}</th>
                            <th scope="col">{{ __('tabel.Agama') }}</th>
                            <th scope="col">{{ __('tabel.Alamat') }}</th>
                            <th scope="col">{{ __('tabel.Phone') }}</th>
                            <th scope="col">{{ __('tabel.Avatar') }}</th>
                            <th scope="col">{{ __('tabel.Aksi') }}
                                <!-- Create Data -->
                                <a class="badge badge-info" name="create_record" id="create_record" class="btn btn-success">
                                    +
                                </a>
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

<!-- Create -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">&times;</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <span id="form_result"></span>
            <form id="sample_form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">{{ __('tabel.Nama') }}</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('tabel.Nama_Lengkap') }}">
                </div>
                <div class="form-group">
                    <label for="role">{{ __('tabel.Role') }}</label>
                    <select id="role" name="role" class="form-control">
                        <option value="siswa">{{ __('messages.Siswa') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('tabel.Email') }}</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('tabel.Test_Email') }}">
                </div>
                <div class="form-group">
                    <label for="password">{{ __('tabel.Password') }}</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="{{ __('tabel.Password') }}">
                </div>
                <div class="form-group">
                    <label for="agama">{{ __('tabel.Agama') }}</label>
                    <select id="agama" name="agama" class="form-control">
                        <option value="Islam">{{ __('tabel.Islam') }}</option>
                        <option value="Kristen">{{ __('tabel.Kristen') }}</option>
                        <option value="Katolik">{{ __('tabel.Katolik') }}</option>
                        <option value="Hindu">{{ __('tabel.Hindu') }}</option>
                        <option value="Buddha">{{ __('tabel.Buddha') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">{{ __('tabel.Alamat') }}</label>
                    <textarea id="alamat" name="alamat" cols="30" rows="10" class="form-control" placeholder="{{ __('tabel.Alamat') }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="nama">{{ __('tabel.Avatar') }}</label>
                    <input type="file" name="avatar" id="avatar" onchange="previewFile(this)">
                    <img id="previewImg" alt="Foto" style="width: 70px;">
                </div>
                <div class="form-group">
                    <label for="nohp">{{ __('tabel.Phone') }}</label>
                    <input type="text" class="form-control" name="nohp" id="nohp" placeholder="012-345-6789">
                </div>
                <input type="hidden" name="hidden_id" id="hidden_id" />
                <input type="hidden" name="action" id="action" />
                <button type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Add">{{ __('tabel.Simpan') }}</button>
            </form>
        </div>
    </div>
    </div>
</div>

<!-- Confirm Hapus -->
<div id="confirmModal" class="modal fade" role="dialog">
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
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('tabel.msg_tidak') }}</button>
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
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "{{ route('ajax-crud.index') }}",
            },
            columns:[
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'agama',
                    name: 'agama'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'nohp',
                    name: 'nohp'
                },
                {
                    data: 'avatar',
                    name: 'avatar',
                    render: function(data, type, full, meta){
                        return "<img src={{ URL::to('/') }}/images/" + data + " width='70' class='img-thumbnail' />";
                    },
                    orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
,                }
            ]
        });
    });

        // melihat gambar sebelum di upload
        function previewFile(input){
            var file = $("input[type=file]").get(0).files[0];
            if(file)
            {
                var reader = new FileReader();
                reader.onload = function(){
                    $('#previewImg').attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
        }

        // memunculkan modal
        $('#create_record').click(function(){
            $('.modal-title').text("{{ __('tabel.Input')." ". __('tabel.DataSiswa') }}");
            $('#action_button').val("Add");
            $('#action').val("Add");
            $('#formModal').modal('show');
        });

        // simpan data
        $('#sample_form').on('submit', function(event){
            event.preventDefault();
            if($('#action').val() == 'Add')
            {
                $.ajax({
                    url: "{{ route('ajax-crud.store') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success:function(data)
                    {
                        var html = '';
                        if(data.errors)
                        {
                            html = '<div class="alert alert-danger">';
                            for(var count = 0; count < data.errors.length; count++)
                            {
                                html += '<p>' +data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if(data.success)
                        {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();
                            $('#previewImg').html('');
                            $('#user_table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                })
            }

            // Update data
            if($('#action').val() == "Edit")
            {
                $.ajax({
                    url: "{{ route('ajax-crud.update') }}",
                    method: "POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data)
                    {
                        var html = '';
                        if(data.errors)
                        {
                            html = '<div class="alert alert-danger">';
                            for(var count = 0; count < data.errors.length; count++)
                            {
                                html += '<p>'+data.errors[count]+'</p>';
                            }
                            html += '</div>';
                        }
                        if(data.success)
                        {
                            html = '<div class="alert alert-success">'+data.success+'</div>';
                            $('#sample_form')[0].reset();
                            $('#previewImg').html('');
                            $('#user_table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                });
            }

        });

            // Edit data
            $(document).on('click','.edit', function(){
                var id = $(this).attr('id');
                $('#form_result').html('');
                $.ajax({
                    url: "/ajax-crud/"+id+"/edit",
                    dataType: "json",
                    success:function(html){
                        $('#name').val(html.data.name);
                        $('#agama').val(html.data.agama);
                        $('#alamat').val(html.data.alamat);
                        $('#previewImg').html("<img src={{ URL::to('/') }}/images/"+html.data.avatar+" width='70' class='img-thumbnail' />");
                        $('#previewImg').append("<input type='hidden' name='hidden_image' value='"+html.data.avatar+"' />");
                        $('#nohp').val(html.data.nohp);
                        $("#hidden_id").val(html.data.id);
                        $('#action_button').val("Edit");
                        $('.modal-title').text("{{ __('tabel.Edit')." ". __('tabel.DataSiswa') }}");
                        $('#action').val("Edit");
                        $('#formModal').modal('show');
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
                    url:"ajax-crud/destroy/"+user_id,
                    success:function(data)
                    {
                        setTimeout(function(){
                            $('#confirmModal').modal('hide');
                            $('#user_table').DataTable().ajax.reload();
                        }, 2000);
                    }
                })
            });

    </script>
@endsection