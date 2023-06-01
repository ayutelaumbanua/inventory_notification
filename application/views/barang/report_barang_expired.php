<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>
    <style>
        .tabel {
            font-family: sans-serif;
            color: #444;
            border-collapse: collapse;
            width: 100%;
        }

        .tabel tr th {
            background: #35A9DB;
            color: #fff;
            font-weight: normal;
        }

        .tabel,
        th,
        td {
            padding: 10px 20px;
            text-align: left;
        }

        .tabel tr:hover {
            background-color: #f5f5f5;
        }

        .tabel tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div style="text-align:left">
        <h2 class="h1">
            <?= $title ?>
        </h2>
    </div>
    <div>
        <table class="tabel">
            <thead>
                <tr style="background:#42444e;color:#fff;">
                    <td width="5%"><strong>No</strong></td>
                    <td width="15%"><strong>No Terima</strong></td>
                    <td><strong>Nama Barang</strong></td>
                    <td width="5%"><strong>Jumlah</strong></td>
                    <td width="5%"><strong>Satuan</strong></td>
                    <td width="20%"><strong>Tanggal Expired</strong></td>
                    <td width="20%"><strong>Keterangan</strong></td>
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($all_stock_expired as $detail_penerimaan): ?>
                    <tr>
                        <td>
                            <?= $no++ ?>
                        </td>
                        <td>
                            <?= $detail_penerimaan->no_terima ?>
                        </td>
                        <td>
                            <?= $detail_penerimaan->nama_barang ?>
                        </td>
                        <td>
                            <?= $detail_penerimaan->jumlah ?>
                        </td>
                        <td>
                            <?= $detail_penerimaan->satuan ?>
                        </td>
                        <td>
                            <?= date('m-d-Y', strtotime($detail_penerimaan->tgl_expired)) ?>
                        </td>
                        <td></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>