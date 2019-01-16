<?php session_start(); ?>
<?php
	include("../database.php");
	if(@$_SESSION['username'] == ''){
		if(@$_GET['module'] != ""){
			if(@$_GET['action'] != ""){
				include("admin/".@$_GET['module']."/".@$_GET['action'].".php");
			}else{
				include("admin/".@$_GET['module']."/list.php");
			}
		}else{
			include("login.php");
		}
	}else{
?>
<html>
	<head>
		<title>Adat istiadat Jepara</title>
		<link rel="shorcut icon" href="../data/smkn12.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- data css -->
		
		<link rel="stylesheet" href="../style/backend/css/style.css" />
		<link rel="stylesheet" href="../style/backend/css/bootstrap.css" />
		<link rel="stylesheet" href="../style/backend/css/dataTables.bootstrap.min.css" />
		<link rel="stylesheet" href="../style/backend/css/AdminLTE.min.css" />
		
		<!-- data js -->
				
		<script src="../style/backend/js/jquery.min.js"></script>
		<script src="../style/backend/js/jquery.dataTables.min.js"></script>
		<script src="../style/backend/js/dataTables.bootstrap.min.js"></script>
		
	</head>
	<body>
		<div class="container">
			<div class="header">
				<div class="header-button">
					<button class="btn btn-default" onclick="javasript:window.location.href='index.php?module=proses_logout&action=proses'">LOGOUT</button>
				</div>
			</div>
			<div class="main">
				<div class="main-left">
					<ul>
						<a href="index.php"><li><font>Home</font></li></a>
						<a href="index.php?module=admin"><li><font>Admin</font></li></a>
						<a href="index.php?module=artikel"><li><font>Artikel</font></li></a>
						<a href="index.php?module=pakaian_adat"><li><font>pakaian_adat</font></li></a>
						<a href="index.php?module=tarian"><li><font>tarian</font></li></a>
						<a href="index.php?module=makanan_khas"><li><font>makanan_khas</font></li></a>
						<a href="index.php?module=kesenian"><li><font>kesenian</font></li></a>
						<a href="index.php?module=komentar"><li><font>komentar</font></li></a>
					</ul>
				</div>
				<div class="main-right">
					<?php
						if(@$_GET['module'] !=''){
							if(@$_GET['action'] !=''){
								include("admin/".@$_GET['module']."/".@$_GET['action'].".php");
							}else{
								include("admin/".@$_GET['module']."/list.php");
							}
						}else{
							include("admin/home/list.php");
						}
					?>
				</div>
			</div>
			<div class="footer">
				<font>&copy; COPYRIGHT Adat istiadat Jepara</font>
			</div>
		</div>
		<script>
		  $(function () {
			$('#example1').DataTable()
			$('#example2').DataTable({
			  'paging'      : true,
			  'lengthChange': false,
			  'searching'   : false,
			  'ordering'    : true,
			  'info'        : true,
			  'autoWidth'   : false
			})
		  })
		</script>
	</body>
</html>
<?php } ?>