<?php  
	error_reporting(0);
	include "function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$categoryId = $func->PostData("CATEGORY_ID");
		$subcategoryId = $func->PostData("SUBCATEGORY_ID");

		if($categoryId != '' && $subcategoryId != ''){
			session_start();
			if ($_SESSION["USERNAME"] != '' && strlen($_SESSION["PASSWORD"]) == 32) {
				$func->setHeader(200);
				$response = array();

				$db = new Database();
				$result = $db->GetSubSubCategory('admin',$categoryId,$subcategoryId);
				if($result != false){
					$response["status"] = $result;
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