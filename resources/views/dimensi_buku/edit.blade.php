<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
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
    </style>
</head>
<body>
    <form action="{{ route('dimensibuku.update', $book->ID_Buku) }}" method="POST">
        @csrf
        @method('PUT')
        <h1>Edit Buku</h1>

        <div class="form-group">
            <label for="Nama_Buku">Nama Buku:</label>
            <input type="text" id="Nama_Buku" name="Nama_Buku" value="{{ $book->Nama_Buku }}" required>
        </div>

        <div class="form-group">
            <label for="Harga">Harga:</label>
            <input type="number" id="Harga" name="Harga" value="{{ $book->Harga }}" required>
        </div>

        <div class="form-group">
            <label for="Jumlah_Halaman">Jumlah Halaman:</label>
            <input type="number" id="Jumlah_Halaman" name="Jumlah_Halaman" value="{{ $book->Jumlah_Halaman }}" required>
        </div>

        <div class="form-group">
            <label for="Rating">Rating:</label>
            <input type="number" id="Rating" name="Rating" value="{{ $book->Rating }}" required>
        </div>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
