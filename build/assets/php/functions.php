<?php

$conn = mysqli_connect("localhost", "root", "", "s_pakar");
function pdo_connect_mysql()
{
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = '';
	$DATABASE_NAME = 's_pakar';
	try {
		return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
	} catch (PDOException $exception) {
		// If there is an error with the connection, stop the script and display the error.
		exit('Failed to connect to database!');
	}
}

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function answer($kode)
{
	if ($kode == 'G001') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G002'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G004B'>Tidak</a>";
	}
	if ($kode == 'G002') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G003'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G003'>Tidak</a>";
	}
	if ($kode == 'G003') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G004'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G004'>Tidak</a>";
	}
	if ($kode == 'G004') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G005'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='solusi.php?kode=x-1'>Tidak</a>";
	}
	if ($kode == 'G005') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G006'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G0010A'>Tidak</a>";
	}
	if ($kode == 'G006') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G007'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G0010A'>Tidak</a>";
	}
	if ($kode == 'G007') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G008'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G008'>Tidak</a>";
	}
	if ($kode == 'G008') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='solusi.php?kode=x-2'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G0010B'>Tidak</a>";
	}
	if ($kode == 'G009') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G0010C'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='solusi.php?kode=x-1'>Tidak</a>";
	}
	if ($kode == 'G0010A') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='solusi.php?kode=P001'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='solusi.php?kode=x-2'>Tidak</a>";
	}
	if ($kode == 'G0010B') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='solusi.php?kode=P002'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='solusi.php?kode=x-3'>Tidak</a>";
	}
	if ($kode == 'G0010C') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='question.php?kode=G0011'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='solusi.php?kode=x-2'>Tidak</a>";
	}
	if ($kode == 'G0011') {
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='solusi.php?kode=P003'>Ya</a>";
		echo "<a class='btn col-sm-1 mrg btn-lg btn-outline-light' href='solusi.php?kode=x-1'>Tidak</a>";
	}
}


function tambahgejala($data)
{
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$kode_gejala = htmlspecialchars($data["kode_gejala"]);
	$nama_gejala = htmlspecialchars($data["nama_gejala"]);

	$query = "INSERT INTO gejala_p
				VALUES
			  ('', '$id', '$kode_gejala', '$nama_gejala')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahpenyakit($data)
{
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$kode_penyakit = htmlspecialchars($data["kode_penyakit"]);
	$nama_penyakit = htmlspecialchars($data["nama_penyakit"]);

	$query = "INSERT INTO penyakit
				VALUES
			  ('', '$id', '$kode_penyakit', '$nama_penyakit')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus_p()
{
	$conn = pdo_connect_mysql();

	if (isset($_GET['id'])) {
		// Select the record that is going to be deleted
		$stmt = $conn->prepare('SELECT * FROM penyakit WHERE id = ?');
		$stmt->execute([$_GET['id']]);
		$contact = $stmt->fetch(PDO::FETCH_ASSOC);

		if (!$contact) {
			exit('Contact doesn\'t exist with that ID!');
		}

		// Check if the user has confirmed deletion
		if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
			// User has confirmed, delete the record
			$stmt = $conn->prepare('DELETE FROM penyakit WHERE id = ?');
			$stmt->execute([$_GET['id']]);
		} else {
			// Display JavaScript confirmation dialog
			echo "<script>
                    var confirmation = confirm('Are you sure you want to delete contact #{$contact['id']}?');
                    if (confirmation) {
                        window.location.href = 'tables.php?id={$_GET['id']}&confirm=yes';
                    } else {
                        window.location.href = 'tables.php';
                    }
                  </script>";
			exit;
		}
	} else {
		exit('No ID specified!');
	}
}
function hapus_k()
{
	$conn = pdo_connect_mysql();

	if (isset($_GET['id'])) {
		// Select the record that is going to be deleted
		$stmt = $conn->prepare('SELECT * FROM tb_konsultan WHERE id = ?');
		$stmt->execute([$_GET['id']]);
		$contact = $stmt->fetch(PDO::FETCH_ASSOC);

		if (!$contact) {
			exit('Contact doesn\'t exist with that ID!');
		}

		// Check if the user has confirmed deletion
		if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
			// User has confirmed, delete the record
			$stmt = $conn->prepare('DELETE FROM tb_konsultan WHERE id = ?');
			$stmt->execute([$_GET['id']]);
		} else {
			// Display JavaScript confirmation dialog
			echo "<script>
                    var confirmation = confirm('Are you sure you want to delete contact #{$contact['id']}?');
                    if (confirmation) {
                        window.location.href = 'billing.php?id={$_GET['id']}&confirm=yes';
                    } else {
                        window.location.href = 'billing.php';
                    }
                  </script>";
			exit;
		}
	} else {
		exit('No ID specified!');
	}
}


// function ubah($data)
// {
// 	global $conn;

// 	$id = $data["id"];
// 	$nrp = htmlspecialchars($data["nrp"]);
// 	$nama = htmlspecialchars($data["nama"]);
// 	$email = htmlspecialchars($data["email"]);


// 	$query = "UPDATE mahasiswa SET
// 				nrp = '$nrp',
// 				nama = '$nama',
// 				email = '$email',
// 				jurusan = '$jurusan',
// 				gambar = '$gambar'
// 			  WHERE id = $id
// 			";

// 	mysqli_query($conn, $query);

// 	return mysqli_affected_rows($conn);
// }


function registrasi($data)
{
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO tb_user (username, email, password) VALUES ('$username', '$email', '$password')");

	return mysqli_affected_rows($conn);

}









?>