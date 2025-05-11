<!DOCTYPE html>
<html>

<head>
    <title>Daftar Hadir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h2>Daftar Hadir</h2>
    <table>
        <thead>
            <tr>
                <th>ID Kehadiran</th>
                <th>NPM</th>
                <th>ID Dosen</th>
                <th>ID Mata Kuliah</th>
                <th>Pertemuan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $index )
            <tr>
                <td>{{ $index['id_kehadiran'] }}</td>
                <td>{{ $index['npm'] }}</td>
                <td>{{ $index['id_dosen'] }}</td>
                <td>{{ $index['id_matkul'] }}</td>
                <td>{{ $index['pertemuan'] }}</td>
                <td>{{ $index['keterangan'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>