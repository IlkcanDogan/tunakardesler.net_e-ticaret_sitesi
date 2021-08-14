<div id="mobile-menu-div" class="mobile-nav slide-from-left">
    <div class="woodmart-search-form">
        <form class="searchform" action="urunler">
            <input type="text" class="s" placeholder="Ürün Ara..." value="" name="ara" autocomplete="off" onChange=""/>
            <button class="searchsubmit" onClick="">
                <i class="fa fa-search fa-lg"></i>
            </button>
        </form>
        <div class="search-results-wrapper">
            <div class="woodmart-scroll has-scrollbar">
                <div class="woodmart-search-results woodmart-scroll-content" tabindex="0" style="margin-right: 17px;">
                <div class="autocomplete-suggestions" style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>
                </div>
                <div class="woodmart-scroll-pane" style="display: none;">
                <div class="woodmart-scroll-slider" style="height: 20px; transform: translate(0px, 0px);"></div>
                </div>
            </div>
            <div class="woodmart-search-loader wd-fill"></div>
        </div>
    </div>
    <div class="mobile-menu-tab mobile-pages-menu active">
        <div class="menu-mega-menu-container">
            
            <ul id="menu-mega-menu-1" class="site-mobile-menu">
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1724 current_page_item menu-item-3054 item-level-0">
                    <a href="/" class="woodmart-nav-link">
                        <span class="nav-link-text">Anasayfa</span>
                    </a>
                </li>
                <?php foreach ($categoryArray as $key => $value) {  $categoryId = $value["ID"]; $categoryName = $value["CATEGORY_NAME"]; if($categoryName == 'Berber Store') continue; $subcategoryArray = $db->GetSubCategory('admin',$categoryId); ?>
                    <?php if (count($subcategoryArray) > 0) { ?>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-3056 item-level-0 menu-item-has-block menu-item-has-children">
                        <a href="#" class="woodmart-nav-link">
                            <span style="position: absolute; right: 0; margin-right: 8px;">
                                <i class="fa fa-plus" style="font-size: 14px;" onclick="SubNavOpen(<?php echo $categoryId; ?>);" id="plus<?php echo $categoryId; ?>"></i>
                            </span>
                            <span class="nav-link-text" onclick="window.location.href='urunler?kategoriId=<?php echo $categoryId; ?>'"> <?php echo $categoryName; ?></span>
                        </a>

                    </li>
                    <?php } else { ?>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-3056 item-level-0 menu-item-has-block menu-item-has-children">
                        <a href="urunler?kategoriId=<?php echo $categoryId; ?>" class="woodmart-nav-link" onclick="SubNavOpen(<?php echo $categoryId; ?>);">
                            <span class="nav-link-text"><?php echo $categoryName; ?></span>
                        </a>
                    </li>
                    <?php } ?>

                    <!-- Primary Category -->
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-3056 item-level-0 menu-item-has-block menu-item-has-children"                      style="display:none;">

                        <li id="sub<?php echo $categoryId; ?>" style="display:none;" >
                        <?php
                            foreach($subcategoryArray as $key => $value){
                                $subId = $value["ID"]; 
                                $subName = $value["SUB_CATEGORY_NAME"]; $secondaryArray = $db->GetSubSubCategory('admin',$categoryId,$subId); ?>
                                <a href="<?php if(count($secondaryArray)) echo '#'; else echo 'urunler?kategoriId='.$categoryId.'&sk='.$subId; ?>" class="woodmart-nav-link">
                                    <?php if(count($secondaryArray)) {?>
                                        <span style="position: absolute; right: 0; margin-right: 8px;">
                                            <i class="fa fa-plus" style="font-size: 14px;" onclick="Sub2NavOpen(<?php echo $subId; ?>);" id="plus2<?php echo $subId; ?>"></i>
                                        </span>
                                    <?php } ?>
                                    <span style="font-size: 0.9em; margin-left: 5px; font-weight: normal;" onclick="window.location.href='urunler?kategoriId=<?php echo $categoryId."&sk=$subId"; ?>'"><?php echo $subName; ?>
                                    </span>
                                </a>

                                <div style="display: none;" id="sub2<?php echo $subId; ?>">
                                <?php foreach ($secondaryArray as $key => $value) { 
                                    $secondaryId = $value['ID'];
                                    $secondaryName = $value['SUB_SUB_CATEGORY_NAME'];
                                ?>
                                    <!-- Secondary Category -->
                                    <a href="urunler?kategoriId=<?php echo $categoryId; ?>&sk=<?php echo $subId; ?>&ssk=<?php echo $secondaryId; ?>" class="woodmart-nav-link">
                                        <span style="font-size: 0.9em; margin-left: 16px; font-weight: normal;"><?php echo $secondaryName; ?></span>
                                    </a>
                                    <!-- Secondary Category -->
                                <?php } ?>
                                </div>
                        <?php } ?>
                        </li>
                    </li>
                    <!-- Primary Category -->
                <?php } ?>



                <?php $icon = $db->GetInfos()[0]["CATEGORY_ICON"]; foreach ($categoryArray as $key => $value) {  $categoryId = $value["ID"]; $categoryName = $value["CATEGORY_NAME"]; if($categoryName != 'Berber Store') continue; $subcategoryArray = $db->GetSubCategory('admin',$categoryId); ?>
                    <?php if (count($subcategoryArray) > 0) { ?>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-3056 item-level-0 menu-item-has-block menu-item-has-children" style="background-color: #222222;">
                        <a href="#" class="woodmart-nav-link">
                            <span style="position: absolute; right: 0; margin-right: 8px;">
                                <i class="fa fa-plus" style="font-size: 14px; color: white;" onclick="SubNavOpen(<?php echo $categoryId; ?>);" id="plus<?php echo $categoryId; ?>"></i>
                            </span>
                            <span class="nav-link-text" style="color: white;" onclick="window.location.href='urunler?kategoriId=<?php echo $categoryId; ?>'"><img src='images/<?php echo $icon; ?>' style='width: 25px; height: 25px; margin-right: 10px;' /> <?php echo $categoryName; ?></span>
                        </a>

                    </li>
                    <?php } else { ?>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-3056 item-level-0 menu-item-has-block menu-item-has-children" style="background-color: #222222;">
                        <a href="urunler?kategoriId=<?php echo $categoryId; ?>" class="woodmart-nav-link" onclick="SubNavOpen(<?php echo $categoryId; ?>);">
                            <span class="nav-link-text" style="color: white;"><img src='images/<?php echo $icon; ?>' style='width: 25px; height: 25px; margin-right: 10px;' /> <?php echo $categoryName; ?></span>
                        </a>
                    </li>
                    <?php } ?>

                    <!-- Primary Category -->
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-3056 item-level-0 menu-item-has-block menu-item-has-children"                      style="display:none;">

                        <li id="sub<?php echo $categoryId; ?>" style="display:none; background-color: #222222;" >
                        <?php
                            foreach($subcategoryArray as $key => $value){
                                $subId = $value["ID"]; 
                                $subName = $value["SUB_CATEGORY_NAME"]; $secondaryArray = $db->GetSubSubCategory('admin',$categoryId,$subId); ?>
                                <a href="<?php if(count($secondaryArray)) echo '#'; else echo 'urunler?kategoriId='.$categoryId.'&sk='.$subId; ?>" class="woodmart-nav-link">
                                    <?php if(count($secondaryArray)) {?>
                                        <span style="position: absolute; right: 0; margin-right: 8px;">
                                            <i class="fa fa-plus" style="font-size: 14px; color: white;" onclick="Sub2NavOpen(<?php echo $subId; ?>);" id="plus2<?php echo $subId; ?>"></i>
                                        </span>
                                    <?php } ?>
                                    <span style="font-size: 0.9em; margin-left: 5px; font-weight: normal; color: white;" onclick="window.location.href='urunler?kategoriId=<?php echo $categoryId."&sk=$subId"; ?>'"><?php echo $subName; ?>
                                    </span>
                                </a>

                                <div style="display: none;" id="sub2<?php echo $subId; ?>">
                                <?php foreach ($secondaryArray as $key => $value) { 
                                    $secondaryId = $value['ID'];
                                    $secondaryName = $value['SUB_SUB_CATEGORY_NAME'];
                                ?>
                                    <!-- Secondary Category -->
                                    <a href="urunler?kategoriId=<?php echo $categoryId; ?>&sk=<?php echo $subId; ?>&ssk=<?php echo $secondaryId; ?>" class="woodmart-nav-link">
                                        <span style="font-size: 0.9em; margin-left: 16px; font-weight: normal; color: white;"><?php echo $secondaryName; ?></span>
                                    </a>
                                    <!-- Secondary Category -->
                                <?php } ?>
                                </div>
                        <?php } ?>
                        </li>
                    </li>
                    <!-- Primary Category -->
                <?php } ?>
            </ul>
        </div>
        <div class="whb-text-element reset-mb-10 mt-3">
            <p class="ml-2">Sosyal Medya</p>
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
            <a rel="nofollow" href="https://wa.me/<?php echo $infoContact["WHATSAPP"]; ?>" target="_blank" class="woodmart-social-icon social-whatsapp">
                <i class="fa fa-whatsapp"></i>
                <span class="woodmart-social-icon-name">WhatsApp</span>
            </a>
            </div>
            </a>
        </div>
    </div>
</div>

<script>
    function SubNavOpen(catId){
        var elm = document.getElementById('sub' + catId).style.display;

        if(elm == 'none'){
            document.getElementById('sub' + catId).style.display = "block";

            document.getElementById('plus' + catId).classList.remove('fa-plus');
            document.getElementById('plus' + catId).classList.add('fa-minus');
        }
        else{
            document.getElementById('sub' + catId).style.display = "none";

            document.getElementById('plus' + catId).classList.remove('fa-minus');
            document.getElementById('plus' + catId).classList.add('fa-plus');
        }
    }

    function Sub2NavOpen(catId){
        var elm = document.getElementById('sub2' + catId).style.display;

        if(elm == 'none'){
            document.getElementById('sub2' + catId).style.display = "block";

            document.getElementById('plus2' + catId).classList.remove('fa-plus');
            document.getElementById('plus2' + catId).classList.add('fa-minus');
        }
        else{
            document.getElementById('sub2' + catId).style.display = "none";

            document.getElementById('plus2' + catId).classList.remove('fa-minus');
            document.getElementById('plus2' + catId).classList.add('fa-plus');
        }
    }
</script>