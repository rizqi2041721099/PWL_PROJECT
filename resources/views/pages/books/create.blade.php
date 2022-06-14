@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Tambah Buku</h1>
   <div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('books.index') }}">
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
        <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" name="judul" class="form-control" placeholder="Ketik Judul" value="{{ old('judul') }}">
                    </div>
                </div>
                <div class="col-3">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" placeholder="Ketik Penulis" value="{{ old('penulis') }}">
                </div>
                <div class="col-3">
                    <div class="form-group">
                      <label>Penerbit</label>
                      <select class="form-control lg" name="penerbit_id">
                            @foreach ($penerbit as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                      </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control input-element" name="harga">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="d-block mt-2">Sampul</label>
                        <input type="file" class="form-control mt-2" name="sampul" id="sampul" placeholder=""
                        onchange="previewImage();" style="display: block; line-height: 100%">
                        <img id="image-preview" class="mt-2" style="width: 150px;"/>
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <label>Tahun Terbit</label>
                    <input class="form-control" type="text" name="tahun_terbit" value="{{ old('tahun_terbit') }}">
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                      <label>Stock</label>
                      <input class="form-control" type="text" name="stock" value="{{ old('stock') }}">
                    </div>
                </div>
            </div>
            <button type="submit mt-3" class="btn btn-primary">Simpan</button>
          </form>
    </div>
</div>

</div>

<script type="application/javascript">
    $(document).ready(function () {
        var cleave = new Cleave('.input-element', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    });

    function previewImage() {
            document.getElementById("image-preview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("sampul").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
            };
    }
</script>
@endsection
