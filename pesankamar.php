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

      <section style="margin-top: 80px;" >
    
      <h2 class="text-center" >Pesan Kamar</h2>
      <br><br>
        <div class="container">
          <div class="row">
            <div class="col">
            </div>
            <div class="col">
            <form action="process/proses_pesan.php" method="POST">
              <!-- id -->
              <input type="text" name="id" class="form-control" id="id" value="0" hidden>
              <!-- id -->
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <!-- namna -->
                <input type="text" name="nama" class="form-control" id="nama" required onkeydown="keyDown(event)">
                <!-- nama -->
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <!-- jeniskelamin -->
                  <input class="form-check-input" type="radio" name="jeniskelamin" value="laki-laki" id="jeniskelamin" checked>
                  <label class="form-check-label" for="laki">
                    Laki-Laki
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jeniskelamin" value="perempuan" id="jeniskelamin" >
                  <label class="form-check-label" for="perempuan">
                    Perempuan
                  </label>
                  <!-- jeniskelamin -->
                </div>
              </div>
              <div class="mb-3">
                <label for="nik" class="form-label">Nomor Identitas</label>
                <!-- nik -->
                <input type="text" name="nik" class="form-control" id="nik" pattern=".{16,16}" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                <!-- nik -->
                <small id="nikhelp" class="form-text text-muted">16 digit NIK</small>
              </div>
              <div class="form-group mb-3">
                <label for="tipe">Tipe Kamar</label>
                <!-- tipe -->
                <select class="form-control" name="tipe" id="tipe" onchange="SetHarga()">
                  <option value="-">Pilih Kamar</option>
                  <option value="Family">Family</option>
                  <option value="Deluxe">Deluxe</option>
                  <option value="Standar">Standar</option>
                </select>
                <!-- tipe -->
              </div>
              <div class="mb-3">
                <!-- harga -->
                <label for="harga" class="form-label">Harga</label>
                <input  type="text" class="form-control"  id="harga" readonly>
                <!-- harga -->
              </div>
              <div class="mb-3">
                <!-- tgl -->
                <label for="tgl" class="form-label">Tanggal Pesan</label>
                <input type="date" class="form-control" id="tgl">
                <!-- tgl -->
              </div>
              <div class="mb-3">
                <label for="durasi" class="form-label">Durasi Menginap</label>
                <!-- durasi -->
                <input type="number" class="form-control" name="durasi" id="durasi" onchange="SetHarga2(event); " min="1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                <!-- durasi -->
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="sarapan" onclick="SetHarga2(event);">
                <label class="form-check-label" for="sarapan">
                  Include Breakfast
                </label>
              </div>
              <div class="mb-3">
                <!-- discount -->
                <input type="text" class="form-control" name="discount" value="0" id="discount" hidden>
                <!-- discount -->
              </div>
              <div class="mb-3">
                <label for="total" class="form-label">Total Bayar</label>
                <!-- total -->
                <input type="text" class="form-control" name="total" id="total" readonly>
                <!-- total -->
              </div>
              <button type="submit" name="Submit" class="btn btn-primary" onClick="return empty();" >Submit</button>
            </form>
            </div>
            <div class="col">
            </div>
          </div>
        </div>
      </section>
      
      <script type='text/javascript'>

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        
        document.getElementById('tgl').setAttribute("min", today);

        function SetHarga(){
          tipe = document.getElementById('tipe').value;
          if (tipe == 'Standar'){
            document.getElementById('harga').value = 200000;
          }else if (tipe == 'Deluxe'){
            document.getElementById('harga').value = 400000;
          }else{
            document.getElementById('harga').value = 800000;
          }
        };
        

        function SetHarga2(e){
          durasi = document.getElementById('durasi').value;
          if(durasi < 3){
              harga = document.getElementById('harga').value;
            if (document.getElementById('sarapan').checked) {
                nyarap = (durasi - 1) * 80000;
                total = (durasi * harga) + nyarap;
                totalbayar = total;
                document.getElementById('total').value = (totalbayar.toLocaleString());
            }else{
                total = durasi * harga;
                totalbayar = total;
                document.getElementById('total').value = (totalbayar.toLocaleString());
            };
          }else {
            harga = document.getElementById('harga').value;
            diskon = document.getElementById('discount').value = '10%';
            if (document.getElementById('sarapan').checked) {
                nyarap = (durasi - 1) * 80000;
                total = (durasi * harga) + nyarap;
                disc = total * 0.01;
                totalbayar = total - disc;
                document.getElementById('total').value = (totalbayar.toLocaleString());
            }else{
                total = durasi * harga;
                disc = total * 0.01;
                totalbayar = total - disc;
                document.getElementById('total').value = (totalbayar.toLocaleString());
            };
          }; 
        };

        function empty() { 
          var x;
            x = document.getElementById("nama").value;
            if (x == " ") {
                alert("Tidak Boleh Blank");
                return false;
            }else if (x == "  "){
              alert("Tidak Boleh Blank");
                return false;
            }else if (x == "   "){
              alert("Tidak Boleh Blank");
                return false;
            }else if (x == "    "){
              alert("Tidak Boleh Blank");
                return false;
            }else if (x == "     "){
              alert("Tidak Boleh Blank");
                return false;
            }else if (x == "      "){
              alert("Tidak Boleh Blank");
                return false;
            }else if (x == "       "){
              alert("Tidak Boleh Blank");
                return false;
            }else if (x == "       "){
              alert("Tidak Boleh Blank");
                return false;
            }
        };

      </script>

      <!-- <script type='text/javascript'>
          nama = document.getElementById('nama');
          nama.on('keypress', function(e) {
              if (e.which == 32){
                  console.log('Nama tidak boleh ada spasi !');
                  return false;
              }
        });
        
      </script> -->



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