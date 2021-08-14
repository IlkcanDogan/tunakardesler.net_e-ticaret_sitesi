<?php  
	error_reporting(0);
	include "../admin/class/function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$email = $func->PostData("EMAIL");
		$firebaseId = $func->PostData("FIREBASE_ID");
		
		if($email != '' && $firebaseId != ''){
			$db = new Database();
			if($db->CustomerLogin($email,$firebaseId)){
				session_start();
				$_SESSION["CUSTOMER_EMAIL"] = $email;
				$_SESSION["CUSTOMER_FIREBASE_ID"] = $firebaseId;

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