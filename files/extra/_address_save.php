<?php  
	error_reporting(0);
	include "../admin/class/function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$name = $func->PostData("NAME");
		$surname = $func->PostData("SURNAME");
		$phone = $func->PostData("PHONE");
		$addressName = $func->PostData("ADDRESS_NAME");
		$address = $func->PostData("ADDRESS");
		$cityId = $func->PostData("CITY_ID");
		$provinceId = $func->PostData("PROVINCE_ID");
		
		session_start();
		if($name != ''){
			$db = new Database();
			if($db->CustomerNewAddress($name,$surname,$phone,$addressName,$address,$cityId,$provinceId,$_SESSION["CUSTOMER_FIREBASE_ID"])) {
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