<?php
#Untuk menunjukkan 2 order rating terbaru untuk ditampilkan pada menu home
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
    $response["data"] = array();
	$q=mysqli_query($conn,"SELECT User_Name, Order_Rating, Order_RatingDesc FROM Orders JOIN User ON Orders.User_Id = User.User_Id WHERE Order_RatingDesc IS NOT NULL AND Order_Status = 'Completed' ORDER BY Order_Id DESC LIMIT 2");
    while($r = $q -> fetch_assoc()){
        $mhs = array();
        $mhs["User_Name"] = $r["User_Name"]; 
        $mhs["Order_Rating"] = $r["Order_Rating"];
        $mhs["Order_RatingDesc"] = $r["Order_RatingDesc"];
        array_push($response["data"], $mhs);
    }
    if($q){
        $response["status"] = 1;
        $response["message"] = "Data rating berhasil dibaca";
        echo json_encode($response);
    }else{
        $response["status"]=0;
        $response["message"]="Data rating gagal dibaca";
        echo json_encode($response);
    }
?>