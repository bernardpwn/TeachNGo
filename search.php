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
    if(isset($_POST['search'])){
		$search=$_POST['search'];
		$q=mysqli_query($conn,"SELECT * FROM Class JOIN Subject ON Class.Subject_Id = Subject.Subject_Id JOIN User ON User.User_Id= Class.User_Id WHERE User_Name LIKE '%$search%' AND Class_Status = 'Active'");
		
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
        if($mhs != null){
            $response["status"] = 1;
            $response["message"] = "Data search berhasil dibaca";
            echo json_encode($response);
        } else {
            $response["status"] = 0;
            $response["message"] = "Data class tidak ditemukan";
            echo json_encode($response);
        }
        
    }
    else{
        $response["status"] = -1;
        $response["message"] = "Keyword search tidak ada";
        echo json_encode($response);
    }
?>