 <div id="shopping-menu-div" class="cart-widget-side ">
    <div class="widget-heading">
        <h3 class="widget-title">Sepetim</h3>
        <a href="#" class="close-side-widget wd-cross-button wd-with-text-left" onclick="ShoppingMenuOpen();">kapat</a>
    </div>

    <div class="widget woocommerce widget_shopping_cart">
        <div class="widget_shopping_cart_content">
            <div class="shopping-cart-widget-body woodmart-scroll has-scrollbar">
                <?php if(count($_SESSION['BAG']) > 0) { ?>
                    <?php 
                        $totalPrice = 0;
                        foreach ($_SESSION['BAG'] as $key => $value) { $productData = $db->GetProductWithId($key);
                            foreach ($productData as $ky => $val) { 
                                $productName = $val['PRODUCT_NAME'];
                                $productPrice = $val['PRODUCT_PRICE'];
                                $productDiscount = $val['PRODUCT_DISCOUNT'];
                                
                                if($productDiscount != ''){
                                    ////////
                                    $m = 0;
                                    $disCalc = ($func->FloatPrice($productPrice) / 100) * $productDiscount;
                                    $priceExplode = explode('.', ($func->FloatPrice($productPrice) - $disCalc));

                                    if(strlen($priceExplode[1]) > 2){
                                        $lastExp = substr($priceExplode[1], -1);
                                        $m = $func->FloatPrice($priceExplode[0].'.'.$lastExp);
                                    }
                                    else{
                                        $m = $func->FloatPrice($productPrice) - $disCalc;
                                    }
                                    ////////
                                    $subTotal = $m * $value;
                                }
                                else{
                                    $subTotal = ($value * (float)$productPrice);
                                }

                                $totalPrice += $subTotal;

                                $productImage = $db->GetProductImages($key)[0]['PRODUCT_IMAGE_NAME'];
                            ?>
                            <ul class="cart_list product_list_widget woocommerce-mini-cart" key={id}>
                                <li class="woocommerce-mini-cart-item mini_cart_item">
                                    <a href="urun?urunId=<?php echo $productId; ?>" class="cart-item-link">Göster</a>
                                    <a href="/?sepet=cikar&urun=<?php echo $key; ?>" class="remove remove_from_cart_button" aria-label="Bu ürünü çıkar">×</a>
                                    <a href="javascript:void(0)" class="cart-item-image">
                                        <img width="300" height="300" src="product/<?php echo $productImage; ?>" class="woocommerce-placeholder wp-post-image" alt={product[id].name} loading="lazy"  sizes="(max-width: 300px) 100vw, 300px" />
                                    </a>
                                    <div class="cart-info">
                                        <span class="product-title"><?php echo $productName; ?></span>
                                        <span class="quantity"><?php echo $value; ?> ×
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><?php echo $func->FloatPrice($productPrice).' TL'; ?></bdi>
                                            </span>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        <?php } ?>
                    <?php } ?>
                <?php }else { ?>
                    <div class="woodmart-scroll-content" tabindex="0" style="right: -17px;">
                        <p class="woocommerce-mini-cart__empty-message empty">
                            Sepetinizde ürün bulunmuyor.
                        </p>
                    </div> 
                <?php } ?>
                
                <div class="woodmart-scroll-pane" style="display: none;">
                    <div class="woodmart-scroll-slider" style="height: 498px; transform: translate(0px, 0px);"></div>
                </div>
            </div>
            <div class="shopping-cart-widget-footer woodmart-cart-empty"></div>
            <?php if(count($_SESSION['BAG']) > 0) { ?>
                <div class="shopping-cart-widget-footer">
                    <p class="woocommerce-mini-cart__total total">
                        <strong>Toplam:</strong> 
                        <span class="woocommerce-Price-amount amount">
                            <bdi>
                                <?php echo $func->FloatPrice($totalPrice).' TL'; ?>
                            </bdi>
                        </span>
                    </p>
                    <p class="woocommerce-mini-cart__buttons buttons">
                       <?php if($_SESSION['CUSTOMER_FIREBASE_ID'] == '') {?>
                            <a href="/siparis-ver" class="button checkout wc-forward" style="border-radius: <?php echo $globalRadius; ?>px;">Sepeti Onayla</a>
                        <?php } else { ?>
                            <a href="/siparis-ver-c" class="button checkout wc-forward" style="border-radius: <?php echo $globalRadius; ?>px;">Sepeti Onayla</a>
                        <?php } ?>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>