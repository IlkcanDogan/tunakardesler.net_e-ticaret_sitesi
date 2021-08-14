<?php
    error_reporting(1);

    class Database{
    	public static $db;
    	function __construct($host="xxxxxxxxxxxxxxxxxxxxxx",$db_name="xxxxxxxxxxxxxxxxxxxxxx",$db_username="xxxxxxxxxxxxxxxxxxxxxx",$db_password="xxxxxxxxxxxxxxxxxxxxxx"){
    		try {
    			self::$db = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8",$db_username,$db_password);
    		} catch (PDOException $hata) {
    			echo "Database Connection Failed!".$hata;
    		}
    	}

        function LoginQuery($username,$b_password){
            $query = self::$db->prepare("SELECT * FROM tb_admin WHERE USERNAME=:username AND PWD=:pwd");
            $query->execute([
                ':username' => $username,
                ':pwd' => $b_password 
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function UsernameUpdate($newUsername){
            $query = self::$db->prepare("UPDATE tb_admin SET USERNAME = :new_username");
            $query->execute([
                ':new_username' => $newUsername
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function PasswordUpdate($newPassword){
            $query = self::$db->prepare("UPDATE tb_admin SET PWD = :new_pwd");
            $query->execute([
                ':new_pwd' => $newPassword
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function GetInfos(){
            $query = self::$db->prepare("SELECT * FROM tb_info");
            $query->execute();

            return $query->fetchAll();
        }

        function Nt_update($s,$data){
        	if($s == true){
        		$s = "STRING_JSON_1";
        	}
        	else{
        		$s = "STRING_JSON_2";
        	}

        	$query = self::$db->prepare("UPDATE tb_info SET ".$s." = '".$data."'");
        	$query->execute();

        	if($query->rowCount() > 0){
        		return true;
        	}
        	else{
        		return false;
        	}
        }

        function GlobalUpdate($colorHex,$radius){
            $query = self::$db->prepare("UPDATE tb_info SET GLOBAL_COLOR = :color, GLOBAL_RADIUS = :radius");
            $query->execute([
                ':color' => $colorHex,
                ':radius' => $radius
            ]);
            
            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function InfoUpdate($email,$phone,$address,$worktime,$instagram,$whatsapp,$facebook){
            $query = self::$db->prepare("UPDATE tb_info SET EMAIL = :email, PHONE = :phone, ADDRESS = :address, WORKTIME = :worktime, INSTAGRAM = :instagram, WHATSAPP = :whatsapp, FACEBOOK = :facebook");
            $query->execute([
                ':email' => $email,
                ':phone' => $phone,
                ':address' => $address,
                ':worktime' => $worktime,
                ':instagram' => $instagram,
                ':whatsapp' => $whatsapp,
                ':facebook' => $facebook
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function AboutMeUpdate($aboutMe,$fileNo){
            $query = '';

            if($fileNo){
                $query = self::$db->prepare("UPDATE tb_info SET ABOUT_ME = :about_me, PHOTO_NAME = :photo_name");
                $query->execute([
                    ':about_me' => $aboutMe,
                    ':photo_name' => $fileNo
                ]);
            }
            else{
                $query = self::$db->prepare("UPDATE tb_info SET ABOUT_ME = :about_me");
                $query->execute([
                    ':about_me' => $aboutMe
                ]);
            }

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
            
        }
        
        function CategoryIconUpdate($fileNo){
            $query = self::$db->prepare("UPDATE tb_info SET CATEGORY_ICON = :icon");
            $query->execute([
                ':icon' => $fileNo
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function GetCargo(){
            $query = self::$db->prepare("SELECT CARGO_PRICE,CARGO_PRICE_LIMIT from tb_info");
            $query->execute([]);

            return $query->fetchAll();
        }
        
        function CargoPriceUpdate($price){
            $query = self::$db->prepare("UPDATE tb_info SET CARGO_PRICE = :price");
            $query->execute([
                ':price' => $price
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }

        }

        function CargoPriceLimitUpdate($price){
            $query = self::$db->prepare("UPDATE tb_info SET CARGO_PRICE_LIMIT = :price");
            $query->execute([
                ':price' => $price
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }

        }

        /***********************************************************/
        function SlideImageUpload($fileNo,$brandId){
            $query = self::$db->prepare("INSERT INTO tb_slider(IMG_NAME,ROUTE_BRAND_ID) VALUES(:img_name,:brand_id)");
            $query->execute([
                ':img_name' => $fileNo,
                ':brand_id' => $brandId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function SlideUpdate($fileNo,$brandId,$slideId){
            if($fileNo != ''){
                $query = self::$db->prepare("UPDATE tb_slider SET IMG_NAME = :img_name, ROUTE_BRAND_ID = :brand_id WHERE ID = :slide_id");
                $query->execute([
                    ':img_name' => $fileNo,
                    ':brand_id' => $brandId,
                    ':slide_id' => $slideId
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
            }else{
                $query = self::$db->prepare("UPDATE tb_slider SET ROUTE_BRAND_ID = :brand_id WHERE ID = :slide_id");
                $query->execute([
                    ':brand_id' => $brandId,
                    ':slide_id' => $slideId
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        function GetSlideImages(){
            $query = self::$db->prepare("SELECT * FROM tb_slider");
            $query->execute();

            return $query->fetchAll();
        }

        function SlideImageDelete($imgId){
            $query = self::$db->prepare("DELETE FROM tb_slider WHERE ID = :img_id");
            $query->execute([
                ':img_id' => $imgId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }
        /***********************************************************/

        /***********************************************************/
        function PosterImageUpload($fileNo,$mainId,$primaryId,$secondaryId,$productId){
            $query = self::$db->prepare("INSERT INTO tb_poster(IMG_NAME,MAIN_ID,PRIMARY_ID,SECONDARY_ID,PRODUCT_ID) VALUES(:img_name,:id1,:id2,:id3,:id4)");
            $query->execute([
                ':img_name' => $fileNo,
                ':id1' => $mainId,
                ':id2' => $primaryId,
                ':id3' => $secondaryId,
                ':id4' => $productId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function PosterImageUpdate($fileNo,$mainId,$primaryId,$secondaryId,$productId,$posterId){
           if($primaryId == 'Seç...') $primaryId = 0;
           if($secondaryId == 'Seç...') $secondaryId = 0;
           if($productId == 'Seç...') $productId = 0;
           if($mainId == 'Seç...') $mainId = 0;

           if($fileNo != ''){
                $query = self::$db->prepare("UPDATE tb_poster SET IMG_NAME = :img_name, MAIN_ID = :id1, PRIMARY_ID = :id2, SECONDARY_ID = :id3 ,PRODUCT_ID = :id4 WHERE ID = :poster_id");
                $query->execute([
                    ':img_name' => $fileNo,
                    ':id1' => $mainId,
                    ':id2' => $primaryId,
                    ':id3' => $secondaryId,
                    ':id4' => $productId,
                    ':poster_id' => $posterId
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
           }
           else{
                $query = self::$db->prepare("UPDATE tb_poster SET MAIN_ID = :id1, PRIMARY_ID = :id2, SECONDARY_ID = :id3 ,PRODUCT_ID = :id4 WHERE ID = :poster_id");
                $query->execute([
                    ':id1' => $mainId,
                    ':id2' => $primaryId,
                    ':id3' => $secondaryId,
                    ':id4' => $productId,
                    ':poster_id' => $posterId
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
           }
        }

        function AdvertImageUpdate($fileNo,$mainId,$primaryId,$secondaryId,$productId,$advId){
           if($primaryId == 'Seç...') $primaryId = 0;
           if($secondaryId == 'Seç...') $secondaryId = 0;
           if($productId == 'Seç...') $productId = 0;
           if($mainId == 'Seç...') $mainId = 0;

           if($fileNo != ''){
                $query = self::$db->prepare("UPDATE tb_advert SET IMG_NAME = :img_name, MAIN_ID = :id1, PRIMARY_ID = :id2, SECONDARY_ID = :id3 ,PRODUCT_ID = :id4 WHERE ID = :advert_id");
                $query->execute([
                    ':img_name' => $fileNo,
                    ':id1' => $mainId,
                    ':id2' => $primaryId,
                    ':id3' => $secondaryId,
                    ':id4' => $productId,
                    ':advert_id' => $advId
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
           }
           else{
                $query = self::$db->prepare("UPDATE tb_advert SET MAIN_ID = :id1, PRIMARY_ID = :id2, SECONDARY_ID = :id3 ,PRODUCT_ID = :id4 WHERE ID = :advert_id");
                $query->execute([
                    ':id1' => $mainId,
                    ':id2' => $primaryId,
                    ':id3' => $secondaryId,
                    ':id4' => $productId,
                    ':advert_id' => $advId
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
           }
        }

        function GetPosterImages(){
            $query = self::$db->prepare("SELECT * FROM tb_poster");
            $query->execute();

            return $query->fetchAll();
        }

        function PosterImageDelete($imgId){
            $query = self::$db->prepare("DELETE FROM tb_poster WHERE ID = :img_id");
            $query->execute([
                ':img_id' => $imgId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }
        /***********************************************************/

        /***********************************************************/
        function AdvertImageUpload($fileNo,$mainId,$primaryId,$secondaryId,$productId){
            $query = self::$db->prepare("INSERT INTO tb_advert(IMG_NAME,MAIN_ID,PRIMARY_ID,SECONDARY_ID,PRODUCT_ID) VALUES(:img_name,:id1,:id2,:id3,:id4)");
            $query->execute([
                ':img_name' => $fileNo,
                ':id1' => $mainId,
                ':id2' => $primaryId,
                ':id3' => $secondaryId,
                ':id4' => $productId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function GetAdvertImages(){
            $query = self::$db->prepare("SELECT * FROM tb_advert");
            $query->execute();

            return $query->fetchAll();
        }

        function AdvertImageDelete($imgId){
            $query = self::$db->prepare("DELETE FROM tb_advert WHERE ID = :img_id");
            $query->execute([
                ':img_id' => $imgId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }
        /***********************************************************/

        /***********************************************************/
        function GetCategory($type='admin'){
            if($type == 'admin'){
                $query = self::$db->prepare("SELECT * FROM tb_category GROUP BY ID ASC;");
                $query->execute();

                return $query->fetchAll();
            }
        }

        function AddCategory($name){
            $query = self::$db->prepare("SELECT ID from tb_category WHERE CATEGORY_NAME = :category_name");
            $query->execute([
                ':category_name' => $name
            ]);

            if($query->rowCount() > 0){
                return false;
            }
            else{
                $query = self::$db->prepare("INSERT INTO tb_category(CATEGORY_NAME) VALUES(:category_name)");
                $query->execute([
                    ':category_name' => $name
                ]);

                if($query->rowCount() > 0){
                    $query = self::$db->prepare("SELECT ID from tb_category WHERE CATEGORY_NAME = :category_name GROUP BY ID DESC LIMIT 1");
                    $query->execute([
                        ':category_name' => $name
                    ]);

                    return $query->fetchAll();
                }
                else{
                    return false;
                }
            }
        }
        
        function DeleteCategory($id){
            $query = self::$db->prepare("DELETE FROM tb_category WHERE ID = :category_id");
            $query->execute([
                ':category_id' => $id
            ]);

            if($query->rowCount() > 0){
                $query = self::$db->prepare("DELETE FROM tb_product WHERE PRODUCT_CATEGORY = :category_id");
                $query->execute([
                    ':category_id' => $id
                ]);

                return true;
                
            }
            else{
                return false;
            }
        }
        /***********************************************************/

        /***********************************************************/

        function GetSubCategory($type='admin', $categoryId){
            if($type == 'admin'){
                $query = self::$db->prepare("SELECT * FROM tb_sub_category WHERE CATEGORY_ID = :category_id");
                $query->execute([
                    ':category_id' => $categoryId
                ]);

                return $query->fetchAll();
            }
        }

        function AddSubCategory($categoryId,$subcategoryName){
            $query = self::$db->prepare("SELECT ID from tb_sub_category WHERE CATEGORY_ID = :category_id and SUB_CATEGORY_NAME = :sub_category_name");
            $query->execute([
                ':category_id' => $categoryId,
                ':sub_category_name' => $subcategoryName
            ]);

            if($query->rowCount() > 0){
                return false;
            }
            else{
                $query = self::$db->prepare("INSERT INTO tb_sub_category(CATEGORY_ID,SUB_CATEGORY_NAME) VALUES(:category_id,:sub_category_name)");
                $query->execute([
                    ':category_id' => $categoryId,
                    ':sub_category_name' => $subcategoryName
                ]);

                if($query->rowCount() > 0){

                    $query = self::$db->prepare("SELECT ID from tb_sub_category WHERE CATEGORY_ID = :category_id and SUB_CATEGORY_NAME = :sub_category_name GROUP BY ID DESC LIMIT 1");
                    $query->execute([
                        ':category_id' => $categoryId,
                        ':sub_category_name' => $subcategoryName
                    ]);

                    return $query->fetchAll();
                }
                else{
                    return false;
                }
            }
        }

        function DeleteSubCategory($id,$subId){
            $query = self::$db->prepare("DELETE FROM tb_sub_category WHERE ID = :sub_category_id and CATEGORY_ID = :category_id");
            $query->execute([
                ':sub_category_id' => $subId,
                ':category_id'     => $id
            ]);

            if($query->rowCount() > 0){
                $query = self::$db->prepare("DELETE FROM tb_product WHERE PRODUCT_SUB_CATEGORY = :sub_category_id and PRODUCT_CATEGORY = :category_id");
                $query->execute([
                    ':sub_category_id' => $subId,
                    ':category_id'     => $id
                ]);
                return true;
                
            }
            else{
                return false;
            }
        }

        /***********************************************************/
        /***********************************************************/
        function xGetCategoryName($id){
            $query = self::$db->prepare("SELECT CATEGORY_NAME FROM tb_category WHERE ID =:id");
            $query->execute([
                ':id' => $id
            ]);
            return $query->fetchAll()[0]['CATEGORY_NAME'];
        }

        function xGetPrimaryCategoryName($id){
            $query = self::$db->prepare("SELECT SUB_CATEGORY_NAME FROM tb_sub_category WHERE ID =:id");
            $query->execute([
                ':id' => $id
            ]);
            return $query->fetchAll()[0]['SUB_CATEGORY_NAME'];
        }

        function xGetSecondaryCategoryName($id){
            $query = self::$db->prepare("SELECT SUB_SUB_CATEGORY_NAME FROM tb_sub_sub_category WHERE ID =:id");
            $query->execute([
                ':id' => $id
            ]);
            return $query->fetchAll()[0]['SUB_SUB_CATEGORY_NAME'];
        }

        /***********************************************************/
        /***********************************************************/
        function GetSubSubCategory($type='admin', $categoryId,$subcategoryId){
            if($type == 'admin'){
                $query = self::$db->prepare("SELECT * FROM tb_sub_sub_category WHERE CATEGORY_ID = :category_id AND SUB_CATEGORY_ID = :sub_category_id");
                $query->execute([
                    ':category_id' => $categoryId,
                    ':sub_category_id' => $subcategoryId
                ]);

                return $query->fetchAll();
            }
        }

        function AddSubSubCategory($categoryId,$subCategoryId,$subsubcategoryName){
            $query = self::$db->prepare("SELECT ID from tb_sub_sub_category WHERE CATEGORY_ID = :category_id and SUB_CATEGORY_ID = :sub_category_id and SUB_SUB_CATEGORY_NAME = :name");
            $query->execute([
                ':category_id' => $categoryId,
                ':sub_category_id' => $subCategoryId,
                ':name' => $subsubcategoryName
            ]);

            if($query->rowCount() > 0){
                return false;
            }
            else{
                $query = self::$db->prepare("INSERT INTO tb_sub_sub_category(CATEGORY_ID,SUB_CATEGORY_ID,SUB_SUB_CATEGORY_NAME) VALUES(:category_id,:sub_category_id,:name)");
                $query->execute([
                    ':category_id' => $categoryId,
                    ':sub_category_id' => $subCategoryId,
                    ':name' => $subsubcategoryName
                ]);

                if($query->rowCount() > 0){

                    $query = self::$db->prepare("SELECT ID from tb_sub_sub_category WHERE CATEGORY_ID = :category_id and SUB_CATEGORY_ID = :sub_category_id AND SUB_SUB_CATEGORY_NAME = :name GROUP BY ID DESC LIMIT 1");
                    $query->execute([
                        ':category_id' => $categoryId,
                        ':sub_category_id' => $subCategoryId,
                        ':name' => $subsubcategoryName
                    ]);

                    return $query->fetchAll();
                }
                else{
                    return false;
                }
            }
        }

        function DeleteSubSubCategory($sub2Id){
            $query = self::$db->prepare("DELETE FROM tb_sub_sub_category WHERE ID = :sub2_id");
            $query->execute([
                ':sub2_id' => $sub2Id
            ]);

            if($query->rowCount() > 0){
                /*$query = self::$db->prepare("DELETE FROM tb_product WHERE PRODUCT_SUB_CATEGORY = :sub_category_id and PRODUCT_CATEGORY = :category_id");
                $query->execute([ Product tablosuna subsub kategori eklendiğinde aktif edilecek.
                    ':sub_category_id' => $subId,
                    ':category_id'     => $id
                ]);*/
                return true;
                
            }
            else{
                return false;
            }
        }

        function Rename($type,$newName,$id){
            if($type == "R1"){
                $query = self::$db->prepare("UPDATE tb_category SET CATEGORY_NAME = :name WHERE ID = :id");
                $query->execute([
                    ':name' => $newName,
                    ':id' => $id
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
            }
            else if($type == "R2"){
                $query = self::$db->prepare("UPDATE tb_sub_category SET SUB_CATEGORY_NAME = :name WHERE ID = :id");
                $query->execute([
                    ':name' => $newName,
                    ':id' => $id
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
            }
            else if($type == "R3"){
                $query = self::$db->prepare("UPDATE tb_sub_sub_category SET SUB_SUB_CATEGORY_NAME = :name WHERE ID = :id");
                $query->execute([
                    ':name' => $newName,
                    ':id' => $id
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
            }
            else if($type == "R4"){
                $query = self::$db->prepare("UPDATE tb_product_brand SET BRAND_NAME = :name WHERE ID = :id");
                $query->execute([
                    ':name' => $newName,
                    ':id' => $id
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
            }

            
        }
        /***********************************************************/
        /***********************************************************/
        function GetBrand($type='admin'){
            if($type == 'admin'){
                $query = self::$db->prepare("SELECT * FROM tb_product_brand");
                $query->execute();

                return $query->fetchAll();
            }
        }

        function DiscountColorUpdate($bgcolor,$frcolor){
            $query = self::$db->prepare("UPDATE tb_info SET TOP_LEFT_BGCOLOR = :c1 , TOP_LEFT_FRCOLOR = :c2");
            $query->execute([
                ':c1' => $bgcolor,
                ':c2' => $frcolor
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function NewProductColorUpdate($bgcolor,$frcolor){
            $query = self::$db->prepare("UPDATE tb_info SET NEW_TOP_RIGHT_BGCOLOR = :c1 , NEW_TOP_RIGHT_FRCOLOR = :c2");
            $query->execute([
                ':c1' => $bgcolor,
                ':c2' => $frcolor
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function WebProductColorUpdate($bgcolor,$frcolor){
            $query = self::$db->prepare("UPDATE tb_info SET WEB_TOP_RIGHT_BGCOLOR = :c1 , WEB_TOP_RIGHT_FRCOLOR = :c2");
            $query->execute([
                ':c1' => $bgcolor,
                ':c2' => $frcolor
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function AddBrand($name){
            $query = self::$db->prepare("SELECT ID from tb_product_brand WHERE BRAND_NAME = :brand_name");
            $query->execute([
                ':brand_name' => $name
            ]);

            if($query->rowCount() > 0){
                return false;
            }
            else{
                $query = self::$db->prepare("INSERT INTO tb_product_brand(BRAND_NAME) VALUES(:brand_name)");
                $query->execute([
                    ':brand_name' => $name
                ]);

                if($query->rowCount() > 0){
                    $query = self::$db->prepare("SELECT ID from tb_product_brand WHERE BRAND_NAME = :brand_name GROUP BY ID DESC LIMIT 1");
                    $query->execute([
                        ':brand_name' => $name
                    ]);

                    return $query->fetchAll();
                }
                else{
                    return false;
                }
            }
        }

        function DeleteBrand($id){
            $query = self::$db->prepare("DELETE FROM tb_product_brand WHERE ID = :brand_id");
            $query->execute([
                ':brand_id' => $id
            ]);

            if($query->rowCount() > 0){
                $query = self::$db->prepare("DELETE FROM tb_product WHERE PRODUCT_BRAND = :brand_id");
                $query->execute([
                    ':brand_id' => $id
                ]);

                return true;
                
            }
            else{
                return false;
            }
        }
        /***********************************************************/

        /***********************************************************/
        function ProductSave($name,$detail,$price,$stockQuantity,$discountType,$discount,$discountCode,$brandId,$productStatus,$categoryId,$subcategoryId,$subsubcategoryId,$imagesArray){
            if($discountType == 'NONE'){
                $discountType = null;
                $discount = '';
                $discountCode = '';
            }

            if($discountType == 'ZERO'){
                $discountType = false;
            }

            if($discountType == 'ONE'){
                $discountType = 1;
            }

            if($subcategoryId == ''){
                $subcategoryId = null;
            }

            $query = self::$db->prepare("INSERT INTO tb_product(PRODUCT_NAME, PRODUCT_DETAIL, PRODUCT_PRICE, PRODUCT_STOCK_QUANTITY, PRODUCT_DISCOUNT_TYPE, PRODUCT_DISCOUNT, PRODUCT_DISCOUNT_CODE, PRODUCT_BRAND, PRODUCT_CATEGORY, PRODUCT_SUB_CATEGORY, PRODUCT_SUB_SUB_CATEGORY,PRODUCT_TOP_STATUS) VALUES(:name,:detail,:price,:stock_quantity,:discount_type,:discount,:discount_code,:brand,:category_id,:subcategory_id,:subsub,:status)");
            $query->execute([
                ':name' => $name,
                ':detail' => $detail,
                ':price' => $price,
                ':stock_quantity' => $stockQuantity,
                ':discount_type' => $discountType,
                ':discount' => $discount,
                ':discount_code' => $discountCode,
                ':brand' => $brandId,
                ':category_id' => $categoryId,
                ':subcategory_id' => $subcategoryId,
                ':subsub' => $subsubcategoryId,
                ':status' => $productStatus
            ]);

            if($query->rowCount() > 0){
                $query = self::$db->prepare("SELECT ID FROM tb_product GROUP BY ID DESC");
                $query->execute();

                $lastId = $query->fetchAll()[0]["ID"];

                for ($i=1; $i <= count($imagesArray); $i++) { 
                    $imgName = $imagesArray["FILE_NO_".$i];

                    $query = self::$db->prepare("INSERT INTO tb_product_images(PRODUCT_ID,PRODUCT_IMAGE_NAME) VALUES(:product_id,:product_image_name)");
                    $query->execute([
                        ':product_id' => $lastId,
                        ':product_image_name' => $imgName
                    ]);

                    if($query->rowCount() == 0){
                        break;
                        return false;
                    }
                }

                return true;
            }
            else{
                return false;
            }
        }

        function ProductUpdate($productId,$name,$detail,$price,$stockQuantity,$discountType,$discount,$discountCode,$brandId,$productStatus,$categoryId,$subcategoryId,$subsubcategoryId,$imagesArray){
            if($discountType == 'NONE'){
                $discountType = null;
                $discount = '';
                $discountCode = '';
            }

            if($discountType == 'ZERO'){
                $discountType = false;
            }

            if($discountType == 'ONE'){
                $discountType = 1;
            }

            if($subcategoryId == ''){
                $subcategoryId = null;
            }

            if($subsubcategoryId == ''){
                $subsubcategoryId = null;
            }

            /*Updated Row*/
                $queryPrice = self::$db->prepare("SELECT PRODUCT_PRICE FROM tb_product WHERE ID = :product_id");
                $queryPrice->execute([
                    ':product_id' => $productId
                ]);
                $oldPrice = round($queryPrice->fetchAll()[0]['PRODUCT_PRICE']);
                if(round($price) > $oldPrice){
                    $query = self::$db->prepare("UPDATE tb_product SET PRODUCT_NAME = :name, PRODUCT_DETAIL = :detail, PRODUCT_PRICE = :price, PRODUCT_STOCK_QUANTITY = :stock_quantity, PRODUCT_DISCOUNT_TYPE = :discount_type, PRODUCT_DISCOUNT = :discount, PRODUCT_DISCOUNT_CODE = :discount_code, PRODUCT_BRAND = :brand, PRODUCT_CATEGORY = :category_id, PRODUCT_SUB_CATEGORY = :subcategory_id, PRODUCT_SUB_SUB_CATEGORY = :subsubcategory_id, PRODUCT_TOP_STATUS = :status WHERE ID = :product_id");
                    $query->execute([
                        ':name' => $name,
                        ':detail' => $detail,
                        ':price' => $price,
                        ':stock_quantity' => $stockQuantity,
                        ':discount_type' => $discountType,
                        ':discount' => $discount,
                        ':discount_code' => $discountCode,
                        ':brand' => $brandId,
                        ':category_id' => $categoryId,
                        ':subcategory_id' => $subcategoryId,
                        ':subsubcategory_id' => $subsubcategoryId,
                        ':product_id' => $productId,
                        ':status' => $productStatus
                    ]);
                }
                else{
                    $newDate = date("Y-m-d").' '.date("H:i:s");
                    $query = self::$db->prepare("UPDATE tb_product SET PRODUCT_NAME = :name, PRODUCT_DETAIL = :detail, PRODUCT_PRICE = :price, PRODUCT_STOCK_QUANTITY = :stock_quantity, PRODUCT_DISCOUNT_TYPE = :discount_type, PRODUCT_DISCOUNT = :discount, PRODUCT_DISCOUNT_CODE = :discount_code, PRODUCT_BRAND = :brand, PRODUCT_CATEGORY = :category_id, PRODUCT_SUB_CATEGORY = :subcategory_id, PRODUCT_SUB_SUB_CATEGORY = :subsubcategory_id, PRODUCT_TOP_STATUS = :status, UPDATED_DATE = :update_date WHERE ID = :product_id");
                    $query->execute([
                        ':name' => $name,
                        ':detail' => $detail,
                        ':price' => $price,
                        ':stock_quantity' => $stockQuantity,
                        ':discount_type' => $discountType,
                        ':discount' => $discount,
                        ':discount_code' => $discountCode,
                        ':brand' => $brandId,
                        ':category_id' => $categoryId,
                        ':subcategory_id' => $subcategoryId,
                        ':subsubcategory_id' => $subsubcategoryId,
                        ':product_id' => $productId,
                        ':status' => $productStatus,
                        ':update_date' => $newDate
                    ]);
                }

            /*Updated Row End*/
            

            if(true/*$query->rowCount() > 0*/){
                for ($i=1; $i <= count($imagesArray); $i++) { 
                    $imgName = $imagesArray["FILE_NO_".$i];

                    $query2 = self::$db->prepare("INSERT INTO tb_product_images(PRODUCT_ID,PRODUCT_IMAGE_NAME) VALUES(:product_id,:product_image_name)");
                    $query2->execute([
                        ':product_id' => $productId,
                        ':product_image_name' => $imgName
                    ]);

                    if($query2->rowCount() == 0){
                        break;
                        return false;
                    }
                }

                return true;
            }
            else{
                return true;
            }
        }

        function GetProducts($type='admin'){
            if($type == 'admin'){
                 $query = self::$db->prepare("SELECT product.ID,product.PRODUCT_PRICE,product.PRODUCT_NAME,product.PRODUCT_STOCK_QUANTITY,product.PRODUCT_DISCOUNT_TYPE,product.PRODUCT_DISCOUNT,product.PRODUCT_DISCOUNT_CODE,product.PRODUCT_BRAND,product.PRODUCT_TOP_STATUS,date_format(product.PRODUCT_DATE, '%d.%m.%Y %H:%i') AS PRODUCT_DATE,brand.BRAND_NAME FROM  tb_product as product INNER JOIN tb_product_brand as brand ON product.PRODUCT_BRAND = brand.ID GROUP BY UPDATED_DATE DESC;");
            }
            else if($type == 'product_slider'){
                $query = self::$db->prepare("SELECT ID,PRODUCT_NAME,PRODUCT_PRICE,PRODUCT_DISCOUNT,PRODUCT_TOP_STATUS,PRODUCT_STOCK_QUANTITY FROM tb_product GROUP BY UPDATED_DATE DESC LIMIT 12");
            }
            else if($type == 'most'){
                 $query = self::$db->prepare("SELECT product.ID,product.PRODUCT_PRICE,product.PRODUCT_NAME,product.PRODUCT_STOCK_QUANTITY,product.PRODUCT_DISCOUNT_TYPE,product.PRODUCT_DISCOUNT,product.PRODUCT_DISCOUNT_CODE,product.PRODUCT_BRAND,product.PRODUCT_TOP_STATUS,date_format(product.PRODUCT_DATE, '%d.%m.%Y %H:%i') AS PRODUCT_DATE FROM  tb_order_products as order_products INNER JOIN tb_product as product ON order_products.PRODUCT_ID = product.ID GROUP BY order_products.PRODUCT_ID ORDER BY count(*) DESC LIMIT 12");
            }
            else if($type == 'most_admin'){
                $query = self::$db->prepare("SELECT SUM(order_products.QUANTITY) AS SUM, product.ID,product.PRODUCT_PRICE,product.PRODUCT_NAME,product.PRODUCT_STOCK_QUANTITY,product.PRODUCT_DISCOUNT_TYPE,product.PRODUCT_DISCOUNT,product.PRODUCT_DISCOUNT_CODE,product.PRODUCT_BRAND,product.PRODUCT_TOP_STATUS,date_format(product.PRODUCT_DATE, '%d.%m.%Y %H:%i') AS PRODUCT_DATE FROM  tb_order_products as order_products INNER JOIN tb_product as product ON order_products.PRODUCT_ID = product.ID GROUP BY order_products.PRODUCT_ID ORDER BY count(*) DESC LIMIT 20");
            }
            else if($type == 'dashboard'){
                 $query = self::$db->prepare("SELECT product.ID,product.PRODUCT_PRICE,product.PRODUCT_NAME,product.PRODUCT_STOCK_QUANTITY,product.PRODUCT_DISCOUNT_TYPE,product.PRODUCT_DISCOUNT,product.PRODUCT_DISCOUNT_CODE,product.PRODUCT_BRAND,product.PRODUCT_TOP_STATUS,date_format(product.PRODUCT_DATE, '%d.%m.%Y %H:%i') AS PRODUCT_DATE,brand.BRAND_NAME FROM  tb_product as product INNER JOIN tb_product_brand as brand ON product.PRODUCT_BRAND = brand.ID GROUP BY ID DESC;");
            }

            $query->execute();

            return $query->fetchAll();
        }

        function GetProductWithPoster($id1,$id2,$id3){
            $query = self::$db->prepare("SELECT * FROM tb_product WHERE PRODUCT_CATEGORY = :main_category_id and PRODUCT_SUB_CATEGORY = :sub_category_id and PRODUCT_SUB_SUB_CATEGORY = :sub_sub_category_id");
            $query->execute([
                ':main_category_id' => $id1,
                ':sub_category_id' => $id2,
                ':sub_sub_category_id' => $id3
            ]);

            return $query->fetchAll();
        }

        function GetProductWithId($productId){
            $query = self::$db->prepare("SELECT * FROM tb_product WHERE ID = :product_id");
            $query->execute([
                ':product_id' => $productId
            ]);

            return $query->fetchAll();
        }

        function GetProductImages($productId){
            $query = self::$db->prepare("SELECT * FROM tb_product_images WHERE PRODUCT_ID = :product_id");
            $query->execute([
                ':product_id' => $productId
            ]);

            return $query->fetchAll();
        }

        function DeleteProduct($productId,$imgPath){
            $query = self::$db->prepare("DELETE FROM tb_product WHERE ID = :product_id");
            $query->execute([
                ':product_id' => $productId
            ]);

            if($query->rowCount() > 0){
                $query = self::$db->prepare("SELECT * FROM tb_product_images WHERE PRODUCT_ID = :product_id");
                $query->execute([
                    ':product_id' => $productId
                ]);
                $images = $query->fetchAll();

                foreach ($images as $key => $value) {
                    unlink($imgPath.$value['PRODUCT_IMAGE_NAME']);
                }

                $query = self::$db->prepare("DELETE FROM tb_product_images WHERE PRODUCT_ID = :product_id");
                $query->execute([
                    ':product_id' => $productId
                ]);

                return true;
                
            }
            else{
                return false;
            }
        }

        function DeleteProductImage($imageId){
            $query = self::$db->prepare("DELETE FROM tb_product_images WHERE ID = :img_id");
            $query->execute([
                ':img_id' => $imageId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function UpdateProductImage($imageName,$imageId){
            $query = self::$db->prepare("UPDATE tb_product_images SET PRODUCT_IMAGE_NAME = :img_name WHERE ID = :img_id");
            $query->execute([
                ':img_name' => $imageName,
                ':img_id' => $imageId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }
        /***********************************************************/

        /***********************************************************/
        /*function GetOrders(){
            $query = self::$db->prepare("SELECT orders.ID AS ORDERS_ID,orders.ORDERS_NO,orders.QUANTITY,orders.DISCOUNT_TYPE,orders.DISCOUNT_VALUE,orders.DISCOUNT_CODE,orders.DISCOUNT_PRICE,orders.C_NAME,orders.C_SURNAME,orders.C_PHONE,orders.ADDRESS,orders.ADDRESS_NAME,orders.COMPANY_NAME,orders.PERSON_NAME,orders.TAX_NUMBER_OR_IDENTITY_NO,orders.TAX_ADMINISTRATION,orders.E_INVOICE,orders.ORDER_CHECK,date_format(orders.ORDER_DATE, '%d.%m.%Y %H:%i') AS ORDER_DATE,product.PRODUCT_NAME,product.PRODUCT_PRICE,brand.BRAND_NAME,category.CATEGORY_NAME,date_format(product.PRODUCT_DATE, '%d.%m.%Y %H:%i') AS PRODUCT_DATE,city.CITY_NAME,province.PROVINCE_NAME FROM tb_orders as orders INNER JOIN tb_product as product ON orders.PRODUCT_ID = product.ID INNER JOIN tb_city as city ON orders.C_CITY_ID = city.ID INNER JOIN tb_province as province ON orders.C_PROVINCE_ID = province.ID INNER JOIN tb_product_brand as brand ON product.PRODUCT_BRAND = brand.ID INNER JOIN tb_category as category ON product.PRODUCT_CATEGORY = category.ID GROUP BY ORDERS_ID DESC;");
            $query->execute();

            return $query->fetchAll();
        }*/

        function GetOrders(){
            $query = self::$db->prepare("SELECT *, date_format(ORDER_DATE, '%d.%m.%Y %H:%i') AS ORDER_DATE FROM tb_orders GROUP BY ID DESC;");
            $query->execute();

            return $query->fetchAll();
        }

        function GetOrdersPendingNotification(){
            $query = self::$db->prepare("SELECT COUNT(*) AS ORDER_COUNT FROM tb_orders WHERE ORDER_CHECK = false");
            $query->execute();

            return $query->fetchAll();
        }

        function GetOrderCodeFilter($code){
            $query = self::$db->prepare("SELECT *, date_format(ORDER_DATE, '%d.%m.%Y %H:%i') AS ORDER_DATE FROM tb_orders WHERE ORDER_CODE = :code GROUP BY ID DESC;");
            $query->execute([
                ':code' => $code
            ]);

            return $query->fetchAll();
        }

        function GetOrderDateFilter($start,$end){
            $startDateArr = explode('.', $start);
            /////
            $gg = $startDateArr[0];
            $aa = $startDateArr[1];
            $yyyy = $startDateArr[2];

            $start = $yyyy.'-'.$aa.'-'.$gg;
            ////

            $endDateArr = explode('.', $end);
            /////
            $gg = $endDateArr[0];
            $aa = $endDateArr[1];
            $yyyy = $endDateArr[2];

            $end = $yyyy.'-'.$aa.'-'.$gg;
            ////

            $query = self::$db->prepare("SELECT *, date_format(ORDER_DATE, '%d.%m.%Y %H:%i') AS ORDER_DATE FROM tb_orders WHERE (ORDER_DATE BETWEEN '".$start." 00:00:00' AND '".$end." 23:59:00') GROUP BY ID DESC;");
            $query->execute([]);

            return $query->fetchAll();
        }


         function GetOrder($orderCode,$type = 'admin',$firebaseId = ''){
            if($type == 'admin'){
                $query = self::$db->prepare("SELECT orders.*, date_format(orders.ORDER_DATE, '%d.%m.%Y %H:%i') AS ORDER_DATE, city.CITY_NAME, province.PROVINCE_NAME FROM tb_orders as orders INNER JOIN tb_city as city ON orders.C_CITY_ID = city.ID INNER JOIN tb_province as province ON orders.C_PROVINCE_ID = province.ID WHERE ORDER_CODE = :order_code");
                $query->execute([
                    ':order_code' => $orderCode
                ]);
            }
            else if($type == 'customer' && $firebaseId != ''){
                $query = self::$db->prepare("SELECT orders.*, date_format(orders.ORDER_DATE, '%d.%m.%Y %H:%i') AS ORDER_DATE, city.CITY_NAME, province.PROVINCE_NAME FROM tb_orders as orders INNER JOIN tb_city as city ON orders.C_CITY_ID = city.ID INNER JOIN tb_province as province ON orders.C_PROVINCE_ID = province.ID WHERE ORDER_CODE = :order_code and C_FIREBASE_ID = :firebase_id");
                $query->execute([
                    ':order_code' => $orderCode,
                    ':firebase_id' => $firebaseId
                ]);
            }

            return $query->fetchAll();
        }

        function GetOrderProducts($orderId){
            $query = self::$db->prepare("SELECT order_products.QUANTITY,order_products.PRODUCT_ID, product.PRODUCT_NAME,product.PRODUCT_STOCK_QUANTITY,product.ID AS P_ID,category.CATEGORY_NAME,brand.BRAND_NAME,product.PRODUCT_PRICE,product.PRODUCT_DISCOUNT FROM tb_order_products as order_products INNER JOIN tb_product as product ON order_products.PRODUCT_ID = product.ID INNER JOIN tb_category as category ON product.PRODUCT_CATEGORY = category.ID INNER JOIN tb_product_brand as brand ON product.PRODUCT_BRAND = brand.ID WHERE order_products.ORDER_ID = :order_id");
            $query->execute([
                ':order_id' => $orderId
            ]);

            return $query->fetchAll();
        }

        function DeleteOrder($orderCode){
            $query = self::$db->prepare("SELECT ID FROM tb_orders WHERE ORDER_CODE = :order_code");
            $query->execute([
                ':order_code' => $orderCode
            ]);

            if($query->rowCount() > 0 ){
                $orderId = $query->fetchAll()[0]["ID"];

                $query = self::$db->prepare("DELETE FROM tb_orders WHERE ORDER_CODE = :order_code");
                $query->execute([
                    ':order_code' => $orderCode
                ]);

                if($query->rowCount() > 0){
                    $query = self::$db->prepare("DELETE FROM tb_order_products WHERE ORDER_ID = :order_id");
                    $query->execute([
                        ':order_id' => $orderId
                    ]);

                    if($query->rowCount() > 0){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
            
        }

        function CheckOrder($orderCode){
            $query = self::$db->prepare("UPDATE tb_orders SET ORDER_CHECK = true WHERE ORDER_CODE = :order_code");
            $query->execute([
                ':order_code' => $orderCode
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return true;
            }
        }

        function OrderNextCargo($orderCode){
            $query = self::$db->prepare("UPDATE tb_orders SET NEXT_CARGO = 'OK' WHERE ORDER_CODE = :order_code");
            $query->execute([
                ':order_code' => $orderCode
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return true;
            }
        }
        /***********************************************************/

        /***********************************************************/
        function GetComments($productId){
            $query = self::$db->prepare("SELECT comments.ID, comments.C_ID, comments.C_COMMENT,comments.RATE, date_format(comments.COMMENT_DATE, '%d.%m.%Y %H:%i') AS COMMENT_DATE, customer.NAME, customer.SURNAME,customer.FIREBASE_ID FROM tb_comments as comments INNER JOIN tb_customer as customer ON comments.C_ID = customer.ID WHERE PRODUCT_ID = :product_id GROUP BY ID DESC");
            $query->execute([
                ':product_id' => $productId
            ]);

            return $query->fetchAll();
        }

        function GetAllComments($user = false, $firebaseId = '', $commentId = 0){
            if(!$user && $commentId == 0){
                $query = self::$db->prepare("SELECT comments.ID,comments.PRODUCT_ID, comments.C_ID, comments.C_COMMENT, comments.RATE, date_format(comments.COMMENT_DATE, '%d.%m.%Y %H:%i') AS COMMENT_DATE, customer.NAME, customer.SURNAME FROM tb_comments as comments INNER JOIN tb_customer as customer ON comments.C_ID = customer.ID GROUP BY ID DESC");
                $query->execute([]);
            }
            else if($user == true && $commentId == 0){
                $query = self::$db->prepare("SELECT comments.ID,comments.PRODUCT_ID, comments.C_ID, comments.C_COMMENT, comments.RATE, date_format(comments.COMMENT_DATE, '%d.%m.%Y') AS COMMENT_DATE, customer.NAME, customer.SURNAME FROM tb_comments as comments INNER JOIN tb_customer as customer ON comments.C_ID = customer.ID WHERE customer.FIREBASE_ID = :firebaseId GROUP BY ID DESC");
                $query->execute([
                    ':firebaseId' => $firebaseId
                ]);
            }

            if($commentId > 0 && $user == false && $firebaseId != ''){
                $query = self::$db->prepare("SELECT comments.ID,comments.PRODUCT_ID, comments.C_ID, comments.C_COMMENT, comments.RATE, date_format(comments.COMMENT_DATE, '%d.%m.%Y') AS COMMENT_DATE, customer.NAME, customer.SURNAME FROM tb_comments as comments INNER JOIN tb_customer as customer ON comments.C_ID = customer.ID WHERE customer.FIREBASE_ID = :firebaseId and comments.ID = :commentId GROUP BY ID DESC");
                $query->execute([
                    ':firebaseId' => $firebaseId,
                    ':commentId' => $commentId
                ]);
            }

            return $query->fetchAll();
        }

        function DeleteComment($commentId){
            $query = self::$db->prepare("DELETE FROM tb_comments WHERE ID = :comment_id");
            $query->execute([
                ':comment_id' => $commentId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return true;
            }
        }
        /***********************************************************/

        /***********************************************************/
        /***********************************************************/
        function CreateAccount($name,$surname,$firebaseUserId,$email,$phone,$birthday,$gender){
            $query = self::$db->prepare("SELECT ID FROM tb_customer WHERE EMAIL = :email");
            $query->execute([
                ':email' => $email
            ]);

            if($query->rowCount() > 0){
                return false;
            }
            else{
                $query = self::$db->prepare("INSERT INTO tb_customer(FIREBASE_ID,NAME,SURNAME,EMAIL,PHONE,BIRTHDAY,GENDER) VALUES(:firebase_id,:name,:surname,:email,:phone,:day,:gender)");
                $query->execute([
                    ':firebase_id' => $firebaseUserId,
                    ':name' => $name,
                    ':surname' => $surname,
                    ':email' => $email,
                    ':phone' => $phone,
                    ':day' => $birthday,
                    ':gender' => $gender
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
            }
        }

        function CustomerLogin($email,$firebaseId){
            $query = self::$db->prepare("SELECT ID, NAME, SURNAME FROM tb_customer WHERE EMAIL = :email and FIREBASE_ID = :firebase_id");
            $query->execute([
                ':email' => $email,
                ':firebase_id' => $firebaseId
            ]);

            if($query->rowCount() > 0){
                session_start();
                $n = $query->fetchAll();
                $_SESSION['CS_NAME'] = $n[0]['NAME'];
                $_SESSION['CS_SURNAME'] = $n[0]['SURNAME'];
                return true;
            }
            else{
                return false;
            }
        }

        function GetCustomers($uid,$type=false){
            if($type){
                $query = self::$db->prepare("SELECT ID, NAME, SURNAME, EMAIL, PHONE, BIRTHDAY, GENDER, date_format(REG_DATE, '%d.%m.%Y %H:%i') AS REG_DATE FROM tb_customer WHERE FIREBASE_ID = :id");
                $query->execute([
                    ':id' => $uid
                ]);
                return $query->fetchAll()[0];
            }
            else{
                if($uid == ''){
                    $query = self::$db->prepare("SELECT ID, FIREBASE_ID, NAME, SURNAME, EMAIL, PHONE, BIRTHDAY, GENDER, date_format(REG_DATE, '%d.%m.%Y %H:%i') AS REG_DATE FROM tb_customer GROUP BY ID DESC;");
                    $query->execute([]);
                    return $query->fetchAll();
                }
                else{
                    $query = self::$db->prepare("SELECT ID, FIREBASE_ID, NAME, SURNAME, EMAIL, PHONE, BIRTHDAY, GENDER, date_format(REG_DATE, '%d.%m.%Y %H:%i') AS REG_DATE FROM tb_customer WHERE ID = :id GROUP BY ID DESC;");
                    $query->execute([
                        ':id' => $uid
                    ]);
                    return $query->fetchAll();
                }
            }

        }

        function UpdateCustomerInfo($name,$surname,$birthday,$gender,$firebaseId){
            $query = self::$db->prepare("UPDATE tb_customer SET NAME = :name, SURNAME = :surname, BIRTHDAY = :birthday, GENDER = :gender WHERE FIREBASE_ID = :firebaseId");
            $query->execute([
                ':name' => $name,
                ':surname' => $surname,
                ':birthday' => $birthday,
                ':gender' => $gender,
                ':firebaseId' => $firebaseId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }

        }

        function GetCustomerOrder($firebaseId,$type){
            if($type == 'pending'){
                $query = self::$db->prepare("SELECT ID, ORDER_CODE,DISCOUNT_TYPE,DISCOUNT_VALUE, ORDER_CHECK, C_ORDER_CANCEL,TOTAL_PRICE, date_format(ORDER_DATE, '%d.%m.%Y %H:%i') AS ORDER_DATE FROM tb_orders WHERE C_FIREBASE_ID = :firebase_id and ORDER_CHECK = false and C_ORDER_CANCEL = false");
            }
        	else if($type == 'checked'){
                $query = self::$db->prepare("SELECT ID, ORDER_CODE,DISCOUNT_TYPE,DISCOUNT_VALUE, ORDER_CHECK, C_ORDER_CANCEL,TOTAL_PRICE, date_format(ORDER_DATE, '%d.%m.%Y %H:%i') AS ORDER_DATE FROM tb_orders WHERE C_FIREBASE_ID = :firebase_id and ORDER_CHECK = true");
            }
            else if($type == 'cancel'){
                $query = self::$db->prepare("SELECT ID, ORDER_CODE,DISCOUNT_TYPE,DISCOUNT_VALUE, ORDER_CHECK, C_ORDER_CANCEL,TOTAL_PRICE, date_format(ORDER_DATE, '%d.%m.%Y %H:%i') AS ORDER_DATE FROM tb_orders WHERE C_FIREBASE_ID = :firebase_id and C_ORDER_CANCEL = true");
            }

            $query->execute([
                ':firebase_id' => $firebaseId
            ]);

            return $query->fetchAll();
        }

        function GetCustomerOrderNonLogin(){
            $query = self::$db->prepare("SELECT ID, ORDER_CODE,DISCOUNT_TYPE,DISCOUNT_VALUE, ORDER_CHECK, C_ORDER_CANCEL, date_format(ORDER_DATE, '%d.%m.%Y %H:%i') AS ORDER_DATE FROM tb_orders GROUP BY ID DESC LIMIT 1");
            $query->execute([]);
            return $query->fetchAll();
        }

        function CustomerOrderCancel($orderId,$firebaseId){
            $query = self::$db->prepare("UPDATE tb_orders SET C_ORDER_CANCEL = true WHERE ID = :order_id and C_FIREBASE_ID = :firebase_id");
            $query->execute([
                ':order_id' => $orderId,
                ':firebase_id' => $firebaseId
            ]);

            if($query->rowCount() > 0){
                $query2 = self::$db->prepare("SELECT ORDER_CODE FROM tb_orders WHERE ID = :id");
                $query2->execute([
                    ':id' => $orderId
                ]);
                $f = $query2->fetchAll();
                self::OrderPush($f[0]["ORDER_CODE"]." kodlu sipariş iptal edildi!");
                
                return true;
            }
            else{
                return false;
            }
        }

        function CustomerReOrder($orderId,$firebaseId){
            $query = self::$db->prepare("UPDATE tb_orders SET C_ORDER_CANCEL = false WHERE ID = :order_id and C_FIREBASE_ID = :firebase_id");
            $query->execute([
                ':order_id' => $orderId,
                ':firebase_id' => $firebaseId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function CustomerNewAddress($name,$surname,$phone,$addressName,$address,$cityId,$provinceId,$firebaseId){
            $query = self::$db->prepare("INSERT INTO tb_address(C_FIREBASE_ID, C_NAME, SURNAME, PHONE, ADDRESS_NAME, ADDRESS, CITY_ID, PROVINCE_ID) VALUES(:firebaseId, :name,:surname,:phone,:addressName,:address,:cityId,:provinceId)");
            $query->execute([
                ':firebaseId' => $firebaseId,
                ':name' => $name,
                ':surname' => $surname,
                ':phone' => $phone,
                ':addressName' => $addressName,
                ':address' => $address,
                ':cityId' => $cityId,
                ':provinceId' => $provinceId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function CustomerUpdateAddress($addressId,$name,$surname,$phone,$addressName,$address,$cityId,$provinceId,$firebaseId){
            $query = self::$db->prepare("UPDATE tb_address SET C_NAME = :name, SURNAME = :surname, PHONE = :phone, ADDRESS_NAME = :addressName, ADDRESS = :address, CITY_ID = :cityId, PROVINCE_ID = :provinceId WHERE ID = :addressId and C_FIREBASE_ID = :firebaseId");
            $query->execute([
                ':name' => $name,
                ':surname' => $surname,
                ':phone' => $phone,
                ':addressName' => $addressName,
                ':address' => $address,
                ':cityId' => $cityId,
                ':provinceId' => $provinceId,
                ':addressId' => $addressId,
                ':firebaseId' => $firebaseId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }


        function GetCustomerAddress($firebaseId,$addressId = ''){
            if($addressId == ''){
                $query = self::$db->prepare("SELECT address.ID AS ADDRESS_ID, address.C_FIREBASE_ID, address.C_NAME, address.SURNAME, address.PHONE, address.ADDRESS_NAME, address.ADDRESS, address.CITY_ID, address.PROVINCE_ID, city.CITY_NAME, province.PROVINCE_NAME FROM tb_address AS address INNER JOIN tb_city as city ON address.CITY_ID = city.ID INNER JOIN tb_province as province ON address.PROVINCE_ID = province.ID WHERE C_FIREBASE_ID = :firebaseId");
                $query->execute([
                    ':firebaseId' => $firebaseId
                ]);
                return $query->fetchAll();
            }
            else{
                $query = self::$db->prepare("SELECT address.ID AS ADDRESS_ID, address.C_FIREBASE_ID, address.C_NAME, address.SURNAME, address.PHONE, address.ADDRESS_NAME, address.ADDRESS, address.CITY_ID, address.PROVINCE_ID, city.CITY_NAME, province.PROVINCE_NAME FROM tb_address AS address INNER JOIN tb_city as city ON address.CITY_ID = city.ID INNER JOIN tb_province as province ON address.PROVINCE_ID = province.ID WHERE C_FIREBASE_ID = :firebaseId and address.ID = :addressId");
                $query->execute([
                    ':firebaseId' => $firebaseId,
                    ':addressId' => $addressId
                ]);
                return $query->fetchAll()[0];
            }
        }

        function DeleteAddressCustomer($addressId, $firebaseId){
            $query = self::$db->prepare("DELETE FROM tb_address WHERE ID = :address_id and C_FIREBASE_ID = :firebaseId");
            $query->execute([
                ':address_id' => $addressId,
                ':firebaseId' => $firebaseId
            ]);

            if($query->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        /***********************************************************/
        /***********************************************************/

        function PublicProductWithCategory($categoryId,$page,$subcategoryId='',$brandId,$minPrice,$maxPrice,$subsubcategoryId=''){
            if($brandId == 'null') $brandId = '';
            if($minPrice == 'null') $minPrice = '';
            if($maxPrice == 'null') $maxPrice = '';

            if($page == '' || intval($page) == 1) $page = 'LIMIT 0, 24';
            if(intval($page) > 1) $page = 'LIMIT '.(intval($page)*12).', 24';

            $sqlString = '';
            $ln = strlen($brandId);

            for ($i=0; $i < $ln; $i++) { 
                $id = $brandId[$i];
                if(is_numeric($id)){
                    if($sqlString == ''){
                        $sqlString = "and PRODUCT_BRAND = ".$id;   
                    }
                    else {
                        $sqlString = $sqlString." or PRODUCT_BRAND = ".$id;
                    }
                }
            }

            if($subcategoryId == ''){
                if($brandId == '' && $minPrice == '' && $maxPrice == ''){
                    $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_CATEGORY = :category_id GROUP BY UPDATED_DATE DESC ".$page);
                    $query->execute([
                        ':category_id' => $categoryId
                    ]);
                }
                else if($brandId != '' && $minPrice == '' && $maxPrice == ''){
                    $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_CATEGORY = :category_id ".$sqlString." GROUP BY UPDATED_DATE DESC ".$page);
                    $query->execute([
                        ':category_id' => $categoryId
                    ]);
                }
                else if($brandId == '' && $minPrice != '' && $maxPrice != ''){
                    $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_PRICE >= :min and PRODUCT_PRICE <= :max And PRODUCT_CATEGORY = :category_id GROUP BY UPDATED_DATE DESC ".$page);
                    $query->execute([
                        ':category_id' => $categoryId,
                        ':min' => $minPrice,
                        ':max' => $maxPrice
                    ]);
                }
                else if($brandId != '' && $minPrice != '' && $maxPrice != ''){
                    $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_PRICE >= :min and PRODUCT_PRICE <= :max AND PRODUCT_CATEGORY = :category_id ".$sqlString." GROUP BY UPDATED_DATE DESC ".$page);
                    $query->execute([
                        ':category_id' => $categoryId,
                        ':min' => $minPrice,
                        ':max' => $maxPrice
                    ]);
                }
            }
            else {
                if($brandId == '' && $minPrice == '' && $maxPrice == ''){
                    if($subsubcategoryId == ''){
                        $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_CATEGORY = :category_id and PRODUCT_SUB_CATEGORY = :sub_category_id GROUP BY UPDATED_DATE DESC ".$page);
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':sub_category_id' => $subcategoryId
                        ]);
                    }
                    else{
                        $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_CATEGORY = :category_id and PRODUCT_SUB_CATEGORY = :sub_category_id and PRODUCT_SUB_SUB_CATEGORY = :sub_sub_category_id GROUP BY UPDATED_DATE DESC ".$page);
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':sub_category_id' => $subcategoryId,
                            ':sub_sub_category_id' => $subsubcategoryId
                        ]);
                    }
                }
                else if($brandId != '' && $minPrice == '' && $maxPrice == ''){
                    if($subsubcategoryId == ''){
                        $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_CATEGORY = :category_id and PRODUCT_SUB_CATEGORY = :sub_category_id ".$sqlString." GROUP BY UPDATED_DATE DESC ".$page);
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':sub_category_id' => $subcategoryId
                        ]);
                    }
                    else{
                        $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_CATEGORY = :category_id and PRODUCT_SUB_SUB_CATEGORY = :sub_sub_category_id and PRODUCT_SUB_CATEGORY = :sub_category_id ".$sqlString." GROUP BY UPDATED_DATE DESC ".$page);
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':sub_category_id' => $subcategoryId,
                            ':sub_sub_category_id' => $subsubcategoryId
                        ]);
                    }
                }
                else if($brandId == '' && $minPrice != '' && $maxPrice != ''){
                    if($subsubcategoryId == ''){
                        $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_PRICE >= :min and PRODUCT_PRICE <= :max And PRODUCT_CATEGORY = :category_id and PRODUCT_SUB_CATEGORY = :sub_category_id GROUP BY UPDATED_DATE DESC ".$page);
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':min' => $minPrice,
                            ':max' => $maxPrice,
                            ':sub_category_id' => $subcategoryId
                        ]);
                    }
                    else{
                        $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_PRICE >= :min and PRODUCT_PRICE <= :max And PRODUCT_CATEGORY = :category_id and PRODUCT_SUB_CATEGORY = :sub_category_id and PRODUCT_SUB_SUB_CATEGORY = :sub_sub_category_id GROUP BY UPDATED_DATE DESC ".$page);
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':min' => $minPrice,
                            ':max' => $maxPrice,
                            ':sub_category_id' => $subcategoryId,
                            ':sub_sub_category_id' => $subsubcategoryId
                        ]);
                    }
                }
                else if($brandId != '' && $minPrice != '' && $maxPrice != ''){
                    if($subsubcategoryId == ''){
                        $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_PRICE >= :min and PRODUCT_PRICE <= :max AND PRODUCT_CATEGORY = :category_id ".$sqlString." and PRODUCT_SUB_CATEGORY = :sub_category_id GROUP BY UPDATED_DATE DESC ".$page);
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':min' => $minPrice,
                            ':max' => $maxPrice,
                            ':sub_category_id' => $subcategoryId
                        ]);
                    }
                    else{
                        $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_PRICE >= :min and PRODUCT_PRICE <= :max AND PRODUCT_CATEGORY = :category_id ".$sqlString." and PRODUCT_SUB_CATEGORY = :sub_category_id and PRODUCT_SUB_SUB_CATEGORY = :sub_sub_category_id GROUP BY UPDATED_DATE DESC ".$page);
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':min' => $minPrice,
                            ':max' => $maxPrice,
                            ':sub_category_id' => $subcategoryId,
                            ':sub_sub_category_id' => $subsubcategoryId
                        ]);
                    }
                }
            }

            return $query->fetchAll();
        }

        function PaginationProductWithCategory($categoryId,$subcategoryId='',$brandId,$minPrice,$maxPrice,$subsubcategoryId=''){
            if($brandId == 'null') $brandId = '';
            if($minPrice == 'null') $minPrice = '';
            if($maxPrice == 'null') $maxPrice = '';

            $sqlString = '';
            $ln = strlen($brandId);

            for ($i=0; $i < $ln; $i++) { 
                $id = $brandId[$i];
                if(is_numeric($id)){
                    if($sqlString == ''){
                        $sqlString = "and PRODUCT_BRAND = ".$id;   
                    }
                    else {
                        $sqlString = $sqlString." or PRODUCT_BRAND = ".$id;
                    }
                }
            }

            if($subcategoryId == ''){
                if($brandId == '' && $minPrice == '' && $maxPrice == ''){
                    $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_CATEGORY = :category_id GROUP BY UPDATED_DATE DESC LIMIT 24");
                    $query->execute([
                        ':category_id' => $categoryId
                    ]);
                }
                else if($brandId != '' && $minPrice == '' && $maxPrice == ''){
                    $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_CATEGORY = :category_id ".$sqlString." GROUP BY UPDATED_DATE DESC LIMIT 24");
                    $query->execute([
                        ':category_id' => $categoryId
                    ]);
                }
                else if($brandId == '' && $minPrice != '' && $maxPrice != ''){
                    $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_PRICE >= :min and PRODUCT_PRICE <= :max And PRODUCT_CATEGORY = :category_id GROUP BY UPDATED_DATE DESC LIMIT 24");
                    $query->execute([
                        ':category_id' => $categoryId,
                        ':min' => $minPrice,
                        ':max' => $maxPrice
                    ]);
                }
                else if($brandId != '' && $minPrice != '' && $maxPrice != ''){
                    $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_PRICE >= :min and PRODUCT_PRICE <= :max AND PRODUCT_CATEGORY = :category_id ".$sqlString." GROUP BY UPDATED_DATE DESC LIMIT 24");
                    $query->execute([
                        ':category_id' => $categoryId,
                        ':min' => $minPrice,
                        ':max' => $maxPrice
                    ]);
                }
            }
            else {
                if($brandId == '' && $minPrice == '' && $maxPrice == ''){
                    if($subsubcategoryId == ''){
                        $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_CATEGORY = :category_id and PRODUCT_SUB_CATEGORY = :sub_category_id GROUP BY UPDATED_DATE DESC LIMIT 24");
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':sub_category_id' => $subcategoryId
                        ]);
                    }
                    else{
                        $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_CATEGORY = :category_id and PRODUCT_SUB_CATEGORY = :sub_category_id and PRODUCT_SUB_SUB_CATEGORY = :sub_sub_category_id GROUP BY UPDATED_DATE DESC LIMIT 24");
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':sub_category_id' => $subcategoryId,
                            ':sub_sub_category_id' => $subsubcategoryId
                        ]);
                    }
                }
                else if($brandId != '' && $minPrice == '' && $maxPrice == ''){
                    if($subsubcategoryId == ''){
                        $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_CATEGORY = :category_id and PRODUCT_SUB_CATEGORY = :sub_category_id ".$sqlString." GROUP BY UPDATED_DATE DESC LIMIT 24");
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':sub_category_id' => $subcategoryId
                        ]);
                    }
                    else{
                        $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_CATEGORY = :category_id and PRODUCT_SUB_SUB_CATEGORY = :sub_sub_category_id and PRODUCT_SUB_CATEGORY = :sub_category_id ".$sqlString." GROUP BY UPDATED_DATE DESC LIMIT 24");
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':sub_category_id' => $subcategoryId,
                            ':sub_sub_category_id' => $subsubcategoryId
                        ]);
                    }
                }
                else if($brandId == '' && $minPrice != '' && $maxPrice != ''){
                    if($subsubcategoryId == ''){
                        $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_PRICE >= :min and PRODUCT_PRICE <= :max And PRODUCT_CATEGORY = :category_id and PRODUCT_SUB_CATEGORY = :sub_category_id GROUP BY UPDATED_DATE DESC LIMIT 24");
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':min' => $minPrice,
                            ':max' => $maxPrice,
                            ':sub_category_id' => $subcategoryId
                        ]);
                    }
                    else{
                        $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_PRICE >= :min and PRODUCT_PRICE <= :max And PRODUCT_CATEGORY = :category_id and PRODUCT_SUB_CATEGORY = :sub_category_id and PRODUCT_SUB_SUB_CATEGORY = :sub_sub_category_id GROUP BY UPDATED_DATE DESC LIMIT 24");
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':min' => $minPrice,
                            ':max' => $maxPrice,
                            ':sub_category_id' => $subcategoryId,
                            ':sub_sub_category_id' => $subsubcategoryId
                        ]);
                    }
                }
                else if($brandId != '' && $minPrice != '' && $maxPrice != ''){
                    if($subsubcategoryId == ''){
                        $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_PRICE >= :min and PRODUCT_PRICE <= :max AND PRODUCT_CATEGORY = :category_id ".$sqlString." and PRODUCT_SUB_CATEGORY = :sub_category_id GROUP BY UPDATED_DATE DESC LIMIT 24");
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':min' => $minPrice,
                            ':max' => $maxPrice,
                            ':sub_category_id' => $subcategoryId
                        ]);
                    }
                    else{
                        $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_PRICE >= :min and PRODUCT_PRICE <= :max AND PRODUCT_CATEGORY = :category_id ".$sqlString." and PRODUCT_SUB_CATEGORY = :sub_category_id and PRODUCT_SUB_SUB_CATEGORY = :sub_sub_category_id GROUP BY UPDATED_DATE DESC LIMIT 24");
                        $query->execute([
                            ':category_id' => $categoryId,
                            ':min' => $minPrice,
                            ':max' => $maxPrice,
                            ':sub_category_id' => $subcategoryId,
                            ':sub_sub_category_id' => $subsubcategoryId
                        ]);
                    }
                }
            }

            return $query->fetchAll();
        }

        function PublicProductWithBrand($brandId,$page){
            if($page == '' || intval($page) == 1) $page = 'LIMIT 0, 24';
            if(intval($page) > 1) $page = 'LIMIT '.(intval($page)*12).', 24';

            $query = self::$db->prepare("SELECT ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_DISCOUNT, PRODUCT_TOP_STATUS, PRODUCT_STOCK_QUANTITY FROM tb_product WHERE PRODUCT_BRAND = :brand_id ".$page);
            $query->execute([
                'brand_id' => $brandId
            ]);

            return $query->fetchAll();
        }

        function PaginationProductWithBrand($brandId){
            $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_BRAND = :brand_id LIMIT 24");
            $query->execute([
                'brand_id' => $brandId
            ]);

            return $query->fetchAll();
        }

        function CountCategoryProduct($categoryId){
            $query = self::$db->prepare("SELECT COUNT(*) AS PRODUCT_QUANTITY FROM tb_product WHERE PRODUCT_CATEGORY = :category_id");
            $query->execute([
                'category_id' => $categoryId
            ]);

            return $query->fetchAll();
        }

        function SetComment($productId,$comment,$rate,$firebaseId){
            $newDate = date("Y-m-d").' '.date("H:i:s");

            $query = self::$db->prepare("SELECT ID FROM tb_customer WHERE FIREBASE_ID = :firebase_id");
            $query->execute([
                'firebase_id' => $firebaseId
            ]);

            if($query->rowCount() > 0){
                $customerId = $query->fetchAll()[0]['ID'];

                $query = self::$db->prepare("INSERT INTO tb_comments(PRODUCT_ID,C_ID,C_COMMENT,RATE) VALUES(:product_id,:c_id,:comment,:rate)");
                $query->execute([
                    ':product_id' => $productId,
                    ':c_id' => $customerId,
                    ':comment' => $comment,
                    ':rate' => $rate
                ]);

                if($query->rowCount() > 0){
                    $updateQuery = self::$db->prepare("UPDATE tb_product SET UPDATED_DATE = :update_date WHERE ID = :id");
                    $updateQuery->execute([
                        ':update_date' => $newDate,
                        ':id' => $productId
                    ]);

                    if($updateQuery->rowCount() > 0){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else{
                    return false;
                }
            }
            else {
                return false;
            }
        }

        function UpdateComment($productId,$comment,$commentId,$rate,$firebaseId){
            $query = self::$db->prepare("SELECT ID FROM tb_customer WHERE FIREBASE_ID = :firebase_id");
            $query->execute([
                'firebase_id' => $firebaseId
            ]);

            if($query->rowCount() > 0){
                $customerId = $query->fetchAll()[0]['ID'];

                $query = self::$db->prepare("UPDATE tb_comments SET C_COMMENT = :comment, RATE = :rate WHERE ID = :comment_id and C_ID = :c_id");
                $query->execute([
                    ':comment' => $comment,
                    ':rate' => $rate,
                    ':comment_id' => $commentId,
                    ':c_id' => $customerId
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
            }
            else {
                return false;
            }
        }

        function DeleteCommentCustomer($commentId,$firebaseId){
            $query = self::$db->prepare("SELECT ID FROM tb_customer WHERE FIREBASE_ID = :firebase_id");
            $query->execute([
                'firebase_id' => $firebaseId
            ]);

            if($query->rowCount() > 0){
                $customerId = $query->fetchAll()[0]['ID'];

                $query = self::$db->prepare("DELETE FROM tb_comments WHERE C_ID = :customer_id and ID = :comment_id");
                $query->execute([
                    ':customer_id' => $customerId,
                    ':comment_id' => $commentId
                ]);

                if($query->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
            }
            else {
                return false;
            }
        }
        /***********************************************************/
        /***********************************************************/

        function CustomerGetCity(){
            $query = self::$db->prepare("SELECT * FROM tb_city GROUP BY ID");
            $query->execute([]);

            return $query->fetchAll();
        }

        function CustomerGetProvince($cityId){
            $query = self::$db->prepare("SELECT * FROM tb_province WHERE CITY_ID = :city_id");
            $query->execute([
                ':city_id' => $cityId
            ]);

            return $query->fetchAll();
        }

        function DiscountVerify($code){
            $query = self::$db->prepare("SELECT ID FROM tb_product WHERE PRODUCT_DISCOUNT_CODE = :code");
            $query->execute([
                ':code' => $code
            ]);

            if($query->rowCount() > 0){
                $query2 = self::$db->prepare("UPDATE tb_product SET PRODUCT_DISCOUNT_CODE = '' WHERE PRODUCT_DISCOUNT_CODE = :code");
                $query2->execute([
                    ':code' => $code
                ]);

                return true;
            }
            else{
                return false;
            }
        }

        function ToOrder($totalPrice,$name,$surname,$phone,$email,$address,$addressName,$cityId,$provinceId,$companyPersonName,$taxNumberIdentityNo,$taxAdmin,$discountCode,$firebaseId,$metaBuff){
            $orderCode = self::GenerateOrderCode();
            $newDate = date("Y-m-d").' '.date("H:i:s");

            if(count($metaBuff) == 1){
                foreach ($metaBuff as $id => $quantity) {
                    $discountType =  self::GetProductWithId($id)[0]['PRODUCT_DISCOUNT_TYPE'];
                    $discountValue = self::GetProductWithId($id)[0]['PRODUCT_DISCOUNT'];

                    $query = self::$db->prepare("INSERT INTO tb_orders(ORDER_CODE, DISCOUNT_TYPE, DISCOUNT_VALUE, DISCOUNT_CODE, DISCOUNT_PRICE, C_FIREBASE_ID, C_NAME, C_SURNAME, C_PHONE,EMAIL, C_CITY_ID, C_PROVINCE_ID, ADDRESS, ADDRESS_NAME, COMPANY_NAME, TAX_NUMBER_OR_IDENTITY_NO, TAX_ADMINISTRATION,TOTAL_PRICE) VALUES(:order_code, :discount_type, :discount_value, :discount_code, :discount_price, :firebase_id, :name_k, :surname, :phone, :email, :city_id, :province_id, :address, :address_name, :company_name, :tax_number, :tax_admin,:total_price)");
                    $query->execute([
                        ':order_code' => $orderCode,
                        ':discount_type' => $discountType,
                        ':discount_value' => $discountValue,
                        ':discount_code' => $discountCode,
                        ':discount_price' => '',
                        ':firebase_id' => $firebaseId,
                        ':name_k' => $name,
                        ':surname' => $surname,
                        ':phone' => $phone,
                        ':email' => $email,
                        ':city_id' => $cityId,
                        ':province_id' => $provinceId,
                        ':address' => $address,
                        ':address_name' => $addressName,
                        ':company_name' => $companyPersonName,
                        ':tax_number' => $taxNumberIdentityNo,
                        ':tax_admin' => $taxAdmin,
                        ':total_price' => $totalPrice
                    ]);

                    if($query->rowCount() > 0){
                        $query2 = self::$db->prepare("SELECT * FROM tb_orders GROUP BY ID DESC LIMIT 1;");
                        $query2->execute([]);

                        $orderId = $query2->fetchAll()[0]['ID'];

                        $query3 = self::$db->prepare("INSERT INTO tb_order_products(ORDER_ID,PRODUCT_ID,QUANTITY) VALUES(:order_id,:product_id,:quantity)");
                        $query3->execute([
                            ':order_id' => (int)$orderId,
                            ':product_id' => $id,
                            ':quantity' => $quantity
                        ]);

                        if($query3->rowCount() > 0){
                        	self::OrderPush("1 Yeni Siparişiniz Var!");

                            $sq = self::$db->prepare("SELECT PRODUCT_STOCK_QUANTITY,PRODUCT_NAME FROM tb_product WHERE ID = :id");
                            $sq->execute([":id" => $id]);
                            
                            $sqP = $sq->fetchAll()[0];
                            $sqX = $sqP["PRODUCT_STOCK_QUANTITY"];

                            $sqU = self::$db->prepare("UPDATE tb_product SET PRODUCT_STOCK_QUANTITY = :qu, UPDATED_DATE = :update_date WHERE ID = :id");
                            $sqU->execute([
                                ":qu" => ((int)$sqX - (int)$quantity),
                                ":id" => $id,
                                ":update_date" => $newDate
                            ]);

                            $sqM = $sqP["PRODUCT_NAME"];
                            if(((int)$sqX - (int)$quantity) <= 5){
                                self::OrderPush($sqM." adlı üründen son 5 adet kaldı!");
                            }
                            return true;
                        }
                        else{
                            return false;
                        }
                    }
                    else{
                        return false;
                    }
                }
            }
            else{
                $query4 = self::$db->prepare("INSERT INTO tb_orders(ORDER_CODE, C_FIREBASE_ID, C_NAME, C_SURNAME, C_PHONE,EMAIL, C_CITY_ID, C_PROVINCE_ID, ADDRESS, ADDRESS_NAME, COMPANY_NAME, TAX_NUMBER_OR_IDENTITY_NO, TAX_ADMINISTRATION,TOTAL_PRICE) VALUES(:order_code, :firebase_id, :name_k, :surname, :phone, :email, :city_id, :province_id, :address, :address_name, :company_name, :tax_number, :tax_admin,:total_price)");
                $query4->execute([
                    ':order_code' => $orderCode,
                    ':firebase_id' => $firebaseId,
                    ':name_k' => $name,
                    ':surname' => $surname,
                    ':phone' => $phone,
                    ':email' => $email,
                    ':city_id' => $cityId,
                    ':province_id' => $provinceId,
                    ':address' => $address,
                    ':address_name' => $addressName,
                    ':company_name' => $companyPersonName,
                    ':tax_number' => $taxNumberIdentityNo,
                    ':tax_admin' => $taxAdmin,
                    ':total_price' => $totalPrice
                ]);

                if($query4->rowCount() > 0){
                    $query5 = self::$db->prepare("SELECT * FROM tb_orders GROUP BY ID DESC LIMIT 1;");
                    $query5->execute([]);

                    $orderId = $query5->fetchAll()[0]['ID'];

                    foreach ($metaBuff as $id => $quantity) {
                        $query6 = self::$db->prepare("INSERT INTO tb_order_products(ORDER_ID,PRODUCT_ID,QUANTITY) VALUES(:order_id,:product_id,:quantity)");
                        $query6->execute([
                            ':order_id' => (int)$orderId,
                            ':product_id' => $id,
                            ':quantity' => $quantity
                        ]);
                    }
                    self::OrderPush("1 Yeni Siparişiniz Var!");
                    
                    $sq = self::$db->prepare("SELECT PRODUCT_STOCK_QUANTITY,PRODUCT_NAME FROM tb_product WHERE ID = :id");
                    $sq->execute([":id" => $id]);
                    
                    $sqP = $sq->fetchAll()[0];
                    $sqX = $sqP["PRODUCT_STOCK_QUANTITY"];

                    $sqU = self::$db->prepare("UPDATE tb_product SET PRODUCT_STOCK_QUANTITY = :qu, UPDATED_DATE = :update_date WHERE ID = :id");
                    $sqU->execute([
                        ":qu" => ((int)$sqX - (int)$quantity),
                        ":id" => $id,
                        ":update_date" => $newDate
                    ]);
                    
                    $sqM = $sqP["PRODUCT_NAME"];
                    if(((int)$sqX - (int)$quantity) <= 5){
                        self::OrderPush($sqM." adlı üründen son 5 adet kaldı!");
                    }

                    return true;
                }
                else{
                    return false;
                }
            }
        }

        function GenerateOrderCode(){
            $permitted_chars = '123456789ABCDEFGHJKMNPQRSTUVWXYZ';

            $input_length = strlen($permitted_chars);
            $random_string = '';
            for($i = 0; $i < 9; $i++) {
                $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }
         
            return $random_string;
        }

        /***********************************************************/
        /***********************************************************/
        function GetAbout(){
            $query = self::$db->prepare("SELECT ABOUT_ME,PHOTO_NAME from tb_info");
            $query->execute([]);

            return $query->fetchAll();
        }
        /***********************************************************/
        /***********************************************************/
        function SubscribeNews($email){
            $q = self::$db->prepare("SELECT ID FROM tb_news_subscribe WHERE EMAIL = :email");
            $q->execute([':email' => $email]);

            if ($q->rowCount() == 0) {
                $query = self::$db->prepare("INSERT INTO tb_news_subscribe(EMAIL) VALUES(:email)");
                $query->execute([
                    ':email' => $email
                ]);

               if($query->rowCount() > 0){
                    return true;
               }
               else{
                    return false;
               }
            }
            else{
                return false;
            }
            
        }

        function GetSubscriber(){
            $query = self::$db->prepare("SELECT EMAIL,date_format(SUBSCRIBE_DATE, '%d.%m.%Y %H:%i') AS SUBSCRIBE_DATE FROM tb_news_subscribe");
            $query->execute([]);
            return $query->fetchAll();
        }

        function PublicSearchProduct($categoryId,$page,$searchString){

            if($page == '' || intval($page) == 1) $page = 'LIMIT 0, 24';
            if(intval($page) > 1) $page = 'LIMIT '.(intval($page)*12).', 24';

            if($categoryId != ''){
                $query = self::$db->prepare("SELECT * FROM tb_product WHERE PRODUCT_CATEGORY = :id and PRODUCT_NAME LIKE '".$searchString."%' ".$page);
                $query->execute([
                    ':id' => $categoryId
                ]);
                return $query->fetchAll();
            }
            else{
                $query = self::$db->prepare("SELECT * FROM tb_product WHERE PRODUCT_NAME LIKE '".$searchString."%' ".$page);
                $query->execute([]);
                return $query->fetchAll();
            }
        }

        function PaginationSearchProduct($categoryId,$searchString){

            if($categoryId != ''){
                $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_CATEGORY = :id and PRODUCT_NAME LIKE '".$searchString."%'");
                $query->execute([
                    ':id' => $categoryId
                ]);
                return $query->fetchAll();
            }
            else{
                $query = self::$db->prepare("SELECT COUNT(*) AS COUNT FROM tb_product WHERE PRODUCT_NAME LIKE '".$searchString."%'");
                $query->execute([]);
                return $query->fetchAll();
            }
        }

        function OrderPush($message){
        	$content      = array(
	        	"en" => $message
	    	);
	    	$fields = array(
	        	'app_id' => "xxxxxxxxxxxxxxxxxxxxxx",
	        	'large_icon' => 'xxxxxxxxxxxxxxxxxxxxxx',

	        	'app_url' => 'xxxxxxxxxxxxxxxxxxxxxx',
	        	'included_segments' => array(
	            	'All'
	        	),
	        	'contents' => $content
	    	);
	    
	    	$fields = json_encode($fields);   
	    	$ch = curl_init();
	    	curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
	    	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	        	'Content-Type: application/json; charset=utf-8',
	        	'Authorization: Basic xxxxxxxxxxxxxxxxxxxxxx'
	    	));
	    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	    	curl_setopt($ch, CURLOPT_POST, TRUE);
	    	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    
	    	$response = curl_exec($ch);
	    	curl_close($ch);
	    
	    	return $response;
        }
    }
    class Functions{
    	function HttpStatusCode($code){
    		$status = array(
    			100 => 'Continue',
    			101 => 'Switching Protocols',
    			200 => 'OK',
    			201 => 'Created',
    			202 => 'Accepted',
    			203 => 'Non-Authoritative Information',
    			204 => 'No Content',
    			205 => 'Reset Content',
    			206 => 'Partial Content',
    			300 => 'Multiple Choices',
    			301 => 'Moved Permanently',
    			302 => 'Found',
    			303 => 'See Other',
    			304 => 'Not Modified',
    			305 => 'Use Proxy',
    			306 => '(Unused)',  
            	307 => 'Temporary Redirect',  
           		400 => 'Bad Request',  
            	401 => 'Unauthorized',  
            	402 => 'Payment Required',  
            	403 => 'Forbidden',  
            	404 => 'Not Found',  
            	405 => 'Method Not Allowed',  
            	406 => 'Not Acceptable',  
            	407 => 'Proxy Authentication Required',  
            	408 => 'Request Timeout',  
            	409 => 'Conflict',  
            	410 => 'Gone',  
            	411 => 'Length Required',  
            	412 => 'Precondition Failed',  
            	413 => 'Request Entity Too Large',  
            	414 => 'Request-URI Too Long',  
            	415 => 'Unsupported Media Type',  
            	416 => 'Requested Range Not Satisfiable',  
            	417 => 'Expectation Failed',  
            	500 => 'Internal Server Error',  
            	501 => 'Not Implemented',  
            	502 => 'Bad Gateway',  
            	503 => 'Service Unavailable',  
            	504 => 'Gateway Timeout',  
            	505 => 'HTTP Version Not Supported');
    		return $status[$code] ? $status[$code] : $status[500];
    	}

    	function addHeader(){
            header("Access-Control-Allow-Origin: *");
            header('Access-Control-Allow-Methods: GET, POST');
            header('Access-Control-Max-Age: 86400');
            header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, X-Custom-Header');
            $_POST = json_decode(file_get_contents('php://input'), true);
        }

      	function setHeader($code){
    		header("HTTP/1.1 ".$code." ".$this->HttpStatusCode($code));
    		header("Content-Type: application/json; charset=utf-8");
    	}

    	function ipDetect(){
           if (!empty($_SERVER['HTTP_CLIENT_IP']))  
            {  
                $ip=$_SERVER['HTTP_CLIENT_IP'];  
            }  
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
            {  
                $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];  
            }  
            else  
            {  
                $ip=$_SERVER['REMOTE_ADDR'];  
            }  
            
            return $ip;  
        }



        function json($array){
    		return json_encode($array, JSON_UNESCAPED_UNICODE);
    	}

        function PostData($item){
            return htmlspecialchars($_POST[$item],ENT_QUOTES);
        }

        function seo($s) {
            $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
            $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
            $s = str_replace($tr,$eng,$s);
            $s = strtolower($s);
            $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
            $s = preg_replace('/\s+/', '-', $s);
            $s = preg_replace('|-+|', '-', $s);
            $s = preg_replace('/#/', '', $s);
            $s = str_replace('.', '', $s);
            $s = trim($s, '-');
            return $s;
        }

        function FloatPrice($price){
            $newPriceArray = explode('.',$price);
            if(strlen($newPriceArray[1]) == 1){
                return $newPriceArray[0].'.'.$newPriceArray[1].'0';
            }else{
                return $price;
            }
            
        }

        function ReturnDate(){
            return date("Y-m-d").' '.date("H:i:s");
        }

        function colorImage($url, $hex = null, $r = null, $g = null, $b = null){
            if ($hex != null) {
                $hex = str_replace("#", "", $hex);
                $r = hexdec(substr($hex, 0, 2));
                $g = hexdec(substr($hex, 2, 2));
                $b = hexdec(substr($hex, 4, 2));
            }
            $im = imagecreatefrompng($url);
            imageAlphaBlending($im, true);
            imageSaveAlpha($im, true);

            if (imageistruecolor($im)) {
                $sx = imagesx($im);
                $sy = imagesy($im);
                for ($x = 0; $x < $sx; $x++) {
                    for ($y = 0; $y <= $sy; $y++) {
                        $c = imagecolorat($im, $x, $y);
                        $a = $c & 0xFF000000;
                        $newColor = $a | $r << 16 | $g << 8 | $b;
                        imagesetpixel($im, $x, $y, $newColor);
                    }
                }
            }
            ob_start();

            imagepng($im);
            imagedestroy($im);
            $image_data = ob_get_contents();

            ob_end_clean();

            $image_data_base64 = "data:image/png;base64," . base64_encode($image_data);

            return $image_data_base64;
        }
    }
?>