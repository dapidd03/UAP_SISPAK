@extends('layouts.app')

@section('breadcrump')
    <li><a href="{{ url('/') }}">Home</a></li>
    <li class="active">Tentang</li>
@endsection

@section('content')
@include('layouts.aside')
<div class="col-md-9">
    <!-- <div class="jumbotron">
        <p>Selamat datang  di <strong>SISTEM PAKAR PENYAKIT PADI</strong>, untuk memulai konsultasi silahkan klik tombol dibawah ini :</p> 
        <p><a href="{{ route('pasienForm') }}" class="btn btn-primary">Konsultasi</a></p>
    </div> -->
    <div class="panel panel-default">
    	<div class="panel-heading">
    		<strong>Tentang Aplikasi Ini.</strong>
    	</div>
    	<div class="panel-body">
    		<div class="row">
    			<div class="col-md-12">
    				<label><strong>Identitas Pembuat : </strong></label>
    			</div>
    			<div class="col-md-2">Nama</div><div class="col-md-9">: David Mel, Gustika Dwi, dan Safira Aulia</div>
    			<div class="col-md-2">Kelas</div><div class="col-md-9">: C</div>
    			<div class="col-md-2">Jurusan</div><div class="col-md-9">: Ilmu Komputer</div>
    			<div class="col-md-2">Fakultas</div><div class="col-md-9">: MIPA</div>
    			<div class="col-md-2">Universitas</div><div class="col-md-9">: Universitas Lampung</div>
    		</div>
    		<div class="row">
	    		<hr>
    			<div class="col-md-12">
		    		<label><strong>Tujuan Pembuatan :</strong></label>
		    		<p>Sistem ini dikembangkan guna untuk memenuhi nilai UAP dari mata kuliah <strong>Sistem Pakar</strong>.</p>	
    			</div>
    		</div>
    		<div class="row">
	    		<hr>
	    		<div class="col-md-1" style="padding-right: 0;">
	    			<strong><i>Note :</i></strong>
	    		</div>
    			<div class="col-md-11" style="padding-left: 0;">
    				<p>
    					Berikut adalah <strong><a href="{{ asset('file/referensi.pdf') }}" target="_blank">refrensi</a></strong> yang kami pakai untuk pembuatan sistem ini. 
    				</p>
    			</div>
    		</div>
    	</div>
    </div>
</div>
@endsection
