<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <style>
        canvas {
            max-width: 400px;
            margin: auto;
            display: block;
        }

        .table-container {
            width: 80%; /* Mengurangi lebar tabel agar tidak mepet ke kanan dan kiri */
            margin: 20px auto; /* Menambahkan jarak di sekeliling tabel */
            overflow: auto;
            max-height: 240px; /* Tinggi maksimum untuk memicu scroll vertikal */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            white-space: nowrap; /* Menghindari wrap teks */
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
            text-decoration: none;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 1em;
        }

        table td a {
            color: #4CAF50;
        }

        table td form button {
            color: red;
        }

        table td a:hover {
            color: #388E3C;
        }

        table td form button:hover {
            color: darkred;
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

        .filter-input {
            width: 100%;
            box-sizing: border-box;
            padding: 8px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .pagination button {
            border: 1px solid #ddd;
            padding: 8px;
            margin: 0 4px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            font-family: 'Arial', sans-serif;
        }

        .pagination button:hover {
            background-color: #388E3C;
        }
    </style>
</head>

<body>
    <h1>Daftar Buku</h1>

    <canvas id="myPieChart" width="400" height="400"></canvas>

    <a href="{{ route('dimensibuku.create') }}">Tambah Buku</a>

    <div class="table-container">
        <table id="bookTable">
            <thead>
                <tr>
                    <th><input class="filter-input" type="text" placeholder="Filter Nama Buku"></th>
                    <th><input class="filter-input" type="text" placeholder="Filter Harga"></th>
                    <th><input class="filter-input" type="text" placeholder="Filter Jumlah Halaman"></th>
                    <th><input class="filter-input" type="text" placeholder="Filter Rating"></th>
                    <th>Aksi</th>
                </tr>
                <tr>
                    <th>Nama Buku</th>
                    <th>Harga</th>
                    <th>Jumlah Halaman</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
    </div>

    <div class="pagination" id="paginationControls"></div>

    <script>
        // Chart.js pie chart setup
        var ratings = @json($ratings);

        var labels = ratings.map(function(rating) {
            return 'Rating ' + rating.Rating;
        });

        var data = ratings.map(function(rating) {
            return rating.total;
        });

        var totalBooks = data.reduce((a, b) => a + b, 0);

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
                    borderWidth: 1,
                    hoverBackgroundColor: [
                        'rgba(34, 139, 34, 0.5)',
                        'rgba(50, 205, 50, 0.5)',
                        'rgba(144, 238, 144, 0.5)',
                        'rgba(152, 251, 152, 0.5)',
                        'rgba(60, 179, 113, 0.5)',
                        'rgba(0, 128, 0, 0.5)'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    datalabels: {
                        formatter: (value, ctx) => {
                            let datasets = ctx.chart.data.datasets;
                            if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
                                let sum = datasets[0].data.reduce((a, b) => a + b, 0);
                                let percentage = (value / sum * 100).toFixed(2) + '%';
                                return percentage;
                            } else {
                                return percentage;
                            }
                        },
                        color: '#000',
                        font: {
                            weight: 'bold'
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var percentage = ((tooltipItem.raw / totalBooks) * 100).toFixed(2);
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' (' + percentage + '%)';
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        // Filter functionality
        document.querySelectorAll('.filter-input').forEach(input => {
            input.addEventListener('input', function() {
                let column = input.parentElement.cellIndex;
                let filter = input.value.toLowerCase();
                let table = document.querySelector('table');
                let rows = table.querySelectorAll('tbody tr');
                rows.forEach(row => {
                    let cell = row.cells[column].textContent.toLowerCase();
                    if (cell.includes(filter)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });

        // Pagination functionality
        const rowsPerPage = 10;
        let currentPage = 1;
        const table = document.getElementById('bookTable');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.querySelectorAll('tr'));
        const paginationControls = document.getElementById('paginationControls');

        function displayRows(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach((row, index) => {
                if (index >= start && index < end) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function setupPagination() {
            const pageCount = Math.ceil(rows.length / rowsPerPage);
            paginationControls.innerHTML = '';

            for (let i = 1; i <= pageCount; i++) {
                const button = document.createElement('button');
                button.textContent = i;
                button.addEventListener('click', () => {
                    currentPage = i;
                    displayRows(currentPage);
                    updatePaginationControls();
                });
                paginationControls.appendChild(button);
            }

            updatePaginationControls();
        }

        function updatePaginationControls() {
            const buttons = paginationControls.querySelectorAll('button');
            buttons.forEach((button, index) => {
                if (index + 1 === currentPage) {
                    button.style.backgroundColor = '#388E3C';
                } else {
                    button.style.backgroundColor = '#4CAF50';
                }
            });
        }

        displayRows(currentPage);
        setupPagination();
    </script>
</body>

</html>
