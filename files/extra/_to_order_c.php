<?php  
	error_reporting(0);
	include "../admin/class/function.php";

	$requestMethod = $_SERVER['REQUEST_METHOD'];
	$func = new Functions();

	if($requestMethod == "POST"){ 
		$selectedAddressId = $func->PostData("SELECTED_ADDRESS_ID");
		
		session_start();
		$firebaseId = $_SESSION["CUSTOMER_FIREBASE_ID"];
		$metaBuff = $_SESSION['BAG'];

		$db = new Database();
		$addressArray = $db->GetCustomerAddress($firebaseId,$selectedAddressId);

		$metaData = $func->PostData("PRODUCT_META");
		$name = $addressArray['C_NAME'];
		$surname = $addressArray['SURNAME'];
		$phone = $addressArray['PHONE'];
        $email = $_SESSION["CUSTOMER_EMAIL"];
		$address = $addressArray['ADDRESS'];
		$addressName = $addressArray['ADDRESS_NAME'];
		$cityId = $addressArray['CITY_ID'];
		$provinceId = $addressArray['PROVINCE_ID'];

		$companyPersonName = $func->PostData("COMPANY_PERSEON_NAME");
		$taxNumberIdentityNo = $func->PostData("TAXNUMBER_IDENTITYNO");
		$taxAdmin = $func->PostData("TAX_ADMIN");
		$discountCode = $func->PostData("DISCOUNT_CODE");
		$totalPrice = $func->PostData("TOTAL_PRICE");
		
		
		
		if($companyPersonName == '') $companyPersonName = null;
		if($taxNumberIdentityNo == '') $taxNumberIdentityNo = null;
		if($taxAdmin == '') $taxAdmin = null;

 		if($name != ''){
			

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