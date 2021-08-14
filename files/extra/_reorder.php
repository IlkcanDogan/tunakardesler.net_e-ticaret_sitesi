<?php  
	error_reporting(0);
	include "../admin/class/function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$orderId = $func->PostData("ORDER_ID");
		
		session_start();
		if($orderId != ''){
			$db = new Database();
			if($db->CustomerReOrder($orderId,$_SESSION["CUSTOMER_FIREBASE_ID"])){

				$response["status"] = "success";
			}
			else{
				$response["status"] = "error";
			}
			
			echo $func->json($response);
		}
		else{
			$func->setHeader(400);
		}
	}
	else{
		$func->setHeader(405);
	}

?>