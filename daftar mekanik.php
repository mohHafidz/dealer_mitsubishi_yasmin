<?php
require 'function.php';
$id = $_GET['id'];

$result = query("SELECT * FROM data_sementara WHERE id = '86'")[0];

if (isset($_POST['start'])) {
  if (editPE($_POST)) {
    header('location: index.php');
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

    <title>Daftar Mekanik</title>
    <!-- <link rel="shortcut icon" href="img/img remove/red-black.png" type="image/x-icon"> -->
    <link rel="shortcut icon" href="img/img remove/red-blak-mits.png" type="image/x-icon">

  </head>
  <body class="container">

  <br><br><br><br><br>

  <form action="" method="post">
    <input type="hidden" name="id" id="id" value="<?= $id ?>">
    <!-- <div class="form-group">
        <label for="namaSA">Nama Service Advisor</label>
        <select name="namaSA" id="namaSA" class="form-select">
            <option><small class="form-text text-muted">Please insert nama sevice advisor</small></option>
            <option value="Herman P Sihotang"<?php if ($result['namaSA'] == 'Herman P Sihotang') echo ' selected="selected"'; ?>>Herman P Sihotang</option>
            <option value="Sarah"<?php if ($result['namaSA'] == 'Sarah') echo ' selected="selected"'; ?>>Sarah</option>
            <option value="Ridwan Firdaus Settiawan"<?php if ($result['namaSA'] == 'Ridwan Firdaus Setiawan') echo ' selected="selected"'; ?>>Ridwan Firdaus Settiawan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="ket">Keterangan</label>
        <select name="ket" id="ket" class="form-select">
          <option><small class="form-text text-muted">Please insert keterangan</small></option>
          <option value="CUCI"<?php if ($result['ket'] == 'CUCI') echo ' selected="selected"'; ?>>CUCI</option>
          <option value="TIDAK DI CUCI"<?php if ($result['ket'] == 'TIDAK DI CUCI') echo ' selected="selected"'; ?>>TIDAK DI CUCI</option>
        </select>
    </div>
    <div class="form-group">
        <label for="estimasi">Estimasi waktu</label>
        <input type="time" class="form-control" id="estimasi" name="estimasi" value="<?= $result['estimasi'] ?>">
    </div> -->
    <div class="form-group">
        <label for="namaPE">Nama mekanik</label>
        <select name="namaPE" id="namaPE" class="form-select">
            <option><small class="form-text text-muted">Please insert nama mekanik</small></option>
            <option value="Agus Azahra Alpian"<?php if ($result['namaPE'] == 'Agus Azahra Alpian') echo ' selected="selected"'; ?>>Agus Azahra Alpian</option>
            <option value="Alga Pranata Putra"<?php if ($result['namaPE'] == 'Alga Pranata Putra') echo ' selected="selected"'; ?>>Alga Pranata Putra</option>
            <option value="Andri Nurahman"<?php if ($result['namaPE'] == 'Andri Nurahman') echo ' selected="selected"'; ?>>Andri Nurahman</option>
            <option value="Ariswanto"<?php if ($result['namaPE'] == 'Ariswanto') echo ' selected="selected"'; ?>>Ariswanto</option>
            <option value="Asep Sehudin"<?php if ($result['namaPE'] == 'Asep Sehudin') echo ' selected="selected"'; ?>>Asep Sehudin</option>
            <option value="Heru prayitno"<?php if ($result['namaPE'] == 'Heru prayitno') echo ' selected="selected"'; ?>>Heru prayitno</option>
            <option value="Ikbal Maulana"<?php if ($result['namaPE'] == 'Ikbal Maulana') echo ' selected="selected"'; ?>>Ikbal Maulana</option>
            <option value="Mohamad Farham"<?php if ($result['namaPE'] == 'Mohamad Farham') echo ' selected="selected"'; ?>>Mohamad Farham</option>
            <option value="Muhammad Abdul Ajiz Fatkhurisko"<?php if ($result['namaPE'] == 'Muhammad Abdul Ajiz Fatkhurisko') echo ' selected="selected"'; ?>>Muhammad Abdul Ajiz Fatkhurisko</option>
        </select>
    </div>
    <div class="form-group">
        <label for="stall">Stall</label>
        <select name="stall" id="stall" class="form-select">
            <option><small class="form-text text-muted">Please insert stall</small></option>
            <option value="non stall"<?php if ($result['stall'] == 'non stall') echo ' selected="selected"'; ?>>non stall</option>
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
    </div>
    <br>
      <button type="submit" class="btn btn-outline-primary btn-lg btn-block" name="start" name="start" onclick="return confirm('Apakah data sudah benar?');">Submit</button>
      <a href="index.php" class="btn btn-outline-danger btn-lg btn-block">cancel</a>
    </form>
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
