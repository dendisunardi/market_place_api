<?php
include "../config/koneksi.php";

	 $username = $_POST["emil"];
	 $password = $_POST["pssword"];

	 $sql="SELECT * FROM user WHERE user_email like '$username' AND user_pw  like '$password' ";
	 $result= mysqli_query($con, $sql);

	 if(mysqli_num_rows($result) > 0){

		//$result=mysqli_query($con, $sql);
		$code="login_true";
		$row= mysqli_fetch_array($result);
		$respone= array();

		//memanggil nama pada database
		$id=$row[0];
		$email=$row[1];
		$name= $row[3];
		$jk=$row[4];
		$notelp=$row[5];
		

		//masukan variable ke array response
		array_push($respone, array("code"=>$code, "id"=>$id, "message"=>$name, "email"=>$email, "jk"=>$jk, "notelp"=>$notelp));
		//encode dan masukan array response ke server_response
		echo json_encode(array("server_response"=>$respone));

		

		//catatan : harus menggunakan echo atau printf untuk bisa di baca di android datanya
		
	}else{
		$respone= array();
		$code="login_false";
		$message= "Login Failed, try again.";

		//masukan variable ke array response
		array_push($respone, array("code"=>$code, "message"=>$message));
		//encode dan masukan array response ke server_response
		echo json_encode(array("server_response"=>$respone));
		

	}

	mysqli_close($con);
?>