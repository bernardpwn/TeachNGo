<?php
#Untuk get order yang dimiliki masing-masing user berdasarkan role pada aplikasi (Completed)
#Teacher berarti melihat order yang masuk ke dia
#Student berarti melihat order yang dia pesan
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
    if(isset($_POST['userid']) && isset($_POST['userrole'])){
		$userrole=$_POST['userrole'];
        $userid=$_POST['userid'];
        $response["data"] = array();
        if ($userrole == 'Teacher'){
            $q=mysqli_query($conn,"SELECT Order_Id, Orders.Class_Id, Class.User_Id AS Student_Id, Order_Status FROM Orders JOIN Class ON Orders.Class_Id = Class.Class_Id JOIN User ON Orders.User_Id = User.User_Id WHERE Class.User_Id = $userid AND Order_Status = 'Completed'");
            while($r = $q -> fetch_assoc()){
                $mhs = array();
                $mhs["Order_Id"] = $r["Order_Id"]; 
                $mhs["Class_Id"] = $r["Class_Id"];
                $mhs["Student_Id"] = $r["Student_Id"]; // ID Student yang order
                $mhs["Order_Status"] = $r["Order_Status"];
                array_push($response["data"], $mhs);
            }
        } else {
            $q=mysqli_query($conn,"SELECT Order_Id, Orders.Class_Id, Orders.User_Id AS Teacher_Id, Order_Status FROM Orders JOIN Class ON Orders.Class_Id = Class.Class_Id JOIN User ON Orders.User_Id = User.User_Id WHERE Orders.User_Id = $userid AND Order_Status = 'Completed'");
            while($r = $q -> fetch_assoc()){
                $mhs = array();
                $mhs["Order_Id"] = $r["Order_Id"];
                $mhs["Class_Id"] = $r["Class_Id"];
                $mhs["Teacher_Id"] = $r["Teacher_Id"]; // ID Teacher yang ngajar
                $mhs["Order_Status"] = $r["Order_Status"];
                array_push($response["data"], $mhs);
        }
    }
        $response["status"] = 1;
        $response["message"] = "Data order berhasil dibaca";
        echo json_encode($response);
    }
    else{
        $response["status"] = 0;
        $response["message"] = "Tidak ada data";
        echo json_encode($response);
    }
?>
