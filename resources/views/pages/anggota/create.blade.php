@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Tambah Anggota</h1>
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
        <form action="{{route('anggotas.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
                <div class="col-6">
                    <label>No Hp</label>
                    <input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}">
                </div>
                <div class="col-6 mt-3">
                    <label>Kelas</label>
                    <select class="form-control lg" name="kelas_id" value="{{ old('kelas_id') }}">
                        @foreach ($kelas as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 mt-3">
                    <label>Kategori Kelas</label>
                    <select class="form-control lg" name="kategori_id" value="{{ old('kategori_id') }}">
                        @foreach ($ketegori as $data)
                            <option value="{{$data->id}}">{{$data->category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mt-3">
                    <label>Alamat</label>
                    <input name="alamat" class="form-control" value="{{ old('alamat') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
          </form>
    </div>
</div>

</div>

<script type="application/javascript">
    $(document).ready(function () {
        var cleave = new Cleave('#noHp', {
            phone: true,
            phoneRegionCode: '{country}'
        });
    });
</script>
<!-- /.container-fluid -->
@endsection
