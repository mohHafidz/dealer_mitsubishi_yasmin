<?php
require 'function.php';
$id = $_POST['id'];

$result = query("SELECT * FROM data_sementara WHERE id = $id")[0];

if (isset($_POST['edit'])) {
    if (edit($_POST)) {
        echo"
            <script>
                alert('data berhasil di ubah');
                document.location.href= 'index.php';
            </script>
        ";
    }
}

if (isset($_POST['hapus'])) {
  if (hapus($_POST)) {
    echo"
      <script>
        alert('Data kendaraan berhasil di hapus');
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit</title>
    <!-- <link rel="shortcut icon" href="img/img remove/red-black.png" type="image/x-icon"> -->
    <link rel="shortcut icon" href="img/img remove/red-blak-mits.png" type="image/x-icon">

  </head>
  <body class="container">

  <br><br><br><br><br>
  <form action="" method="post">
      <input type="hidden" name="id" id="id" value="<?= $id ?>">
      <button class="btn btn-outline-danger" name="hapus" id="hapus">Hapus List</button>
    </form>

  <form action="" method="post">
    <input type="hidden" name="id" id="id" value="<?= $id ?>">
    <div class="form-group">
        <label for="antrian">antrian</label>
        <input type="text" class="form-control" disabled id="antrian" name="antrian" value="<?= $result['antrian'] ?>">
    </div>
    <div class="form-group">
        <label for="namaSA">Nama Service Advisor</label>
        <!-- <input type="text" class="form-control" id="namaSA" name="namaSA" value="<?= $result['namaSA'] ?>"> -->
        <select name="namaSA" id="namaSA" class="form-select" disabled>
            <option><small class="form-text text-muted">Please insert nama sevice advisor</small></option>
            <option value="Embib Muhammad Ishak"<?php if ($result['namaSA'] == 'Embib Muhammad Ishak') echo ' selected="selected"'; ?>>Embib Muhammad Ishak</option>
            <option value="Sarah"<?php if ($result['namaSA'] == 'Sarah') echo ' selected="selected"'; ?>>Sarah</option>
            <option value="Ridwan Firdaus Setiawan"<?php if ($result['namaSA'] == 'Ridwan Firdaus Setiawan') echo ' selected="selected"'; ?>>Ridwan Firdaus Setiawan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="estimasi">Estimasi waktu</label>
        <input type="time" class="form-control" id="estimasi" name="estimasi" value="<?= $result['estimasi'] ?>">
    </div>
    <br>
      <button type="submit" class="btn btn-outline-primary btn-lg btn-block" name="edit" name="edit" onclick="return confirm('Apakah data sudah benar?');">Submit</button>
      <a href="index.php" class="btn btn-outline-warning btn-lg btn-block">cancel</a>
    </form>
    <br>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
