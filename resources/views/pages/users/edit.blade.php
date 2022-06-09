@extends('layouts.app')

@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Tambah User</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('users.index') }}">
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
        <form action="{{route('users.update', $user->id)}}" method="POST">
            @csrf
            <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Contoh Erlangga">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"value="{{ $user->email }}" placeholder="Masukkan email anda!">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm-password" class="form-control">
                        </div>
                    </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Role</label>
                        <select name="roles[]" class="form-control" aria-label="Default select example">
                            <option>Pilih role guys</option>
                            @foreach($roles as $data)
                            <option value="{{$data->name}}" {{($data->name === $userRole->name) ? 'Selected' : ''}}>{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
    </div>
</div>

</div>
@endsection
