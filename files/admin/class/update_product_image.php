<?php  
	error_reporting(0);
	include "function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();


	if($requestMethod == "POST"){
		$imageId = $func->PostData("IMAGE_ID");
		$imageName = $func->PostData("IMAGE_NAME");

		if(true){
			session_start();
			if ($_SESSION["USERNAME"] != '' && strlen($_SESSION["PASSWORD"]) == 32) {
				$func->setHeader(200);
				$response = array();

				$imageInfo = ImageUpload();
				$fileNo   = $imageInfo['FILE_NO'];

				$db = new Database();
				if($db->UpdateProductImage($fileNo,$imageId)){
					unlink('../../product/'.$imgName);
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

	function ImageUpload($path = '../../product/'){
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
			CreateLargeImage($randNo.'.'.$fileExt,900,900);
		}
		
		return $fileInfo;
	}

	function CreateLargeImage($fileName,$newWidth,$newHeight){
		$filename = '../../product/large/'.$fileName; // output file name

		$im = imagecreatefromstring(file_get_contents('../../product/'.$fileName));
		$source_width = imagesx($im);
		$source_height = imagesy($im);
		$ratio =  $source_height / $source_width;

		$new_width = $newWidth; // assign new width to new resized image
		$new_height = $newHeight;

		$thumb = imagecreatetruecolor($new_width, $new_height);

		$transparency = imagecolorallocatealpha($thumb, 255, 255, 255, 127);
		imagefilledrectangle($thumb, 0, 0, $new_width, $new_height, $transparency);

		imagecopyresampled($thumb, $im, 0, 0, 0, 0, $new_width, $new_height, $source_width, $source_height);
		imagepng($thumb, $filename, 9);
		imagedestroy($im);
	}

?>