@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Create Peminjaman</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('penerbit.index') }}">
            <i class="fas fa-arrow-circle-left"> Back</i>

        </a>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-warning alert-dismissible mt-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h6><b>  {{session('error')}}</b></h6>
        </div>
    @endif
    </div>
    <div class="card-body">
        <form action="{{route('peminjaman.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 mb-2">
                    <label>User</label>
                    <select class="form-control lg" name="user_id">
                        @foreach ($users as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                  </select>
                </div>
                <div class="col-6 mb-2">
                    <label>Buku</label>
                    <select class="form-control lg" name="book_id">
                        @foreach ($books as $data)
                        <option value="{{$data->id}}">{{$data->judul}}</option>
                        @endforeach
                  </select>
                </div>
                <div class="col-6 mb-2">
                    <label>Total</label>
                    <input type="text" class="form-control" name="stock">
                </div>
                <div class="col-6">
                    <label for="">Tanggal Peminjaman</label>
                    <input type="date" class="form-control datepicker" name="tanggal_pinjam" value="{{Carbon\Carbon::now()->format('d-m-Y')}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
          </form>
    </div>
</div>

</div>

<script>
    $('.datepicker').datepicker();
</script>
<!-- /.container-fluid -->
@endsection
