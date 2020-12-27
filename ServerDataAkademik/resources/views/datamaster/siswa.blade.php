@extends('layout.master')

@section('header')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            @if(Session::has('berhasil'))
                <div class="alert alert-success" role="alert">{{ Session::get('berhasil') }}</div>
            @endif
            <div class="panel-heading">
                <h1>{{ __('datamaster.DataSiswa') }}</h1>
            </div>
            <div class="panel-body">

                <table class="table table-hover overflow-auto" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('datamaster.Nama') }}</th>
                            <th scope="col">{{ __('datamaster.Agama') }}</th>
                            <th scope="col">{{ __('datamaster.Alamat') }}</th>
                            <th scope="col">{{ __('datamaster.Phone') }}</th>
                            <th scope="col">{{ __('datamaster.Aksi') }}
                                <!-- Button trigger modal -->
                                <a class="badge badge-info" data-toggle="modal" data-target="#createData">
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
                                <a href="#" class="btn btn-info">Edit</a>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('footer')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection