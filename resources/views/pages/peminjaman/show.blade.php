@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Show Peminjaman</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('peminjaman.index') }}">
            <i class="fas fa-arrow-circle-left"> Back</i>

        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <img src="{{ url('storage/images/books/'.$data->book) }}" alt="" style="height: 250px; width: 250px;">
                <h4 class="text-center mt-3 font-weight-bold" style="margin-right: 100px">{{ $data->judul }}</h4>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-4">
                      <label class="font-weight-bold">User</label>
                      <p>{{ $data->name }}</p>
                    </div>
                    <div class="col-4">
                      <label class="font-weight-bold">Tanggal Peminjaman</label>
                      <p>{{ $data->tanggal_pinjam }}</p>
                    </div>
                    <div class="list-pengembalian">
                        <label class="font-weight-bold">Tanggal Pengembalian</label>
                        @if($data->tanggal_kembali)
                            <p>{{ $data->tanggal_kembali }}</p>
                        @else
                            <p>-----</p>
                        @endif
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4">
                        <label class="font-weight-bold d-block">Status</label>
                        @if($data->status == 1)
                            <span class="badge bg-primary text-white">sedang dipinjam</span>
                        @else
                            <span class="badge bg-success text-white">selesai dikembalikan</span>
                        @endif
                    </div>
                    <div class="col-4">
                        <label class="font-weight-bold d-block">Total Peminjaman</label>
                        <p>{{ $data->stock}}</p>
                    </div>
                    <div class="col-4">
                        <label class="font-weight-bold d-block">Jumlah Pengembalian</label>
                        @if($data->jumlah_kembali)
                            <p>{{ $data->jumlah_kembali}}</p>
                            @else
                            <p>0</p>
                        @endif
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-4">
                        <label class="font-weight-bold">Denda</label>
                        @if($data->denda)
                            <p> @currency($data->denda)</p>
                        @else
                            <p>Rp. 0</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-3">
                <label>User</label>
                <input type="text" class="form-control" value="{{ $data->user_id }}" readonly>
            </div>
            <div class="col-3">
                <label>Tanggal Peminjaman</label>
                <input type="text" class="form-control" value="" readonly>
            </div>
            @if($data->tanggal_kembali)
            <div class="col-3">
                <label>Tanggal Pengembalian</label>
                <input type="text" class="form-control" value="{{ $data->tanggal_kembali }}" readonly>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-3">
                <label>Status</label>
            </div>
            <div class="col-3">
                <label>Denda</label>
            </div>
            <div class="col-3">
                <label>Stock</label>
            </div>
            <div class="col-3">
                <label>Jumlah Pengembalian</label>
            </div>
        </div> --}}
    </div>
</div>

</div>

<script>
    $('.datepicker').datepicker();
</script>
<!-- /.container-fluid -->
@endsection
