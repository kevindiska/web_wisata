<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>artikel</h1>
	<button class="btn btn-primary" onclick="javascript:window.location.href='index.php?module=artikel&action=add'">ADD</button>
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">judul</td>
					<th width="10%">isi</td>
					<th width="10%">nama</td>
					<th width="10%">foto</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM artikel ORDER BY id_artikel ASC");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['judul'];?></td>
				<td><?php echo $hasil['isi'];?></td>
				<td><?php echo $hasil['nama'];?></td>
				<td><img src="../data/<?php echo $hasil['foto'];?>" /></td>
				<td>
					<button class="btn btn-warning" onclick="javascript:window.location.href='index.php?module=artikel&action=add&id=<?php echo $hasil['id_artikel'];?>'">EDIT</button>
					<button class="btn btn-danger" onclick="javascript:window.location.href='index.php?module=artikel&action=proses&id=<?php echo $hasil['id_artikel'];?>&proc=delete'">DELETE</button>
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