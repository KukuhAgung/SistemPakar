<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="website sistem pakar">
  <meta name="author" content="mr k">
  <link rel="icon" href="image/icon.png">
  <link rel="stylesheet" href="style.css">

  <title>Sistem Pakar</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="css/carousel.css" rel="stylesheet">
</head>

<body class=" p-0">
  <?php
  include('navbar.php');
  ?>

  <main role="main">
    <!-- landing-page -->
    <div style="background: url(image/bg-anjing.png);"
      class="landing-page bg-primary p-0 p-lg-5 text-center text-sm-start text-white">
      <div class="text-light d-flex flex-column justify-content-center align-items-center text-center"
        style="height: 100vh;">
        <h1 style="font-size: 120px; font-family: 'Inder', sans-serif;">Dogy Health</h1>
        <h6 style="font-family: 'Inconsolata', monospace; font-size: 32px;"></h6>
        <p style="color: snow;"><button style="background-color: transparent; border: 3px solid snow;" type="button"
            class="btn btn-info" data-target="#exampleModal" data-toggle="modal"
            data-whatever="@getbootstrap">Mulai</button></p>
      </div>
    </div>
    <!-- landing-page -->

    <!---------------- MODAL ----------------->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Identitas User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="simpan-session.php" method="post" enctype="multipart/form-data" role="form">
            <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nama :</label>
                <input type="text" name="nama" class="form-control" id="input-ame" placeholder="isikan nama anda"
                  required autofocus>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Jenis Anjing :</label>
                <input type="text" name="jenis" class="form-control col-sm-8" placeholder="isikan jenis anjing"
                  required>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Umur Anjing (Bulan) :</label>
                <input type="number" name="umur" class="form-control col-sm-8" placeholder="isikan umur anjing"
                  required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info">Lanjut ></button>
            </div>
          </form>
        </div>

      </div>
    </div>
    </div>






    <!-- Marketing messaging and featurettes
      ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->


  </main>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://getbootstrap.com/docs/4.1/dist/js/bootstrap.min.js"></script>

</html>