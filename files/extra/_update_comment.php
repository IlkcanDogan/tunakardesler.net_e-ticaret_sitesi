<?php  
	error_reporting(0);
	include "../admin/class/function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$productId = $func->PostData("PRODUCT_ID");
		$comment = $func->PostData("COMMENT");
		$commentId = $func->PostData("COMMENT_ID");
		$rate = $func->PostData("RATE");
		
		session_start();
		if($productId != '' && $comment != ''){
			$db = new Database();
			if($db->UpdateComment($productId,$comment,$commentId,$rate,$_SESSION["CUSTOMER_FIREBASE_ID"])){

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