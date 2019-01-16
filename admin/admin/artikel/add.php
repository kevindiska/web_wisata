<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=artikel&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id_artikel" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id_artikel = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM artikel WHERE id_artikel = :id_artikel ");
		$sql->bindParam(':id_artikel', $id_artikel);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>judul</td>
		<td>:</td>
		<td>
			<input type="isi" name="judul" value="<?php echo @$hasil['judul'];?>" placeholder="Ketikkan isi" />
		</td>
	</tr>
		<tr>
		<td>isi</td>
		<td>:</td>
		<td>
			<input type="isi" name="isi" value="<?php echo @$hasil['isi'];?>" placeholder="Ketikkan isi" />
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
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=artikel'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>