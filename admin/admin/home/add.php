<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=home&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="username" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$username = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM admin WHERE username = '$_SESSION[username]' ");
		$sql->bindParam(':username', $username);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td>
			<input type="text" name="username" value="<?php echo @$hasil['username'];?>" placeholder="Ketikkan Username" <?php if(@$hasil['username']) echo "readonly"; else echo ""; ?> />
		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>:</td>
		<td>
			<input type="password" name="password" value="<?php echo @$hasil['password'];?>" placeholder="Ketikkan Password" />
		</td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>
			<input type="text" name="nama" value="<?php echo @$hasil['nama'];?>" placeholder="Ketikkan Nama" />
		</td>
	</tr>
<tr>
		<td>Email</td>
		<td>:</td>
		<td>
			<input type="email" name="email" value="<?php echo @$hasil['email'];?>" placeholder="Ketikkan Email" />
		</td>
	</tr>
	<tr>
		<td>Foto</td>
		<td>:</td>
		<td>
			<input type="file" name="foto" />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=home'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>