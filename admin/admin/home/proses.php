<?php

	include('../database.php');
	
	@$proc = @$_REQUEST['proc'];
	
	@$username = @$_POST['username'];
	@$password = @$_POST['password'];
	@$nama = @$_POST['nama'];
	@$email = @$_POST['email'];
	@$jenis_kelamin = @$_POST['jenis_kelamin'];
	@$no_tlp = @$_POST['no_tlp'];
	@$asal = @$_FILES['foto']['tmp_name'];
	@$tujuan = @$_FILES['foto']['name'];
	
	move_uploaded_file(@$asal, "../data/".@$tujuan);
	
	switch(@$proc){
		
	case "edit" :
	
	$sql=$db->prepare("UPDATE admin SET username = :username, password = :password, nama = :nama, foto = :foto, email = :email, jenis_kelamin = 
	:jenis_kelamin, no_tlp = :no_tlp WHERE username = :username");
	$sql->bindParam(':username', @$username);
	$sql->bindParam(':password', @$password);
	$sql->bindParam(':nama', @$nama);
	$sql->bindParam(':email', @$email);
	$sql->bindParam(':jenis_kelamin', @$jenis_kelamin);
	$sql->bindParam(':no_tlp', @$no_tlp);
	$sql->bindParam(':foto', @$tujuan);
	$sql->execute();
	
	echo"
		<script>
			alert('Apakah anda ingin merubah');
			window.location.href='index.php?module=home';
		</script>
	";
	
	break;
	
	}
	
?>