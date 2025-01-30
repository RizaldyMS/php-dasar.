<?php
$mysqli = new mysqli('localhost', 'root', '', 'tedc');

// Retrieve the data from the database
$result = $mysqli->query("SELECT students.nim, students.nama, study_program.name 
                          FROM students INNER JOIN study_program ON students.study_program_id = study_program.id 
                          WHERE study_program.id = 11;");

$mahasiswa = [];

// Fetch data into an array
while ($row = $result->fetch_assoc()) {
    array_push($mahasiswa, $row);
}

// Handle the delete request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_nim'])) {
    $nim = $_GET['delete_nim'];
    // Delete the student record
    $stmt = $mysqli->prepare("DELETE FROM students WHERE nim = ?");
    $stmt->bind_param('s', $nim);
    $stmt->execute();
    header("Location: ".$_SERVER['PHP_SELF']); // Redirect after delete
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 align="center"> Data Mahasiswa KA 2021 </h1>
    <div class="container">
        <!-- Add Data Button -->
        <div class="mb-3">
            <a href="tambah.php" class="btn btn-success">Tambah Data Mahasiswa</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $row) { ?>
                    <tr>
                        <td><?= $row['nim']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td>
                            <!-- Edit Button (redirect to edit page) -->
                            <a href="edit.php?nim=<?= $row['nim']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Delete Button with confirmation -->
                            <a href="?delete_nim=<?= $row['nim']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>