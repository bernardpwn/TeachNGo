<?php
# API yang berfungsi untuk mendapatkan detail user berdasarkan user id yang dikirim dari mobile app
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
    if(isset($_POST['userid'])){
		$userid=$_POST['userid'];
		$q=mysqli_query($conn,"SELECT * FROM User WHERE User_Id=$userid");
		
		
        $response["data"] = array();
        
        while($r = $q -> fetch_assoc()){
            $mhs = array();
            $mhs["User_Id"] = $r["User_Id"];
			$mhs["User_Name"] = $r["User_Name"];
            $mhs["User_Email"] = $r["User_Email"];
            $mhs["User_Phone"] = $r["User_Phone"];
            $mhs["User_Gender"] = $r["User_Gender"];
            $mhs["User_DOB"] = $r["User_DOB"];
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