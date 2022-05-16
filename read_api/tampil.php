<?php

function http_request($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$data = http_request("http://localhost/DB_API/api/api_tampil.php?id=");
$data = json_decode($data, TRUE); ?>            
<!-- <?php echo gettype($data);?> -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tampil Barang</title>
        <link rel="stylesheet" href="layout/css/style.css"> </head>

    <body>
        <div class="wrap">
            <div class="header">
                <h1>PHP API</h1> </div>
            <div class="menu">
                <ul>
                    <li><a href="">Home</a></li>
                </ul>
            </div>
            <div class="badan">
                <div class="sidebar">
                    <ul>
                        <li><a href="../read_api/tampil.php">Produk</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </div>
                <div class="content">
                    <p>DATA PRODUK</p> <a href="../read_api/tambah.php">Tambah Data</a>
                    <table style="width:100%">
                        <tr>
                            <td>ID</td>
                            <td>Nama</td>
                            <td>Tipe Produk</td>
                            <td>Last Created</td>
                            <td>Last Updated</td>
                            <td>aksi</td>
                        </tr>
                        <?php foreach ($data as $data) { ?>
                            <tr>
                                <td>
                                    <?= $data["id"] ?>
                                </td>
                                <td>
                                    <?= $data["nama_produk"] ?>
                                </td>
                                <td>
                                    <?= $data["tipe_produk"] ?>
                                </td>
                                <td>
                                    <?= $data["start"] ?>
                                </td>
                                <td>
                                    <?= $data["end"] ?>
                                </td>
                                <td colspan="2"> <a href="../read_api/edit.php?id=<?= $data['id'] ?>">Edit</a> <a href="../api/api_hapus.php?id=<?= $data['id'] ?>">Hapus</a> </td>
                            </tr>
                            <?php } ?>
                    </table>
                </div>
            </div>
            <div class="clear"></div>
            <div class="footer">
                <p> Fadil Abdillah Suyudi</p>
            </div>
        </div>
    </body>
    </html>