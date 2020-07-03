@extends('layout.master')

@section('breadcrumb')
<div class="col-sm-6">
   <h1 class="m-0 text-dark">Halaman Pertanyaan</h1>
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
         <h3 class="card-title">Daftar Tertanyaan</h3>
         <a href="{{ route('pertanyaan.create') }}" class="btn btn-primary float-right">Tambah Pertanyaan</a>
      </div>
      <div class="card-body">
         <table id="pertanyaan" class="table table-bordered table-strip ">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Judul</th>
                  <th>Isi</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($pertanyaan as $value)
                  <tr>
                     <td>{{ $no++ }}</td>
                     <td>{{ $value->judul }}</td>
                     <td>{{ (strlen($value->isi) > 70) ? substr($value->isi, 0, 70) . "...." : $value->isi }}</td>
                     <td>
                        <a href="{{ route('jawaban.index', $value->id) }}" class="btn btn-warning">Lihat Jawaban</a>
                        <a href="{{ route('jawaban.create', $value->id) }}" class="btn btn-success">Jawab</a>

                        <div class="btn-group" role="group">
                           <button class="btn btn-info dropdown-toggle" data-toggle="dropdown"></button>
                           <div class="dropdown-menu"> 
                              <a href="{{ route('pertanyaan.show', $value->id) }}" class="btn-detaildata text-info dropdown-item" ><i class="fa fa-eye"></i>Detail</a>
                              <a href="{{ route('pertanyaan.edit', $value->id) }}" class="btn-editdata text-info dropdown-item"><i class="fa fa-edit"></i> Edit</a>
                              <form method="POST" action="{{ route('pertanyaan.destroy', $value->id) }}">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn-hapusdata text-danger dropdown-item"><i class="fa fa-trash"></i>Hapus</button>  
                              </form>
                           </div>
                        </div>

                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
@endsection

@section('js')
    <script src="{{ asset('plugins/datatables/datatables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script>
       $(function () {
         $("#pertanyaan").DataTable({
            responsive: true
         });
       })
    </script>
@endsection