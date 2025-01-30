<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'tedc');

// Periksa koneksi database
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = trim($_POST['nim']);
    $nama = trim($_POST['nama']);
    $program_studi = intval($_POST['program_studi']);

    // Validasi input
    if (empty($nim) || empty($nama) || empty($program_studi)) {
        echo "<script>alert('Semua field harus diisi!');</script>";
    } else {
        $stmt = $mysqli->prepare("INSERT INTO students (nim, nama, study_program_id) VALUES (?, ?, ?)");
        $stmt->bind_param('ssi', $nim, $nama, $program_studi);

        if ($stmt->execute()) {
            $_SESSION['success'] = true;
            $_SESSION['message'] = 'Data Berhasil Ditambahkan';
            echo "<script>window.location.href='mahasiswa.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }
}

// Ambil data program studi
$study_programs = $mysqli->query("SELECT id, name FROM study_program");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        .form-label {
            font-size: 14px;
        }
        .form-control, .form-select {
            font-size: 14px;
            padding: 12px;
        }
        .btn-primary, .btn-secondary {
            padding: 10px 20px;
            font-size: 16px;
        }
        .container {
            max-width: 600px;
        }
        .mt-4 {
            margin-top: 40px;
        }
        h2 {
            font-weight: bold;
            color: #007bff;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="card p-4">
        <h2 class="text-center mb-4">Tambah Mahasiswa</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="program_studi" class="form-label">Program Studi</label>
                <select class="form-select" id="program_studi" name="program_studi" required>
                    <option value="">Pilih Program Studi</option>
                    <?php while ($row = $study_programs->fetch_assoc()) { ?>
                        <option value="<?= $row['id']; ?>">
                            <?= htmlspecialchars($row['name']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="mahasiswa.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Hapus session pesan setelah ditampilkan
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
    unset($_SESSION['message']);
}
?>
