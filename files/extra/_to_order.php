<?php  
	error_reporting(0);
	include "../admin/class/function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){ 
		$metaData = $func->PostData("PRODUCT_META");
		$name = $func->PostData("NAME");
		$surname = $func->PostData("SURNAME");
		$phone = $func->PostData("PHONE");
        $email = $func->PostData("EMAIL");
		$address = $func->PostData("ADDRESS");
		$addressName = $func->PostData("ADDRESS_NAME");
		$cityId = $func->PostData("CITY_ID");
		$provinceId = $func->PostData("PROVINCE_ID");
		$companyPersonName = $func->PostData("COMPANY_PERSEON_NAME");
		$taxNumberIdentityNo = $func->PostData("TAXNUMBER_IDENTITYNO");
		$taxAdmin = $func->PostData("TAX_ADMIN");
		$discountCode = $func->PostData("DISCOUNT_CODE");
		$totalPrice = $func->PostData("TOTAL_PRICE");
		
		session_start();
		$firebaseId = $_SESSION["CUSTOMER_FIREBASE_ID"];
		$metaBuff = $_SESSION['BAG'];
		
		if($companyPersonName == '') $companyPersonName = null;
		if($taxNumberIdentityNo == '') $taxNumberIdentityNo = null;
		if($taxAdmin == '') $taxAdmin = null;

 		if($name != ''){
			$db = new Database();

			if($discountCode !== ''){
				if($db->DiscountVerify($discountCode)){
					if($db->ToOrder($totalPrice,$name,$surname,$phone,$email,$address,$addressName,$cityId,$provinceId,$companyPersonName,$taxNumberIdentityNo,$taxAdmin,$discountCode,$firebaseId,$metaBuff)){
						$response["status"] = "success";
					}
					else{
						$response["status"] = "error";
					}
				}
				else{
					$response["status"] = "discount-error";
				}
			}
			else{

				if($db->ToOrder($totalPrice,$name,$surname,$phone,$email,$address,$addressName,$cityId,$provinceId,$companyPersonName,$taxNumberIdentityNo,$taxAdmin,$discountCode,$firebaseId,$metaBuff)){
					$response["status"] = "success";
				}
				else{
					$response["status"] = "error";
				}

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