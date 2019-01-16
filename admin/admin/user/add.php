<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=user&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM user WHERE id = :id ");
		$sql->bindParam(':id', $id);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>username</td>
		<td>:</td>
		<td>
			<input type="deskripsi" name="username" value="<?php echo @$hasil['username'];?>" placeholder="Ketikkan deskripsi" />
		</td>
	</tr>
		<tr>
		<td>deskripsi</td>
		<td>:</td>
		<td>
			<input type="deskripsi" name="deskripsi" value="<?php echo @$hasil['deskripsi'];?>" placeholder="Ketikkan deskripsi" />
		</td>
	</tr>
			<tr>
		<td>nama</td>
		<td>:</td>
		<td>
			<input type="nama" name="nama" value="<?php echo @$hasil['nama'];?>" placeholder="Ketikkan nama" />
		</td>
	</tr>
	<tr>
		<td>foto</td>
		<td>:</td>
		<td>
			<input type="file" name="foto" />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=user'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>