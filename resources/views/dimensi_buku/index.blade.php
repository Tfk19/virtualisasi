<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        canvas {
            max-width: 400px;
            /* Ubah ukuran canvas sesuai kebutuhan */
            margin: auto;
            /* Tengahkan canvas */
            display: block;
            /* Agar canvas tetap berada di tengah halaman */
        }

        table {
            margin-top: 20px;
            /* Jarak antara chart dan tabel */
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table td a, table td form button {
            color: #4CAF50;
            text-decoration: none;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 1em;
        }

        table td form button:hover {
            color: #388E3C;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            font-family: 'Arial', sans-serif;
        }

        a {
            display: block;
            text-align: center;
            margin: 20px;
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
            font-family: 'Arial', sans-serif;
        }

        a:hover {
            color: #388E3C;
        }
    </style>
</head>

<body>
    <h1>Daftar Buku</h1>

    <canvas id="myPieChart" width="400" height="400"></canvas>

    <a href="{{ route('dimensibuku.create') }}">Tambah Buku</a>

    <table>
        <tr>
            <th>Nama Buku</th>
            <th>Harga</th>
            <th>Jumlah Halaman</th>
            <th>Rating</th>
            <th>Aksi</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->Nama_Buku }}</td>
                <td>{{ $book->Harga }}</td>
                <td>{{ $book->Jumlah_Halaman }}</td>
                <td>{{ $book->Rating }}</td>
                <td>
                    <a href="{{ route('dimensibuku.edit', ['id' => $book->ID_Buku]) }}">Edit</a>
                    <form action="{{ route('dimensibuku.destroy', ['id' => $book->ID_Buku]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <script>
        var ratings = @json($ratings);

        var labels = ratings.map(function(rating) {
            return 'Rating ' + rating.Rating;
        });

        var data = ratings.map(function(rating) {
            return rating.total;
        });

        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Buku per Rating',
                    data: data,
                    backgroundColor: [
                        'rgba(34, 139, 34, 0.2)',
                        'rgba(50, 205, 50, 0.2)',
                        'rgba(144, 238, 144, 0.2)',
                        'rgba(152, 251, 152, 0.2)',
                        'rgba(60, 179, 113, 0.2)',
                        'rgba(0, 128, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(34, 139, 34, 1)',
                        'rgba(50, 205, 50, 1)',
                        'rgba(144, 238, 144, 1)',
                        'rgba(152, 251, 152, 1)',
                        'rgba(60, 179, 113, 1)',
                        'rgba(0, 128, 0, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2);
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>
