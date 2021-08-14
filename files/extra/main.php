<div class="main-page-wrapper">
    <div class="container">
        <div class="row content-layout-wrapper align-items-start">
            <div class="site-content col-lg-12 col-12 col-md-12" role="main">
                <article id="post-1724" class="post-1724 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div class="vc_row wpb_row vc_row-fluid vc_custom_1533826872352 vc_row-o-content-middle vc_row-flex">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner vc_custom_1598143808335">

                                    <div class="wpb_wrapper">
                                        <div id="main-slider" class="carousel slide" data-ride="carousel" style="padding: 0px;">
                                          <div class="carousel-inner">
                                            <?php $i = 1; foreach ($slidesArray as $key => $value) { $slideId = $value["ID"]; $imgName = $value["IMG_NAME"]; if($i == 1){  ?>
                                                <div class="carousel-item active">
                                                  <img src="images/<?php echo $imgName; ?>" class="d-block w-100" style="cursor: pointer;" onclick="window.location.href = 'urunler?marka=<?php echo $value["ROUTE_BRAND_ID"]; ?>'" data-touch="true">
                                                </div>
                                            <?php }else { ?> 
                                                <div class="carousel-item">
                                                  <img src="images/<?php echo $imgName; ?>" class="d-block w-100" style="cursor: pointer;" onclick="window.location.href = 'urunler?marka=<?php echo $value["ROUTE_BRAND_ID"]; ?>'" data-touch="true">
                                                </div>
                                            <?php } $i++; } ?>
                                          </div>
                                          <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Geri</span>
                                          </a>
                                          <a class="carousel-control-next" href="#main-slider" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">İleri</span>
                                          </a>
                                        </div>


                                        <div class="vc_row wpb_row vc_row-fluid vc_custom_1598417831788">
                                            <?php foreach ($posterArray as $key => $value) { $posterId = $value["ID"]; $posterName = $value["IMG_NAME"]; ?>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                    <div class="vc_column-inner">
                                                        <div class="wpb_wrapper">
                                                            <div class="promo-banner-wrapper">
                                                                <div id="wd-5f45e98539cce" class="promo-banner banner-vr-align-bottom banner-hr-align-left banner- banner-hover-border color-scheme-dark banner-btn-size-default banner-btn-style-3d bannerHome cursor-pointer">
                                                                    <div class="main-wrapp-img">
                                                                        <div class="banner-image">
                                                                            <img width="360" height="390" src="images/<?php echo $posterName; ?>" class="promo-banner-image image-1 attachment-full" alt="" loading="lazy" sizes="(max-width: 360px) 100vw, 360px" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="wrapper-content-banner" onmouseleave="document.getElementById('btx'+<?php echo $key; ?>).style.display = 'none'" onmouseover="document.getElementById('btx'+<?php echo $key; ?>).style.display = ''">
                                                                        <div class="content-banner text-left content-width-100" >
                                                                            <div class="banner-title-wrap banner-title-custom" id="btx<?php echo $key; ?>" style="display: none; margin-top: -63%;">
                                                                            	<center>
                                                                            		<button 
                                                                            	  type="submit" 
                                                                            	  name="add-to-cart" 
                                                                            	  value="3160" 
                                                                            	  class="single_add_to_cart_button button alt" 
                                                                            	  style="border-radius: <?php echo $globalRadius; ?>px;" 
                                                                            	  onclick="window.location.href = '<?php 
                                                                            	  	$mainId = $value['MAIN_ID'];
                                                                            	  	$primaryId = $value['PRIMARY_ID'];
                                                                            	  	$secondaryId = $value['SECONDARY_ID'];
                                                                            	  	$productId = $value['PRODUCT_ID'];

                                                                            	  	if($mainId != "0" && $primaryId == "0" && $secondaryId == "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId == "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId.'&sk='.$primaryId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId != "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId.'&sk='.$primaryId.'&ssk='.$secondaryId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId != "0" && $productId != "0"){
                                                                            	  		echo 'urun?urunId='.$productId;
                                                                            	  	}
                                                                            	  ?>'">
                                                                            		Alışverişe Başla
                                                                            	</button>
                                                                            	</center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>


                                        <!-- ProductTabs -->
                                        <div class="vc_row wpb_row vc_row-fluid">
                                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div id="wd-5f45ec2fc785f" class="woodmart-products-tabs tabs-wd-5f45ec2fc785f tabs-design-simple ">
                                                            <div class="woodmart-tabs-header text-center">
                                                                <div class="woodmart-tabs-loader"></div>
                                                                <div class="tabs-navigation-wrapper">
                                                                    <span class="open-title-menu">Son Ürünler</span>
                                                                    <ul class="products-tabs-title">
                                                                        <li id="m1" class="active-tab-title" onclick="m1();">
                                                                            <span class="tab-label">Son Ürünler</span>
                                                                        </li>
                                                                        <li id="m2" class="" onclick="m2();">
                                                                            <span class="tab-label" >En Çok Satanlar</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="woodmart-tab-content" id="LastProduct">
                                                                <div class="container-fluid my-4" style="padding: 0">
                                                                    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                                                                    <!-- Multi Product Slide -->
                                                                    <div class="">
                                                                        <div class="row">
                                                                            <div id="someel" class="MultiCarousel carousel" data-items="2,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="100">
                                                                                <div class="MultiCarousel-inner">
                                                                                    <?php foreach ($slideProductArray as $key => $value) { $productId = $value["ID"]; $productName = $value["PRODUCT_NAME"]; $productPrice = $value["PRODUCT_PRICE"]; $productStock = $value["PRODUCT_STOCK_QUANTITY"];  $productStatus = $value["PRODUCT_TOP_STATUS"]; $discount = $value["PRODUCT_DISCOUNT"]; $productImageName = $db->GetProductImages($productId)[0]["PRODUCT_IMAGE_NAME"]; ?>
                                                                                        <div class="item">
                                                                                            <div class="pad15">
                                                                                                <div class="product-grid-item product woodmart-hover-quick type-product post-3159 status-publish last instock product_cat-cubuklu-oda-kokusu product_cat-makyaj-aynalari product_cat-masa-lambalari shipping-taxable purchasable product-type-simple">
                                                                                                    <div class="product-element-top">
                                                                                                        <a href="urun?urunId=<?php echo $productId; ?>/<?php echo $func->seo($productName); ?>" class="product-image-link">
                                                                                                            <img width="300" height="300" src="product/<?php echo $productImageName; ?>" class="woocommerce-placeholder wp-post-image" sizes="(max-width: 300px) 100vw, 300px" />

                                                                                                            <?php if($discount != '') { ?>
                                                                                                            <div style="height: 35px; width: 50px; background-color: <?php echo $infoContact['TOP_LEFT_BGCOLOR']; ?>; position: absolute; top: 0; padding-top: 5px; border-radius: 2px;">
                                                                                                                <span style="color: <?php echo $infoContact['TOP_LEFT_FRCOLOR']; ?>; font-weight: bold; font-size: 16px;">%<?php echo $discount; ?></span>
                                                                                                            </div>
                                                                                                            <?php } ?>

                                                                                                            <?php if($productStatus == 'NEW') { ?>
                                                                                                            <div style="height: 35px; width: 50px; background-color: <?php echo $infoContact['NEW_TOP_RIGHT_BGCOLOR']; ?>; position: absolute; top: 0; right: 0; padding-top: 5px; border-radius: 2px;">
                                                                                                                <p style="color: <?php echo $infoContact['NEW_TOP_RIGHT_FRCOLOR']; ?>; font-weight: bold; font-size: 12px; line-height: 13px;" >Yeni Ürün</p>
                                                                                                            </div>
                                                                                                            <?php } ?>

                                                                                                            <?php if($productStatus == 'WEB') { ?>
                                                                                                            <div style="height: 35px; width: 50px; background-color: <?php echo $infoContact['WEB_TOP_RIGHT_BGCOLOR']; ?>; position: absolute; top: 0; right: 0; padding-top: 5px; border-radius: 2px;">
                                                                                                                <p style="color: <?php echo $infoContact['WEB_TOP_RIGHT_FRCOLOR']; ?>; font-weight: bold; font-size: 11px; line-height: 13px;" >Web'e Özel</p>
                                                                                                            </div>
                                                                                                            <?php } ?>

                                                                                                        </a>
                                                                                                        <div class="woodmart-buttons wd-pos-r-t">
                                                                                                            <div class="woodmart-wishlist-btn wd-action-btn wd-wishlist-btn wd-style-icon">
                                                                                                               
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="quick-shop-wrapper">
                                                                                                        <div class="quick-shop-close wd-cross-button wd-size-s wd-with-text-left">
                                                                                                            <span>Kapat</span>
                                                                                                        </div>
                                                                                                        <div class="quick-shop-form"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <h3 class="product-title">
                                                                                                    <a href="urun?urunId=<?php echo $productId; ?>/<?php echo $func->seo($productName); ?>"><?php echo $productName; ?></a>
                                                                                                </h3>
                                                                                                <span class="price">
                                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                                        <?php if(intval($productStock) > 0) { ?>
                                                                                                        <bdi>
                                                                                                            <?php echo $func->FloatPrice($productPrice); ?>
                                                                                                            <span class="woocommerce-Price-currencySymbol">TL</span>
                                                                                                        </bdi>
                                                                                                        <?php } else {  ?>
                                                                                                            <bdi style="color: gray; font-weight: bold;">
                                                                                                                Stokta Yok
                                                                                                            </bdi>
                                                                                                        <?php } ?>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <button class="leftLst" style="padding: 7px;">
                                                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                                </button>
                                                                                <button class="rightLst" style="padding: 7px;">
                                                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /Multi Product Slide -->
                                                                </div>
                                                            </div>

                                                            <div class="woodmart-tab-content" id="MostProduct" style="display: none;">
                                                                <div class="container-fluid my-4" style="padding: 0">
                                                                    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                                                                    <!-- Multi Product Slide -->
                                                                    <div class="">
                                                                        <div class="row">
                                                                            <div id="someel" class="MultiCarousel carousel" data-items="2,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="100">
                                                                                <div class="MultiCarousel-inner">
                                                                                    <?php foreach ($slideProductArrayMost as $key => $value) { $productId = $value["ID"]; $productName = $value["PRODUCT_NAME"]; $productPrice = $value["PRODUCT_PRICE"]; $productStock = $value["PRODUCT_STOCK_QUANTITY"];  $productStatus = $value["PRODUCT_TOP_STATUS"]; $discount = $value["PRODUCT_DISCOUNT"]; $productImageName = $db->GetProductImages($productId)[0]["PRODUCT_IMAGE_NAME"]; ?>
                                                                                        <div class="item">
                                                                                            <div class="pad15">
                                                                                                <div class="product-grid-item product woodmart-hover-quick type-product post-3159 status-publish last instock product_cat-cubuklu-oda-kokusu product_cat-makyaj-aynalari product_cat-masa-lambalari shipping-taxable purchasable product-type-simple">
                                                                                                    <div class="product-element-top">
                                                                                                        <a href="urun?urunId=<?php echo $productId; ?>/<?php echo $func->seo($productName); ?>" class="product-image-link">
                                                                                                            <img width="300" height="300" src="product/<?php echo $productImageName; ?>" class="woocommerce-placeholder wp-post-image" sizes="(max-width: 300px) 100vw, 300px" />

                                                                                                            <?php if($discount != '') { ?>
                                                                                                            <div style="height: 35px; width: 50px; background-color: <?php echo $infoContact['TOP_LEFT_BGCOLOR']; ?>; position: absolute; top: 0; padding-top: 5px; border-radius: 2px;">
                                                                                                                <span style="color: <?php echo $infoContact['TOP_LEFT_FRCOLOR']; ?>; font-weight: bold; font-size: 16px;">%<?php echo $discount; ?></span>
                                                                                                            </div>
                                                                                                            <?php } ?>

                                                                                                            <?php if($productStatus == 'NEW') { ?>
                                                                                                            <div style="height: 35px; width: 50px; background-color: <?php echo $infoContact['NEW_TOP_RIGHT_BGCOLOR']; ?>; position: absolute; top: 0; right: 0; padding-top: 5px; border-radius: 2px;">
                                                                                                                <p style="color: <?php echo $infoContact['NEW_TOP_RIGHT_FRCOLOR']; ?>; font-weight: bold; font-size: 12px; line-height: 13px;" >Yeni Ürün</p>
                                                                                                            </div>
                                                                                                            <?php } ?>

                                                                                                            <?php if($productStatus == 'WEB') { ?>
                                                                                                            <div style="height: 35px; width: 50px; background-color: <?php echo $infoContact['WEB_TOP_RIGHT_BGCOLOR']; ?>; position: absolute; top: 0; right: 0; padding-top: 5px; border-radius: 2px;">
                                                                                                                <p style="color: <?php echo $infoContact['WEB_TOP_RIGHT_FRCOLOR']; ?>; font-weight: bold; font-size: 11px; line-height: 13px;" >Web'e Özel</p>
                                                                                                            </div>
                                                                                                            <?php } ?>

                                                                                                        </a>
                                                                                                        <div class="woodmart-buttons wd-pos-r-t">
                                                                                                            <div class="woodmart-wishlist-btn wd-action-btn wd-wishlist-btn wd-style-icon">
                                                                                                               
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="quick-shop-wrapper">
                                                                                                        <div class="quick-shop-close wd-cross-button wd-size-s wd-with-text-left">
                                                                                                            <span>Kapat</span>
                                                                                                        </div>
                                                                                                        <div class="quick-shop-form"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <h3 class="product-title">
                                                                                                    <a href="urun?urunId=<?php echo $productId; ?>/<?php echo $func->seo($productName); ?>"><?php echo $productName; ?></a>
                                                                                                </h3>
                                                                                                <span class="price">
                                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                                        <?php if(intval($productStock) > 0) { ?>
                                                                                                        <bdi>
                                                                                                            <?php echo $func->FloatPrice($productPrice); ?>
                                                                                                            <span class="woocommerce-Price-currencySymbol">TL</span>
                                                                                                        </bdi>
                                                                                                        <?php } else {  ?>
                                                                                                            <bdi style="color: gray; font-weight: bold;">
                                                                                                                Stokta Yok
                                                                                                            </bdi>
                                                                                                        <?php } ?>
                                                                                                    </span>
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <button class="leftLst" style="padding: 7px;">
                                                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                                </button>
                                                                                <button class="rightLst" style="padding: 7px;">
                                                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /Multi Product Slide -->
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /ProductTabs -->

                                        <!-- BottomPromo -->
                                        <div class="vc_row wpb_row vc_row-fluid vc_custom_1598417831788">
                                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="promo-banner-wrapper">
                                                            <div id="wd-5f45ebeb27fa2" class="promo-banner banner-vr-align-bottom banner-hr-align-left banner- banner-hover-border color-scheme-dark banner-btn-size-default banner-btn-style-3d bannerHome cursor-pointer">
                                                                <div class="main-wrapp-img">
                                                                    <div class="banner-image">
                                                                        <img width="740" height="320" src="images/<?php echo $advertArray[0]["IMG_NAME"]; ?>" class="promo-banner-image image-1 attachment-full" sizes="(max-width: 740px) 100vw, 740px" />
                                                                    </div>
                                                                </div>
                                                                <div class="wrapper-content-banner " onmouseleave="document.getElementById('bt1').style.display = 'none'" onmouseover="document.getElementById('bt1').style.display = ''">
                                                                    <div class="content-banner text-left content-width-100">
                                                                        <div class="banner-title-wrap banner-title-custom" id="bt1" style="display: none; margin-top: -20.5%;">
                                                                        	<center>
                                                                            	<button 
                                                                            	  type="submit" 
                                                                            	  name="add-to-cart" 
                                                                            	  value="3160" 
                                                                            	  class="single_add_to_cart_button button alt" 
                                                                            	  style="border-radius: <?php echo $globalRadius; ?>px;" 
                                                                            	  onclick="window.location.href = '<?php 
                                                                            	  	$mainId = $advertArray[0]['MAIN_ID'];
                                                                            	  	$primaryId = $advertArray[0]['PRIMARY_ID'];
                                                                            	  	$secondaryId = $advertArray[0]['SECONDARY_ID'];
                                                                            	  	$productId = $advertArray[0]['PRODUCT_ID'];

                                                                            	  	if($mainId != "0" && $primaryId == "0" && $secondaryId == "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId == "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId.'&sk='.$primaryId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId != "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId.'&sk='.$primaryId.'&ssk='.$secondaryId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId != "0" && $productId != "0"){
                                                                            	  		echo 'urun?urunId='.$productId;
                                                                            	  	}
                                                                            	  ?>'">
                                                                            		Alışverişe Başla
                                                                            	</button>
                                                                           	</center>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="promo-banner-wrapper">
                                                            <div id="wd-5f45ebf5b8308" class="promo-banner banner-vr-align-bottom banner-hr-align-left banner- banner-hover-border color-scheme-dark banner-btn-size-default banner-btn-style-3d bannerHome cursor-pointer">
                                                                <div class="main-wrapp-img">
                                                                    <div class="banner-image"> 
                                                                        <img width="740" height="320" src="images/<?php echo $advertArray[1]["IMG_NAME"]; ?>" class="promo-banner-image image-1 attachment-full" sizes="(max-width: 740px) 100vw, 740px" />
                                                                    </div>
                                                                </div>
                                                                <div class="wrapper-content-banner " onmouseleave="document.getElementById('bt2').style.display = 'none'" onmouseover="document.getElementById('bt2').style.display = ''">
                                                                    <div class="content-banner text-left content-width-100">
                                                                        <div class="banner-title-wrap banner-title-custom" id="bt2" style="display: none; margin-top: -20.5%;">
                                                                        	<center>
                                                                            	<button 
                                                                            	  type="submit" 
                                                                            	  name="add-to-cart" 
                                                                            	  value="3160" 
                                                                            	  class="single_add_to_cart_button button alt" 
                                                                            	  style="border-radius: <?php echo $globalRadius; ?>px;" 
                                                                            	  onclick="window.location.href = '<?php 
                                                                            	  	$mainId = $advertArray[1]['MAIN_ID'];
                                                                            	  	$primaryId = $advertArray[1]['PRIMARY_ID'];
                                                                            	  	$secondaryId = $advertArray[1]['SECONDARY_ID'];
                                                                            	  	$productId = $advertArray[1]['PRODUCT_ID'];

                                                                            	  	if($mainId != "0" && $primaryId == "0" && $secondaryId == "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId == "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId.'&sk='.$primaryId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId != "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId.'&sk='.$primaryId.'&ssk='.$secondaryId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId != "0" && $productId != "0"){
                                                                            	  		echo 'urun?urunId='.$productId;
                                                                            	  	}
                                                                            	  ?>'">
                                                                            		Alışverişe Başla
                                                                            	</button>
                                                                           	</center>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="promo-banner-wrapper">
                                                            <div id="wd-5f45ebf5b8308" class="promo-banner banner-vr-align-bottom banner-hr-align-left banner- banner-hover-border color-scheme-dark banner-btn-size-default banner-btn-style-3d bannerHome cursor-pointer">
                                                                <div class="main-wrapp-img">
                                                                    <div class="banner-image"> 
                                                                        <img width="740" height="320" src="images/<?php echo $advertArray[2]["IMG_NAME"]; ?>" class="promo-banner-image image-1 attachment-full" sizes="(max-width: 740px) 100vw, 740px" />
                                                                    </div>
                                                                </div>
                                                                <div class="wrapper-content-banner " onmouseleave="document.getElementById('bt3').style.display = 'none'" onmouseover="document.getElementById('bt3').style.display = ''">
                                                                    <div class="content-banner text-left content-width-100">
                                                                        <div class="banner-title-wrap banner-title-custom" id="bt3" style="display: none; margin-top: -20.5%;">
                                                                        	<center>
                                                                            	<button 
                                                                            	  type="submit" 
                                                                            	  name="add-to-cart" 
                                                                            	  value="3160" 
                                                                            	  class="single_add_to_cart_button button alt" 
                                                                            	  style="border-radius: <?php echo $globalRadius; ?>px;" 
                                                                            	  onclick="window.location.href = '<?php 
                                                                            	  	$mainId = $advertArray[2]['MAIN_ID'];
                                                                            	  	$primaryId = $advertArray[2]['PRIMARY_ID'];
                                                                            	  	$secondaryId = $advertArray[2]['SECONDARY_ID'];
                                                                            	  	$productId = $advertArray[2]['PRODUCT_ID'];

                                                                            	  	if($mainId != "0" && $primaryId == "0" && $secondaryId == "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId == "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId.'&sk='.$primaryId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId != "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId.'&sk='.$primaryId.'&ssk='.$secondaryId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId != "0" && $productId != "0"){
                                                                            	  		echo 'urun?urunId='.$productId;
                                                                            	  	}
                                                                            	  ?>'">
                                                                            		Alışverişe Başla
                                                                            	</button>
                                                                           	</center>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="promo-banner-wrapper">
                                                            <div id="wd-5f45ebf5b8308" class="promo-banner banner-vr-align-bottom banner-hr-align-left banner- banner-hover-border color-scheme-dark banner-btn-size-default banner-btn-style-3d bannerHome cursor-pointer">
                                                                <div class="main-wrapp-img">
                                                                    <div class="banner-image"> 
                                                                        <img width="740" height="320" src="images/<?php echo $advertArray[3]["IMG_NAME"]; ?>" class="promo-banner-image image-1 attachment-full" sizes="(max-width: 740px) 100vw, 740px" />
                                                                    </div>
                                                                </div>
                                                                <div class="wrapper-content-banner " onmouseleave="document.getElementById('bt4').style.display = 'none'" onmouseover="document.getElementById('bt4').style.display = ''">
                                                                    <div class="content-banner text-left content-width-100">
                                                                        <div class="banner-title-wrap banner-title-custom" id="bt4" style="display: none; margin-top: -20.5%;">
                                                                        	<center>
                                                                            	<button 
                                                                            	  type="submit" 
                                                                            	  name="add-to-cart" 
                                                                            	  value="3160" 
                                                                            	  class="single_add_to_cart_button button alt" 
                                                                            	  style="border-radius: <?php echo $globalRadius; ?>px;" 
                                                                            	  onclick="window.location.href = '<?php 
                                                                            	  	$mainId = $advertArray[3]['MAIN_ID'];
                                                                            	  	$primaryId = $advertArray[3]['PRIMARY_ID'];
                                                                            	  	$secondaryId = $advertArray[3]['SECONDARY_ID'];
                                                                            	  	$productId = $advertArray[3]['PRODUCT_ID'];

                                                                            	  	if($mainId != "0" && $primaryId == "0" && $secondaryId == "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId == "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId.'&sk='.$primaryId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId != "0" && $productId == "0"){
                                                                            	  		echo 'urunler?kategoriId='.$mainId.'&sk='.$primaryId.'&ssk='.$secondaryId;
                                                                            	  	}
                                                                            	  	else if($mainId != "0" && $primaryId != "0" && $secondaryId != "0" && $productId != "0"){
                                                                            	  		echo 'urun?urunId='.$productId;
                                                                            	  	}
                                                                            	  ?>'">
                                                                            		Alışverişe Başla
                                                                            	</button>
                                                                           	</center>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /BottomPromo -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
