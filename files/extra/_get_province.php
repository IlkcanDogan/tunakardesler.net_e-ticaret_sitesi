<?php  
	error_reporting(0);
	include "../admin/class/function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$cityId = $func->PostData("CITY_ID");
		
		session_start();
		if($cityId != ''){
			$db = new Database();
			$provinceArray = $db->CustomerGetProvince($cityId);
			if(count($provinceArray) > 0){

				$response["status"] = $provinceArray;
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