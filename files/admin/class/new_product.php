<?php  
	error_reporting(0);
	include "function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();


	if($requestMethod == "POST"){
		$categoryId = $func->PostData("CATEGORY_ID");
		$subcategoryId = $func->PostData("SUBCATEGORY_ID");
		$subsubcategoryId = $func->PostData("SUBSUBCATEGORY_ID");
		$brandId = $func->PostData("BRAND_ID");
		$productStatus = $func->PostData("PRODUCT_STATUS");
		$productName = $func->PostData("PRODUCT_NAME");
		$stockQuantity = $func->PostData("STOCK_QUANTITY");
		$price = $func->PostData("PRICE");
		$detail = $_POST["DETAIL"];
		$discountType = $func->PostData("DISCOUNT_TYPE");
		$discountValue = $func->PostData("DISCOUNT_VALUE");
		$discountCode = $func->PostData("DISCOUNT_CODE");


		$sumImage = $func->PostData("SUM_IMAGE");

		if($sumImage > 0 && $categoryId != '' && $brandId != '' && $productName != '' && $stockQuantity != '' && $price != '' && $discountType != ''){
			session_start();
			if ($_SESSION["USERNAME"] != '' && strlen($_SESSION["PASSWORD"]) == 32) {
				$func->setHeader(200);
				$response = array();

				$imageInfo = ImageUpload('../../product/', $sumImage);

				if(count($imageInfo) > 0){
					$db = new Database();
					if($db->ProductSave($productName,$detail,$price,$stockQuantity,$discountType,$discountValue,$discountCode,$brandId,$productStatus,$categoryId,$subcategoryId,$subsubcategoryId,$imageInfo)){
						$response["status"] = "success";

					}
					else {
						$response["status"] = "error";
					}
				}
				else {
					$response["status"] = "error image upload";
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

	function ImageUpload($path = '../../images/',$sumImage){
		$fileInfo = array();

		for ($i=1; $i <= $sumImage; $i++) { 
			$randNo = rand(100000,999999);
			$fileName = basename($_FILES['IMAGE_'.$i]['name']);
			$fileExt = substr($fileName, strrpos($fileName, '.') + 1);

			while (true) {
				if(file_exists($path.$randNo.'.'.$fileExt)){
					$randNo = rand(100000,999999);
				}
				else{
					break;
				}
			}

			if(move_uploaded_file($_FILES['IMAGE_'.$i]['tmp_name'], $path.$randNo.'.'.$fileExt)){
				$fileInfo['FILE_NO_'.$i] = $randNo.'.'.$fileExt;
				CreateLargeImage($randNo.'.'.$fileExt,900,900);
			}	
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