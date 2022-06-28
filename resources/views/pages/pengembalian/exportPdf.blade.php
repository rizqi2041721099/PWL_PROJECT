<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Print pdf</title>
    <style>
        table thead tr th{
            text-align: center;
        }
        table tr td{
            text-align: center;
        }
        p{
            font-size: 12px;
        }
    </style>
  </head>
  <body>
    <p class="text-center font-weight-bold mt-2">Data Pengembalian {{ $data->name }}</p>
    <div class="clearfix">
        <div class="float-left">
            <p><span class="fs-5">Tanggal Peminjaman, &nbsp;</span> {{ $data->tanggal_kembali }}</p>
        </div>
        <div class="float-right">
            <p>Tanggal pengembalian : &nbsp;{{ $data->tanggal_kembali }}</p>
        </div>
    </div>

    <div class="row">
        <div class="clearfix" style="margin-top: 50px">
            <div class="float-left">
                <img src="{{ public_path('storage/images/books/'.$data->book) }}" class="text-center" style="height: 200px; width: 200px;">
            </div>
            <div class="float-right" style="margin-right: 340px">
                <p> Judul : &nbsp;{{ $data->judul }}</p>
                <p class="d-block">Total peminjaman : &nbsp;{{ $data->stock }}</p>
                <p class="d-block">Total peminjaman : &nbsp;{{ $data->stock }}</p>
                <p>Denda : &nbsp; <span class="text-danger">
                    @if($data->denda)
                        @currency($data->denda)
                    @else
                        Rp. 0
                    @endif
                </span></p>

            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

  </body>
</html>
