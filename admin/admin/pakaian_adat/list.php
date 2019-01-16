<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>pakaian_adat</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=pakaian_adat&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">nama_pakaian _adat</td>
					<th width="10%">keterangan</td>
					<th width="10%">foto</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM pakaian_adat ORDER BY id ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['nama_pakaian _adat'];?></td>
				<td><?php echo $hasil['keterangan'];?></td>
				<td><img src="../data/<?php echo $hasil['foto'];?>" /></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=pakaian_adat&action=add&id=<?php echo $hasil['id'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=pakaian_adat&action=proses&id=<?php echo $hasil['id'];?>&proc=delete'">DELETE</button>
				</td>
			</tr>
			<?php
				$no++;
				}
			?>
			</tbody>
		</table>
	</div>
</div>
<?php
	}else{
		echo "<script>window.location.href='index.php';</script>";
	}
?>