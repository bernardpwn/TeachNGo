<?php
#Untuk update Profile
    header('Content-type:application/json;charset=utf-8');
	$servername = "34.101.231.16";
	$username = "root";
	$password = "capstoneproject";
	$dbname = "techngo";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
    $response = array();
    if(isset($_POST['userid']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['photo']) && isset($_POST['dob']) && isset($_POST['gender'])){
		$userid=$_POST['userid'];
        $name=$_POST['name'];
        $password=$_POST['password'];
        $phone=$_POST['phone'];
        $photo=$_POST['photo'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $pass = password_hash($password, PASSWORD_BCRYPT);
		$q=mysqli_query($conn,"UPDATE User SET User_Name = '$name', User_Pass = '$pass', User_Phone = '$phone', User_Photo = '$photo', User_DOB = '$dob', User_Gender = '$gender' WHERE User_Id=$userid");

        if($q){
            $response["status"] = 1;
            $response["message"] = "Profile berhasil diupdate";
            echo json_encode($response);
        }else{
            $response["status"]=0;
            $response["message"]="Profile gagal diupdate";
            echo json_encode($response);
        }
    }
    else{
        $response["status"] = -1;
        $response["message"] = "Tidak ada data";
        echo json_encode($response);
    }
?>