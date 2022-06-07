@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Create Rak</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('raks.index') }}">
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
            <form action="{{route('raks.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Rak</label>
                    <input type="text" name="name" class="form-control text-uppercase" placeholder="Contoh Rak Novel 1">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
