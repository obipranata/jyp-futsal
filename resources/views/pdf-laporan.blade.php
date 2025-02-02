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
    <h1 >Data Tempat Lapangan Futsal</h1>
    <table id="records">
      <thead>
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>No Hp</th>
        <th>Kota</td>
        <th>Kecamatan</td>
        <th>Pendapatan</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
          <tr>
              <td>{{$item->nama}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->no_hp}}</td>
              <td>{{$item->kota}}</td>
              <td>{{$item->kecamatan}}</td>
              <td>
                @php
                    $pendapatan = $item->lapangans->sum(function ($lapangan) use ($start, $end) {
                        return $lapangan->penyewaan->where('status', 'PAID')->whereBetween('updated_at', [$start, $end])->sum('harga_bayar');
                    });
                @endphp
                Rp. {{number_format($pendapatan)}}
              </td>
          </tr>
      @endforeach
      </tbody>
  </table>
</body>
</html>