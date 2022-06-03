<?php
#Untuk melakukan update status class Active / Inactive berdasarkan input class id serta status yang ingin di perbaharui
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
    if(isset($_POST['status']) && isset($_POST['classid'])){
		$status=$_POST['status'];
        $classid=$_POST['classid'];
		$q=mysqli_query($conn,"UPDATE Class SET Class_Status = '$status' WHERE Class_Id=$classid");

        if($q){
            $response["status"] = 1;
            $response["message"] = "Status class berhasil diupdate";
            echo json_encode($response);
        }else{
            $response["status"]=0;
            $response["message"]="Status class gagal diupdate";
            echo json_encode($response);
        }

        
    }
    else{
        $response["status"] = -1;
        $response["message"] = "Tidak ada data";
        echo json_encode($response);
    }
?>