<?php
# API yang berfungsi untuk menampilkan 3 kelas berdasarkan hasil rekomendasi
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
		$q=mysqli_query($conn,"SELECT User_Suggestion1, User_Suggestion2, User_Suggestion3 FROM User WHERE User.User_Id = $userid");
		
        $response["data"] = array();
        $mhs = array();

        while($r = $q -> fetch_assoc()){
            $mhs["User_Suggestion1"] = $r["User_Suggestion1"];
			$mhs["User_Suggestion2"] = $r["User_Suggestion2"];
            $mhs["User_Suggestion3"] = $r["User_Suggestion3"];
        }

        $user1 = $mhs["User_Suggestion1"];
        $user2 = $mhs["User_Suggestion2"];
        $user3 = $mhs["User_Suggestion3"];

        $q=mysqli_query($conn,"SELECT Class.Class_Id AS Class, Subject.Subject_Name AS Subject, User.User_Name AS User, User.User_Gender AS Gender, User.User_Photo AS Photo FROM Class JOIN Subject ON Class.Subject_Id = Subject.Subject_Id JOIN User ON Class.User_Id = User.User_Id WHERE Class.Class_Id = $user1");

        while($r = $q -> fetch_assoc()){
            $sgt = array();
            $sgt["Class_Id"] = $r["Class"];
			$sgt["Subject_Name"] = $r["Subject"];
            $sgt["User_Name"] = $r["User"];
            $sgt["User_Gender"] = $r["Gender"];
            $sgt["User_Photo"] = $r["Photo"];
            array_push($response["data"], $sgt);
        }

        $q=mysqli_query($conn,"SELECT Class.Class_Id AS Class, Subject.Subject_Name AS Subject, User.User_Name AS User, User.User_Gender AS Gender, User.User_Photo AS Photo FROM Class JOIN Subject ON Class.Subject_Id = Subject.Subject_Id JOIN User ON Class.User_Id = User.User_Id WHERE Class.Class_Id = $user2");

        while($r = $q -> fetch_assoc()){
            $sgt = array();
            $sgt["Class_Id"] = $r["Class"];
			$sgt["Subject_Name"] = $r["Subject"];
            $sgt["User_Name"] = $r["User"];
            $sgt["User_Gender"] = $r["Gender"];
            $sgt["User_Photo"] = $r["Photo"];
            array_push($response["data"], $sgt);
        }

        $q=mysqli_query($conn,"SELECT Class.Class_Id AS Class, Subject.Subject_Name AS Subject, User.User_Name AS User, User.User_Gender AS Gender, User.User_Photo AS Photo FROM Class JOIN Subject ON Class.Subject_Id = Subject.Subject_Id JOIN User ON Class.User_Id = User.User_Id WHERE Class.Class_Id = $user3");

        while($r = $q -> fetch_assoc()){
            $sgt = array();
            $sgt["Class_Id"] = $r["Class"];
			$sgt["Subject_Name"] = $r["Subject"];
            $sgt["User_Name"] = $r["User"];
            $sgt["User_Gender"] = $r["Gender"];
            $sgt["User_Photo"] = $r["Photo"];
            array_push($response["data"], $sgt);
        }
        if($mhs != null){
            $response["status"] = 1;
            $response["message"] = "Data suggestion berhasil dibaca";
            echo json_encode($response);
        } else {
            $response["status"] = 0;
            $response["message"] = "Data suggestion tidak ditemukan";
            echo json_encode($response);
        }
        
    }
    else{
        $response["status"] = -1;
        $response["message"] = "User Id tidak ada";
        echo json_encode($response);
    }
?>