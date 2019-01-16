<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=pakaian_adat&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM pakaian_adat WHERE id = :id ");
		$sql->bindParam(':id', $id);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>nama pakaian adat</td>
		<td>:</td>
		<td>
			<input type="keterangan	" name="nama_pakaian_adat" value="<?php echo @$hasil['nama_pakaian_adat'];?>" placeholder="Ketikkan keterangan	" />
		</td>
	</tr>
		<tr>
		<td>keterangan</td>
		<td>:</td>
		<td>
			<input type="keterangan	" name="keterangan	" value="<?php echo @$hasil['keterangan'];?>" placeholder="Ketikkan keterangan	" />
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
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=pakaian_adat'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>