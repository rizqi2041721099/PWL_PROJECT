@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Update Buku</h1>
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
        <form action="{{route('books.update',$datas->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                      <input type="hidden" value="{{$datas->id}}" id="id">
                      <label>Judul</label>
                      <input type="text" name="judul" class="form-control" placeholder="Ketik Judul" value="{{ $datas->judul }}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                      <label>Penulis</label>
                      <input type="text" name="penulis" class="form-control" placeholder="Ketik Penulis" value="{{$datas->penulis}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                      <label>Penerbit</label>
                      <select class="form-control" name="penerbit_id">
                        @foreach ($penerbits as $data)
                        <option value="{{$data->id}}" {{ $data->id == $datas->penerbit_id ? 'selected' : '' }}>{{$data->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label>Sampul</label>
                    <input type="file" class="form-control" name="sampul" id="sampul" placeholder=""
                    onchange="previewImage();" style="display: block; line-height: 100%">
                    <img id="image-preview" style="background-size: cover; height: 100px; width: 150px; margin-top: 10px;"/>
                </div>
                <div class="col-4">
                    <label>Tahun Terbit</label>
                    <input class="form-control" type="text" name="tahun_terbit" value="{{$datas->tahun_terbit}}">
                </div>
                <div class="col-4">
                    <div class="form-group">
                      <label>Stock</label>
                      <input class="form-control" type="text" name="stock" value="{{$datas->stock}}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
          </form>
    </div>
</div>

</div>

<script type="text/javascript">
    var img = "{{$datas->sampul}}";

    if ($('#sampul').val() == '') {
                document.getElementById("image-preview").style.display = "block";
                if (img == '') {
                    document.getElementById("image-preview").src = "{{asset('assets/img/imagePlaceholder.png')}}";
                } else {
                    document.getElementById("image-preview").src = "{{Storage::url('public/images/books/').$datas->sampul}}";
                }
            } else {
                $('#image-preview').empty();
            }

            function previewImage() {
                document.getElementById("image-preview").style.display = "block";
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("sampul").files[0]);

                oFReader.onload = function(oFREvent) {
                document.getElementById("image-preview").src = oFREvent.target.result;
                };
            };
</script>
@endsection
