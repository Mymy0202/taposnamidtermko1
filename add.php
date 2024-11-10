<?php

include('config.php');

if(isset($_POST['submit'])){
	$u_card = $_POST['card_no'];
	$u_f_name = $_POST['user_first_name'];
	$u_l_name = $_POST['user_last_name'];
	$u_father = $_POST['user_father'];
	$u_birthday = $_POST['user_dob'];
	$u_gender = $_POST['user_gender'];
	$u_email = $_POST['user_email'];
	$u_phone = $_POST['user_phone'];
	$u_address = $_POST['address'];
	$u_postal = $_POST['postal'];
	$u_mother = $_POST['user_mother'];
	$u_guardian = $_POST['guardian'];
	
	


	//image upload

	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "upload_images/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

  	$insert_data = "INSERT INTO student_data(u_card, u_f_name, u_l_name, u_father,  u_birthday, u_gender, u_email, u_phone, u_postal, u_mother, u_guardian,image,uploaded) VALUES ('$u_card','$u_f_name','$u_l_name','$u_father','$u_birthday','$u_gender','$u_email','$u_phone','$u_postal','$u_mother','$u_guardian','$image',NOW())";
  	$run_data = mysqli_query($con,$insert_data);

  	if($run_data){
		  $added = true;
  	}else{
  		echo "Data not insert";
  	}

}

?>