<!DOCTYPE html>
<html>
<head>
    <title>Print View</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h1 {
            font-size: 18px;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Laporan Tingkat Ekonomi {{ $status ? ucfirst($status) : 'Semua Data' }} Penduduk Nagari Batahan Tengah</h2>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Pekerjaan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
             
                <td>{{ $item->nama }}</td>
                <td>{{ $item->pekerjaan }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
