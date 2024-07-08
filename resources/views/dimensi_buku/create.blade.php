<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ece9e6, #ffffff);
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
            margin-bottom: 20px;
        }

        form {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 15px;
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

        <div class="form-group">
            <label for="nama_buku">Nama Buku:</label>
            <input type="text" id="nama_buku" name="nama_buku" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" required step="1">
        </div>

        <div class="form-group">
            <label for="jumlah_halaman">Jumlah Halaman:</label>
            <input type="number" id="jumlah_halaman" name="jumlah_halaman" required step="1">
        </div>

        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" required min="1" max="5">
        </div>

        <!-- Tambahkan input untuk created_at dan updated_at -->
        <input type="hidden" id="created_at" name="created_at" value="{{ now()->format('Y-m-d H:i:s') }}">
        <input type="hidden" id="updated_at" name="updated_at" value="{{ now()->format('Y-m-d H:i:s') }}">

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
