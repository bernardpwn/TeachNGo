<?php
#Untuk update Suggest di table user dengan 3 input berupa 3 class suggetion berdasarkan hasil prediksi model
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
    if(isset($_POST['userid']) && isset($_POST['suggest1']) && isset($_POST['suggest2']) && isset($_POST['suggest3'])){
		$userid=$_POST['userid'];
        $suggest1=$_POST['suggest1'];
        $suggest2=$_POST['suggest2'];
        $suggest3=$_POST['suggest3'];
		$q=mysqli_query($conn,"UPDATE User SET User_Suggestion1 = '$suggest1', User_Suggestion2 = '$suggest2', User_Suggestion3 = '$suggest3' WHERE User_Id=$userid");

        if($q){
            $response["status"] = 1;
            $response["message"] = "Suggestion berhasil diupdate";
            echo json_encode($response);
        }else{
            $response["status"]=0;
            $response["message"]="Suggestion gagal diupdate";
            echo json_encode($response);
        }
    }
    else{
        $response["status"] = -1;
        $response["message"] = "Tidak ada data";
        echo json_encode($response);
    }
?>