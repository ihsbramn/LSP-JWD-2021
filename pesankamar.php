<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pesan Kamar</title>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
          <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link " href="index.php">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="produk.php">Produk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="daftarharga.php">Daftar Harga</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="tentangkami.php">Tetang Kami</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="pesankamar.php">Pesan Kamar</a>
              </li>
            </ul>
          </div>
          </div>
        </div>
      </nav>

      <section style="margin-top: 100px;" >
    
      <h2 class="text-center" >Pesan Kamar</h2>
      <br><br>
        <div class="container">
        <form action="process/proses_pesan.php" method="POST">
        <input type="text" name="id" class="form-control" id="id" value="0" hidden>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Pemesan</label>
          <input type="text" name="nama" class="form-control" id="nama" required>
        </div>
        <div class="mb-3">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jeniskelamin" value="laki" id="jeniskelamin" checked>
            <label class="form-check-label" for="laki">
              Laki-Laki
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="jeniskelamin" value="perempuan" id="jeniskelamin" >
            <label class="form-check-label" for="perempuan">
              Perempuan
            </label>
          </div>
        </div>
        <div class="mb-3">
          <label for="nik" class="form-label">Nomor Identitas</label>
          <input type="text" name="nik" class="form-control" id="nik" pattern=".{16,16}" required>
          <small id="nikhelp" class="form-text text-muted">16 digit NIK</small>
        </div>
        <div class="form-group mb-3">
          <label for="tipe">Tipe Kamar</label>
          <select class="form-control" name="tipe" id="tipe" onchange="SetHarga(event);">
            <option value="-">Pilih Kamar</option>
            <option value="Family">Family</option>
            <option value="Deluxe">Deluxe</option>
            <option value="Standar">Standar</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga</label>
          <input  type="text" class="form-control"  id="harga" readonly>
        </div>
        <div class="mb-3">
          <label for="tgl" class="form-label">Tanggal Pesan</label>
          <input type="date" class="form-control" id="tgl">
        </div>
        <div class="mb-3">
          <label for="durasi" class="form-label">Durasi Menginap</label>
          <input type="number" class="form-control" name="durasi" id="durasi" onchange="SetHarga2(event);">
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" id="sarapan" onclick="SetHarga2(event);">
          <label class="form-check-label" for="sarapan">
            Include Breakfast
          </label>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" name="discount" value="0" id="discount" hidden>
        </div>
        <div class="mb-3">
          <label for="total" class="form-label">Total Bayar</label>
          <input type="text" class="form-control" name="total" id="total" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
        </div>
      </section>
      
      <script type='text/javascript'>
        function SetHarga(e){
          jenis = document.getElementById('tipe').value;
          if (jenis = 'Standar'){
            document.getElementById('harga').value = '200000';
          }else if (jenis = 'Deluxe'){
            document.getElementById('harga').value = '400000';
          }else if (jenis = 'Family'){
            document.getElementById('harga').value = '800000';
          };
        };

        function SetHarga2(e){
          durasi = document.getElementById('durasi').value;
          harga = document.getElementById('harga').value;
          if (document.getElementById('sarapan').checked) {
              nyarap = (durasi - 1) * 80000;
              total = (durasi * harga) + nyarap;
              totalbayar = document.getElementById('total').value = total;
          }else{
              total = durasi * harga;
              totalbayar = document.getElementById('total').value = total;
          }
          
        };

        // function SetHarga3(e){
        //   if (document.getElementById('sarapan').checked) {
        //     nyarap = durasi - 1 * 80000;
        //   };
        // };
        
        



      </script>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>