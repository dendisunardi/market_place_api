<?php

		include "../config/koneksi.php";

		//[""] diambil dari android yg ada " " nya
		$email=$_POST['email'];
		$nama=$_POST['nama'];
		$pasword=$_POST['pasword'];
		$notelp=$_POST['notelp'];
		$jk=$_POST['jk'];


		if($email==''||$nama==''||$pasword==''||$notelp==''||$jk==''){
			echo "Field masih ada yang kosong.";
		}else {
			
			//chek data sudah ada atau belum
			$chek="select user_email from user where user_email like '".$email."' ";
			$result=mysqli_query($con, $chek);


			//$raw=mysqli_fetch_array($result);
			//if(isset($raw)){
			if(mysqli_num_rows($result) >0){
				$respone= array();
				$code = "reg_false";
				$message = "Oopss, Email sudah digunakan.";
				array_push($respone, array("code"=>$code, "message"=>$message));
				echo json_encode(array("server_response"=>$respone));
			}else{
				$sql1="INSERT INTO user(user_email, user_pw, user_nm, user_jk, user_notelp) VALUES ('$email', '$pasword', '$nama', '$jk', '$notelp')";
				$result1=mysqli_query($con, $sql1);

				if(!$result1){
					$respone= array();
					$code = "reg_false";
					$message = "Server trouble.";
					array_push($respone, array("code"=>$code, "message"=>$message));
					echo json_encode(array("server_response"=>$respone));
					
				}else{
					$respone= array();
					$code = "reg_true";
					$message = "Anda telah terdaftar.";
					array_push($respone, array("code"=>$code, "message"=>$message));
					echo json_encode(array("server_response"=>$respone));
				}

				
			}

		}
	mysqli_close($con);

?>