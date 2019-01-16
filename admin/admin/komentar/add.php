<?php
	if(@$_SESSION['username'] != ''){
?>
<form action="index.php?module=komentar&action=proses" method="post" enctype="multipart/form-data">
<?php if(@$_GET['id'] !=''){ ?>
	<input type="hidden" name="id" value="<?php echo @$_GET['id'];?>" />
	<input type="hidden" name="proc" value="edit" />
<?php }else{?>
	<input type="hidden" name="proc" value="add" />
<?php } ?>
<table>
	<?php
		$id = @$_GET['id'];
		$sql=$db->prepare("SELECT * FROM komentar WHERE id = :id ");
		$sql->bindParam(':id', $id);
		$sql->execute();
		$hasil=$sql->FETCH(PDO::FETCH_ASSOC);
	?>
	<tr>
		<td>komentar</td>
		<td>:</td>
		<td>
			<input type="tgl_komentar" name="komentar" value="<?php echo @$hasil['komentar'];?>" placeholder="Ketikkan tgl_komentar" />
		</td>
	</tr>
		<tr>
		<td>tgl_komentar</td>
		<td>:</td>
		<td>
			<input type="tgl_komentar" name="tgl_komentar" value="<?php echo @$hasil['tgl_komentar'];?>" placeholder="Ketikkan tgl_komentar" />
		</td>
	</tr>
</table>
<button class="btn btn-primary">SUBMIT</button>
<button type="button" class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=komentar'">CANCEL</button>
</form>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>