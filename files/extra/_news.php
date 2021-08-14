<?php  
	error_reporting(0);
	include "../admin/class/function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$email = $func->PostData("EMAIL");
		
		if($email != ''){
			$db = new Database();
			if($db->SubscribeNews($email)){
				header("Location: /?subscibe=ok");
			}
			else{
				header("Location: /?subscibe=error");
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