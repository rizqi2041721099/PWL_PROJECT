@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
        @can('peminjaman-create')
            <a href="{{route('peminjaman.create')}}" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Peminjaman</span>
            </a>
        @endcan
        @can('peminjaman-pdf')
        <a href="/peminjaman-pdf" class="btn btn-secondary float-right">
               Export Pdf
        </a>
        @endcan
        @if(session('success'))
            <div class="alert alert-success alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-check"></i><b> Success  {{session('success')}}</b></h6>
              </div>
            @endif

           @if(session('delete'))
            <div class="alert alert-danger alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-trash"></i><b>  {{session('delete')}}</b></h6>
              </div>
          @endif
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                       </tr>
                   </thead>
                   <tfoot>
                       <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                       </tr>
                   </tfoot>
                   <tbody>
                       @foreach($data as $item)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->user }}</td>
                           <td>{{ $item->book }}</td>
                           <td>{{$item->tanggal_pinjam}}</td>
                           <td>
                                @if($item->status == 1)
                                    <span class="badge bg-primary text-white">sedang dipinjam</span>
                                @else
                                    <span class="badge bg-success text-white">selesai dikembalikan</span>
                                @endif
                           </td>
                           <td>{{ $item->stock }}</td>
                           <td>
                            @if($item->status == 1)
                                @can('peminjaman-edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('peminjaman.edit',$item->id) }}"><i class="fas fa-edit"></i> Pengembalian</a>
                                @endcan
                            @endif
                            @can('peminjaman-show')
                                <a class="btn btn-secondary btn-sm" href="{{ route('peminjaman.show',$item->id) }}"><i class="fas fa-eye"></i> Detail</a>
                            @endcan
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>
   </div>

</div>
<!-- /.container-fluid -->
@endsection
