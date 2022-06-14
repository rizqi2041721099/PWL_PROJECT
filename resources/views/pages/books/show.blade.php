@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Show Detail Buku</h1>
    </div>
    <div class="row ml-2">
        <div class="col-6">
            <div class="card" syle="height: 20vh; width: 20vw">
                <div class="card-body">
                    <div class="col-4">
                        <h5>Buku</h5>
                        <img src="{{ url('storage/images/books/'.$data->sampul) }}" class="d-flex justify-content-center" style="height: auto; width: auto;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">

        </div>
    </div>
</div>

</div>
@endsection
