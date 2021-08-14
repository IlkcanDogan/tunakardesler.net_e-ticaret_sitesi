<?php  
	error_reporting(0);
	include "../admin/class/function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$name = $func->PostData("NAME");
		$surname = $func->PostData("SURNAME");
		$birthday = $func->PostData("BIRTHDAY");
		$gender = $func->PostData("GENDER");

		session_start();
		if($name != '' && $surname != ''){
			$db = new Database();
			if($db->UpdateCustomerInfo($name,$surname,$birthday,$gender,$_SESSION["CUSTOMER_FIREBASE_ID"])){

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