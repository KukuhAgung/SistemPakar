<?php


include '../assets/php/functions.php';
$conn = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nama_penyakit = isset($_POST['nama_penyakit']) ? $_POST['nama_penyakit'] : '';
        $kode_penyakit = isset($_POST['kode_penyakit']) ? $_POST['kode_penyakit'] : '';

        // Update the record
        $stmt = $conn->prepare('UPDATE penyakit SET id = ?, nama_penyakit = ?, kode_penyakit = ? WHERE id = ?');
        $stmt->execute([$id, $nama_penyakit, $kode_penyakit, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $conn->prepare('SELECT * FROM penyakit WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<div class="content update">
    <h2>Update Penyakit #
        <?= $contact['id'] ?>
    </h2>
    <form action="ubah_p.php?id=<?= $contact['id'] ?>" method="post">
        <label for="nama">Nama Penyakit</label>
        <input type="text" name="nama_penyakit" value="<?= $contact['nama_penyakit'] ?>" id="nama">
        <label for="email">Kode Penyakit</label>
        <input type="text" name="kode_penyakit" value="<?= $contact['kode_penyakit'] ?>" id="email">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
        <p>
            <?= $msg ?>
        </p>
    <?php endif; ?>
</div>