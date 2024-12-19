<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Buku</title>
    <style>
        /* Mengatur orientasi halaman untuk PDF */
        @page {
            size: landscape;
            margin: 20mm;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Laporan Peminjaman Buku</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Jumlah Dikembalikan</th>
                <th>Keterlambatan (Hari)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowings as $index => $borrowing)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $borrowing->student->name }}</td>
                    <td>{{ $borrowing->book->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($borrowing->borrow_date)->format('d F Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($borrowing->return_date)->format('d F Y') }}</td>
                    <td>{{ $borrowing->qty }}</td>
                    <td>
                        @php
                            $dueDate = \Carbon\Carbon::parse($borrowing->return_date);
                            $today = \Carbon\Carbon::now();
                            $lateDays = $today->diffInDays($dueDate, false);
                        @endphp
                        @if($lateDays > 0)
                            {{ $lateDays }} Hari
                        @else
                            0 Hari
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
