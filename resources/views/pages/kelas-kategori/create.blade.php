@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Create Kategori Kelas</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('kategori-kelas.index') }}">
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
        <form action="{{route('kategori-kelas.store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" name="category" class="form-control text-uppercase" placeholder="Contoh Kelas A">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
