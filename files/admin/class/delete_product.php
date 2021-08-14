<?php  
	error_reporting(0);
	include "function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$productId = $func->PostData("PRODUCT_ID");

		if($productId != ''){
			session_start();
			if ($_SESSION["USERNAME"] != '' && strlen($_SESSION["PASSWORD"]) == 32) {
				$func->setHeader(200);
				$response = array();

				$db = new Database();
				if($db->DeleteProduct($productId,'../../product/')){
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
			$func->setHeader(400);
		}
	}
	else{
		$func->setHeader(405);
	}

?>