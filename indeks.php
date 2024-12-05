<?php
        // Data pribadi
        $nama = "Rizaldy Muhamad Sopyan";
        $jenis_kelamin = "L";
        $umur = 21;
        $alamat = "Jalan Babakan Priangan II";
        $email = "rizaldysopyan@gmail.com";
    ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pribadi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <table>
        <tr>
            <td>Nama</td>
            <th>:</th>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <th>:</th>
            <td><?php echo $jenis_kelamin; ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <th>:</th>
            <td><?php echo $umur; ?></td>
        </tr>
        <tr>
            <td>Alanat</td>
            <th>:</th>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <th>:</th>
            <td><?php echo $email; ?></td>
        </tr>
    </table>
</body>
</html>