<!-- process -->
<?php

include'../connect.php';

    
	

    // print_r($_POST);

    // var_dump($_POST);

if(isset($_POST['Submit'])){

    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $nik=$_POST['nik'];
    $jeniskelamin=$_POST['jeniskelamin'];
    $tipe=$_POST['tipe'];
    $durasi=$_POST['durasi'];
    $discount=$_POST['discount'];
    $total=$_POST['total'];

	$sql = 
	"INSERT INTO pesanan
		VALUES(' ','$nama','$nik','$jeniskelamin','$tipe','$durasi','$discount','$total')";

	$query = mysqli_query($db, $sql);

    

    header('Location: ../index.php');

    // echo($sql);
    
}
?>
<!-- process -->