<div class="row">
	<div class="col-md-12">
		<form action="{{ route('penyakit.update', $penyakit->id) }}" method="POST">
			@csrf
			@method('PATCH')
			
			<div class="col-md-6">
    			<div class="form-group">
    				<label for="nama">Nama Penyakit:</label>
					<input 
                        type="text" 
                        name="nama" 
                        id="nama" 
                        class="form-control" 
                        required 
                        placeholder="Nama dari penyakit..." 
                        value="{{ $penyakit->nama }}">
    			</div>

    			<div class="form-group">
    				<label for="penyebab">Penyebab:</label>
					<input 
                        type="text" 
                        name="penyebab" 
                        id="penyebab" 
                        class="form-control" 
                        required 
                        placeholder="Penyakit disebabkan oleh..." 
                        value="{{ $penyakit->penyebab }}">
    			</div>

    			<div class="form-group">
    				<label for="definisi">Definisi Penyakit:</label>
					<textarea 
                        name="definisi" 
                        id="definisi" 
                        class="form-control" 
                        rows="5"
                        placeholder="Jelaskan mengenai penyakit ini...">{{ $penyakit->definisi }}</textarea>
    			</div>
			</div>
			
			<div class="col-md-6">
    			<div class="form-group">
    				<label>Gejala-gejala yang terjadi:</label>
    				<div class="col-md-12">
    					@foreach ($gejalas as $gejala)
    						<div class="form-check">
						      	<input 
                                    class="form-check-input check" 
                                    type="checkbox" 
                                    id="gejala_{{ $gejala->id }}" 
                                    name="gejala[]" 
                                    value="{{ $gejala->id }}"
                                    {{ $penyakit->gejala->contains($gejala->id) ? 'checked' : '' }}>
						      	<label class="form-check-label" for="gejala_{{ $gejala->id }}">
						      		{{ $gejala->name }}
						      	</label>
						    </div>
    					@endforeach
    				</div>
    			</div>
    		</div>

			<div class="col-md-12 text-end mt-3">
				<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
			</div>
		</form>
	</div>
</div>
