@extends('layouts.app')

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('breadcrump')
<li><a href="{{ url('/') }}">Home</a></li>
<li class="active">Penyakit</li>
@endsection

@section('content')
	@include('layouts.aside')
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Data Penyakit</strong>
			</div>
			<div class="panel-body">
				@if (session('status'))
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  	<strong>Success!</strong> {{ session('status') }}
					</div>
				@endif
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Penyakit</th>
							<th>Gejala yang nampak</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						@foreach ($penyakit as $penyakit)
							<tr>
								<td>{{ $no++ }}.</td>
								<td>{{ $penyakit->nama }}</td>
								<td>
									<ul style="padding-left: 16px;">
										@forelse($penyakit->gejala as $gejala)
											<li>{{ $gejala->name }}</li>
										@empty
											Maaf, belum ada data gejala untuk penyakit ini.
										@endforelse
									</ul>
								</td>
								<td align="right">
									@if (Auth::check())
										<button type="button" class="btn btn-primary btn-sm" onclick="edit('{{ route('penyakit.edit', $penyakit->id) }}')" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i></button>
										<button type="button" class="btn btn-danger btn-sm" onclick="$('form[name={{ $penyakit->id }}]').submit();"><i class="fa fa-trash"></i></button>
										<form name="{{ $penyakit->id }}" method="POST" action="{{ route('penyakit.destroy', $penyakit->id) }}">
											@csrf
											@method('DELETE')
										</form>
									@else
										<button type="button" class="btn btn-primary btn-sm" onclick="show('{{ route('detail', $penyakit->id) }}')" data-toggle="modal" data-target="#show"><i class="fa fa-eye"></i></button>
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Area -->
	@if (Auth::check())
	<div id="add" class="modal fade" role="dialog">
		 <div class="modal-dialog modal-lg">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" align="center">Tambah Penyakit Baru</h4>
			    </div>
			    <div class="modal-body">
			        <form method="POST" action="{{ route('penyakit.store') }}">
			        	@csrf
			        	<div class="col-md-6">
		        			<div class="form-group">
		        				<label for="nama">Nama Penyakit:</label>
		        				<input type="text" name="nama" id="nama" class="form-control" required placeholder="Nama dari penyakit...">
		        			</div>
		        			<div class="form-group">
		        				<label for="penyebab">Penyebab:</label>
		        				<input type="text" name="penyebab" id="penyebab" class="form-control" required placeholder="Penyakit disebabkan oleh...">
		        			</div>
		        			<div class="form-group">
		        				<label for="definisi">Definisi Penyakit:</label>
		        				<textarea name="definisi" id="definisi" class="form-control" rows="5" required placeholder="Jelaskan mengenai penyakit ini..."></textarea>
		        			</div>
			        	</div>
						<div class="col-md-6">						
		        			<div class="form-group">
		        				<label>Gejala-gejala yang terjadi:</label>
		        				<div class="col-md-12">
		        					@foreach ($gejalas as $gejala)
		        						<div class="form-check">
		        							<input type="checkbox" name="gejala[]" value="{{ $gejala->id }}" id="gejala_{{ $gejala->id }}" class="form-check-input">
		        							<label for="gejala_{{ $gejala->id }}" class="form-check-label">{{ $gejala->name }}</label>
		        						</div>
		        					@endforeach
		        				</div>
		        			</div>
		        		</div>
			        </form>
			    </div>
			    <div class="modal-footer">
			    	<button type="button" class="btn btn-primary" onclick="$('#add form').submit();">Tambahkan <i class="fa fa-plus"></i></button>
			    </div>
		    </div>
		 </div>
	</div>
	<div id="edit" class="modal fade" role="dialog">
		 <div class="modal-dialog modal-lg">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" align="center">Ubah Data Penyakit</h4>
			    </div>
			    <div class="modal-body">
			    </div>
			    <div class="modal-footer">
			    	<button type="button" class="btn btn-primary" onclick="$('#edit form').submit();">Simpan Perubahan <i class="fa fa-pencil fa-fw"></i></button>
			    </div>
		    </div>
		 </div>
	</div>
	@endif
	<div id="show" class="modal fade" role="dialog">
		 <div class="modal-dialog">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" align="center">Tentang Penyakit</h4>
			    </div>
			    <div class="modal-body">
			    </div>
		    </div>
		 </div>
	</div>
@endsection

@section('script')
	<script src="{{ asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/datatables/js/dataTables.bootstrap.min.js') }}"></script>
	<script>
		$(document).ready(function() {
		    $('.table').DataTable();
		});

		function show(route) {
			$.get(route, function(data) {
				$('#show .modal-body').html(data);
			});
		}

		@if (Auth::check())
			$(document).ready(function() {
			    $('.dataTables_filter input').after('<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add" style="margin-left: 10px"><i class="fa fa-fw fa-plus"></i> Penyakit </button>');
			});

			function edit(route) {
				$.get(route, function(data) {
					$('#edit .modal-body').html(data);
				});
			}
		@endif
	</script>
@endsection
