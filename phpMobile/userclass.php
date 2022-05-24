<?php
#Untuk get Class yang diajar berdasarkan User Id
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
		$q=mysqli_query($conn,"SELECT * FROM Class JOIN Subject ON Class.Subject_Id = Subject.Subject_Id JOIN User ON User.User_Id = Class.User_Id WHERE Class.User_Id=$userid");

        $response["data"] = array();
  
        while($r = $q -> fetch_assoc()){
            $mhs = array();
			$mhs["User_Name"] = $r["User_Name"];
            $mhs["Subject_Name"] = $r["Subject_Name"];
            $mhs["Class_Status"] = $r["Class_Status"];
			$mhs["Class_Creation"] = $r["Class_Creation"];
            array_push($response["data"], $mhs);
        }
        $response["status"] = 1;
        $response["message"] = "Data class berhasil dibaca";
        echo json_encode($response);
    }
    else{
        $response["status"] = 0;
        $response["message"] = "Tidak ada data";
        echo json_encode($response);
    }
?>