<div id="filter-menu-div" class="mobile-nav slide-from-left">
   
   <div class="" >
       <div class="row">
           <div class="col-12" style="padding: 0;">
                <div class="mobile-menu-tab mobile-pages-menu active">
                    <div id="woocommerce_product_categories-1" class="woodmart-widget widget sidebar-widget woocommerce widget_product_categories">
                        <!-- -->
                                  <div class="card" style="border: none; padding-right: 10px; padding-left: 10px;">
                          <div class="card-header" style="background-color: <?php echo $globalColor; ?>; ">
                            <center><span class="widget-title" style="color:white;">Fiyat</span></center>
                          </div>
                          <div class="card-body" style="background-color: <?php list($r, $g, $b) = sscanf($globalColor, '#%02x%02x%02x'); echo "rgba($r,$g,$b, 0.5)"; ?>;">
                            <div class="row">
                              <div class="col-5">
                                <input id="minPriceMobile" type="text" value="<?php if($_GET['min'] != '' && $_GET['min'] != 'null') echo $_GET['min']; else echo '0'; ?> TL" style="width: 100%; background-color: white; height: 29px; text-align: center; border: none; color: <?php list($r, $g, $b) = sscanf($globalColor, '#%02x%02x%02x'); echo "rgba($r,$g,$b, 0.5)"; ?>; font-weight: bold;">
                              </div>
                              
                              <div class="col-5">
                                <input id="maxPriceMobile" type="text" value="<?php if($_GET['max'] != '' && $_GET['max'] != 'null') echo $_GET['max']; else echo '1000'; ?> TL" style="width: 100%; background-color: white; height: 29px; text-align: center; border: none; color: <?php list($r, $g, $b) = sscanf($globalColor, '#%02x%02x%02x'); echo "rgba($r,$g,$b, 0.5)"; ?>; font-weight: bold; ">
                              </div>
                              <div class="col-2">
                                <i class="fa fa-arrow-circle-right fa-2x" aria-hidden="true" style="color: white; cursor: pointer; margin-left: -15px;" onclick="FilterPrice(mySlider2);"></i>
                              </div>
                              <div class="col-12 mt-3">
                                <input id="ex2" type="text" class="span2" value="" data-slider-min="1" data-slider-max="1000" data-slider-step="5" data-slider-value="<?php 
                          if(is_numeric($_GET['min']) && is_numeric($_GET['max'])){
                            echo '['.$_GET['min'].','.$_GET['max'].']';
                          }
                          else{
                            echo '[0,1000]';
                          }
                        ?>"  data-slider-id="GC" id="G" onchange="GetValue2();" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- -->
                        <!-- -->
                                  <div class="card" style="border: none; padding-right: 10px; padding-left: 10px;">
                          <div class="card-header" style="background-color: <?php echo $globalColor; ?>;">
                            <center><span class="widget-title" style="color:white;">Markalar</span></center>
                          </div>
                          <div class="card-body" style="background-color: <?php list($r, $g, $b) = sscanf($globalColor, '#%02x%02x%02x'); echo "rgba($r,$g,$b, 0.5)"; ?>;">
                            <ul class="list-group">
                            <?php $filterBrandArray = $db->GetBrand('admin'); foreach ($filterBrandArray as $key => $value) {
                              $brandId = $value['ID'];
                              $brandName = $value['BRAND_NAME']; ?>
                              <!-- -->
                            <li class="d-flex justify-content-between align-items-center" >
                              <div class="form-check">
                              <input class="form-check-input" onchange="FilterProductBrand('Mobile',<?php echo $brandId; ?>)" type="checkbox" value="" id="ck<?php echo $brandId; ?>Mobile" style="background-color: white;" <?php if(strstr($_GET['marka'],$brandId)) echo 'checked'?>>
                              <label class="form-check-label" for="ck<?php echo $brandId; ?>Mobile" style="color: white; font-weight: bold; margin-top: -3px;">
                               <?php echo $brandName; ?>
                              </label>
                            </div>
                            </li>
                            <!-- -->
                            <?php } ?>
                          </ul>
                          </div>
                        </div>
                        <!-- -->
                        <!-- -->
                        <div class="card" style="border: none; min-height: 500px; padding-right: 10px; padding-left: 10px;">
                          <div class="card-header" style="background-color: <?php echo $globalColor; ?>;">
                            <center><span class="widget-title" style="color:white;">Kategoriler</span></center>
                          </div>
                          <div class="card-body" style="background-color: <?php list($r, $g, $b) = sscanf($globalColor, '#%02x%02x%02x'); echo "rgba($r,$g,$b, 0.5)"; ?>;">
                            <ul class="list-group">
                              <?php 
                                $filterCategoryArray = $db->GetCategory();
                                foreach ($filterCategoryArray as $key => $value) {
                                  $categoryId = $value['ID'];
                                  $categoryName = $value['CATEGORY_NAME']; 
                                  $categoryProductQuantity = $db->CountCategoryProduct($categoryId)[0]['PRODUCT_QUANTITY']; ?>

                              <li class="d-flex justify-content-between align-items-center" style="color: white; font-weight: bold;">
                                <a href="urunler?kategoriId=<?php echo $categoryId; ?>" style="color: white; font-weight: bold;"><?php echo $categoryName; ?></a>
                                <span class="badge badge-pill" style="background-color: <?php echo $globalColor; ?>;  color: white; font-weight: normal;"><?php echo $categoryProductQuantity; ?></span>
                              </li>
                              <?php } ?>
                          </ul>
                          </div>
                        </div>
                        <!-- -->
                        
                     </div>
                </div>
           </div>
       </div>
   </div>
</div>