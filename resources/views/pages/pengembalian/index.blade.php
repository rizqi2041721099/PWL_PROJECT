@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Data Pengembalian</h1>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
       <div class="card-header py-3">
       
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                       <tr>
                        <th>No</th>
                        <th class="text-center">Sampul</th>
                        <th>Judul</th>
                        <th>User</th>
                        <th>Total Pengembalian</th>
                        <th>Total</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Denda</th>
                        @can('peminjaman-pdf')
                            <th>Action</th>
                        @endcan
                       </tr>
                   </thead>
                   <tfoot>
                       <tr>
                        <th>No</th>
                        <th class="text-center">Sampul</th>
                        <th>Judul</th>
                        <th>User</th>
                        <th>Total Pengembalian</th>
                        <th>Total</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Denda</th>
                        @can('peminjaman-pdf')
                            <th>Action</th>
                        @endcan
                       </tr>
                   </tfoot>
                   <tbody>
                       @foreach($data as $item)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td class="text-center">
                                @if ($item->book == '')
                                    <img src="{{ asset('assets/img/imagePlaceholder.png') }}" style="height: 100px; width: 100px;">
                                     @else
                                    <img src="{{ url('storage/images/books/'.$item->book) }}" class="text-center" style="height: 100px; width: 100px;">
                                @endif
                           </td>
                           <td>{{ $item->judul }}</td>
                           <td>{{ $item->name }}</td>
                           <td>{{ $item->jumlah_kembali }}</td>
                           <td>{{ $item->stock }}</td>
                           <td>{{ $item->tanggal_kembali }}</td>
                           <td>@currency($item->denda)</td>
                           @can('peminjaman-pdf')
                           <td>
                                <a class="btn btn-secondary btn-sm" href="{{ route('pengembalian.show',$item->id) }}">Print</a>
                            </td>
                            @endcan
                       </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>
   </div>

</div>

@endsection
