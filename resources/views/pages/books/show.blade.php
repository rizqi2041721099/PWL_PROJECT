@extends('layouts.app')
@section('content')
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-2 text-gray-800">Show Detail Buku</h1>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5>Buku</h5>
                    <img src="{{ url('storage/images/books/'.$data->sampul) }}" style="height: 35vh; width: 30vw;">
                </div>
            </div>
        </div>
        <div class="col-6">

        </div>
    </div>
</div>

</div>
@endsection
