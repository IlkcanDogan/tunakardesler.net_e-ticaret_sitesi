<?php  
	error_reporting(0);
	include "class/function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){
		$username = $func->PostData("USERNAME");
		$password = $func->PostData("PASSWORD");
		$captchaResponse   = $func->PostData("RESPONSE_CAPTCHA");

		if($username != '' && $password != '' && $captchaResponse != ''){
			$response = array();

			if(captchaValid($captchaResponse,'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx') != false){
				$func->setHeader(200);
				$db = new Database();

				if($db->LoginQuery($username,md5($password))){
					session_start();
					$_SESSION["USERNAME"] = $username;
					$_SESSION["PASSWORD"] = md5($password);

					$response["status"] = "success";
				}
				else{
					$response["status"] = "error";
				}
			}
			else{
				$response["status"] = "invalid captcha";
				
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

	function captchaValid($captcha,$secretKey){
		/*Google ReCaptcha v2 Valid Function*/
		$check = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
		return json_decode($check,true)["success"];
	}
?>