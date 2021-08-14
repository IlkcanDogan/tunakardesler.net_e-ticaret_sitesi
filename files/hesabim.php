<!DOCTYPE html>
<html lang="tr" class="js_active  vc_desktop  vc_transform  vc_transform  browser-Chrome platform-Windows">
<head>
	<title>Tuna Kardeşler | Kişisel Bakım - Kuaför Malzemeleri</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="apple-touch-icon" href="vendor/img/fav.png" />
    <link rel="icon" href="vendor/img/fav.png" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/c1.php">

    <link rel="dns-prefetch" href="http://fonts.googleapis.com/">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <script src="vendor/js/jq.js" type="text/javascript"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-auth.js"></script>
    <script src="star/star.js"></script>
    <style type="text/css">
    	.tableHeadTitle {
    		color: white;
    		font-size: 1.0em;
    		line-height: 30px;
    		white-space: nowrap;
    	}
    	.tableItemText{
    		white-space: nowrap;
    	}
    	.OrderDetailButton {
    		font-size: 0.8em; 
    		height: 20px; 
    		margin-top: -5px; 
    		margin-bottom: -5px;
    		width: 100%;
    	}
    	.OrderCancelButtonCard {
    		font-size: 0.8em; 
    		height: 20px;
    	}
    	.cardListItemTitle{
    		font-weight: bold;
    	}
    	.cardListItemText {
    		float: right;
    	}

    	#MobileOrders{
    		display: none;
    	}

    	.starrrProduct {
		  display: inline-block;}
		  .starrrProduct a {
		    font-size: 15px;
		    padding: 0 1px;
		    cursor: pointer;
		    color: #FFD119;
		    text-decoration: none; }

		@media only screen and (max-width: 479px) {
			#DesktopOrders {
				display: none;
			}
			#MobileOrders {
         		display: inherit;
         	}
		}


		@media only screen and (max-width: 479px) {
			#DesktopPano {
				display: none;
			}
		}


		.center {
		  display: flex;
		  justify-content: center;
		  align-items: center;
		  height: 300px;
		}
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-SPD34QZNJ2"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-SPD34QZNJ2');
	</script>
</head>
<body class="home page-template-default page page-id-1724 theme-woodmart woocommerce-js wrapper-full-width form-style-square form-border-width-2 categories-accordion-on header-banner-enabled woodmart-ajax-shop-on offcanvas-sidebar-mobile offcanvas-sidebar-tablet notifications-sticky sticky-toolbar-on btns-default-flat btns-default-dark btns-default-hover-dark btns-shop-3d btns-shop-light btns-shop-hover-light btns-accent-flat btns-accent-light btns-accent-hover-light wpb-js-composer js-comp-ver-6.3.0 vc_responsive header-banner-hide">

	<div class="website-wrapper">
		<?php include 'extra/header.php'; ?>
		<?php 
			if($_GET['ct'] != '' && $_GET['cf'] != ''){
				if($_GET['cf'] == '1') 
					$gcoType = 'pending'; 
				else if($_GET['cf'] == '2') 
					$gcoType = 'checked'; 
				else if($_GET['cf'] == '3') 
					$gcoType = 'cancel';
				
				$customerOrderArray = $db->GetCustomerOrder($_SESSION["CUSTOMER_FIREBASE_ID"],$gcoType);
			}
		?>		
		<div class="">
		   <div class="page-title page-title-default title-size-small title-design-centered color-scheme-light" style="">
		      <div class="container">
		         <header class="entry-header">
		            <h1 class="entry-title">Hesabım</h1>
		            <div class="breadcrumbs"><a href="/" rel="v:url" property="v:title">Anasayfa</a> » <span class="current">
		            	<?php 
		            		if($_GET['ct'] == '1')
		            			echo 'Siparişlerim';
		            		else if($_GET['ct'] == '2')
		            			echo 'Yorumlarım';
		            		else if($_GET['ct'] == '3')
		            			echo 'Adres Bilgilerim';
		            		else if($_GET['ct'] == '4')
		            			echo 'Hesap Bilgilerim';
		            		else if($_GET['ct'] == '5')
		            			echo 'Şifrem';
		            		else
		            			echo 'Hesabım';
		            	?>
		            </span></div>
		         </header>
		      </div>
		   </div>
		   <div class="container">
			   <div class="row content-layout-wrapper align-items-start">
			      <div class="site-content col-lg-12 col-12 col-md-12" role="main">
			         <article id="post-10" class="post-10 page type-page status-publish hentry">
			            <div class="entry-content">
			               <div class="woocommerce">
			                  <div class="woocommerce-my-account-wrapper">
			                     <div class="woodmart-my-account-sidebar" id="DesktopPano">
			                        <h3 class="woocommerce-MyAccount-title entry-title">
			                           Pano				
			                        </h3>
			                        <nav class="woocommerce-MyAccount-navigation">
			                           <ul>
			                              <li class="woocommerce-MyAccount-navigation-link <?php if($_GET['ct'] == '1') echo 'is-active'; ?>" onclick="OpenSubOrder();">
			                                 <a href="javascript:void(0);">Siparişlerim</a>
			                                 <ul id="subOrderArea" <?php if($_GET['ct'] != '1') echo 'style="display: none;"'; ?>>
			                               		  <li class="woocommerce-MyAccount-navigation-link <?php if($_GET['cf'] == '1') echo 'is-active'; ?>">
					                                 <a href="hesabim?ct=1&cf=1" style="font-size: 0.9em; font-weight: normal; margin-left: 12px;">Bekleyen Siparişler</a>
					                              </li>
					                              <li class="woocommerce-MyAccount-navigation-link <?php if($_GET['cf'] == '2') echo 'is-active'; ?>">
					                                 <a href="hesabim?ct=1&cf=2" style="font-size: 0.9em; font-weight: normal; margin-left: 12px;">Onaylanan Siparişler</a>
					                              </li>
					                              <li class="woocommerce-MyAccount-navigation-link <?php if($_GET['cf'] == '3') echo 'is-active'; ?>">
					                                 <a href="hesabim?ct=1&cf=3" style="font-size: 0.9em; font-weight: normal; margin-left: 12px;">İptal Edilen Siparişler</a>
					                              </li>
			                                 </ul>
			                              </li>
			                              <li class="woocommerce-MyAccount-navigation-link <?php if($_GET['ct'] == '2') echo 'is-active'; ?>">
			                                 <a href="hesabim?ct=2">Yorumlarım</a>
			                              </li>
			                              <li class="woocommerce-MyAccount-navigation-link <?php if($_GET['ct'] == '3') echo 'is-active'; ?>">
			                                 <a href="hesabim?ct=3">Adres Bilgilerim</a>
			                              </li>
			                              <li class="woocommerce-MyAccount-navigation-link <?php if($_GET['ct'] == '4') echo 'is-active'; ?>">
			                                 <a href="hesabim?ct=4">Hesap Bilgilerim</a>
			                              </li>
			                              <li class="woocommerce-MyAccount-navigation-link <?php if($_GET['ct'] == '5') echo 'is-active'; ?>">
			                                 <a href="hesabim?ct=5">Şifrem</a>
			                              </li>
			                              <li class="woocommerce-MyAccount-navigation-link">
			                                 <a href="siparis-takibi">Sipariş Takibi</a>
			                              </li>
			                              <li class="woocommerce-MyAccount-navigation-link">
			                                 <a href="/?account=exit">Çıkış Yap</a>
			                              </li>
			                          </ul>
			                        </nav>
			                     </div>
			                     <!-- .woodmart-my-account-sidebar -->
			                     <div class="woocommerce-MyAccount-content">
			                        <div class="woocommerce-notices-wrapper"></div>
			                        <?php 
		                        		if(!count($customerOrderArray) > 0){
		                        			if($_GET['cf'] == '1')
		                        				echo "<div class='woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info'>
						                        		Bekleyen siparişiniz yok!
						                        </div>";
						                    else if($_GET['cf'] == '2')
						                    	echo "<div class='woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info'>
						                        		Onaylanan siparişiniz yok!
						                        </div>";
						                    else if ($_GET['cf'] == '3')
						                    	echo "<div class='woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info'>
						                        		İptal edilen siparişiniz yok!
						                        </div>";
		                        		}
		                        	?>
		                        	<?php if(count($customerOrderArray) > 0) { ?>
			                     		<div class=""> <!-- class='container'-->
			                     			<div class="row">
			                     				<!-- Desktop Orders -->
										      	<div class="col-12">
										      		<div class="mb-5" id="DesktopOrders">
										      			<div class="table-responsive">
									                        <table class="table">
									                            <thead style="white-space: nowrap; background-color: <?php echo $globalColor; ?>;">
									                                <tr>
									                                	<th class="tableHeadTitle">#</th>
									                                    <th class="tableHeadTitle">Sipariş Kodu</th>
									                                    <th class="tableHeadTitle">Toplam Tutar</th>
									                                    <th class="tableHeadTitle">Tarih</th>
									                                    <th class="tableHeadTitle">İşlem</th>
									                                </tr>
									                            </thead>
									                            <tbody>
									                            	<?php $i = 1; foreach ($customerOrderArray as $key => $value) {
									                            		$orderId   = $value["ID"];
									                            		$discountType = $value["DISCOUNT_TYPE"];
									                            		$discountValue = $value["DISCOUNT_VALUE"];
									                            		$total = $value["TOTAL_PRICE"];

									                            		$orderCode = $value["ORDER_CODE"];
									                            		$orderDate = $value["ORDER_DATE"];
									                            		?>
										                                <tr>
										                                    <td class="tableItemText"><?php echo $i; ?></td>
										                                    <td class="tableItemText"><?php echo $orderCode; ?></td>
										                                    <td class="tableItemText"><?php echo $func->FloatPrice($total).' TL'; ?></td>
										                                    <td class="tableItemText"><?php echo $orderDate; ?></td>
										                                    <td class="tableItemText">
										                                    	<button class="btn-success OrderDetailButton" onclick="window.location.href='siparis-detay?kod=<?php echo $orderCode; ?>'" style="border-radius: <?php echo $globalRadius; ?>px">Detay</button>
										                                    </td>
										                                </tr>
									                            	<?php $i++;} ?>
									                            </tbody>
									                        </table>
									                    </div>
										      		</div>
										      	</div>
										      <!-- Desktop Orders -->
										      <!-- Mobile Orders -->
										      	<div class="col-12">
										      		<div class="mb-3" id="MobileOrders">
										      			<?php foreach ($customerOrderArray as $key => $value) {
											      			$orderId   = $value["ID"];
						                            		$discountType = $value["DISCOUNT_TYPE"];
						                            		$discountValue = $value["DISCOUNT_VALUE"];
						                            		$total = $value["TOTAL_PRICE"];

						                            		$orderCode = $value["ORDER_CODE"];
						                            		$orderDate = $value["ORDER_DATE"]; ?>
											      		
											      		<div class="card">
														  <h5 class="card-header" style="background-color: <?php echo $globalColor; ?>; color: white;">Sipariş Kodu: <span><?php echo $orderCode; ?></span><span style="float: right;"><button class="btn-success OrderCancelButtonCard" onclick="window.location.href='siparis-detay?kod=<?php echo $orderCode; ?>'" style="border-radius: <?php echo $globalRadius; ?>px">Detay</button></span></h5>
														  <div class="card-body">
														    <ul class="list-group list-group-flush">
															    <li class="list-group-item"><span class="cardListItemTitle">Toplam Tutar: </span><span class="cardListItemText"><?php echo $func->FloatPrice($total).' TL'; ?></span></li>
															    <li class="list-group-item"><span class="cardListItemTitle">Tarih: </span><span class="cardListItemText"><?php echo $orderDate; ?></span></li>
															</ul>
														  </div>
														</div>

											      		<?php } ?>
										      		</div>
										      	</div>
										      	<!-- Mobile Orders -->
			                     			</div>
			                     		</div>
			                     	<?php } ?> <!-- Order Lists End -->

			                     	<?php if($_GET['ct'] == '' && $_GET['cf'] == '') { ?>
			                     		<div class="woocommerce-MyAccount-content">
										   <div class="woocommerce-notices-wrapper"></div>
										   <p>
										      Merhaba <strong><?php echo $_SESSION["CS_NAME"]; ?></strong>
										   </p>
										   <p>
										      Hesap panonuzdan <a href="hesabim?ct=1&cf=1">son siparişlerinizi</a> görüntüleyebilir, <a href="hesabim?ct=3">gönderim ve fatura adreslerinizi</a> yönetebilir ve <a href="hesabim?ct=4">hesap ayrıntılarınızı</a> düzenleyebilirsiniz.
										   </p>
										</div>
			                     	<?php } ?> <!-- Default End -->

			                     	<?php if($_GET['ct'] == '2') { ?>
			                     		<?php $commentArray = $db->GetAllComments(true,$_SESSION['CUSTOMER_FIREBASE_ID']); ?>
			                     		<div class="container-fluid">
			                     			<div class="row">
			                     				<?php foreach ($commentArray as $key => $value) {
			                     					$rate = $value['RATE'];
			                     					$comment = $value['C_COMMENT'];
			                     					$date = $value['COMMENT_DATE'];
			                     					$commentId = $value['ID'];
			                     					$productId = $value['PRODUCT_ID'];
			                     				?>
			                     					<!-- Comment Row -->
				                     				<div class="col-12 card mb-3" style="padding: 20px; border-width: 2px;">
				                     					<span style="font-weight: bold; margin-bottom: 5px;">
				                     						<span style="font-size: 15px;">Puan: </span><div class='starrrProduct'></div>
				                     					</span>
				                     					<span style="font-weight: bold; font-size: 15px;">Yorum</span>
				                     					<?php echo $comment; ?>
				                     					<span style="position: absolute; right: 0; font-weight: bold; font-size: 15px; margin-right: 20px;"><?php echo $date; ?></span>
				                     					<span>
			                     							<button class="mt-3" style="float: right; border-radius: <?php echo $globalRadius; ?>px; background-color: <?php echo $globalColor; ?>; color: white;" onclick="window.location.href='urun?urunId=<?php echo $productId; ?>&edit=<?php echo $commentId; ?>'"> Yorumu Düzenle</button>
			                     						</span>
				                     				</div>
				                     				<script type="text/javascript">
			                                     		jQuery('.starrrProduct').starrr({ readOnly: true, rating: <?php echo intval($rate); ?> });
			                                     	</script>
				                     				<!-- Comment Row -->
			                     				<?php } ?>

			                     				<?php if(count($commentArray) == 0) { ?>
			                     					<div class='woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info'>
						                        		Henüz yorum yapmadınız!
						                        </div>";
			                     				<?php } ?>
			                     			</div>
			                     		</div>
			                     	<?php } ?> <!-- Comment End -->

			                     	<?php if($_GET['ct'] == '3' && $_GET['address'] == '') { $addressArray = $db->GetCustomerAddress($_SESSION['CUSTOMER_FIREBASE_ID']); ?>
			                     		<div class="container-fluid" id="all-address">
			                     			<div class="row">
			                     				<div class="col-12 col-lg-4 mb-3">
			                     					<div class="card center" style="cursor: pointer; border-width: 2px; font-size: 16px;" onclick="AddPanelOpen();">
			                     						<center > <i class="fa fa-plus"></i> Yeni Adres Ekle</center>
			                     					</div>
			                     				</div>
			                     				<?php if(count($addressArray) > 0) { 
			                     					foreach ($addressArray as $key => $value) { 
			                     						//ID, C_FIREBASE_ID, C_NAME, SURNAME, PHONE, ADDRESS_NAME, ADDRESS, CITY_ID, PROVINCE_ID
			                     						$addressId = $value['ADDRESS_ID'];
			                     						$name = $value['C_NAME'];
			                     						$surname = $value['SURNAME'];
			                     						$phone = $value['PHONE'];
			                     						$addressName = $value['ADDRESS_NAME'];
			                     						$address = $value['ADDRESS'];
			                     						$cityName = $value['CITY_NAME'];
			                     						$provinceName = $value['PROVINCE_NAME'];
			                     					?>
			                     						<div class="col-12 col-lg-4 mb-3" >
					                     					<div class="card" style="padding: 20px; min-height: 300px; border-width: 2px;">
					                     						<span style="font-weight: bold; font-size: 15px;"><?php echo $addressName; ?></span>
					                     						<span><?php echo $name.' '.$surname; ?></span>
					                     						<span><?php echo $address; ?></span>
					                     						<span><?php echo $cityName.'/ '.$provinceName; ?></span>
					                     						<span style="font-weight: bold;"><?php echo $phone; ?></span>

					                     						<div style="position: absolute; right: 0; bottom: 0; padding: 12px;">
						                     						<i class="fa fa-pencil fa-lg" style="margin-right: 10px; cursor: pointer;" onclick="AddressEdit(<?php echo $addressId; ?>);"></i>
						                     						<i class="fa fa-trash fa-lg" style="cursor: pointer;" onclick="AddressDelete(<?php echo $addressId; ?>);"></i>
						                     					</div>
					                     					</div>
					                     				</div>
			                     					<?php } ?>
			                     				<?php } ?>
			                     			</div>
			                     			<script type="text/javascript">
			                     				function AddPanelOpen(){
			                     					document.getElementById("all-address").style.display = 'none';
			                     					document.getElementById("add-address").style.display = '';
			                     				}
			                     			</script>
			                     		</div>

			                     		<div class="container-fluid" id="add-address" style="display: none;">
			                     			<div class="row">
			                     				<!-- Inputs -->
			                     				<div class="col-12 col-lg-6">
			                     					<div class="row">
			                     						<div class="col-6">
															<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
																<label for="name">Ad&nbsp;<span class="required">*</span></label>
																<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="name" autocomplete="off" value="">
															</p>
			                     						</div>
			                     						<div class="col-6">
			                     							<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
																<label for="surname">Soyad&nbsp;<span class="required">*</span></label>
																<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="surname" autocomplete="off" value="">
															</p>
			                     						</div>
			                     					</div>
			                     					<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														<label for="phone">Telefon&nbsp;<span class="required">*</span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="phone" autocomplete="off" value="05">
													</p>
													<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														<label for="addressName">Adres İsmi&nbsp;<span class="required">*</span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="addressName" autocomplete="off" value="">
													</p>
													<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														 <label for="billing_city" >Şehir&nbsp;<span class="required">*</span></label>
														 <select id="billing_city" class="state_select select2-hidden-accessible" autocomplete="address-level1" data-placeholder="Bir seçenek belirleyin…" onchange="GetProvince()" >
															  <option value="">Bir seçenek belirleyin…</option>
															   <?php $cityArray = $db->CustomerGetCity(); foreach ($cityArray as $key => $value) {
															  	$cityId = $value['ID'];
															  	$cityName = $value['CITY_NAME']; ?>
															  	<option value="<?php echo $cityId; ?>"><?php echo $cityName; ?></option>
															  <?php } ?>
														</select>
													</p>
													<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														<label for="billing_province" >İlçe&nbsp;<span class="required">*</span></label>
														<select id="billing_province" class="state_select select2-hidden-accessible" autocomplete="address-level1" data-placeholder="Bir seçenek belirleyin…" data-input-classes="" tabindex="-1" aria-hidden="true">
															<option value="">Bir seçenek belirleyin…</option>
														</select>
													</p>
													<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														<label for="address">Adres&nbsp;<span class="required">*</span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="address" autocomplete="off" value="">
													</p>
													<button class="mt-1" style="float: right; border-radius: <?php echo $globalRadius; ?>px; background-color: <?php echo $globalColor; ?>; color: white;" onclick="AddPanelSave()"> Kaydet</button>
													<!-- Inputs -->
			                     				</div>
			                     			</div>
			                     		</div>
			                     	<?php } else if($_GET['ct'] == '3' && $_GET['address'] != '') { ?> <!-- Address End -->
			                     		<?php 
			                     			$addressArray = $db->GetCustomerAddress($_SESSION['CUSTOMER_FIREBASE_ID'],$_GET['address']);

			                     			$addressId = $addressArray['ADDRESS_ID'];
                     						$name = $addressArray['C_NAME'];
                     						$surname = $addressArray['SURNAME'];
                     						$phone = $addressArray['PHONE'];
                     						$addressName = $addressArray['ADDRESS_NAME'];
                     						$address = $addressArray['ADDRESS'];
                     						$cityName = $addressArray['CITY_NAME'];
                     						$provinceName = $addressArray['PROVINCE_NAME'];
                     						$cCityId = $addressArray['CITY_ID'];
                     						$cProvinceId = $addressArray['PROVINCE_ID'];
			                     		?>
			                     		<div class="container-fluid" id="add-address">
			                     			<div class="row">
			                     				<!-- Inputs -->
			                     				<div class="col-12 col-lg-6">
			                     					<div class="row">
			                     						<div class="col-6">
															<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
																<label for="name">Ad&nbsp;<span class="required">*</span></label>
																<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="name" autocomplete="off" value="<?php echo $name; ?>">
															</p>
			                     						</div>
			                     						<div class="col-6">
			                     							<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
																<label for="surname">Soyad&nbsp;<span class="required">*</span></label>
																<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="surname" autocomplete="off" value="<?php echo $surname; ?>">
															</p>
			                     						</div>
			                     					</div>
			                     					<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														<label for="phone">Telefon&nbsp;<span class="required">*</span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="phone" autocomplete="off" value="<?php echo $phone; ?>">
													</p>
													<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														<label for="addressName">Adres İsmi&nbsp;<span class="required">*</span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="addressName" autocomplete="off" value="<?php echo $addressName; ?>">
													</p>
													<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														 <label for="billing_city" >Şehir&nbsp;<span class="required">*</span></label>
														 <select id="billing_city" class="state_select select2-hidden-accessible" autocomplete="address-level1" data-placeholder="Bir seçenek belirleyin…" onchange="GetProvince()" >
															  <option value="">Bir seçenek belirleyin…</option>
															   <?php $cityArray = $db->CustomerGetCity(); foreach ($cityArray as $key => $value) {
															  	$cityId = $value['ID'];
															  	$cityName = $value['CITY_NAME']; ?>
															  	<option value="<?php echo $cityId; ?>" <?php if($cityId == $cCityId) echo 'selected'; ?>><?php echo $cityName; ?></option>
															  <?php } ?>
														</select>
													</p>
													<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														<label for="billing_province" >İlçe&nbsp;<span class="required">*</span></label>
														<select id="billing_province" class="state_select select2-hidden-accessible" autocomplete="address-level1" data-placeholder="Bir seçenek belirleyin…" data-input-classes="" tabindex="-1" aria-hidden="true">
															<option value="">Bir seçenek belirleyin…</option>
															   <?php $provinceArray = $db->CustomerGetProvince($cCityId); foreach ($provinceArray as $key => $value) {
															  	$provinceId = $value['ID'];
															  	$provinceName = $value['PROVINCE_NAME']; ?>
															  	<option value="<?php echo $provinceId; ?>" <?php if($provinceId == $cProvinceId) echo 'selected'; ?>><?php echo $provinceName; ?></option>
															  <?php } ?>
														</select>
													</p>
													<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														<label for="address">Adres&nbsp;<span class="required">*</span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="address" autocomplete="off" value="<?php echo $address; ?>">
													</p>
													<button class="mt-1" style="float: right; border-radius: <?php echo $globalRadius; ?>px; background-color: <?php echo $globalColor; ?>; color: white;" onclick="UpdatePanelSave()"> Güncelle</button>
													<!-- Inputs -->
			                     				</div>
			                     			</div>
			                     		</div>
			                     	<?php } ?> <!-- Address Edit End -->
			                     	
			                     	<?php if($_GET['ct'] == '4') { ?>
			                     		<?php $customerArray = $db->GetCustomers($_SESSION["CUSTOMER_FIREBASE_ID"],true);
			                     			$cId = $customerArray['ID'];
			                     			$name = $customerArray['NAME'];
			                     			$surname = $customerArray['SURNAME'];
			                     			$email = $customerArray['EMAIL'];
			                     			$phone = $customerArray['PHONE'];
			                     			$birthday = $customerArray['BIRTHDAY'];
			                     			$gender = $customerArray['GENDER'];
			                     		?>
			                     		<div class="container-fluid">
			                     			<div class="row">
			                     				<div class="col-12 col-lg-6">
			                     					<!-- Inputs -->
			                     					<div class="row">
			                     						<div class="col-6">
															<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
																<label for="name">Ad&nbsp;<span class="required">*</span></label>
																<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="name" autocomplete="off" value="<?php echo $name; ?>">
															</p>
			                     						</div>
			                     						<div class="col-6">
			                     							<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
																<label for="surname">Soyad&nbsp;<span class="required">*</span></label>
																<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="surname" autocomplete="off" value="<?php echo $surname; ?>">
															</p>
			                     						</div>
			                     					</div>
			                     					<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														<label for="phone">E-Posta&nbsp;<span class="required"></span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="email" autocomplete="off" value="<?php echo $email; ?>" disabled="">
													</p>
			                     					<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														<label for="phone">Telefon&nbsp;<span class="required"></span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="phone" autocomplete="off" value="<?php echo $phone; ?>" disabled="">
													</p>
													<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
														<label for="birthday">Doğum Tarihi&nbsp;<span class="required">*</span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="birthday" autocomplete="off" value="<?php echo $birthday; ?>" placeholder="GG/AA/YYYY">
													</p>
													<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
											         <div class="">
											         	<div class="row">
											         		<div class="col-4" style="padding-left: 10px; margin-top: -20px; margin-bottom: -20px;">
											         			 <label for="reg_gender">Cinsiyet&nbsp;<span class="required">*</span></label>
											         		</div>
											         		<div class="col-4" style="margin-top: -15px; ">
												         		<input class="form-check-input" type="radio" value="opt1" id="gender_woman" onchange="HandleWoman()" <?php 
												         			if($gender == 'Kadın') echo 'checked="true"'; else echo false;
												         		 ?>>
												         		 <label class="form-check-label" for="gender_woman" style="margin-top: -4px; cursor: pointer;">
																    Kadın
																 </label>
												         	</div>
												         	<div class="col-4" style="margin-top: -15px; ">
												         		<input class="form-check-input" type="radio" value="opt1" id="gender_man" onchange="HandleMan();" <?php 
												         			if($gender == 'Erkek') echo 'checked="true"'; else echo false;
												         		 ?>>
												         		 <label class="form-check-label" for="gender_man" style="margin-top: -4px; cursor: pointer;">
																    Erkek
																 </label>
												         	</div>
											         	</div>
											         </div>
											      </p>
											      <button class="mt-1" style="float: right; border-radius: <?php echo $globalRadius; ?>px; background-color: <?php echo $globalColor; ?>; color: white;" onclick="UpdateCustomerInfo()"> Kaydet</button>
													<!-- Inputs -->
			                     				</div>
			                     			</div>
			                     		</div> <!-- Account Info Edit End -->
			                     	<?php } ?>

			                     	<?php if($_GET['ct'] == '5') { ?>
			                     		<div class="container-fluid">
			                     			<div class="row">
			                     				<div class="col-12 col-lg-6">
			                     					 <div class="woocommerce-ResetPassword">
									                     <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									                        <label for="user_login">Geçerli Şifre</label>
									                        <input style="-webkit-text-security: disc;" class="woocommerce-Input woocommerce-Input--text input-text" type="text" id="currentPassword" autocomplete="off">
									                     </p>
									                     <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									                        <label for="user_login">Yeni Şifre</label>
									                        <input style="-webkit-text-security: disc;" class="woocommerce-Input woocommerce-Input--text input-text" type="text" id="newPassword" autocomplete="off">
									                     </p>
									                     <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									                        <label for="user_login">Yeni Şifre (Tekrar)</label>
									                        <input style="-webkit-text-security: disc;" class="woocommerce-Input woocommerce-Input--text input-text" type="text" id="checkPassword" autocomplete="off">
									                     </p>
									                     <div class="clear"></div>
									                     <button id="changeButton" class="mt-1" style="float: right; border-radius: <?php echo $globalRadius; ?>px; background-color: <?php echo $globalColor; ?>; color: white;" onclick="PasswordChange()"> Şifremi Değiştir</button>
									                  </div>
			                     				</div>
			                     			</div>
			                     		</div>
			                     	<?php } ?> <!-- Password Change End -->
			                     	<?php if($_GET['order'] == 'ok') { ?>
			                     		<div class="modal fade order-ok-modal" tabindex="-1" role="dialog" aria-hidden="true">
									        <div class="modal-dialog modal-dialog-centered">
									            <div class="modal-content">
									                <div class="modal-body">
									                	<center>
									                		<i class="fa fa-check-circle fa-6x" style="color: green;"></i>
									                		<p class="mt-3" style="font-size: 19px;">Teşekkürler! <br> Siparişiniz Başarıyla Tamamlandı! <br>
									                			<span style="font-size: 17px; font-weight: bold;">
									                				Sipariş Kodunuz: <?php 
										                				$cOrder = count($customerOrderArray);
																		if($cOrder > 0){
																			echo $customerOrderArray[$cOrder-1]["ORDER_CODE"];
																		}
										                			?>
									                			</span>
									                		</p>
									                		<p class="mt-4" style="font-size: 16px;">
									                			Siparişlerinizin durumunu takip etmek için <a href="/siparis-takibi">sipariş takibi</a> sayfasını ziyaret edebilirsiniz.
									                		</p>
									                		<button class="mt-1" style="border-radius: <?php echo $globalRadius; ?>px; background-color: <?php echo $globalColor; ?>; color: white;" data-dismiss="modal" aria-label="Close"> Tamam</button>
									                	</center>
									                </div>
									            </div>
									        </div>
								        </div>
			                     	<?php } ?>
			                     </div> <!-- Content Area End -->
			                     <!-- .woocommerce-my-account-wrapper -->
			                  </div>
			               </div>
			            </div>
			         </article>
			         <!-- #post -->
			      </div>
			   </div>
			</div>
		</div>

		<div style="display: none;" class="woocommerce-notices-wrapper" id="alertDiv" onclick="document.getElementById('alertDiv').style.display = 'none';"><ul class="woocommerce-error" role="alert"><li><strong id="AlertTitle">Hata:</strong> <span id="alertMessage"></span></li></ul></div>

		<?php include 'extra/footer.php'; ?>
	</div>
	<div id="dark-panel" class="woodmart-close-side" onclick="DarkPanelClose();"></div>
	<?php include 'extra/mobile_menu.php'; ?>
	<?php include 'extra/shopping_menu.php'; ?>

	<script src="vendor/js/jquery.inputmask.min.js"></script>
	<script defer="" src="vendor/js/s1.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		jQuery(":input").inputmask();
		jQuery("#phone").inputmask({"mask": "(9999) 999-9999"});
		jQuery("#birthday").inputmask({"mask": "99/99/9999"});

		var dropOpen = 0;
		var mobileMenuOpen = 0;
		var shoppingMenuOpen = 0;
		var subOrder = 0;

		function HandleWoman(){
        	var checked = document.getElementById("gender_woman").checked;
        	if(checked == true){
        		var checked = document.getElementById("gender_man").checked = false;
        	}
        	else{
        		var checked = document.getElementById("gender_man").checked = true;
        	}
        }

        <?php 
			$cOrder = count($customerOrderArray);
			if($cOrder > 0){
				echo "jQuery('.order-ok-modal').modal('show');";
			} 
		 ?>
        function HandleMan(){
        	var checked = document.getElementById("gender_man").checked;
        	if(checked == true){
        		var checked = document.getElementById("gender_woman").checked = false;
        	}
        	else{
        		var checked = document.getElementById("gender_woman").checked = true;
        	}
        }

		function DropDownOpen() {
			if(dropOpen){
				document.getElementById('CategoryListDiv').style.display = 'none';
				dropOpen = 0;
			}
			else{
				document.getElementById('CategoryListDiv').style.display = 'block';
				dropOpen = 1;
			}
			
		}

		function OpenSubOrder() {
			if(subOrder){
				document.getElementById('subOrderArea').style.display = 'none';
				subOrder = 0;
			}
			else{
				document.getElementById('subOrderArea').style.display = 'block';
				subOrder = 1;
			}
			
		}

		function MobileMenuOpen(){
			if(mobileMenuOpen){
				document.getElementById("mobile-menu-div").classList.remove('act-mobile-menu');
				document.getElementById("dark-panel").classList.remove('woodmart-close-side-opened');
				mobileMenuOpen = 0;
			}
			else{
				document.getElementById("mobile-menu-div").classList.add('act-mobile-menu');
				document.getElementById("dark-panel").classList.add('woodmart-close-side-opened');
				mobileMenuOpen = 1;
			}
		}

		function ShoppingMenuOpen(){
			if(shoppingMenuOpen){
				document.getElementById("shopping-menu-div").classList.remove('woodmart-cart-opened');
				document.getElementById("dark-panel").classList.remove('woodmart-close-side-opened');
				shoppingMenuOpen = 0;
			}
			else{
				document.getElementById("shopping-menu-div").classList.add('woodmart-cart-opened');
				document.getElementById("dark-panel").classList.add('woodmart-close-side-opened');
				shoppingMenuOpen = 1;
			}
		}

		function DarkPanelClose(){
			document.getElementById("dark-panel").classList.remove('woodmart-close-side-opened');
			if(mobileMenuOpen){
				MobileMenuOpen();
			}
			
			if(shoppingMenuOpen){
				ShoppingMenuOpen();
			}

			if(accountMenuOpen){
				OpenAccountMenu();
			}
			
		}

		function AjaxRequest(RequestType, Url, Data, callback, formData = false, res_json = false){
            if(!formData){
            	jQuery.ajax({
	                   type: RequestType,
	                   xhrFields: {
	                   withCredentials: true
	               },
	                  crossDomain: true,
	                  url: Url,
	                  data: Data,
	                  dataType: 'json',        
	               success: function(returnData) {
	                 if(res_json){
	                 	 callback(returnData);
	                 }
	                 else{
	                 	 callback(returnData['status']);
	                 }  
	               },
	               error: function(error) {
	                  console.log(error);
	               }
	            });
            }
            else{
            	$.ajax({
	                   type: RequestType,
	                   xhrFields: {
	                   withCredentials: true
	               },
	                  crossDomain: true,
	                  url: Url,
	                  data: Data,
	                  processData: false,
    				  contentType: false,        
	               success: function(returnData) {
	                  callback(returnData['status']);    
	               },
	               error: function(error) {
	                  console.log(error);
	               }
	            });
            }
         }
		
		function GetProvince(){
        	var cityId = GetCityId('billing_city');
        	
        	if(cityId){
        		AjaxRequest('POST','extra/_get_province.php',{
        			'CITY_ID' : cityId
        		},(code) => {
        			var x = document.getElementById("billing_province");
					if (x.length > 0) {
					 	for (var i = x.length - 1; i >= 0; i--) {
					 		x.remove(i);
					 	}
					}

					AddOption('billing_province','Bir seçenek belirleyin…',0);
					for (var y = code.length - 1; y >= 0; y--) {
						AddOption('billing_province',code[y]['PROVINCE_NAME'],code[y]['ID']);
					}
                    
        		});
        	}
        }

        function AddressDelete(id){
        	AjaxRequest('POST','extra/_address_delete.php', {
        		'ADDRESS_ID': id
        	}, (code) => {
        		if(code == "success"){
        			window.location.reload();
        		}
        		else{
        			AlertBox('Bir sorun oluştu. Lütfen tekrar deneyiniz!','Hata: ');
        		}
        	})
        }

        function AddressEdit(id){
        	window.location.href = 'hesabim?ct=3&address=' + id;
        }

        function GetCityId(elm){
            var element = document.getElementById(elm); 
            try {
                return element.options[element.selectedIndex].value;
            }catch(err){
                return '0';
            }
        }

        function AddOption(element,optionText,optionValue) {
            jQuery('#' + element).append(new Option(optionText, optionValue));
        }

        function AlertBox(message,title){
        	document.getElementById('alertDiv').style.display = 'block';
        	document.getElementById('alertMessage').textContent = message;
        	document.getElementById('AlertTitle').textContent = title;
        	setTimeout(function(){ document.getElementById('alertDiv').style.display = 'none'; }, 3000);
        }


        function AddPanelSave(){
        	var name = GetInput("name");
        	var surname = GetInput("surname");
        	var phone = jQuery("#phone").inputmask('unmaskedvalue');
        	var addressName = GetInput("addressName");
        	var address = GetInput("address");
        	var cityId = GetCityId('billing_city');
        	var provinceId = GetCityId('billing_province');

        	if(name != '' && surname != '' && phone.length == 11 && addressName != '' && address != '' && (cityId != '' && cityId != '0' && cityId != 0) && (provinceId != '' && provinceId != '0' && provinceId != 0)){
        		AjaxRequest('POST','extra/_address_save.php', {
        			'NAME': name,
        			'SURNAME': surname,
        			'PHONE': phone,
        			'ADDRESS_NAME': addressName,
        			'ADDRESS': address,
        			'CITY_ID': cityId,
        			'PROVINCE_ID': provinceId
        		}, (code) => {
        			if(code == 'success'){
        				window.location.reload();
        			}
        			else{
        				AlertBox('Bir sorun oluştu. Lütfen tekrar deneyiniz!','Hata: ');
        			}
        		})
        	}
        	else{
        		AlertBox('Lütfen gerekli alanları doldurunuz!','Hata: ');
        	}
        }

        function UpdateCustomerInfo(){
        	var name = GetInput("name");
        	var surname = GetInput("surname");

        	var birthday = GetInput("birthday");
	  		var isValidDate = Inputmask.isValid(birthday, { alias: "datetime", inputFormat: "dd/mm/yyyy"});
        	var gender = document.getElementById("gender_man").checked == true ? 'Erkek' : 'Kadın';

        	if(name != '' && surname != '' && isValidDate == true) {
        		AjaxRequest('POST','extra/_update_customer_info.php', {
        			'NAME': name,
        			'SURNAME': surname,
        			'BIRTHDAY': birthday,
        			'GENDER': gender
        		}, (code) => {
        			if(code == 'success'){
        				AlertBox('Hesap bilgileriniz güncellendi!','Bilgi: ');
        			}
        			else{
        				AlertBox('Hesap bilgileriniz güncellendi!','Bilgi: ');
        			}
        		})
        	}
        	else{
        		AlertBox('Lütfen gerekli alanları doldurunuz!','Hata: ');
        	}

        }

        function UpdatePanelSave(){
        	var name = GetInput("name");
        	var surname = GetInput("surname");
        	var phone = jQuery("#phone").inputmask('unmaskedvalue');
        	var addressName = GetInput("addressName");
        	var address = GetInput("address");
        	var cityId = GetCityId('billing_city');
        	var provinceId = GetCityId('billing_province');

        	if(name != '' && surname != '' && phone.length == 11 && addressName != '' && address != '' && (cityId != '' && cityId != '0' && cityId != 0) && (provinceId != '' && provinceId != '0' && provinceId != 0)){
        		AjaxRequest('POST','extra/_address_update.php', {
        			'ADDRESS_ID': <?php if($_GET['address'] != '') echo $_GET['address']; else echo 0; ?>,
        			'NAME': name,
        			'SURNAME': surname,
        			'PHONE': phone,
        			'ADDRESS_NAME': addressName,
        			'ADDRESS': address,
        			'CITY_ID': cityId,
        			'PROVINCE_ID': provinceId
        		}, (code) => {
        			if(code == 'success'){
        				window.location.href = 'hesabim?ct=3';
        			}
        			else{
        				AlertBox('Bir sorun oluştu. Lütfen tekrar deneyiniz!','Hata: ');
        			}
        		})
        	}
        	else{
        		AlertBox('Lütfen gerekli alanları doldurunuz!','Hata: ');
        	}
        }

        function GetInput(input){
            return document.getElementById(input).value;
        }

        var firebaseConfig = {
		    apiKey: "AIzaSyD8AtjHpSiPXdf9csM2InKqNmQFeGU65XI",
		    authDomain: "tunakardesler-b920d.firebaseapp.com",
		    projectId: "tunakardesler-b920d",
		    storageBucket: "tunakardesler-b920d.appspot.com",
		    messagingSenderId: "488384183911",
		    appId: "1:488384183911:web:49282646b3b74f25f01ec2"
		};
	  	firebase.initializeApp(firebaseConfig);


        function PasswordChange(){
			var currentPassword = GetInput("currentPassword");
			var newPassword = GetInput("newPassword");
			var checkPassword = GetInput("checkPassword");

			if(currentPassword){
				if(newPassword.length >= 8){
					if(newPassword == checkPassword){
						document.getElementById('changeButton').textContent = "Bekleyin...";
	  					document.getElementById('changeButton').disabled = true;

						firebase.auth().signInWithEmailAndPassword("<?php echo $_SESSION['CUSTOMER_EMAIL'];?>", currentPassword)
						  .then((user) => {
						     const currentUser = firebase.auth().currentUser;
							 const credentials = firebase.auth.EmailAuthProvider.credential(currentUser.email, currentPassword);
							 currentUser
							  .reauthenticateWithCredential(credentials)
							  .then(() => {
							    currentUser.updatePassword(newPassword).then(function() {
								  	document.getElementById('changeButton').disabled = false;
									document.getElementById('changeButton').textContent = "Şifremi Değiştir";

									document.getElementById('currentPassword').value = '';
									document.getElementById('newPassword').value = '';
									document.getElementById('checkPassword').value = '';

									AlertBox("Şifreniz başarıyla değiştirildi!",'Bilgi:');
								}).catch(function(error) {
								  	document.getElementById('changeButton').disabled = false;
									document.getElementById('changeButton').textContent = "Şifremi Değiştir";
									AlertBox("Bir hata oluştu: 0x001");
								});
							  })
							  .catch(err => {
							  	document.getElementById('changeButton').textContent = "Şifremi Değiştir";
						  		AlertBox("Geçerli şifreniz yanlış. Lütfen tekrar deneyiniz!");

							    AlertBox("Bir hata oluştu: 0x002");
							  });
						  })
						  .catch((error) => {
						  	document.getElementById('changeButton').disabled = false;
							document.getElementById('changeButton').textContent = "Şifremi Değiştir";
						  	AlertBox("Geçerli şifreniz yanlış. Lütfen tekrar deneyiniz!");
						});
					}
					else{
						AlertBox("Şifreniz uyuşmuyor. Lütfen tekrar deneyiniz!");
					}
				}
				else{
					AlertBox("Yeni şifreniz en az 8 karakter olmalıdır!");
				}
			}
			else{
				AlertBox("Geçerli şifrenizi yazınız!");
			}
		}
	</script>
</body>
</html>