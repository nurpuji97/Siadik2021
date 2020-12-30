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

                <table class="table table-hover overflow-auto" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('tabel.Nama') }}</th>
                            <th scope="col">{{ __('tabel.Agama') }}</th>
                            <th scope="col">{{ __('tabel.Alamat') }}</th>
                            <th scope="col">{{ __('tabel.Phone') }}</th>
                            <th scope="col">{{ __('tabel.Aksi') }}
                                <!-- Create Data -->
                                <a class="badge badge-info" data-toggle="modal" data-target="#createDataSiswaModal">
                                    +
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $murid)
                        <tr>
                            <td>{{ $murid->name }}</td>
                            <td>{{ $murid->agama }}</td>
                            <td>{{ $murid->alamat }}</td>
                            <td>{{ $murid->nohp }}</td>
                            <td>
                                <a href="#" class="btn btn-info">{{ __('tabel.Edit') }}</a>
                                <a href="#" class="btn btn-danger">{{ __('tabel.Delete') }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<!-- Create -->
<div class="modal fade" id="createDataSiswaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('tabel.Input')." ". __('tabel.DataSiswa') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="siswaForm" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">{{ __('tabel.Nama') }}</label>
                    <input type="text" class="form-control" id="name" placeholder="{{ __('tabel.Nama_Lengkap') }}">
                </div>
                <div class="form-group">
                    <label for="role">{{ __('tabel.Role') }}</label>
                    <select id="role" class="form-control">
                        <option value="siswa">{{ __('messages.Siswa') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('tabel.Email') }}</label>
                    <input type="email" class="form-control" id="email" placeholder="{{ __('tabel.Test_Email') }}">
                </div>
                <div class="form-group">
                    <label for="password">{{ __('tabel.Password') }}</label>
                    <input type="password" class="form-control" id="password" placeholder="{{ __('tabel.Password') }}">
                </div>
                <div class="form-group">
                    <label for="nama">{{ __('tabel.Agama') }}</label>
                    <select id="agama" class="form-control">
                        <option value="Islam">{{ __('tabel.Islam') }}</option>
                        <option value="Kristen">{{ __('tabel.Kristen') }}</option>
                        <option value="Katolik">{{ __('tabel.Katolik') }}</option>
                        <option value="Hindu">{{ __('tabel.Hindu') }}</option>
                        <option value="Buddha">{{ __('tabel.Buddha') }}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">{{ __('tabel.Alamat') }}</label>
                    <textarea id="alamat" cols="30" rows="10" class="form-control" placeholder="{{ __('tabel.Alamat') }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="nama">{{ __('tabel.Avatar') }}</label>
                    <input type="file" name="avatar" id="avatar" onchange="previewFile(this)">
                    <img id="previewImg" alt="Foto" style="width: 30px; height:30px;">
                </div>
                <div class="form-group">
                    <label for="nama">{{ __('tabel.Phone') }}</label>
                    <input type="text" class="form-control" id="nohp" placeholder="012-345-6789">
                </div>
                <button type="submit" class="btn btn-primary">{{ __('tabel.Simpan') }}</button>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('footer')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

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

        $("#siswaForm").submit(function(e){
            e.preventDefault();

            let name = $("#name").val();
            let role = $("#role").val();
            let email = $("#email").val();
            let password = $("#password").val();
            let agama = $("#agama").val();
            let alamat = $("#alamat").val();
            let avatar = $("#avatar").val();
            let nohp = $("#nohp").val();
            let _token = $("input[name=_token]").val();

            $.ajax({
                url: "{{ route('siswa.post') }}",
                type: "POST",
                data:{
                    name:name,
                    role:role,
                    email:email,
                    password:password,
                    agama:agama,
                    alamat:alamat,
                    avatar:avatar,
                    nohp:nohp,
                    _token:_token
                },
                success:function(response)
                {
                    if(response)
                    {
                        $("#myTable tbody").prepend('<tr><td>'+response.name+'</td><td>'+response.agama+'</td><td>'+response.alamat+'</td><td>'+response.nohp+'</td><td><a href="#" class="btn btn-info">{{ __('tabel.Edit') }}</a> <a href="#" class="btn btn-danger">{{ __('tabel.Delete') }}</a></td></tr>');
                        $("#siswaForm")[0].reset();
                        $("#createDataSiswaModal").modal('hide');
                    }
                }
            });
        });
    </script>
@endsection