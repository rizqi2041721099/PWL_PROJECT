@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Data Rak Buku</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
        @can('raks-create')
            <a href="{{route('raks.create')}}" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Rak buku</span>
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
           @if(session('danger'))
            <div class="alert alert-danger alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-trash"></i><b>  {{session('danger')}}</b></h6>
              </div>
           @endif
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Action</th>
                       </tr>
                   </thead>
                   <tfoot>
                       <tr>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Action</th>
                       </tr>
                   </tfoot>
                   <tbody>
                       @foreach($data as $item)
                       <tr>
                           <td>{{$item->name}}</td>
                           <td>{{$item->judul}}</td>
                           <td>
                            @can('raks-edit')
                                <a class="btn btn-primary" href="{{ route('raks.edit',$item->id) }}" title="edit"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('raks-delete')
                                <form action="{{route('raks.destroy',$item->id)}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger rounded" title="delete">
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
<!-- /.container-fluid -->
@endsection
