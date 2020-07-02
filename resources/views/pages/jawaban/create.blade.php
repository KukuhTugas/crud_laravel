@extends('layout.master')

@section('breadcrumb')
<div class="col-sm-6">
   <h1 class="m-0 text-dark">Jawab pertanyaan</h1>
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
         <h3 class="card-title">Jawab Pertanyaan</h3>
         <a href="{{ route('pertanyaan.index') }}" class="btn btn-success float-right">Kembali</a>
      </div>
      <div class="card-body">
         <form action="{{ route('jawaban.store', $pertanyaan->id) }}" method="post">
            @csrf
            @method("POST")
            <div class="form-group">
               <label for="">Judul</label>
               <input type="text" class="form-control" name="judul" value="{{ $pertanyaan->judul }}" readonly>
            </div>
            <div class="form-group">
               <label for="">Jawaban</label>
               <textarea name="jawaban" cols="30" rows="10" class="form-control" required></textarea>
            </div>
            <button class="btn btn-primary">Jawab</button>
         </form>
      </div>
   </div>
</div>
@endsection