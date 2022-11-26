<?php
header("Content-type:application/octet-stream/");
header("Content-Disposition: attachment; filename=$judul.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html>

<head>
	<title>Export Data Ke Excel</title>
</head>

<body>
	<style>
		body {
			font-family: 'Times New Roman', sans-serif;
		}

		table {
			margin: 20px auto;
			border-collapse: collapse;
		}

		table th,
		table td {
			border: 1px solid #3c3c3c;
			padding: 3px 8px;

		}
	</style>

	<h3>Tanggal Cetak : <?= date('d F Y'); ?></h3>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>No. Telp</th>
			<th>Username</th>
			<th>Password</th>
			<?php
			$no = 1;
			foreach ($mahasiswa as $row) :
			?>
		</tr>
		<tr>
			<td><?= $no++; ?></td>
			<td><?php echo $row->nama ?></td>
			<td><?php echo $row->email ?></td>
			<td><?php echo $row->no_telp ?></td>
			<td><?php echo $row->username ?></td>
			<td><?php echo $row->password ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
</body>

</html>