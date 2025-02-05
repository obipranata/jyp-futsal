<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
</head>

<style>
  #records {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #records td, #records th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #records tr:nth-child(even){background-color: #f2f2f2;}

  #records tr:hover {background-color: #ddd;}

  #records th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }

  .img{
    border-radius: 5%;
    width : 80px;
  }
  h1{
    text-align : center;
  }
</style>
<body>
    <h1 >Data Penyewaan Lapangan Futsal</h1>
    <table id="records">
      <thead>
      <tr>
        <th>Nama</th>
        <th>Lapangan</th>
        <th>Tanggal Main</th>
        <th>Waktu Main</th>
        <th>Metode Pembayaran</th>
        <th>No Pembayaran</td>
        <th>Status</td>
        <th>Kategori Bayar</td>
        <th>Harga Full</td>
        <th>Harga Bayar</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
          <tr>
            <td>{{$item->user?->nama ?? ''}}</td>
            <td>{{$item->lapangan?->nama_lapangan ?? ''}}</td>
            <td>{{$item->tanggal_main ?? ''}}</td>
            <td>{{$item->waktu_main ?? ''}}</td>
            <td>{{$item->metode_pembayaran ?? ''}}</td>
            <td>{{$item->no_pembayaran ?? ''}}</td>
            <td>{{$item->status ?? ''}}</td>
            <td>{{$item->tipe_pembayaran ?? ''}}</td>
            <td>{{$item->harga_full ?? ''}}</td>
            <td>{{$item->harga_bayar ?? ''}}</td>
          </tr>
        @endforeach
      </tbody>
  </table>
</body>
</html>