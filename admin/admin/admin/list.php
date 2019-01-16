<?php
	if(@$_SESSION['username'] != ''){
?>
<div class="fix">
	<h1>Admin</h1>	
	<div class="fix-table">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%">No</td>
					<th width="10%">Email</td>
					<th width="10%">Username</td>
					<th width="10%">Nama</td>
					<th width="10%">Foto</td>
					<th width="20%">Option</td>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$sql=$db->prepare("SELECT * FROM admin");
				$sql->execute();
				while($hasil=$sql->FETCH(PDO::FETCH_ASSOC)){
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $hasil['email'];?></td>
				<td><?php echo $hasil['username'];?></td>
				<td><?php echo $hasil['nama'];?></td>
				<td><img src="../data/IMG_2468.jpg<?php echo $hasil['foto'];?>" /></td>
				<td>
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