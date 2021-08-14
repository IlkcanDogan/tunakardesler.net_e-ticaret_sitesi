<?php  
	error_reporting(0);
	include "function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$brandName = $func->PostData("BRAND_NAME");

		if($brandName != ''){
			session_start();
			if ($_SESSION["USERNAME"] != '' && strlen($_SESSION["PASSWORD"]) == 32) {
				$func->setHeader(200);
				$response = array();

				$db = new Database();
				$result = $db->AddBrand($brandName);
				if($result != false){
					$response["status"] = $result[0]["ID"];
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
			$func->setHeader(400);
		}
	}
	else{
		$func->setHeader(405);
	}

?>