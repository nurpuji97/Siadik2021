@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                @if(Session::has('berhasil'))
					<div class="alert alert-success" role="alert">{{ Session::get('berhasil') }}</div>
				@endif
                <div class="panel-heading">
                    <h1>{{ __('messages.welcome') }}</h1>
                </div>
                <div class="panel-body">
                    <p>Selamat Datang</p>
                </div>
            </div>
        </div>
    </div>
@endsection