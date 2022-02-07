<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Cek nama rekening</title>
  </head>
  <body>
    <h1>Cek Nama Rekening</h1>
    <form method="post">
        <div class="form-group">
            <label>No Rekening</label>
            <input type="number" name="no_rek" class="form-control">
        </div>
        <div class="form-group">
             <label>Type</label>
             <select name="bank" class="form-control">
                 <option  value="mandiri">Mandiri</option>
                 <option value="bca">Bca</option>
                 <option value="bri">Bri</option>
                 <option value="bni">Bni</option>
                 <option value="cimb">CIMB Niaga</option>
                 <option value="permata">Permata / Permata Syariah</option>
             </select>
        </div>
        <div class="form-group">
            <button type="submit" name="kirim">Kirim</button>
        </div>
    </form>
    <!-- Optional JavaScript; choose one of the two! -->
    <?php
        if(isset($_POST['kirim'])){

        $no = $_POST['no_rek'];
        $bank = $_POST['bank'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://irfan.co.id/nama-rek/api");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"nomer=$no&code=$bank");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        curl_close ($ch);
        $hasil = json_decode($result,true);
        var_dump($hasil);

        $status_bank =$hasil['data']['status'];
        echo $status_bank;

    }
     ?>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>