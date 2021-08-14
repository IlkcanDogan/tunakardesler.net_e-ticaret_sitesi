<?php  
	error_reporting(0);
	include "function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();


	if($requestMethod == "POST"){
		$aboutMe = $func->PostData("ABOUT_ME");

		if($aboutMe != ''){
			session_start();
			if ($_SESSION["USERNAME"] != '' && strlen($_SESSION["PASSWORD"]) == 32) {
				$func->setHeader(200);
				$response = array();

				$imageInfo = ImageUpload();
				$fileNo   = $imageInfo['FILE_NO'];

				$db = new Database();
				if($db->AboutMeUpdate($aboutMe,$fileNo)){
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

	function ImageUpload($path = '../../images/'){
		$fileInfo = array();

		$randNo = rand(100000,999999);
		$fileName = basename($_FILES['IMAGE']['name']);
		$fileExt = substr($fileName, strrpos($fileName, '.') + 1);

		while (true) {
			if(file_exists($path.$randNo.'.'.$fileExt)){
				$randNo = rand(100000,999999);
			}
			else{
				break;
			}
		}

		if(move_uploaded_file($_FILES['IMAGE']['tmp_name'], $path.$randNo.'.'.$fileExt)){
			$fileInfo = array(
				'FILE_NO' => $randNo.'.'.$fileExt
			);
		}
		
		return $fileInfo;
	}

?>