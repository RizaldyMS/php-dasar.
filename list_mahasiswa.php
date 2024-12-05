<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Absensi Mahasiswa</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 10px 0;

        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #white;
        }
    </style>
</head>
<body>

<h2>Tabel Absensi Mahasiswa</h2>

<table id="dataTable">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>NAMA</th>
    </tr>
</table>

<script>
    const data = [
        { no: 1, nim: 'D212111014', nama: 'Rizaldy Muhamad Sopyan' },
        { no: 2, nim: 'D212111006', nama: 'Gita Septiani' },
        { no: 3, nim: 'D212111028', nama: 'Fanisa Tri Agna Fata' },
        { no: 4, nim: 'D212111026', nama: 'Aura Maliya' },
        { no: 5, nim: 'D212111023', nama: 'Ajeng Aprilyani' },
        { no: 5, nim: 'D212111021', nama: 'Triana Siti Aryani' }
    ];

    const table = document.getElementById("dataTable");

    data.forEach(item => {
        const row = table.insertRow();
        const cellNo = row.insertCell(0);
        const cellNim = row.insertCell(1);
        const cellNama = row.insertCell(2);

        cellNo.textContent = item.no;
        cellNim.textContent = item.nim;
        cellNama.textContent = item.nama;
    });
</script>

</body>
</html>
