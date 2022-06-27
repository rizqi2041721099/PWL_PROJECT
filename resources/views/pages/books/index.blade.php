@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Data Buku</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
        @can('books-create')
            <a href="{{route('books.create')}}" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Buku</span>
            </a>
        @endcan
        <div class="float-right">
            <a href="/book-pdf" class="btn btn-secondary">Export PDF</a>
        </div>
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
          @if(session('warning'))
            <div class="alert alert-warning alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-trash"></i><b>  {{session('warning')}}</b></h6>
              </div>
           @endif
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th class="text-center">Sampul</th>
                        <th>Harga</th>
                        <th>Penerbit</th>
                        <th>Penulis</th>
                        <th>Total</th>
                        <th>Action</th>
                       </tr>
                   </thead>
                   <tfoot>
                       <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th class="text-center">Sampul</th>
                        <th>Harga</th>
                        <th>Penerbit</th>
                        <th>Penulis</th>
                        <th>Total</th>
                        <th>Action</th>
                       </tr>
                   </tfoot>
                   <tbody>
                       @foreach($data as $item)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{$item->judul}}</td>
                           <td class="text-center">
                                @if ($item->sampul == '')
                                    <img src="{{ asset('assets/img/imagePlaceholder.png') }}" style="height: 100px; width: 100px;">
                                     @else
                                    <img src="{{ url('storage/images/books/'.$item->sampul) }}" class="text-center" style="height: 100px; width: 100px;">
                                @endif
                           </td>
                           <td class="input-element"> @currency($item->harga)</td>
                           <td>{{ $item->penerbit }}</td>
                           <td>{{ $item->penulis }}</td>
                           <td>{{ $item->stock }}</td>
                           <td>
                            @can('books-edit')
                                <a class="btn btn-primary btn-sm" href="{{ route('books.edit',$item->id) }}"><i class="fas fa-edit" title="Edit"></i></a>
                            @endcan
                            @can('books-delete')
                                <form action="{{route('books.destroy',$item->id)}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" title="Delete" onclick="return confirm('are you sure?')" class="btn btn-danger btn-sm rounded" on>
                                        <span><i class="fas fa-trash"></i></span>
                                </form>
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

@endsection
