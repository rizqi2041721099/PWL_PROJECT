@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Create Kategori Kelas</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('kelas.index') }}">
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
        <form action="{{route('class.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                      <label>Kelas</label>
                      <input type="text" name="name" class="form-control text-uppercase" placeholder="Contoh Kelas XII">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                      <label>Kategori Kelas</label>
                      <select class="form-control lg" name="kategori_id">
                            @foreach ($kategori_kelas as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->category}}</option>
                            @endforeach
                      </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
