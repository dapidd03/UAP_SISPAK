@extends('layouts.app')

@section('breadcrump')
<li><a href="{{ url('/') }}">Home</a></li>
<li class="active">Konsultasi</li>
@endsection

@section('content')
@include('layouts.aside')
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Form Data Pasien</strong>
        </div>
        <div class="panel-body">
            <div class="col-md-10 col-md-offset-1">
                <form method="POST" action="{{ route('storePasien') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input 
                                    type="text" 
                                    id="nama" 
                                    name="nama" 
                                    class="form-control" 
                                    placeholder="Nama petani..."
                                    required 
                                    maxlength="255">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="lokasi">Lokasi:</label>
                                <textarea 
                                    id="lokasi" 
                                    name="lokasi" 
                                    class="form-control" 
                                    placeholder="Lokasi pertanian..." 
                                    required 
                                    maxlength="500"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">
                                Mulai Konsultasi <i class="fa fa-fw fa-sign-in" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
