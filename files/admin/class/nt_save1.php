<?php  
	error_reporting(0);
	include "function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$string = $func->PostData("STRING");
		$color = $func->PostData("COLOR");
		$bgcolor = $func->PostData("BGCOLOR");
		$size = $func->PostData("SIZE");
		$type = $func->PostData("TYPE");

		$dataJson = '{"string":"'.$string.'","color":"'.$color.'","bgcolor":"'.$bgcolor.'","size":"'.$size.'","type":"'.$type.'"}';
		if($dataJson != ''){
			session_start();
			if ($_SESSION["USERNAME"] != '' && strlen($_SESSION["PASSWORD"]) == 32) {
				$func->setHeader(200);
				$response = array();

				$db = new Database();
				if($db->Nt_update(true,$dataJson)){
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