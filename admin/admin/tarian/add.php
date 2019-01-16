<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=tarian&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM tarian WHERE id = :id ");
		$sql->bindParam(':id', $id);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>nama</td>
		<td>:</td>
		<td>
			<input type="deskripsi" name="nama" value="<?php echo @$hasil['nama'];?>" placeholder="Ketikkan deskripsi" />
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
		<td>foto</td>
		<td>:</td>
		<td>
			<input type="file" name="foto" />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=tarian'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>