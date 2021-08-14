<?php 
    include 'admin/class/function.php';
    $db = new Database();
    $func = new Functions();
    
    $infoContact = $db->GetInfos()[0];
    $globalColor = $infoContact['GLOBAL_COLOR'];
    $globalRadius = $infoContact['GLOBAL_RADIUS'];

    $nt1Array = json_decode($infoContact['STRING_JSON_1'],true);
    $nt2Array = json_decode($infoContact['STRING_JSON_2'],true);
    $categoryArray = $db->GetCategory();
    $slidesArray = $db->GetSlideImages();
    $posterArray = $db->GetPosterImages();
    $advertArray = $db->GetAdvertImages();
    $slideProductArray = $db->GetProducts('product_slider');
    $slideProductArrayMost = $db->GetProducts('most');

    function PhoneSpacer($phone){
        return '('.substr($phone,0,4).') '.substr($phone, 4,3).' '.substr($phone, 7,2).' '.substr($phone, 9, 2);
    }
    session_start();

    if($_GET['sepet'] == 'ekle' && $_GET['urun'] != '' && $_GET['adet'] != ''){
        $_SESSION['BAG'][$_GET['urun']] = $_GET['adet'];
    }
    else if($_GET['sepet'] == 'cikar' && $_GET['urun'] != ''){
       unset($_SESSION['BAG'][$_GET['urun']]);
    }

    if($_GET['sepet'] == 'ack'){
        unset($_SESSION['BAG']);
    }

    function SearchBag($productId){
        if (array_key_exists($productId, $_SESSION['BAG'])){ 
            return true;
        } 
        else{ 
            return false;
        } 
    }

?>
<header class="whb-header whb-sticky-shadow whb-scroll-stick whb-sticky-real">
    <div class="whb-main-header">
        <div class="whb-row whb-top-bar whb-not-sticky-row whb-with-bg whb-without-border whb-color-light whb-flex-flex-middle" style="background-color: <?php echo $nt1Array['bgcolor']; ?>;">
            <div class="container">
                <div class="whb-flex-row whb-top-bar-inner">
                    
                    <div class="whb-column whb-col-left whb-visible-lg">
                        <div class="whb-navigation whb-secondary-menu site-navigation woodmart-navigation menu-left navigation-style-bordered" role="navigation">
                            <div class="menu-top-bar-right-container">
                                <ul id="menu-top-bar-right" class="menu">
                                    <li id="menu-item-3088" class="woodmart-open-newsletter menu-item menu-item-type-custom menu-item-object-custom menu-item-3088 item-level-0 menu-item-design-default menu-simple-dropdown item-event-hover" >
                                        <a href="javascript:void(0)" class="woodmart-nav-link" onclick="window.scrollTo({ left: 0, top: document.body.scrollHeight, behavior: 'smooth' });">
                                            <i class="fa fa-envelope-o"></i>
                                            <span class="nav-link-text">Haber Bülteni</span>
                                        </a>
                                    </li>
                                    <li id="menu-item-3087" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3087 item-level-0 menu-item-design-default menu-simple-dropdown item-event-hover">
                                        <a href="mailto:<?php echo $infoContact["EMAIL"]; ?>" class="woodmart-nav-link">
                                            <span class="nav-link-text">İletişim</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="whb-col-center whb-visible-lg">
                        <center>
                            <span style="<?php echo 'color:'.$nt1Array['color'].';font-weight:'.$nt1Array['type'].';font-size:'.$nt1Array['size'].'px;'; ?>" ><?php echo $nt1Array['string']; ?></span>
                        </center>
                    </div>

                    <div class="whb-column whb-col-right whb-visible-lg">
                        <div class="woodmart-header-links woodmart-navigation menu-simple-dropdown wd-tools-element item-event-hover  my-account-with-text">
                            <a href="/siparis-takibi"> <span class="wd-tools-icon"> </span> <span class="wd-tools-text(removed)"> Sipariş Takibi</span> </a>
                        </div>
                        <div class="whb-divider-element whb-divider-default "></div>

                        <div class="woodmart-header-links woodmart-navigation menu-simple-dropdown wd-tools-element item-event-hover  my-account-with-text">
                            <?php if($_SESSION["CUSTOMER_EMAIL"] != '' && $_SESSION["CUSTOMER_FIREBASE_ID"] != '') { ?>
                                <div class="woodmart-header-links woodmart-navigation menu-simple-dropdown wd-tools-element item-event-hover  my-account-with-text">
                                 <a href="hesabim"> <span class="wd-tools-icon ml-2"> </span> <span class="wd-tools-text" style="color:white"> <?php echo $_SESSION["CS_NAME"]; ?> <?php echo $_SESSION["CS_SURNAME"]; ?></span> </a>
                                 <!-- <div class="sub-menu-dropdown menu-item-my-account color-scheme-dark">
                                   <ul class="sub-menu">
                                      <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders"><a href="/hesabim"><span>Siparişler</span></a></li>
                                      <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--wishlist"><a href="/parola-degistir"><span>Parola Değiştir</span></a></li>
                                      <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout"><a href="/?account=exit"><span>Çıkış Yap</span></a></li>
                                   </ul>
                                </div> (Removed) -->
                            </div>
                            <?php } else { ?>
                                 <a href="/giris-yap"> <span class="wd-tools-icon"> </span> <span class="wd-tools-text"> Giriş / Kayıt Ol </span> </a>
                            <?php } ?>
                        </div>

                        <div class="whb-divider-element whb-divider-default "></div>
                        <div class="woodmart-shopping-cart wd-tools-element woodmart-cart-design-2 woodmart-cart-alt cart-widget-opener" title="Sepetim">
                            <a href="javascript:void(0)" onclick="ShoppingMenuOpen();">
                            <span class="woodmart-cart-icon wd-tools-icon"><span class="woodmart-cart-number"><?php echo count($_SESSION['BAG']); ?> <span>items</span></span></span>
                            <i class="fa fa-shopping-cart fa-lg"></i>
                                <span class="woodmart-cart-totals wd-tools-text">
                                    <span class="subtotal-divider">/</span>
                                    <span class="woodmart-cart-subtotal">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                Sepet
                                            </bdi>
                                        </span>
                                    </span>
                                </span> 
                            </a>
                        </div>
                    </div>
                    <div class="whb-column whb-col-mobile whb-hidden-lg">
                        <div class="woodmart-header-links woodmart-navigation menu-simple-dropdown wd-tools-element item-event-hover  my-account-with-text">
                            <a href="/siparis-takibi"> <span class="wd-tools-icon"> </span> <span class="wd-tools-text(removed)"> Sipariş Takibi</span> </a>
                        </div>

                        <div class="whb-divider-element whb-divider-default "></div>
                         <?php if($_SESSION["CUSTOMER_EMAIL"] != '' && $_SESSION["CUSTOMER_FIREBASE_ID"] != '') { ?>
                                 <a href="javascript:void(0)" onclick="OpenAccountMenu()"> <span class="wd-tools-icon ml-2"> </span> <span class="wd-tools-text" style="color:white"> <?php echo $_SESSION["CS_NAME"].' '.$_SESSION["CS_SURNAME"]; ?></span> </a>
                            <?php } else { ?>
                                 <a href="/giris-yap"> <span class="wd-tools-icon ml-2"> </span> <span class="wd-tools-text" style="color:white"> Giriş / Kayıt Ol </span> </a>
                            <?php } ?>
                    </div>
                    </div>


                </div>
            </div>
            <?php if($nt2Array['string'] != '') { ?>
            <div class="whb-row whb-top-bar whb-not-sticky-row whb-with-bg whb-without-border whb-color-light whb-flex-flex-middle" style="background-color: <?php echo $nt2Array['bgcolor']; ?>;">
                <div class="whb-col-center" style="padding: 8px;">
                    <center>
                        <span style="<?php echo 'color:'.$nt2Array['color'].';font-weight:'.$nt2Array['type'].';font-size:'.$nt2Array['size'].'px;'; ?>" ><?php echo $nt2Array['string']; ?></span>
                    </center>
                </div>
            </div>
            <?php } ?>
            <div class="whb-row whb-general-header whb-not-sticky-row whb-without-bg whb-border-fullwidth whb-color-dark whb-flex-flex-middle">
                <div class="container">
                    <div class="whb-flex-row whb-general-header-inner">
                    <div class="whb-column whb-col-left whb-visible-lg">
                        <div class="site-logo">
                            <div class="woodmart-logo-wrap switch-logo-enable"> <a href="/" class="woodmart-logo woodmart-main-logo" rel="home"> 
                                <img src="<?php echo $func->colorImage('vendor/img/Logo.png',$globalColor); ?>" style="max-width: 200px;" /> </a> <a href="/" class="woodmart-logo woodmart-sticky-logo" rel="home"> 
                                    <img src="<?php echo $func->colorImage('vendor/img/Logo.png',$globalColor); ?>" style="max-width: 100px;"/> 
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="whb-column whb-col-center whb-visible-lg">
                        <div class="woodmart-search-form">
                            <div class="searchform  has-categories-dropdown search-style-default">
                                <input type="text" id="s" placeholder="Ürün Ara..." value="" autocomplete="off" style="padding-right: 50px; border-radius: <?php echo $globalRadius; ?>px;"/>
                                <!--<div class="search-by-category input-dropdown">
                                <div class="input-dropdown-inner woodmart-scroll-content">
                                    <a href="javascript:void(0)" data-val="0" onclick="DropDownOpen();"><span id="CategorySearch">Kategori Seç</span> <input type="hidden" id="sId"> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                     <div id="CategoryListDiv" class="list-wrapper woodmart-scroll has-scrollbar" style="display: none;" >
                                        <ul class="woodmart-scroll-content" tabindex="0" style="margin-right: -17px;">
                                            <?php foreach ($categoryArray as $key => $value) {
                                                $categoryId = $value["ID"];
                                                $categoryName = $value["CATEGORY_NAME"]; ?>
                                             <li class="cat-item cat-item-330">
                                                <a class="pf-value" href="javascript:void(0)" onclick="SearchWithCategoryName('<?php echo $categoryName; ?>','<?php echo $categoryId; ?>');"><?php echo $categoryName; ?></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="woodmart-scroll-pane" style="display: none">
                                            <div class="woodmart-scroll-slider" style="height: 20px; transform: translate(0px, 0px);"></div>
                                        </div>
                                    </div>
                                </div>
                                </div> -->
                                <button class="searchsubmit" onclick="Search();"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                            </div>
                            <div class="search-results-wrapper">
                                <div class="woodmart-scroll has-scrollbar">
                                <div class="woodmart-search-results woodmart-scroll-content" tabindex="0" style="margin-right: -17px;">
                                    <div class="autocomplete-suggestions" style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>
                                </div>
                                <div class="woodmart-scroll-pane" style="display: none;">
                                    <div class="woodmart-scroll-slider" style="height: 20px; transform: translate(0px, 0px);"></div>
                                </div>
                                </div>
                                <div class="woodmart-search-loader wd-fill"></div>
                            </div>
                        </div>
                    </div>
                    <div class="whb-column whb-col-right whb-visible-lg">
                        <div class="whb-text-element reset-mb-10 "><a href="javascript:void()" style="cursor: default;">
                            <i class="fa fa-envelope-o" style="position: absolute; margin-top: 6.5px; margin-left:5.5px; font-size:15px; color:white;"></i>
                            <img style="margin-right: 10px;" src="<?php echo $func->colorImage('vendor/img/mail-icon.png',$globalColor); ?>" alt="mail-icon" />

                            <span style="color: #333333;"><strong><?php echo $infoContact["EMAIL"]; ?></strong></span></a></div>
                        
                        <div class="whb-text-element reset-mb-10 ">
                            <a href="javascript:void()" style="cursor: default;">
                                <div class="woodmart-social-icons text-left icons-design-colored icons-size-small color-scheme-dark social-follow social-form-circle"> 
                            <a rel="nofollow" href="<?php echo $infoContact["FACEBOOK"]; ?>" target="_blank" class=" woodmart-social-icon social-facebook">
                            <i class="fa fa-facebook"></i> 
                            <span class="woodmart-social-icon-name">Facebook</span> 
                            </a> 
                            <a rel="nofollow" href="<?php echo $infoContact["INSTAGRAM"]; ?>" target="_blank" class=" woodmart-social-icon social-instagram">
                                <i class="fa fa-instagram"></i> 
                                <span class="woodmart-social-icon-name">Instagram</span>
                            </a>
                            <a rel="nofollow" href="https://wa.me/<?php echo $infoContact["WHATSAPP"]; ?>" target="_blank" class="whatsapp-desktop  woodmart-social-icon social-whatsapp">
                                <i class="fa fa-whatsapp"></i>
                                <span class="woodmart-social-icon-name">WhatsApp</span>
                            </a>
                        </div>
                            </a>
                        </div>
                    </div>
                    <div class="whb-column whb-mobile-left whb-hidden-lg">
                        <div class="woodmart-burger-icon wd-tools-element mobile-nav-icon whb-mobile-nav-icon wd-style-text" onclick="MobileMenuOpen();"> <a href="javascript:void(0)"> <span class="woodmart-burger wd-tools-icon"></span> <span class="woodmart-burger-label wd-tools-text">Menu</span> </a></div>
                    </div>
                    <div class="whb-column whb-mobile-center whb-hidden-lg">
                        <div class="site-logo">
                            <div class="woodmart-logo-wrap switch-logo-enable"> <a href="/" class="woodmart-logo woodmart-main-logo" rel="home"> <img src="<?php echo $func->colorImage('vendor/img/Logo.png',$globalColor); ?>" alt="Logo" style="max-width: 90px;" /> </a> <a href="/" class="woodmart-logo woodmart-sticky-logo" rel="home"> <img src="<?php echo $func->colorImage('vendor/img/Logo.png',$globalColor); ?>" alt="Logo" style="max-width: 100px;"/> </a></div>
                        </div>
                    </div>
                    <div class="whb-column whb-mobile-right whb-hidden-lg">
                        <div class="woodmart-shopping-cart wd-tools-element woodmart-cart-design-5 woodmart-cart-alt cart-widget-opener" title="Sepetim"> <a href="javascript:void(0)" onclick="ShoppingMenuOpen();"><span class="woodmart-cart-icon wd-tools-icon"> 			<span class="woodmart-cart-number"><?php echo count($_SESSION['BAG']); ?> <span>items</span></span>
		 </span><i class="fa fa-shopping-cart fa-lg"></i> <span class="woodmart-cart-totals wd-tools-text"> <span class="subtotal-divider">/</span>         <span class="woodmart-cart-subtotal"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">₺</span>0,00</bdi></span></span>
                            </span> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="whb-row whb-header-bottom whb-not-sticky-row whb-with-bg whb-without-border whb-color-light whb-flex-flex-middle whb-hidden-mobile">
            <div class="container">
                <div class="whb-flex-row whb-header-bottom-inner">
                <div class="whb-column whb-col-left whb-visible-lg">
                    <div class="whb-navigation whb-primary-menu main-nav site-navigation woodmart-navigation menu-left navigation-style-default" role="navigation">
                        <div class="menu-mega-menu-container">
                            <ul id="menu-mega-menu" class="menu" style="padding-left: 5px;">

                            <?php foreach ($categoryArray as $key => $value) { $categoryId = $value["ID"]; $categoryName = $value["CATEGORY_NAME"]; if($categoryName == 'Berber Store') continue; ?>
                                <li id="menu-item-3055" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-3055 item-level-0 menu-item-design-full-width menu-mega-dropdown  item-event-hover">
                                    <?php 
                                        $subcategoryArray = $db->GetSubCategory('admin',$categoryId);
                                        if(count($subcategoryArray)){
                                            echo "<a href='urunler?kategoriId=$categoryId' class='woodmart-nav-link' style='padding: 5px;'><span class='nav-link-text' style='font-size:0.8vw; margin-right: 40px;' >$categoryName</span></a>"; ?>
                                           
                                            <!-- New Menu -->
                                            <div class="sub-menu-dropdown color-scheme-dark" style="margin-top: -5px; /*border-top: 5px solid #222222;*/">
											   <div class="container">
											      <div class="vc_row wpb_row vc_row-fluid">
                                                    <?php foreach ($subcategoryArray as $key => $value) { $subId = $value["ID"]; $subName = $value["SUB_CATEGORY_NAME"]; ?>
                                                    <!-- Second Category -->
											         <div class="wpb_column vc_column_container vc_col-sm-2">
											            <div class="vc_column-inner">
											               <div class="wpb_wrapper">
											                  <ul class="sub-menu mega-menu-list">
											                     <li class="">
											                        <a href="urunler?<?php echo 'kategoriId='.$categoryId.'&sk='.$subId; ?>" title=""><span class="nav-link-text"><?php if($subName != '') echo $subName; ?><span style="color: #fff;">.</span></span></a>
											                        <ul class="sub-sub-menu">
                                                                        <?php $subsubcategoryArray = $db->GetSubSubCategory('admin',$categoryId,$subId); ?>

                                                                        <?php foreach ($subsubcategoryArray as $key => $value) { $subsubId = $value["ID"]; $subsubName = $value["SUB_SUB_CATEGORY_NAME"]; ?>
                                                                            <li class=""><a href="urunler?<?php echo 'kategoriId='.$categoryId.'&sk='.$subId.'&ssk='.$subsubId; ?>" title=""><span class="nav-link-text"><?php echo $subsubName; ?></span></a></li>
                                                                        <?php } ?>
											                        </ul>
											                     </li>
											                  </ul>
											               </div>
											            </div>
											         </div>
                                                     <!-- Second Category End -->
                                                     <?php } ?>
											      </div>
											   </div>
											</div>
											<!-- New Menu End -->
                                        <?php }
                                        else{
                                            echo "<a href='urunler?kategoriId=$categoryId' class='woodmart-nav-link' style='padding: 5px;'><span class='nav-link-text' style='font-size:0.8vw; margin-right: 40px;' >$categoryName</span></a>";
                                        }
                                    ?>
                                    
                                    </li>
                                <?php } ?>

                                <?php foreach ($categoryArray as $key => $value) { $categoryId = $value["ID"]; $categoryName = $value["CATEGORY_NAME"]; if($categoryName != 'Berber Store') continue; ?>
                                <li id="menu-item-3055" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-3055 item-level-0 menu-item-design-full-width menu-mega-dropdown  item-event-hover">
                                    <?php 
                                        $subcategoryArray = $db->GetSubCategory('admin',$categoryId);
                                        if(count($subcategoryArray)){
                                            $icon = $db->GetInfos()[0]["CATEGORY_ICON"];
                                            echo "<a href='urunler?kategoriId=$categoryId' class='woodmart-nav-link' style='padding: 5px;'><span class='nav-link-text' style='font-size:0.8vw; margin-right: 40px;' ><img src='images/".$icon."' style='width: 25px; height: 25px; margin-right: 6px;' /><span style='margin-top: 20px;'>$categoryName</span></span></a>"; ?>
                                           
                                            <!-- New Menu -->
                                            <div class="sub-menu-dropdown color-scheme-dark" style="margin-top: -5px; /*border-top: 5px solid #222222;*/">
                                               <div class="container">
                                                  <div class="vc_row wpb_row vc_row-fluid">
                                                    <?php foreach ($subcategoryArray as $key => $value) { $subId = $value["ID"]; $subName = $value["SUB_CATEGORY_NAME"]; ?>
                                                    <!-- Second Category -->
                                                     <div class="wpb_column vc_column_container vc_col-sm-2">
                                                        <div class="vc_column-inner">
                                                           <div class="wpb_wrapper">
                                                              <ul class="sub-menu mega-menu-list">
                                                                 <li class="">
                                                                    <a href="urunler?<?php echo 'kategoriId='.$categoryId.'&sk='.$subId; ?>" title=""><span class="nav-link-text"><?php if($subName != '') echo $subName; ?><span style="color: #fff;">.</span></span></a>
                                                                    <ul class="sub-sub-menu">
                                                                        <?php $subsubcategoryArray = $db->GetSubSubCategory('admin',$categoryId,$subId); ?>

                                                                        <?php foreach ($subsubcategoryArray as $key => $value) { $subsubId = $value["ID"]; $subsubName = $value["SUB_SUB_CATEGORY_NAME"]; ?>
                                                                            <li class=""><a href="urunler?<?php echo 'kategoriId='.$categoryId.'&sk='.$subId.'&ssk='.$subsubId; ?>" title=""><span class="nav-link-text"><?php echo $subsubName; ?></span></a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                 </li>
                                                              </ul>
                                                           </div>
                                                        </div>
                                                     </div>
                                                     <!-- Second Category End -->
                                                     <?php } ?>
                                                  </div>
                                               </div>
                                            </div>
                                            <!-- New Menu End -->
                                        <?php }
                                        else{
                                            $icon = $db->GetInfos()[0]["CATEGORY_ICON"];
                                            echo "<a href='urunler?kategoriId=$categoryId' class='woodmart-nav-link' style='padding: 5px;'><span class='nav-link-text' style='font-size:0.8vw; margin-right: 40px;' ><img src='images/".$icon."' style='width: 25px; height: 25px; margin-right: 6px;' /><span style='margin-top: 20px;'>$categoryName</span></span></a>";
                                        }
                                    ?>
                                    
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                    <div class="whb-column whb-col-center whb-visible-lg whb-empty-column"></div>
                    <div class="whb-column whb-col-right whb-visible-lg whb-empty-column"></div>
                    <div class="whb-column whb-col-mobile whb-hidden-lg whb-empty-column"></div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php include 'account_menu.php'; ?>
<script type="text/javascript">
    var accountMenuOpen = 0;
    function OpenAccountMenu(){
        if(accountMenuOpen){
            document.getElementById("account-menu-div").classList.remove('act-mobile-menu');
            document.getElementById("dark-panel").classList.remove('woodmart-close-side-opened');
            accountMenuOpen = 0;
            document.getElementsByClassName("zoomContainer")[0].style.display = '';
        }
        else{
            document.getElementById("account-menu-div").classList.add('act-mobile-menu');
            document.getElementById("dark-panel").classList.add('woodmart-close-side-opened');
            accountMenuOpen = 1;
            document.getElementsByClassName("zoomContainer")[0].style.display = 'none';
        }
    }

    function SearchWithCategoryName(name,cId){
        document.getElementById('CategorySearch').innerHTML = name;
        document.getElementById('sId').value = cId;
        DropDownOpen();
    }
        
    function Search(){
        /*var cId = document.getElementById('sId').value;*/
        var searchString = document.getElementById('s').value;
        if(searchString){
            if(false){
                window.location.href = 'urunler?c=' + cId + '&ara=' + searchString;
            }
            else{
                window.location.href = 'urunler?ara=' + searchString;
            }
        }
    }
    jQuery("link[rel*='icon']").prop("href",'<?php echo $func->colorImage('vendor/img/favv.png',$globalColor); ?>');
    jQuery("link[rel*='apple-touch-icon']").prop("href",'<?php echo $func->colorImage('vendor/img/favv.png',$globalColor); ?>');
</script>