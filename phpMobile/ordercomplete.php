<?php
#Untuk menyelesaikan order
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
    if(isset($_POST['orderid'])){
		$orderid=$_POST['orderid'];
		$q=mysqli_query($conn,"Update Orders SET Order_Status = 'Completed' WHERE Order_Id = $orderid");
		
        if($q){
            $response["status"] = 1;
            $response["message"] = "Status order berhasil diupdate";
            echo json_encode($response);
        } else {
            $response["success"]=0;
            $response["message"]="Status order gagal diupdate";
            echo json_encode($response);
        }
    }
    else{
        $response["status"] = -1;
        $response["message"] = "Tidak ada data";
        echo json_encode($response);
    }
?>
