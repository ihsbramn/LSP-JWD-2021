<!-- process -->
<?php

include'../connect.php';

    
	
if(isset($_POST['submit'])){

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
		VALUES('$id','$nama','$nik','$jeniskelamin','$tipe','$durasi','$discount','$total')";
	$query = mysqli_query($db, $sql);

    if($query){
        header('Location: ../index.php');
    } else {
        header('Location: ../pesankamar.php');
    }
}
?>
<!-- process -->