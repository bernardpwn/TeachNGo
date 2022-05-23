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
    if(isset($_POST['subject_name'])){
		$subject_name=$_POST['subject_name'];
		$q=mysqli_query($conn,"SELECT * FROM Class JOIN Subject ON Class.Subject_Id = Subject.Subject_Id JOIN User ON User.User_Id= Class.User_Id WHERE Subject_Name='$subject_name'");
		
        $response["data"] = array();
        
        while($r = $q -> fetch_assoc()){
            $mhs = array();
            $mhs["Class_Id"] = $r["Class_Id"];
			$mhs["User_Name"] = $r["User_Name"];
            $mhs["Subject_Name"] = $r["Subject_Name"];
            $mhs["User_Gender"] = $r["User_Gender"];
			$mhs["User_Photo"] = $r["User_Photo"];
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