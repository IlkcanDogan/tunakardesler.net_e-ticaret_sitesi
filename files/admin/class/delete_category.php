<?php  
	error_reporting(0);
	include "function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$categoryId = $func->PostData("CATEGORY_ID");
		$subcategoryId = $func->PostData("SUBCATEGORY_ID");
		$subsubcategoryId = $func->PostData("SUBSUBCATEGORY_ID");

		if(($categoryId != '' && $subcategoryId != '') || $categoryId != ''){
			session_start();
			if ($_SESSION["USERNAME"] != '' && strlen($_SESSION["PASSWORD"]) == 32) {
				$func->setHeader(200);
				$response = array();

				$db = new Database();
				$result;

				if($subcategoryId != '' && $subsubcategoryId == ''){
					$result = $db->DeleteSubCategory($categoryId,$subcategoryId);
				}
				else if($subcategoryId != '' && $subsubcategoryId != ''){
					$result = $db->DeleteSubSubCategory($subsubcategoryId);
				}
				else {
					$result = $db->DeleteCategory($categoryId);
				}


				if($result){
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