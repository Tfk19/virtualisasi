<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            color: #4CAF50;
            text-align: center;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        input[type="hidden"] {
            display: none;
        }
    </style>
</head>
<body>
    <form action="{{ route('dimensibuku.store') }}" method="POST">
        @csrf
        <h1>Tambah Buku</h1>

        <label for="nama_buku">Nama Buku:</label>
        <input type="text" id="nama_buku" name="nama_buku">

        <label for="harga">Harga:</label>
        <input type="text" id="harga" name="harga">

        <label for="jumlah_halaman">Jumlah Halaman:</label>
        <input type="text" id="jumlah_halaman" name="jumlah_halaman">

        <label for="rating">Rating:</label>
        <input type="text" id="rating" name="rating">

        <!-- Tambahkan input untuk created_at dan updated_at -->
        <input type="hidden" id="created_at" name="created_at" value="{{ now()->format('Y-m-d H:i:s') }}">
        <input type="hidden" id="updated_at" name="updated_at" value="{{ now()->format('Y-m-d H:i:s') }}">

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
