<?php
require 'function.php';

if(isset($_POST['submit'])){
    if(tambah($_POST)){
        echo"
            <script>
                alert('data berhasil di tambahkan');
                document.location.href= 'index.php';
            </script>
        ";
    }else{
        mysqli_error($conn);
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="tambah.css">
    <style>
        body{
            background: #98e2fa;
            background-size: cover;
        }
    </style>

    <script>
        $('#input_starttime').pickatime({});
    </script>
    <script>
        $('#input_starttime').pickatime({
        // 12 or 24 hour
        twelvehour: false,
        });
    </script>

    <title>Tambah Pengerjaan Mobil</title>
    <!-- <link rel="shortcut icon" href="img/img remove/red-black.png" type="image/x-icon"> -->
    <link rel="shortcut icon" href="img/img remove/red-blak-mits.png" type="image/x-icon">

  </head>
  <body class="container">
      <br><br><br>
  <form action="" method="post">
    <div class="form-group">
        <label for="antrian">Nomer Antrian</label>
        <input type="text" class="form-control" id="antrian" name="antrian" placeholder="NO Antrian" autocomplete="off" required>
    </div>
    <div class="form-group">
        <label for="plat">Plat nomer</label>
        <input type="text" class="form-control" id="plat" name="plat" placeholder="NO Plat" autocomplete="off" required>
    </div>
    <!-- <div class="form-group">
        <label for="masuk">Jam mobil masuk</label>
        <input type="time" class="form-control" id="masuk" name="masuk" placeholder="Jam mobil masuk" autocomplete="off" required>
    </div> -->
    <!-- <div class="md-form">
        <input placeholder="Selected time" type="text" id="input_starttime" class="form-control timepicker">
        <label for="input_starttime">Light version, 12hours</label>
    </div> -->
    <br>
      <button type="submit" class="btn btn-primary" name="submit" name="submit">Submit</button>
      <a href="index.php" class="btn btn-danger">cancel</a>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery-3.6.0.js"></script>
    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>
