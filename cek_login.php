<?php
	session_start();
	include 'include/koneksi.php';

	$user = $_REQUEST['user'];
	$pass = $_REQUEST['pass'];

	if ($user!="" && $pass!="") {
		$sql = "SELECT * FROM user WHERE username = '$user' AND password= '$pass' ";
		$query = mysqli_query($db, $sql);
		$baris = mysqli_num_rows($query);
		if ($baris == true) {
			$ambil = mysqli_fetch_array($query);
			$username = $ambil['username'];
			$password = $ambil['password'];
			$status = $ambil['status'];

			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['status'] = $status;

			if ($status == 'admin') {
				echo "
					<script>
						alert('Welcome To E-Schedule');
						window.location.href = 'index.php'
					</script>
				";
			} elseif ($status == 'subadmin') {
				echo "
					<script>
						alert('Welcome To E-Schedule');
						window.location.href = 'subadmin/'
					</script>
				";
			} else {

				echo "
					<script>
						alert('Anda tidak bisa akses halaman admin!');
						window.location.href = 'login.php?err=3'
					</script>
				";
			}
		} else {
			echo "
               <script>
                  alert('Silahkan cek Data anda!');
                  window.location.href = 'login.php?err=2'
               </script>
			";
		}
	} else {
		echo "
           <script>
              alert('Silahkan cek Data anda!');
              window.location.href = 'login.php?err=1'
           </script>
		";
	}
?>
