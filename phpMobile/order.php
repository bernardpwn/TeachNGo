<?php
#Untuk membuat order baru berdasarkan class_id yang dipilih
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
    if(isset($_POST['classid']) && isset($_POST['userid'])){
		$classid=$_POST['classid'];
        $userid=$_POST['userid'];
		$q=mysqli_query($conn,"INSERT INTO Orders (Order_Date, Class_Id, User_Id) VALUES (curdate(), $classid, $userid)");
        $response["data"] = array();
  
        if($q){
            $response["status"] = 1;
            $response["message"] = "Data order berhasil ditambah";
            echo json_encode($response);
        }else{
            $response["success"]=0;
            $response["message"]="Data order gagal ditambah";
            echo json_encode($response);
        }
    }
    else{
        $response["status"] = -1;
        $response["message"] = "Tidak ada data";
        echo json_encode($response);
    }
?>