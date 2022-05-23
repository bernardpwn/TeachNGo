<?php
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
    if(isset($_POST['email'])){
		$email=$_POST['email'];
		$q=mysqli_query($conn,"SELECT * FROM User WHERE User_Email='$email'");
		
		
        $response["data"] = array();
        
        while($r = $q -> fetch_assoc()){
            $mhs = array();
            $mhs["User_Id"] = $r["User_Id"];
			$mhs["User_Name"] = $r["User_Name"];
			$mhs["User_Photo"] = $r["User_Photo"];
			$mhs["User_Role"] = $r["User_Role"];
            array_push($response["data"], $mhs);
        }
        $response["status"] = 1;
        $response["message"] = "Data user berhasil dibaca";
        echo json_encode($response);
    }
    else{
        $response["status"] = 0;
        $response["message"] = "Tidak ada data";
        echo json_encode($response);
    }
?>