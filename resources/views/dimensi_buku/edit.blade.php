<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
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

        input[type="text"], input[type="number"] {
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
    </style>
</head>
<body>
    <form action="{{ route('dimensibuku.update', $book->ID_Buku) }}" method="POST">
        @csrf
        @method('PUT')
        <h1>Edit Buku</h1>

        <label for="Nama_Buku">Nama Buku:</label>
        <input type="text" id="Nama_Buku" name="Nama_Buku" value="{{ $book->Nama_Buku }}" required>

        <label for="Harga">Harga:</label>
        <input type="number" id="Harga" name="Harga" value="{{ $book->Harga }}" required>

        <label for="Jumlah_Halaman">Jumlah Halaman:</label>
        <input type="number" id="Jumlah_Halaman" name="Jumlah_Halaman" value="{{ $book->Jumlah_Halaman }}" required>

        <label for="Rating">Rating:</label>
        <input type="number" id="Rating" name="Rating" value="{{ $book->Rating }}" required>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
