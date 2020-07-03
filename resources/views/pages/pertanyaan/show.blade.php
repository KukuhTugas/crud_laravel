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
            <div class="col-10">      
               <h3 class="card-title">Detail Pertanyaan</h3><br>
               <small>Dibuat : {{ $pertanyaan->created_at }}</small><br>
               <small>Diedit : {{ $pertanyaan->updated_at }}</small>
            </div>
            <div class="col-2">
               <a href="{{ route('pertanyaan.index') }}" class="btn btn-success float-right">Kembali</a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <ul class="list-group">
            <li class="list-group-item active">{{ $pertanyaan->judul }}<br><small>{{ $pertanyaan->isi }}</small></li>
            @foreach ($pertanyaan->jawaban as $value)
               <li class="list-group-item">{{ $value->jawaban }}</li> 
            @endforeach
          </ul>
      </div>
   </div>
</div>
@endsection