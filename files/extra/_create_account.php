<?php  
	error_reporting(0);
	include "../admin/class/function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$firebaseUserId = $func->PostData("FIREBASE_USER_ID");
		$name = $func->PostData("NAME");
		$surname = $func->PostData("SURNAME");
		$email = $func->PostData("EMAIL");
		$phone = $func->PostData("PHONE");
		$date = $func->PostData("DATE");
		$gender = $func->PostData("GENDER");

		if($firebaseUserId != '' && $email != '' && $name != '' && $surname != ''){
			$db = new Database();
			if($db->CreateAccount($name,$surname,$firebaseUserId,$email,$phone,$date,$gender)){
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