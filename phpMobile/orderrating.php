<?php
#Untuk melakukan update data rating pada tabel order setiap user menyelesaikan order (KHUSUS STUDENT)
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
    if(isset($_POST['orderid']) && isset($_POST['orderrating']) && isset($_POST['orderdesc'])){
		$orderid=$_POST['orderid'];
        $orderrating=$_POST['orderrating'];
        $orderdesc=$_POST['orderdesc'];
		$q=mysqli_query($conn,"Update Orders SET Order_Rating = $orderrating, Order_RatingDesc = '$orderdesc' WHERE Order_Id = $orderid");
		
        if($q){
            $response["status"] = 1;
            $response["message"] = "Rating order berhasil diupdate";
            echo json_encode($response);
        } else {
            $response["status"]=0;
            $response["message"]="Rating order gagal diupdate";
            echo json_encode($response);
        }
    }
    else{
        $response["status"] = -1;
        $response["message"] = "Tidak ada data";
        echo json_encode($response);
    }
?>