<?php
#Untuk input verif
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
    if(isset($_POST['idcard']) && isset($_POST['teachexp']) && isset($_POST['userid']) && isset($_POST['subject'])  && isset($_POST['score'])){
		$idcard=$_POST['idcard'];
        $teachexp=$_POST['teachexp'];
        $userid=$_POST['userid'];
        $subject=$_POST['subject'];
        $score=$_POST['score'];
		$q=mysqli_query($conn,"INSERT INTO Verification (Verif_Creation, IdCard, TeachExp, User_Id, Subject_Id, Verif_Score) VALUES (NOW(), '$idcard', $teachexp, $userid, (SELECT Subject_Id FROM Subject WHERE Subject_Name = '$subject'), $score)");
  
        if($q){
            $response["status"] = 1;
            $response["message"] = "Data verif berhasil ditambah";
            echo json_encode($response);
        }else{
            $response["success"]=0;
            $response["message"]="Data verif gagal ditambah";
            echo json_encode($response);
        }
    }
    else{
        $response["status"] = -1;
        $response["message"] = "Tidak ada data";
        echo json_encode($response);
    }
?>