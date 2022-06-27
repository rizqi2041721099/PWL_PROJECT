@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Pengmbalian</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('peminjaman.index') }}">
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
    </div>
    <div class="card-body">
        <form action="{{route('peminjaman.update',$data->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Kembali</label>
                      <input type="text" name="jumlah_kembali" value="{{ old('jumlah_kembali')}}" class="form-control" value=0>
                    </div>
                </div>
                <div class="col-6">
                <div class="form-group">
                    <label for="">Tanggal Pengembalian</label>
                    <input type="date" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}" data-date-format="dd/mm/yyyy" class="form-control" id="datepicker">
                </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Update</button>
          </form>
    </div>
</div>

</div>

<script>
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });

</script>
<!-- /.container-fluid -->
@endsection
