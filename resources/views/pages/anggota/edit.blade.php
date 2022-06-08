@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Update Anggota</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('anggotas.index') }}">
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
        <form action="{{route('anggotas.update',$data->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name" value="{{{ $data->name }}}">
                </div>
                <div class="col-6">
                    <label>No Hp</label>
                    <input type="text" class="form-control" name="telephone" value="{{ $data->telephone }}">
                </div>
                <div class="col-6 mt-3">
                    <label>Kelas</label>
                    <select class="form-control" name="kelas_id">
                        @foreach ($kelas as $class)
                        <option value="{{$class->id}}" {{ $class->id == $data->kelas_id ? 'selected' : '' }}>{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-3">
                    <label>Kategori Kelas</label>
                    <select class="form-control" name="kategori_id">
                        @foreach ($ketegori as $kategori_kelas)
                        <option value="{{$kategori_kelas->id}}" {{ $kategori_kelas->id == $data->kategori_id ? 'selected' : '' }}>{{$kategori_kelas->category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mt-3">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control" value="{{ $data->alamat }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Update</button>
          </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
