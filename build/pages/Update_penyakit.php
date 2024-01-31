<?php
include '../assets/php/functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama_penyakit = isset($_POST['nama_penyakit']) ? $_POST['nama_penyakit'] : '';
        $kode_penyakit = isset($_POST['kode_penyakit']) ? $_POST['kode_penyakit'] : '';
        $penanganan = isset($_POST['penanganan']) ? $_POST['penanganan'] : '';

        // Update the record
        $stmt = $pdo->prepare('UPDATE tb_solusi SET id = ?, nama_penyakit = ?, kode_penyakit = ?, penanganan = ? WHERE id = ?');
        $stmt->execute([$id, $nama_penyakit, $kode_penyakit, $penanganan, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM tb_solusi WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        header("Location: ../pages/tables.php");
        exit;
    }
} else {
    exit('No ID specified!');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Soft UI Dashboard Tailwind</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="../assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />
</head>

<body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <main class="mt-0 transition-all duration-200 ease-soft-in-out">
        <section>
            <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
                <div class="container z-10">
                    <div class="flex flex-wrap mt-0 -mx-3">
                        <div
                            class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                            <div
                                class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                                <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                                    <h3
                                        class="relative text-center z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">
                                        Edit Penyakit</h3>
                                    <p class="text-center mb-0">Masukan data penyakit baru</p>
                                </div>
                                <div class="flex-auto p-6">
                                    <form role="form" method="post" action="Update_penyakit.php?id=<?= $contact['id'] ?>">
                                    <label class="mb-2 ml-1 font-bold text-xs text-slate-700">ID Penyakit</label>
                                        <div class="mb-4">
                                            <input type="id" name="id" id="id"
                                                value="<?=$contact['id']?>"
                                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                placeholder="id" aria-label="id"
                                                aria-describedby="id-addon" />
                                        </div>
                                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Kode Penyakit</label>
                                        <div class="mb-4">
                                            <input type="kode_penyakit" name="kode_penyakit" id="kode_penyakit"
                                                value="<?= $contact['kode_penyakit'] ?>"
                                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                placeholder="Kode Penyakit" aria-label="kode_penyakit"
                                                aria-describedby="kode_penyakit-addon" />
                                        </div>
                                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Nama Penyakit</label>
                                        <div class="mb-4">
                                            <input type="nama_penyakit" name="nama_penyakit" id="nama_penyakit" value="<?= $contact['nama_penyakit']?>"
                                                class=" focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft
                                                block w-full appearance-none rounded-lg border border-solid
                                                border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal
                                                text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none
                                                focus:transition-shadow" placeholder="Nama Penyakit"
                                                aria-label="nama_penyakit" aria-describedby="nama_penyakit-addon" />
                                        </div>
                                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Penanganan</label>
                                        <div class="mb-4">
                                            <input type="penanganan" name="penanganan" id="penanganan" value="<?= $contact['penanganan'] ?>"
                                                class=" focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft
                                                block w-full appearance-none rounded-lg border border-solid
                                                border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal
                                                text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none
                                                focus:transition-shadow" placeholder="Penanganan"
                                                aria-label="penanganan" aria-describedby="penanganan-addon" />
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="login" id="login" value="Update"
                                                class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Edit
                                                Data</button>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                                    <p class="mx-auto mb-6 leading-normal text-sm">
                                        Melihat Data Penyakit?
                                        <a href="../pages/tables.php"
                                            class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Klik
                                            Disini</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>

</html>