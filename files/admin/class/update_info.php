<?php
	error_reporting(0);
	include "function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$email     = $func->PostData("EMAIL");
		$phone     = $func->PostData("PHONE");
		$address   = $func->PostData("ADDRESS");
		$worktime  = $func->PostData("WORKTIME");
		$instagram = $func->PostData("INSTAGRAM");
		$whatsapp  = $func->PostData("WHATSAPP");
		$facebook  = $func->PostData("FACEBOOK");

		if($email != '' && $phone != '' && $address != '' && $worktime != '' && $instagram != '' && $whatsapp != '' && $facebook != ''){
			session_start();
			if ($_SESSION["USERNAME"] != '' && strlen($_SESSION["PASSWORD"]) == 32) {
				$func->setHeader(200);
				$response = array();

				$db = new Database();
				if($db->InfoUpdate($email,$phone,$address,$worktime,$instagram,$whatsapp,$facebook)){
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