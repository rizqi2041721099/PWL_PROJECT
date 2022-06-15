@extends('layouts.app')
<style>
    *{
        overflow: hidden;
    }
</style>
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
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Rak</label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh Rak Novel 1">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Buku</label>
                            <select class="form-control lg" name="book_id">
                                @foreach ($book as $item)
                                    <option value="{{$item->id}}">{{$item->judul}}</option>
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
@endsection
