@extends('layouts.app')

@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Tambah Role</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('roles.index') }}">
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
        <form action="{{route('roles.store')}}" method="POST">
            @csrf
            <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="name" class="form-control" placeholder="Masukkan nama role!" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <h6 class="font-weight-bold">Permission</h6>
                        <label class="font-weight-bold">Aktifkan semua permission</label>
                            <li class="d-inline-block me-2 mb-1">
                                <div class='form-check'>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="check-all"
                                            class="form-check-input form-check-success" name="customCheck">
                                        <label class="form-check-label" for="check-all">Aktifkan</label>
                                    </div>
                                </div>
                            </li>
                    </div>
                </div>
                <div class="row">
                    @foreach($permission as $value)
                    <div class="col-lg-3 col-md-6 col-md-6">
                    <div class="card card-stats shadow-none border-0">
                        <div class="card-body">
                            <div class="row justify-content-md-center">
                                <table class="table table-hover">
                                    <tr>
                                        <td class="d-block border 18-vw">
                                            <li class="d-inline-block">
                                                <div class='form-check'>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox"
                                                            value="{{ $value->id }}" id="permission_{{$loop->iteration}}"
                                                            name="permission[]"
                                                            class="form-check-input form-check-success"
                                                            name="customCheck">
                                                            <label class="form-check-label"
                                                            for="permission_{{$loop->iteration}}">{{ $value->name }}</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            <button type="submit" class="btn btn-primary mx-auto d-block">Simpan</button>
        </form>
    </div>
</div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#check-all').click(function(event) {
            if (this.checked) {
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    });
</script>
@endsection
