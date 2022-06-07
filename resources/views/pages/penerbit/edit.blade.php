@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Update Penerbit</h1>
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
    </div>
    <div class="card-body">
        <form action="{{route('penerbit.update',$data->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="Contoh Erlangga">
            <button type="submit" class="btn btn-primary mt-4">Update</button>
          </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->
@endsection
