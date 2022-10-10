<?php
require 'function.php';
$id = $_GET['id'];

$result = query("SELECT * FROM antri WHERE id = $id")[0];

if (isset($_POST['start'])) {
  if (editSA($_POST)) {
    header('location: antrian.php');
  }else{
    mysqli_error($conn);
  }
}

if (isset($_POST['hapus'])) {
  if (hapus2($_POST)) {
    echo"
      <script>
        alert('Data kendaraan berhasil di hapus');
        document.location.href= 'antrian.php';
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

    <title>Daftar Service Advisor</title>
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
        <input type="text" class="form-control" id="antrian" name="antrian" value="<?= $result['antrian'] ?>">
    </div>
    <div class="form-group">
        <label for="namaSA">Nama Service Advisor</label>
        <!-- <input type="text" class="form-control" id="namaSA" name="namaSA" value="<?= $result['namaSA'] ?>"> -->
        <select name="namaSA" id="namaSA" class="form-select" required>
            <option><small class="form-text text-muted">Please insert nama sevice advisor</small></option>
            <option value="Embib Muhammad Ishak"<?php if ($result['namaSA'] == 'Embib Muhammad Ishak') echo ' selected="selected"'; ?>>Embib Muhammad Ishak</option>
            <option value="Sarah"<?php if ($result['namaSA'] == 'Sarah') echo ' selected="selected"'; ?>>Sarah</option>
            <option value="Ridwan Firdaus Setiawan"<?php if ($result['namaSA'] == 'Ridwan Firdaus Setiawan') echo ' selected="selected"'; ?>>Ridwan Firdaus Setiawan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="cuci">Cuci</label>
        <select name="cuci" id="cuci" class="form-select" required>
          <option><small class="form-text text-muted">Please insert keterangan</small></option>
          <option value="C"<?php if ($result['cuci'] == 'C') echo ' selected="selected"'; ?>>C</option>
          <option value="TC"<?php if ($result['cuci'] == 'TC') echo ' selected="selected"'; ?>>TC</option>
        </select>
    </div>
    <div class="form-group">
        <label for="cuci">Jenis Service</label>
        <select name="jenis" id="jenis" class="form-select" required>
          <option><small class="form-text text-muted">Please insert keterangan</small></option>
          <option value="CML"<?php if ($result['jenis_service'] == 'CML') echo ' selected="selected"'; ?>>Keluhan</option>
          <option value="SVC"<?php if ($result['jenis_service'] == 'SVC') echo ' selected="selected"'; ?>>Service Berkala</option>
        </select>
    </div>
    <div class="form-group">
        <label for="estimasi">Estimasi waktu</label>
        <input type="time" class="form-control" id="estimasi" name="estimasi" value="<?= ($result['estimasi'] === '00:00:00') ? '' : $result['estimasi']; ?>">
    </div>
    <!-- <div class="form-group">
        <label for="namaPE">Nama mekanik</label>
        <select name="namaPE" id="namaPE" class="form-select">
            <option><small class="form-text text-muted">Please insert stall</small></option>
            <option value="Agus Azahra Alpian"<?php if ($result['namaPE'] == 'Agus Azahra Alpian') echo ' selected="selected"'; ?>>Agus Azahra Alpian</option>
            <option value="Alga Pranata Putra"<?php if ($result['namaPE'] == 'Alga Pranata Putra') echo ' selected="selected"'; ?>>Alga Pranata Putra</option>
            <option value="Andri Nurahman"<?php if ($result['namaPE'] == 'Andri Nurahman') echo ' selected="selected"'; ?>>Andri Nurahman</option>
            <option value="Ariswanto"<?php if ($result['namaPE'] == 'Ariswanto') echo ' selected="selected"'; ?>>Ariswanto</option>
            <option value="Asep Suhudin"<?php if ($result['namaPE'] == 'Asep Suhudin') echo ' selected="selected"'; ?>>Asep Suhudin</option>
            <option value="Embib Muhammad Ishak"<?php if ($result['namaPE'] == 'Embib Muhammad Ishak') echo ' selected="selected"'; ?>>Embib Muhammad Ishak</option>
            <option value="Ikbal Maulana"<?php if ($result['namaPE'] == 'Ikbal Maulana') echo ' selected="selected"'; ?>>Ikbal Maulana</option>
            <option value="Mohamad Farham"<?php if ($result['namaPE'] == 'Mohamad Farham') echo ' selected="selected"'; ?>>Mohamad Farham</option>
            <option value="Muhammad Abdul Ajiz Fatkhurisko"<?php if ($result['namaPE'] == 'Muhammad Abdul Ajiz Fatkhurisko') echo ' selected="selected"'; ?>>Muhammad Abdul Ajiz Fatkhurisko</option>
        </select>
    </div>
    <div class="form-group">
        <label for="stall">Stall</label>
        <select name="stall" id="stall" class="form-select">
            <option><small class="form-text text-muted">Please insert stall</small></option>
            <option value="stall 1"<?php if ($result['stall'] == 'stall 1') echo ' selected="selected"'; ?>>stall 1</option>
            <option value="stall 2"<?php if ($result['stall'] == 'stall 2') echo ' selected="selected"'; ?>>stall 2</option>
            <option value="stall 3"<?php if ($result['stall'] == 'stall 3') echo ' selected="selected"'; ?>>stall 3</option>
            <option value="stall 4"<?php if ($result['stall'] == 'stall 4') echo ' selected="selected"'; ?>>stall 4</option>
            <option value="stall 5"<?php if ($result['stall'] == 'stall 5') echo ' selected="selected"'; ?>>stall 5</option>
            <option value="stall 6"<?php if ($result['stall'] == 'stall 6') echo ' selected="selected"'; ?>>stall 6</option>
            <option value="stall 7"<?php if ($result['stall'] == 'stall 7') echo ' selected="selected"'; ?>>stall 7</option>
            <option value="stall 8"<?php if ($result['stall'] == 'stall 8') echo ' selected="selected"'; ?>>stall 8</option>
            <option value="stall 9"<?php if ($result['stall'] == 'stall 9') echo ' selected="selected"'; ?>>stall 9</option>
            <option value="stall 10"<?php if ($result['stall'] == 'stall 10') echo ' selected="selected"'; ?>>stall 10</option>
        </select>
    </div> -->
    <br>
      <button type="submit" class="btn btn-outline-primary btn-lg btn-block" name="start" name="start" onclick="return confirm('Apakah data sudah benar?');">Submit</button>
      <a href="antrian.php" class="btn btn-outline-warning btn-lg btn-block">cancel</a>
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
