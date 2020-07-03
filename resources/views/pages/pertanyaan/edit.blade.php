@extends('layout.master')

@section('breadcrumb')
<div class="col-sm-6">
   <h1 class="m-0 text-dark">Detail Pertanyaan</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
   <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
   <li class="breadcrumb-item active">Pertanyaan</li>
</ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <div class="row"> 
            <h3 class="card-title">Edit Pertanyaan</h3><br>
         </div>
      </div>
      <div class="card-body">
         <form action="{{ route('pertanyaan.update', $pertanyaan->id) }}" method="post">
            @csrf
            @method("PUT")
            <div class="form-group">
               <label for="">Judul</label>
               <input type="text" class="form-control" name="judul" value="{{ $pertanyaan->judul }}" required>
            </div>
            <div class="form-group">
               <label for="">Isi</label>
               <textarea name="isi" cols="30" rows="10" class="form-control" required>{{ $pertanyaan->isi }}</textarea>
            </div>
            <button class="btn btn-primary">Simpan</button>
         </form>
      </div>
   </div>
</div>
@endsection