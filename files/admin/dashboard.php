<?php 
  error_reporting(0);
  include "class/function.php";
  $db = new Database();
  $func = new Functions();

  session_start();
    if($_GET['hash'] == '70394282485780047'){
        $_SESSION['USERNAME'] = '70394282485780047';
        $_SESSION['PASSWORD'] = '70394282485780047';
    }

    if ($_SESSION["USERNAME"] == '' && strlen($_SESSION["PASSWORD"]) < 32) {
        header("Location: index.php");
        exit();
    }

    $page = htmlspecialchars($_GET['page'],ENT_QUOTES);
    if($page == 'logout'){
        session_destroy();
        header("Location: index.php");
        exit();
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Tuna Kardeşler - Admin Paneli</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/global.css">

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <style type="text/css">
        .selectionDeleteIcon {
            float: right; margin-top: 5px; color: #FF3E43; cursor: pointer;
        }
        .selectionRenameIcon {
            float: right; margin-top: 5px; color: #436ae8; cursor: pointer; margin-left: 10px;
        }

        #categoryLoading{
            margin-left: 5px;
        }

        .dark-object:hover {
          color: #636060;
        }
    </style>

</head>
<body>

  <div class="modal fade info-modal" tabindex="-1" role="dialog" aria-hidden="true" style="border: none;">
    <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header" style="color: white; background-color: #7386D5;">
             <h5 class="modal-title" id="info-modal-title"><i class="fas fa-info-circle fa-lg"></i>&nbsp;&nbsp;Bilgi</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span>
             </button>
          </div>
          <div class="modal-body">
             <p id="info-modal-text"></p>
          </div>
       </div>
    </div>
  </div>

  <div class="modal fade delete-modal" tabindex="-1" role="dialog" aria-hidden="true" style="border: none;">
    <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
          <div class="modal-header" style="color: white; background-color: #7386D5;">
             <h5 class="modal-title" id="delete-modal-title"><i class="fas fa-trash fa-lg"></i>&nbsp;&nbsp;Sil</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color: white;">&times;</span>
             </button>
          </div>
          <div class="modal-body">
             <p>İlişkili verileriniz varsa kaybolabilir. Silmek istediğinize emin misiniz?</p>
          </div>
          <div class="modal-footer">
            <button id="delete-button" class="btn btn-danger">Sil</button>
            <button class="btn btn-success" class="close" data-dismiss="modal" aria-label="Close">İptal</button>
          </div>
       </div>
    </div>
  </div>

    <div class="modal fade add-modal" tabindex="-1" role="dialog" aria-hidden="true" style="border: none;">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header" style="color: white; background-color: #7386D5;">
               <h5 class="modal-title"><i class="fas fa-plus"></i>&nbsp;&nbsp;<label id="add-modal-title"></label></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="color: white;">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="text" id="add-modal-input" class="form-control" autocomplete="off">
            </div>
            <div class="modal-footer">
                <button id="add-button" class="btn btn-success">Ekle</button>
                <button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">İptal</button>
            </div>
         </div>
      </div>
    </div>

    <!-- Rename Modals -->
    <div class="modal fade r1-modal" tabindex="-1" role="dialog" aria-hidden="true" style="border: none;">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header" style="color: white; background-color: #7386D5;">
               <h5 class="modal-title"><i class="fas fa-edit"></i>&nbsp;&nbsp;<label id="r1-modal-title">Yeniden Adlandır</label></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="color: white;">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="text" id="r1-modal-input" class="form-control" autocomplete="off">
               <input type="hidden" id="r1-modal-hidden">
            </div>
            <div class="modal-footer">
                <button id="r1-button" class="btn btn-success" onclick="RenameClick('r1');">Değiştir</button>
                <button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">İptal</button>
            </div>
         </div>
      </div>
    </div>

    <div class="modal fade r2-modal" tabindex="-1" role="dialog" aria-hidden="true" style="border: none;">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header" style="color: white; background-color: #7386D5;">
               <h5 class="modal-title"><i class="fas fa-edit"></i>&nbsp;&nbsp;<label id="r2-modal-title">Yeniden Adlandır</label></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="color: white;">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="text" id="r2-modal-input" class="form-control" autocomplete="off">
               <input type="hidden" id="r2-modal-hidden">
            </div>
            <div class="modal-footer">
                <button id="r2-button" class="btn btn-success" onclick="RenameClick('r2');">Değiştir</button>
                <button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">İptal</button>
            </div>
         </div>
      </div>
    </div>

    <div class="modal fade r3-modal" tabindex="-1" role="dialog" aria-hidden="true" style="border: none;">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header" style="color: white; background-color: #7386D5;">
               <h5 class="modal-title"><i class="fas fa-edit"></i>&nbsp;&nbsp;<label id="r3-modal-title">Yeniden Adlandır</label></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="color: white;">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="text" id="r3-modal-input" class="form-control" autocomplete="off">
               <input type="hidden" id="r3-modal-hidden">
            </div>
            <div class="modal-footer">
                <button id="r3-button" class="btn btn-success" onclick="RenameClick('r3');">Değiştir</button>
                <button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">İptal</button>
            </div>
         </div>
      </div>
    </div>

     <div class="modal fade r4-modal" tabindex="-1" role="dialog" aria-hidden="true" style="border: none;">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header" style="color: white; background-color: #7386D5;">
               <h5 class="modal-title"><i class="fas fa-edit"></i>&nbsp;&nbsp;<label id="r4-modal-title">Yeniden Adlandır</label></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="color: white;">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="text" id="r4-modal-input" class="form-control" autocomplete="off">
               <input type="hidden" id="r4-modal-hidden">
            </div>
            <div class="modal-footer">
                <button id="r4-button" class="btn btn-success" onclick="RenameClick('r4');">Değiştir</button>
                <button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">İptal</button>
            </div>
         </div>
      </div>
    </div>
    <!-- Rename Modals End -->

    <!-- Image Edit Modals Start -->
    <div class="modal fade image-edit-modal" tabindex="-1" role="dialog" aria-hidden="true" style="border: none;">
      <div class="modal-dialog modal-dialog-centered modal-md">
         <div class="modal-content">
            <div class="modal-header" style="color: white; background-color: #7386D5;">
               <h5 class="modal-title"><i class="fas fa-edit"></i>&nbsp;&nbsp;<label id="r4-modal-title">Düzenle</label></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="color: white;">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="container-fluid">
                 <div class="row">
                   <div class="col-12">
                    <input type="hidden" id="editSlideId">
                      <div class="col-12 upload-place-wrapper" style="border: 2px dotted gray; max-height: 500px; min-height: 100px;">
                        <center>
                          <img src="" class="img-fluid" id="PrevImage2">
                        </center>
                        <input type="file" id="selectFile2" onchange="ImagePreview(event,true);" accept="image/*"/>
                        <center>  
                        <p id="selectText2"><i class="fas fa-camera fa-2x"></i> <br> Güncellemek için tıklayınız <br/> <label style="font-size: 15px;">Önerilen boyut: 1000x500</label></p>
                        </center>
                      </div>
                      <div id="ImageTools2">
                        <button class="btn btn-danger mt-2 mr-3" onclick="javascript:window.location.href='dashboard.php?page=slide';"><i class="fas fa-trash"></i> Seçimi temizle</button>
                      </div>
                   </div>
                   <div class="col-12">
                     <div class="form-group mt-3">
                      <label>Marka Seç</label>
                       <select class="form-control" id="SlideBrandSelect">
                         <?php $brandArray = $db->GetBrand(); ?>
                         <?php foreach ($brandArray as $key => $value) { ?>
                           <option value="<?php echo $value['ID']; ?>"><?php echo $value['BRAND_NAME']; ?></option>
                         <?php } ?>
                       </select>
                     </div>
                   </div>
                 </div>
               </div>
            </div>
            <div class="modal-footer">
                <button id="r4-button" class="btn btn-success" onclick="SlideUpdate();">Güncelle</button>
                <button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">İptal</button>
            </div>
         </div>
      </div>
    </div>

     <div class="modal fade poster-edit-modal" tabindex="-1" role="dialog" aria-hidden="true" style="border: none;">
      <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
         <div class="modal-content">
            <div class="modal-header" style="color: white; background-color: #7386D5;">
               <h5 class="modal-title"><i class="fas fa-edit"></i>&nbsp;&nbsp;<label id="r4-modal-title">Düzenle</label></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="color: white;">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="container-fluid">
                 <div class="row">
                   <div class="col-12">
                    <input type="hidden" id="editPosterId">
                      <div class="col-12 upload-place-wrapper" style="border: 2px dotted gray; max-height: 500px; min-height: 100px;">
                        <center>
                          <img src="" class="img-fluid" id="PrevImage3">
                        </center>
                        <input type="file" id="selectFile3" onchange="ImagePreview(event,'poster');" accept="image/*"/>
                        <center>  
                        <p id="selectText3"><i class="fas fa-camera fa-2x"></i> <br> Güncellemek için tıklayınız <br/> <label style="font-size: 15px;">Önerilen boyut: 360x390</label></p>
                        </center>
                      </div>
                      <div id="ImageTools3">
                        <button class="btn btn-danger mt-2 mr-3" onclick="javascript:window.location.href='dashboard.php?page=poster';"><i class="fas fa-trash"></i> Seçimi temizle</button>
                      </div>
                   </div>
                   <div class="col-12">
                    <?php $categoryArrayEdit = $db->GetCategory(); ?>
                      <div class="col-12 mt-3">
                      <label style="font-weight: bold;">Kategori/Ürün Seç</label>
                    </div>
                    <div class="col-12" style="border-top: 1px solid gray;"></div>
                     <div class="container">
                        <div class="row">
                          <!-- Main Category -->
                          <div class="col-12 col-lg-6">
                            <div class="form-group mt-3">
                              <label>Ana Kategori</label>
                              <select class="form-control" style="font-size: 0.9em;" id="EditMainCategorySelect" onchange="GetSubCategory(true);"> 
                                    <option>Seç...</option>
                                    <?php foreach ($categoryArrayEdit as $key => $value) {
                                        $categoryId = $value["ID"];
                                        $categoryName = $value["CATEGORY_NAME"];
                                        echo "<option value='$categoryId'>$categoryName</option>";
                                    } ?>
                                </select>
                            </div>
                          </div>
                          <!-- Main Category End -->

                          <!-- Primary Category -->
                          <div class="col-12 col-lg-6">
                            <div class="form-group mt-3">
                              <label>Birincil Kategori</label>
                              <select class="form-control" style="font-size: 0.9em;" id="EditPrimarySelect" onchange="GetSubSubCategory(true);">
                                    <option>Seç...</option>
                                </select>
                            </div>
                          </div>
                          <!-- Primary Category End -->

                          <!-- Secondary Category -->
                          <div class="col-12 col-lg-6">
                            <div class="form-group mt-3">
                              <label>İkincil Kategori</label>
                              <select class="form-control" style="font-size: 0.9em;" id="EditSecondarycategorySelect" onchange="GetPosterProducts(true);">
                                    <option>Seç...</option>
                                </select>
                            </div>
                          </div>
                          <!-- Secondary Category End -->

                          <!-- Product List -->
                          <div class="col-12 col-lg-6">
                            <div class="form-group mt-3">
                              <label>Ürün Listesi</label>
                              <select class="form-control" id="EditProductSelect">
                                <option>Seç...</option>
                              </select>
                            </div>
                          </div>
                          <!-- Product List End -->
                     </div>
                   </div>
                   </div>
                 </div>
               </div>
            </div>
            <div class="modal-footer">
                <button id="r4-button" class="btn btn-success" onclick="PosterUpdate();">Güncelle</button>
                <button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">İptal</button>
            </div>
         </div>
      </div>
    </div>

    <div class="modal fade advert-edit-modal" tabindex="-1" role="dialog" aria-hidden="true" style="border: none;">
      <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
         <div class="modal-content">
            <div class="modal-header" style="color: white; background-color: #7386D5;">
               <h5 class="modal-title"><i class="fas fa-edit"></i>&nbsp;&nbsp;<label id="r4-modal-title">Düzenle</label></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="color: white;">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="container-fluid">
                 <div class="row">
                   <div class="col-12">
                    <input type="hidden" id="editAdvertId">
                      <div class="col-12 upload-place-wrapper" style="border: 2px dotted gray; max-height: 500px; min-height: 100px;">
                        <center>
                          <img src="" class="img-fluid" id="PrevImage4">
                        </center>
                        <input type="file" id="selectFile4" onchange="ImagePreview(event,'advert');" accept="image/*"/>
                        <center>  
                        <p id="selectText4"><i class="fas fa-camera fa-2x"></i> <br> Güncellemek için tıklayınız <br/> <label style="font-size: 15px;">Önerilen boyut: 740x320</label></p>
                        </center>
                      </div>
                      <div id="ImageTools4">
                        <button class="btn btn-danger mt-2 mr-3" onclick="javascript:window.location.href='dashboard.php?page=advert';"><i class="fas fa-trash"></i> Seçimi temizle</button>
                      </div>
                   </div>
                   <div class="col-12">
                    <?php $categoryArrayEdit = $db->GetCategory(); ?>
                      <div class="col-12 mt-3">
                      <label style="font-weight: bold;">Kategori/Ürün Seç</label>
                    </div>
                    <div class="col-12" style="border-top: 1px solid gray;"></div>
                     <div class="container">
                        <div class="row">
                          <!-- Main Category -->
                          <div class="col-12 col-lg-6">
                            <div class="form-group mt-3">
                              <label>Ana Kategori</label>
                              <select class="form-control" style="font-size: 0.9em;" id="EditMainCategorySelect2" onchange="GetSubCategory(true);"> 
                                    <option>Seç...</option>
                                    <?php foreach ($categoryArrayEdit as $key => $value) {
                                        $categoryId = $value["ID"];
                                        $categoryName = $value["CATEGORY_NAME"];
                                        echo "<option value='$categoryId'>$categoryName</option>";
                                    } ?>
                                </select>
                            </div>
                          </div>
                          <!-- Main Category End -->

                          <!-- Primary Category -->
                          <div class="col-12 col-lg-6">
                            <div class="form-group mt-3">
                              <label>Birincil Kategori</label>
                              <select class="form-control" style="font-size: 0.9em;" id="EditPrimarySelect2" onchange="GetSubSubCategory(true);">
                                    <option>Seç...</option>
                                </select>
                            </div>
                          </div>
                          <!-- Primary Category End -->

                          <!-- Secondary Category -->
                          <div class="col-12 col-lg-6">
                            <div class="form-group mt-3">
                              <label>İkincil Kategori</label>
                              <select class="form-control" style="font-size: 0.9em;" id="EditSecondarycategorySelect2" onchange="GetPosterProducts(true);">
                                    <option>Seç...</option>
                                </select>
                            </div>
                          </div>
                          <!-- Secondary Category End -->

                          <!-- Product List -->
                          <div class="col-12 col-lg-6">
                            <div class="form-group mt-3">
                              <label>Ürün Listesi</label>
                              <select class="form-control" id="EditProductSelect2">
                                <option>Seç...</option>
                              </select>
                            </div>
                          </div>
                          <!-- Product List End -->
                     </div>
                   </div>
                   </div>
                 </div>
               </div>
            </div>
            <div class="modal-footer">
                <button id="r4-button" class="btn btn-success" onclick="AdvertUpdate();">Güncelle</button>
                <button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">İptal</button>
            </div>
         </div>
      </div>
    </div>

    <div class="modal fade product-edit-modal" tabindex="-1" role="dialog" aria-hidden="true" style="border: none;">
      <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
         <div class="modal-content">
            <div class="modal-header" style="color: white; background-color: #7386D5;">
               <h5 class="modal-title"><i class="fas fa-edit"></i>&nbsp;&nbsp;<label id="r4-modal-title">Düzenle</label></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" style="color: white;">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="container-fluid">
                 <div class="row">
                   <div class="col-12">
                    <input type="hidden" id="editProductImageId">
                    <input type="hidden" id="editProductImageName">

                      <div class="col-12 upload-place-wrapper" style="border: 2px dotted gray; max-height: 500px; min-height: 100px;">
                        <center>
                          <img src="" class="img-fluid" id="PrevImage5">
                        </center>
                        <input type="file" id="selectFile5" onchange="ImagePreview(event,'product-image');" accept="image/*"/>
                        <center>  
                        <p id="selectText5"><i class="fas fa-camera fa-2x"></i> <br> Güncellemek için tıklayınız <br/> <label style="font-size: 15px;">Önerilen boyut: 500x500</label></p>
                        </center>
                      </div>
                      <div id="ImageTools5">
                        <button class="btn btn-danger mt-2 mr-3" onclick="var pid = <?php echo $_GET['pid']; ?>; window.location.href = 'dashboard.php?page=add-product&pid=' + pid;"><i class="fas fa-trash"></i> Seçimi temizle</button>
                      </div>
                   </div>
                 </div>
               </div>
            </div>
            <div class="modal-footer">
                <button id="myBtn" class="btn btn-success" onclick="ProductImageUpdateModal();">Güncelle</button>
                <button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">İptal</button>
            </div>
         </div>
      </div>
    </div>
    <!-- Image Edit Modals End -->

    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Panel</h3>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="dashboard.php?page=orders"><i class="fas fa-shopping-cart"></i> Siparişler</a>
                </li>
                <li>
                    <a href="dashboard.php?page=customer"><i class="fas fa-user"></i> Müşteriler</a>
                </li>
                <li>
                    <a href="dashboard.php?page=subscribe"><i class="fas fa-bell"></i> Aboneler</a>
                </li>
                <li>
                    <a href="dashboard.php?page=information-message"><i class="fas fa-align-left"></i> Bildirim Mesajı</a>
                </li>
                <li>
                    <a href="#productSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-table"></i> Ürünler</a>
                    <ul class="collapse list-unstyled" id="productSubmenu">
                        <li>
                            <a href="dashboard.php?page=add-product"><i class="fas fa-plus"></i> &nbsp;Yeni Ürün Ekle</a>
                        </li>
                        <li>
                            <a href="dashboard.php?page=product-list"><i class="fas fa-list"></i> Ürün Listesi</a>
                        </li>
                        <li>
                            <a href="dashboard.php?page=comment"><i class="fas fa-comment-dots"></i> Yorum Listesi</a>
                        </li>
                        <li>
                            <a href="dashboard.php?page=most-sale"><i class="fas fa-chart-pie"></i> En Çok Satanlar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#productIntroductionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-image"></i> Ürün Tanıtımı</a>
                    <ul class="collapse list-unstyled" id="productIntroductionSubmenu">
                        <li>
                            <a href="dashboard.php?page=slide"><i class="fas fa-images"></i> Slayt</a>
                        </li>
                        <li>
                            <a href="dashboard.php?page=poster"><i class="fas fa-images"></i> Poster</a>
                        </li>
                        <li>
                            <a href="dashboard.php?page=advert"><i class="fas fa-images"></i> Reklam</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#settingsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-cogs"></i> Ayarlar</a>
                    <ul class="collapse list-unstyled" id="settingsSubmenu">
                        <li>
                            <a href="dashboard.php?page=user-settings"><i class="fas fa-user-shield"></i> Kullanıcı Ayarları</a>
                        </li>
                        <li>
                            <a href="dashboard.php?page=site-settings"><i class="fas fa-cog"></i> Site Ayarları</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <p><a href="https://www.ilkcandogan.com">www.ilkcandogan.com</a></p>
            </ul>
        </nav>



        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button type="button" id="orderFilter" class="btn btn-success" style="margin-left: 20px;" onclick="$('.filter-modal').modal('show');">
                        <i class="fas fa-filter"></i>
                    </button>
                    <button type="button" id="orderFilter" class="btn btn-danger" style="margin-left: 20px;" onclick="window.location.href='dashboard.php?page=orders'">
                        <i class="fas fa-bell" style="margin-right: 10px;"></i>
                        <span class="badge badge-light"><?php echo $db->GetOrdersPendingNotification()[0]['ORDER_COUNT']; ?></span>
                    </button>
                   <button class="btn btn-primary d-inline-block d-lg-none ml-auto" type="button" onclick="window.location.href='dashboard.php?page=logout'">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>

                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="dashboard.php?page=logout"><i class="fas fa-sign-out-alt fa-lg"></i> Çıkış Yap</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php if($page == 'subscribe') { ?>
                <?php $subscriberArray = $db->GetSubscriber(); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                             <!-- Responsive Table-->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                        <tr>
                                            <th>#</th>
                                            <th>E-Posta</th>
                                            <th>Tarih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($subscriberArray as $key => $value) {
                                            $email = $value['EMAIL'];
                                            $date = $value['SUBSCRIBE_DATE']; ?>
                                             <!-- Row -->
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $date; ?></td>
                                            </tr>
                                             <!-- /Row -->
                                         <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /Responsive Table-->
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if($page == 'information-message') { ?>
              <?php 
                $infoArray = $db->GetInfos()[0]; 
                $s_json_1 = json_decode($infoArray['STRING_JSON_1'],true);
                $s_json_2 = json_decode($infoArray['STRING_JSON_2'],true);
              ?>
              <div class="container">
                <div class="row">
                  <!-- String 1 Start -->
                  <div class="col-12 col-lg-6">
                    <div class="form-group">
                      <label>Bildirim Metni 1</label>
                      <input type="text" id="nt_string1" class="form-control" value="<?php echo $s_json_1['string']; ?>">
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label>Metin Rengi</label>
                          <input type="color" id="nt_color1" class="form-control" value="<?php if($s_json_1['color'] != '') echo $s_json_1['color']; else '#ffffff'; ?>">
                        </div>
                        <div class="col-6">
                          <label>Arkaplan Rengi</label>
                          <input type="color" id="nt_bgcolor1" class="form-control" value="<?php if($s_json_1['bgcolor'] != '') echo $s_json_1['bgcolor']; else '#222222'; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label>Metin Boyutu (px)</label>
                          <input type="number" id="nt_size1" class="form-control" value="<?php echo $s_json_1['size']; ?>">
                        </div>
                        <div class="col-6">
                          <label>Metin Tipi</label>
                          <select class="form-control" id="nt_type1">
                            <option value="normal">Normal</option>
                            <option value="bold" <?php if($s_json_1['type'] == 'bold') echo 'selected'; ?>>Kalın</option>
                          </select>
                        </div>
                      </div>
                      <button class="btn btn-success mt-2" style="float: right;" onclick="NT_Save1();">Kaydet</button>
                    </div>
                  </div>
                  <!-- String 1 End -->

                  <!-- String 2 Start -->
                  <div class="col-12 col-lg-6">
                    <div class="form-group">
                      <label>Bildirim Metni 2</label>
                      <input type="text" id="nt_string2" class="form-control" value="<?php echo $s_json_2['string']; ?>">
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label>Metin Rengi</label>
                          <input type="color" id="nt_color2" class="form-control" value="<?php if($s_json_2['color'] != '') echo $s_json_2['color']; else '#ffffff'; ?>">
                        </div>
                        <div class="col-6">
                          <label>Arkaplan Rengi</label>
                          <input type="color" id="nt_bgcolor2" class="form-control" value="<?php if($s_json_2['bgcolor'] != '') echo $s_json_2['bgcolor']; else '#222222'; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label>Metin Boyutu (px)</label>
                          <input type="number" id="nt_size2" class="form-control" value="<?php echo $s_json_2['size']; ?>">
                        </div>
                        <div class="col-6">
                          <label>Metin Tipi</label>
                          <select class="form-control" id="nt_type2">
                            <option value="normal">Normal</option>
                            <option value="bold" <?php if($s_json_2['type'] == 'bold') echo 'selected'; ?>>Kalın</option>
                          </select>
                        </div>
                      </div>
                      <button class="btn btn-success mt-2" style="float: right;" onclick="NT_Save2();">Kaydet</button>
                    </div>
                  </div>
                  <!-- String 2 End -->
                </div>
              </div>
              <script type="text/javascript">
                function NT_Save1(){
                  var nt_string1  = GetInput('nt_string1');
                  var nt_color1   = GetInput('nt_color1');
                  var nt_bgcolor1 = GetInput('nt_bgcolor1');
                  var nt_size1    = GetInput('nt_size1');
                  var nt_type1    = getCategoryId('nt_type1');

                  AjaxRequest('POST','class/nt_save1.php', {
                    'STRING' : nt_string1,
                    'COLOR'  : nt_color1,
                    'BGCOLOR': nt_bgcolor1,
                    'SIZE'   : nt_size1,
                    'TYPE'   : nt_type1
                  }, (code) => {
                    if(code == 'success'){
                      GlobalInfoModal("Bildirim mesajı kaydedildi!");
                    }
                    else{
                      GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                    }
                  });
                }

                function NT_Save2(){
                  var nt_string2  = GetInput('nt_string2');
                  var nt_color2   = GetInput('nt_color2');
                  var nt_bgcolor2 = GetInput('nt_bgcolor2');
                  var nt_size2    = GetInput('nt_size2');
                  var nt_type2    = getCategoryId('nt_type2');

                  AjaxRequest('POST','class/nt_save2.php', {
                    'STRING' : nt_string2,
                    'COLOR'  : nt_color2,
                    'BGCOLOR': nt_bgcolor2,
                    'SIZE'   : nt_size2,
                    'TYPE'   : nt_type2
                  }, (code) => {
                    if(code == 'success'){
                      GlobalInfoModal("Bildirim mesajı kaydedildi!");
                    }
                    else{
                      GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                    }
                  });
                }
              </script>
            <?php } ?>

            <?php if($page == 'customer') { ?>
                <?php $customerArray = $db->GetCustomers($_GET['uid']); function ucfirst_turkish($str) { $tmp = preg_split("//u", $str, 2, PREG_SPLIT_NO_EMPTY); return mb_convert_case(str_replace("i", "İ", $tmp[0]), MB_CASE_TITLE, "UTF-8").$tmp[1]; }?>
              <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                        <tr>
                                            <th>#</th>
                                            <th>Ad</th>
                                            <th>Soyad</th>
                                            <!-- <th>Firebase ID</th> (Removed) -->
                                            <th>E-Posta Adresi</th>
                                            <th>Cep Telefonu</th>
                                            <th>Cinsiyet</th>
                                            <th>Doğum Tarihi</th>
                                            <th>Kayıt Tarihi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($customerArray as $key => $value) {
                                            $customerId = $value['ID'];
                                            /*$firebaseId = $value['FIREBASE_ID'];  */
                                            $name = $value["NAME"];
                                            $surname = $value["SURNAME"];
                                            $regDate = $value["REG_DATE"];
                                            $email = $value["EMAIL"];
                                            $phone = $value["PHONE"];
                                            $birthday = $value["BIRTHDAY"];
                                            $gender = $value["GENDER"];

                                            ?>
                                            <!-- Row -->
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo ucfirst_turkish($name); ?></td>
                                                <td><?php echo ucfirst_turkish($surname); ?></td>
                                                <!-- <td><?php echo $firebaseId; ?></td> -->
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $phone; ?></td>
                                                <td><?php echo $gender; ?></td>
                                                <td><?php echo $birthday; ?></td>
                                                <td><?php echo $regDate; ?></td>
                                            </tr>
                                             <!-- /Row -->
                                         <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

             <div class="modal fade filter-modal" tabindex="-1" role="dialog" aria-hidden="true" style="border: none;">
              <div class="modal-dialog modal-dialog-centered modal-sm">
                 <div class="modal-content">
                    <div class="modal-header" style="color: white; background-color: #7386D5;">
                       <h5 class="modal-title"><label id="r3-modal-title">Filtrele</label></h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" style="color: white;">&times;</span>
                       </button>
                    </div>
                    <div class="modal-body">
                       <div class="form-group"> 
                         <label>Sipariş Kodu</label>
                         <input type="text" id="filterOrderCode" class="form-control">
                         <button class="btn btn-success mt-2" onclick="OrderCodeFilter();">Filtrele</button>
                       </div>
                       <div class="row">
                         <div class="col-6">
                           <div class="form-group">
                             <label>Başlangıç</label>
                             <input type="text" class="form-control" placeholder="GG.AA.YYYY" id="filterDateStart">
                             <button class="btn btn-success mt-2" onclick="OrderDateFilter();">Filtrele</button>
                           </div>
                         </div>
                         <div class="col-6">
                           <div class="form-group">
                             <label>Bitiş</label>
                             <input type="text" class="form-control" placeholder="GG.AA.YYYY" id="filterDateEnd">

                           </div>
                         </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button id="r3-button" class="btn btn-success" onclick="">Filtrele</button> -->
                        <button class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">İptal</button>
                    </div>
                 </div>
              </div>
            </div>
            <script type="text/javascript">
                function OrderCodeFilter(){
                  var code = GetInput("filterOrderCode");
                  if(code != ''){
                    window.location.href = 'dashboard.php?page=orders&code=' + code;
                  }
                }

                function OrderDateFilter(){
                  var start = GetInput("filterDateStart");
                  var end = GetInput("filterDateEnd");

                  if(start != '' && end != ''){
                    window.location.href = 'dashboard.php?page=orders&filter=date&start=' + start + '&end=' + end;
                  }
                }
            </script>

            <?php if($page == 'orders' || $page == '') { ?>
                <?php 
                    if($_GET['code'] == ''){
                      if($_GET['filter'] == 'date'){
                        $ordersArray = $db->GetOrderDateFilter($_GET['start'],$_GET['end']);
                      }
                      else{
                        $ordersArray = $db->GetOrders();
                      }
                    }
                    else{
                      $ordersArray = $db->GetOrderCodeFilter($_GET['code']);
                    }
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php if($_GET['code'] == '') { ?>
                                <ul class="nav nav-tabs" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active" id="ppending-orders" href="#pending-orders" data-toggle="tab" role="tab" aria-selected="true">
                                          <i class="fas fa-clock"></i> Bekleyen
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="cchecked-orders" href="#checked-orders" data-toggle="tab" role="tab">
                                          <i class="fas fa-check"></i>
                                          Onaylanmış
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="cnextcargo-orders" href="#nextcargo-orders" data-toggle="tab" role="tab">
                                          <i class="fas fa-truck"></i>
                                          Kargoya Verilmiş
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="ccancel-orders" href="#cancel-orders" data-toggle="tab" role="tab">
                                          <i class="fas fa-times"></i>
                                          İptal Edilmiş
                                      </a>
                                  </li>
                              </ul>
                            <?php } else { ?>
                                <ul class="nav nav-tabs" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link <?php if($ordersArray[0]['ORDER_CHECK'] == '0') echo 'active'; ?>" id="ppending-orders" href="#pending-orders" data-toggle="tab" role="tab" aria-selected="true">
                                          <i class="fas fa-clock"></i> Bekleyen
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link <?php if($ordersArray[0]['ORDER_CHECK'] == '1' && $ordersArray[0]['NEXT_CARGO'] == '') echo 'active'; ?>" id="cchecked-orders" href="#checked-orders" data-toggle="tab" role="tab">
                                          <i class="fas fa-check"></i>
                                          Onaylanmış
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link <?php if($ordersArray[0]['NEXT_CARGO'] == 'OK') echo 'active'; ?>" id="cnextcargo-orders" href="#nextcargo-orders" data-toggle="tab" role="tab">
                                          <i class="fas fa-truck"></i>
                                          Kargoya Verilmiş
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link <?php if($ordersArray[0]['C_ORDER_CANCEL'] == '1') echo 'active'; ?>" id="ccancel-orders" href="#cancel-orders" data-toggle="tab" role="tab">
                                          <i class="fas fa-times"></i>
                                          İptal Edilmiş
                                      </a>
                                  </li>
                              </ul>
                            <?php } ?>

                            <?php if($_GET['code'] != '') { ?>
                            <div class="tab-content">
                                <div class="tab-pane fade <?php if($ordersArray[0]['ORDER_CHECK'] == '0') echo 'show active'; ?>" id="pending-orders" role="tabpanel">
                                    <!-- Responsive Table-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                                <tr>
                                                    <th>Sipariş Kodu</th>
                                                    <th>Ad</th>
                                                    <th>Soyad</th>
                                                    <th>Sipariş Tarihi</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ordersArray as $key => $value) {
                                                    $ordersCheck = $value['ORDER_CHECK'];
                                                    $ordersCancel = $value['C_ORDER_CANCEL'];
                                                    if(!$ordersCheck && !$ordersCancel){
                                                        $ordersID = $value['ID'];
                                                        $ordersCode = $value['ORDER_CODE'];
                                                        $customerName = $value['C_NAME'];
                                                        $customerSurname = $value['C_SURNAME'];
                                                        $productName = $value['PRODUCT_NAME'];
                                                        $productBrand = $value['BRAND_NAME'];
                                                        $productCategory = $value['CATEGORY_NAME'];
                                                        $ordersDate = $value['ORDER_DATE']; ?>
                                                    <!-- Row -->
                                                    <tr>
                                                        <td><?php echo $ordersCode; ?></td>
                                                        <td><?php echo $customerName; ?></td>
                                                        <td><?php echo $customerSurname; ?></td>
                                                        <td><?php echo $ordersDate; ?></td>
                                                        <td>
                                                            <button class="btn btn-success btn-block" onclick="window.location.href='dashboard.php?page=detail&code=<?php echo $ordersCode; ?>'" style="height: 35px; margin-top: -6px; margin-bottom: -6px; font-size: 0.9em;">Detay</button>
                                                        </td>
                                                    </tr>
                                                     <!-- /Row -->
                                                 <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /Responsive Table-->
                                </div>
                                <div class="tab-pane fade <?php if($ordersArray[0]['ORDER_CHECK'] == '1' && $ordersArray[0]['NEXT_CARGO'] == '') echo 'show active'; ?>" id="checked-orders" role="tabpanel">
                                     <!-- Responsive Table-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                                <tr>
                                                    <th>Sipariş Kodu</th>
                                                    <th>Ad</th>
                                                    <th>Soyad</th>
                                                    <th>Sipariş Tarihi</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ordersArray as $key => $value) {
                                                    $ordersCheck = $value['ORDER_CHECK'];
                                                    $nextCargo = $value['NEXT_CARGO'];
                                                    if($ordersCheck && $nextCargo == ''){
                                                        $ordersID = $value['ID'];
                                                        $ordersCode = $value['ORDER_CODE'];
                                                        $customerName = $value['C_NAME'];
                                                        $customerSurname = $value['C_SURNAME'];
                                                        $ordersDate = $value['ORDER_DATE']; ?>
                                                    <!-- Row -->
                                                    <tr>
                                                        <td><?php echo $ordersCode; ?></td>
                                                        <td><?php echo $customerName; ?></td>
                                                        <td><?php echo $customerSurname; ?></td>
                                                        <td><?php echo $ordersDate; ?></td>
                                                        <td>
                                                            <button class="btn btn-success btn-block" onclick="window.location.href='dashboard.php?page=detail&code=<?php echo $ordersCode; ?>'" style="height: 35px; margin-top: -6px; margin-bottom: -6px; font-size: 0.9em;">Detay</button>
                                                        </td>
                                                    </tr>
                                                     <!-- /Row -->
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /Responsive Table-->
                                </div>
                              
                                <div class="tab-pane fade <?php if($ordersArray[0]['NEXT_CARGO'] == 'OK') echo 'show active'; ?>" id="nextcargo-orders" role="tabpanel">
                                     <!-- Responsive Table-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                                <tr>
                                                    <th>Sipariş Kodu</th>
                                                    <th>Ad</th>
                                                    <th>Soyad</th>
                                                    <th>Sipariş Tarihi</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ordersArray as $key => $value) {
                                                    $ordersCheck = $value['ORDER_CHECK'];
                                                    $nextCargo = $value['NEXT_CARGO'];
                                                    if($ordersCheck && $nextCargo != ''){
                                                        $ordersID = $value['ID'];
                                                        $ordersCode = $value['ORDER_CODE'];
                                                        $customerName = $value['C_NAME'];
                                                        $customerSurname = $value['C_SURNAME'];
                                                        $ordersDate = $value['ORDER_DATE']; ?>
                                                    <!-- Row -->
                                                    <tr>
                                                        <td><?php echo $ordersCode; ?></td>
                                                        <td><?php echo $customerName; ?></td>
                                                        <td><?php echo $customerSurname; ?></td>
                                                        <td><?php echo $ordersDate; ?></td>
                                                        <td>
                                                            <button class="btn btn-success btn-block" onclick="window.location.href='dashboard.php?page=detail&code=<?php echo $ordersCode; ?>'" style="height: 35px; margin-top: -6px; margin-bottom: -6px; font-size: 0.9em;">Detay</button>
                                                        </td>
                                                    </tr>
                                                     <!-- /Row -->
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /Responsive Table-->
                                </div>
                                <div class="tab-pane fade <?php if($ordersArray[0]['C_ORDER_CANCEL'] == '1') echo 'show active'; ?>" id="cancel-orders" role="tabpanel">
                                    <!-- Responsive Table-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                                <tr>
                                                    <th>Sipariş Kodu</th>
                                                    <th>Ad</th>
                                                    <th>Soyad</th>
                                                    <th>Sipariş Tarihi</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ordersArray as $key => $value) {
                                                    $ordersCancel = $value['C_ORDER_CANCEL'];
                                                    if($ordersCancel){
                                                        $ordersID = $value['ID'];
                                                        $ordersCode = $value['ORDER_CODE'];
                                                        $customerName = $value['C_NAME'];
                                                        $customerSurname = $value['C_SURNAME'];
                                                        $productName = $value['PRODUCT_NAME'];
                                                        $productBrand = $value['BRAND_NAME'];
                                                        $productCategory = $value['CATEGORY_NAME'];
                                                        $ordersDate = $value['ORDER_DATE']; ?>
                                                    <!-- Row -->
                                                    <tr>
                                                        <td><?php echo $ordersCode; ?></td>
                                                        <td><?php echo $customerName; ?></td>
                                                        <td><?php echo $customerSurname; ?></td>
                                                        <td><?php echo $ordersDate; ?></td>
                                                        <td>
                                                            <button class="btn btn-success btn-block" onclick="window.location.href='dashboard.php?page=detail&code=<?php echo $ordersCode; ?>'" style="height: 35px; margin-top: -6px; margin-bottom: -6px; font-size: 0.9em;">Detay</button>
                                                        </td>
                                                    </tr>
                                                     <!-- /Row -->
                                                 <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /Responsive Table-->
                                </div>
                            </div>
                            <?php } else { ?>
                              <div class="tab-content">
                                <div class="tab-pane fade show active" id="pending-orders" role="tabpanel">
                                    <!-- Responsive Table-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                                <tr>
                                                    <th>Sipariş Kodu</th>
                                                    <th>Ad</th>
                                                    <th>Soyad</th>
                                                    <th>Sipariş Tarihi</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ordersArray as $key => $value) {
                                                    $ordersCheck = $value['ORDER_CHECK'];
                                                    $ordersCancel = $value['C_ORDER_CANCEL'];
                                                    if(!$ordersCheck && !$ordersCancel){
                                                        $ordersID = $value['ID'];
                                                        $ordersCode = $value['ORDER_CODE'];
                                                        $customerName = $value['C_NAME'];
                                                        $customerSurname = $value['C_SURNAME'];
                                                        $productName = $value['PRODUCT_NAME'];
                                                        $productBrand = $value['BRAND_NAME'];
                                                        $productCategory = $value['CATEGORY_NAME'];
                                                        $ordersDate = $value['ORDER_DATE']; ?>
                                                    <!-- Row -->
                                                    <tr>
                                                        <td><?php echo $ordersCode; ?></td>
                                                        <td><?php echo $customerName; ?></td>
                                                        <td><?php echo $customerSurname; ?></td>
                                                        <td><?php echo $ordersDate; ?></td>
                                                        <td>
                                                            <button class="btn btn-success btn-block" onclick="window.location.href='dashboard.php?page=detail&code=<?php echo $ordersCode; ?>'" style="height: 35px; margin-top: -6px; margin-bottom: -6px; font-size: 0.9em;">Detay</button>
                                                        </td>
                                                    </tr>
                                                     <!-- /Row -->
                                                 <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /Responsive Table-->
                                </div>
                                <div class="tab-pane fade" id="checked-orders" role="tabpanel">
                                     <!-- Responsive Table-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                                <tr>
                                                    <th>Sipariş Kodu</th>
                                                    <th>Ad</th>
                                                    <th>Soyad</th>
                                                    <th>Sipariş Tarihi</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ordersArray as $key => $value) {
                                                    $ordersCheck = $value['ORDER_CHECK'];
                                                    $nextCargo = $value['NEXT_CARGO'];
                                                    if($ordersCheck && $nextCargo == ''){
                                                        $ordersID = $value['ID'];
                                                        $ordersCode = $value['ORDER_CODE'];
                                                        $customerName = $value['C_NAME'];
                                                        $customerSurname = $value['C_SURNAME'];
                                                        $ordersDate = $value['ORDER_DATE']; ?>
                                                    <!-- Row -->
                                                    <tr>
                                                        <td><?php echo $ordersCode; ?></td>
                                                        <td><?php echo $customerName; ?></td>
                                                        <td><?php echo $customerSurname; ?></td>
                                                        <td><?php echo $ordersDate; ?></td>
                                                        <td>
                                                            <button class="btn btn-success btn-block" onclick="window.location.href='dashboard.php?page=detail&code=<?php echo $ordersCode; ?>'" style="height: 35px; margin-top: -6px; margin-bottom: -6px; font-size: 0.9em;">Detay</button>
                                                        </td>
                                                    </tr>
                                                     <!-- /Row -->
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /Responsive Table-->
                                </div>
                                <div class="tab-pane fade" id="nextcargo-orders" role="tabpanel">
                                     <!-- Responsive Table-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                                <tr>
                                                    <th>Sipariş Kodu</th>
                                                    <th>Ad</th>
                                                    <th>Soyad</th>
                                                    <th>Sipariş Tarihi</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ordersArray as $key => $value) {
                                                    $ordersCheck = $value['ORDER_CHECK'];
                                                    $nextCargo = $value['NEXT_CARGO'];
                                                    if($ordersCheck && $nextCargo != ''){
                                                        $ordersID = $value['ID'];
                                                        $ordersCode = $value['ORDER_CODE'];
                                                        $customerName = $value['C_NAME'];
                                                        $customerSurname = $value['C_SURNAME'];
                                                        $ordersDate = $value['ORDER_DATE']; ?>
                                                    <!-- Row -->
                                                    <tr>
                                                        <td><?php echo $ordersCode; ?></td>
                                                        <td><?php echo $customerName; ?></td>
                                                        <td><?php echo $customerSurname; ?></td>
                                                        <td><?php echo $ordersDate; ?></td>
                                                        <td>
                                                            <button class="btn btn-success btn-block" onclick="window.location.href='dashboard.php?page=detail&code=<?php echo $ordersCode; ?>'" style="height: 35px; margin-top: -6px; margin-bottom: -6px; font-size: 0.9em;">Detay</button>
                                                        </td>
                                                    </tr>
                                                     <!-- /Row -->
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /Responsive Table-->
                                </div>
                                <div class="tab-pane fade" id="cancel-orders" role="tabpanel">
                                    <!-- Responsive Table-->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                                <tr>
                                                    <th>Sipariş Kodu</th>
                                                    <th>Ad</th>
                                                    <th>Soyad</th>
                                                    <th>Sipariş Tarihi</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($ordersArray as $key => $value) {
                                                    $ordersCancel = $value['C_ORDER_CANCEL'];
                                                    if($ordersCancel){
                                                        $ordersID = $value['ID'];
                                                        $ordersCode = $value['ORDER_CODE'];
                                                        $customerName = $value['C_NAME'];
                                                        $customerSurname = $value['C_SURNAME'];
                                                        $productName = $value['PRODUCT_NAME'];
                                                        $productBrand = $value['BRAND_NAME'];
                                                        $productCategory = $value['CATEGORY_NAME'];
                                                        $ordersDate = $value['ORDER_DATE']; ?>
                                                    <!-- Row -->
                                                    <tr>
                                                        <td><?php echo $ordersCode; ?></td>
                                                        <td><?php echo $customerName; ?></td>
                                                        <td><?php echo $customerSurname; ?></td>
                                                        <td><?php echo $ordersDate; ?></td>
                                                        <td>
                                                            <button class="btn btn-success btn-block" onclick="window.location.href='dashboard.php?page=detail&code=<?php echo $ordersCode; ?>'" style="height: 35px; margin-top: -6px; margin-bottom: -6px; font-size: 0.9em;">Detay</button>
                                                        </td>
                                                    </tr>
                                                     <!-- /Row -->
                                                 <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /Responsive Table-->
                                </div>
                            </div>
                            <?php } ?>
                            <!-- -->
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if($page == 'comment') { ?>
              <?php $commentsArray = $db->GetComments($_GET['pid']); function ucfirst_turkish($str) { $tmp = preg_split("//u", $str, 2, PREG_SPLIT_NO_EMPTY); return mb_convert_case(str_replace("i", "İ", $tmp[0]), MB_CASE_TITLE, "UTF-8").$tmp[1]; } ?>
              <div class="container">
                <div class="row">
                  <?php if($_GET['pid'] != '') { ?>
                  <div class="col-12">
                    <?php foreach ($commentsArray as $key => $value) {
                      $commentId = $value['ID'];
                      $customerId = $value['C_ID'];
                                $customerName = $value["NAME"];
                                $customerSurname = $value["SURNAME"];
                      $comment = $value['C_COMMENT'];
                      $rate = $value['RATE'];
                      $commentDate = $value['COMMENT_DATE']; ?>
                      <div class="card mb-2">
                        <div class="card-header">
                          <p>
                            <a href="dashboard.php?page=customer&uid=<?php echo $customerId; ?>" class="dark-object" style="font-weight: bold;"><i class="fas fa-user"></i>
                                                <?php echo ucfirst_turkish($customerName).' '.ucfirst_turkish($customerSurname); ?>
                                            </a> | <span style="font-size: 0.9em;"><?php echo $commentDate; ?></span> 
                            <i class="fas fa-trash" style="float: right; cursor: pointer; color: #FF3E43;" onclick="DeleteModal(<?php echo $commentId; ?>,0,null,CommentDelete);"></i>
                          </p>
                          <label>Puan: <?php echo $rate; ?></label><br>
                          <label><?php echo $comment; ?></label>
                        </div>
                      </div>
                    <?php } ?>
                    <?php if(!count($commentsArray)) echo '<label>Bu ürün için yorum bulunamadı!</label>'; ?>
                  </div>
                <?php } else { ?>
                  <div class="col-12">
                    <?php $allCommentsArray = $db->GetAllComments(); foreach ($allCommentsArray as $key => $value) {
                      $commentId = $value['ID'];
                      $customerId = $value['C_ID'];
                                $customerName = $value["NAME"];
                                $customerSurname = $value["SURNAME"];
                      $comment = $value['C_COMMENT'];
                      $rate = $value['RATE'];
                                $productId = $value['PRODUCT_ID'];
                      $commentDate = $value['COMMENT_DATE']; ?>
                      <div class="card mb-2">
                        <div class="card-header">
                          <p>
                            <a href="dashboard.php?page=customer&uid=<?php echo $customerId; ?>" class="dark-object" style="font-weight: bold;"><i class="fas fa-user"></i>
                                                <?php echo ucfirst_turkish($customerName).' '.ucfirst_turkish($customerSurname); ?>
                                            </a> <span style="font-size: 0.9em;"><?php echo $commentDate; ?></span> | <span><a href="../urun.php?urunId=<?php echo $productId; ?>" style="font-size: 0.9em;" target="_blank">Ürünü Görüntüle</a></span> 
                            <i class="fas fa-trash" style="float: right; cursor: pointer; color: #FF3E43;" onclick="DeleteModal(<?php echo $commentId; ?>,1,null,CommentDelete);"></i>
                          </p>
                          <label>Puan: <?php echo $rate; ?></label><br>
                          <label><?php echo $comment; ?></label>
                        </div>
                      </div>
                    <?php } ?>
                    <?php if(!count($allCommentsArray)) echo '<label>Yorum bulunamadı!</label>'; ?>
                  </div>
                <?php } ?>
                </div>
              </div>
              <script type="text/javascript">
                function CommentDelete(commentId,redirect){
                  AjaxRequest('POST','class/delete_comment.php', {
                    'COMMENT_ID': commentId
                  }, (code) => {
                    if(code == 'success'){
                      if(redirect){
                        window.location.href = 'dashboard.php?page=comment&delete=success';
                      }
                      else{
                        window.location.href = 'dashboard.php?page=product-list&delete=success';
                      }
                    }
                    else{
                      GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                    }
                  })
                }
              </script>
            <?php } ?>

            <?php if($page == 'detail') { ?>
                <?php $orderArray = $db->GetOrder($_GET['code'])[0]; ?>
                <?php 
                  $totalProductPrice = 0; 
                  
                  $orderProductArray = $db->GetOrderProducts($orderArray["ID"]); 
                  foreach ($orderProductArray as $key => $value) {
                     $productDiscount = $value['PRODUCT_DISCOUNT'];
                     $productPrice = $value["PRODUCT_PRICE"];
                     $quantity = $value["QUANTITY"];

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
                        $totalProductPrice += ($m * $quantity);
                      }
                      else{
                        $totalProductPrice += ($quantity * (float)$productPrice);
                      }


                     //$totalProductPrice += ((float)$value["PRODUCT_PRICE"]) * $value["QUANTITY"];
                  } 
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label>Sipariş Kodu</label>
                                <input type="text" class="form-control" value="<?php echo $orderArray["ORDER_CODE"]; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Sipariş Onay</label>
                                <input type="text" class="form-control" value="<?php if($orderArray['ORDER_CHECK']) echo 'Onaylandı'; else if($orderArray['C_ORDER_CANCEL']) echo 'İptal Edildi'; else echo 'Bekleyen Sipariş' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Sipariş Tarihi</label>
                                <input type="text" class="form-control" value="<?php echo $orderArray['ORDER_DATE']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Adı</label>
                                <input type="text" class="form-control" value="<?php echo $orderArray['C_NAME']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label>Soyadı</label>
                                <input type="text" class="form-control" value="<?php echo $orderArray['C_SURNAME']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Telefon</label>
                                <input type="text" class="form-control" value="<?php echo $orderArray['C_PHONE']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Adres</label>
                                <input type="text" class="form-control" value="<?php echo $orderArray['ADDRESS']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Adres Adı</label>
                                <input type="text" class="form-control" value="<?php echo $orderArray['ADDRESS_NAME']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label>Firma/Şahıs Adı</label>
                                <input type="text" class="form-control" value="<?php 
                                    if($orderArray['COMPANY_NAME'] != '')
                                        echo $orderArray['COMPANY_NAME'];
                                    else if($orderArray['PERSON_NAME'] != '')
                                        echo $orderArray['PERSON_NAME'];
                                    else
                                        echo 'YOK';
                                 ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Vergi Numarası/TC. Kimlik No</label>
                                <input type="text" class="form-control" value="<?php 
                                  if($orderArray['TAX_NUMBER_OR_IDENTITY_NO'] != ''){
                                    echo $orderArray['TAX_NUMBER_OR_IDENTITY_NO'];
                                  }else{
                                    echo 'YOK';
                                  }
                                ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Vergi Dairesi</label>
                                <input type="text" class="form-control" value="<?php if($orderArray['TAX_ADMINISTRATION'] != '') echo $orderArray['TAX_ADMINISTRATION']; else echo 'YOK'; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Şehir/İlçe</label>
                                <input type="text" class="form-control" value="<?php echo $orderArray['CITY_NAME'].'/'.$orderArray['PROVINCE_NAME']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label>E-Posta Adresi</label>
                                <input type="text" class="form-control" value="<?php echo $orderArray['EMAIL']; ?>" readonly>
                            </div>
                            <!-- Order Summary -->
                            <div class="card" style="margin-bottom: 22px;">
                              <div class="card-header">
                                <center>
                                    <span style=" font-size: 1.3em;"><i class="fas fa-shopping-cart mr-2" style="color:gray"></i> Sipariş Özeti</span>
                                </center>
                              </div>
                              <ul class="list-group list-group-flush" style="font-size: 0.9em;">
                                
                                <!-- Discount Type
                                <li class="list-group-item">İndirim Tipi: <span style="float: right;">
                                    <?php 
                                      if($orderArray["DISCOUNT_TYPE"] === null)
                                        echo 'YOK';
                                      else if($orderArray["DISCOUNT_TYPE"] == false)
                                        echo 'Tutar';
                                      else if($orderArray["DISCOUNT_TYPE"] == true)
                                        echo 'Yüzdelik';

                                    ?>
                                  </span>
                                </li>
                                Discount Type -->


                                <!-- Discount Value
                                <li class="list-group-item">İndirim Miktarı: <span style="float: right;"><?php 
                                    if($orderArray["DISCOUNT_TYPE"] === null)
                                    echo '0 TL';
                                  else if($orderArray["DISCOUNT_TYPE"] == false)
                                    echo $orderArray["DISCOUNT_VALUE"].' TL';
                                  else if($orderArray["DISCOUNT_TYPE"] == true)
                                    echo '%'.$orderArray["DISCOUNT_VALUE"];
                                  ?></span>
                                </li>
                                 Discount Value -->


                                <li class="list-group-item">Ara Toplam: <span style="float: right;"><?php echo $func->FloatPrice($totalProductPrice).' TL'; ?></span></li>
                                 <li class="list-group-item">Kargo Ücreti:
                                <?php 
                                  $cargoArray = $db->GetCargo()[0];
                                  $cargoPrice = $cargoArray['CARGO_PRICE'];
                                  $cargoLimit = $cargoArray['CARGO_PRICE_LIMIT'];

                                if($func->FloatPrice($totalProductPrice) <= $cargoLimit) { ?>
                                    <span style="float: right;"><?php echo $func->FloatPrice($cargoPrice).' TL'; ?></span>
                                <?php } else { ?>
                                    <span style="float: right;"> 0 TL</span>
                                <?php } ?>
                                </li>

                                <li class="list-group-item" style="font-weight: bold;">GENEL TOPLAM: <span style="float: right;"><?php 
                                    if($func->FloatPrice($totalProductPrice) <= $cargoLimit) {
                                      echo $func->FloatPrice($func->FloatPrice($totalProductPrice) + $func->FloatPrice($cargoPrice));
                                    } else{
                                       echo ($func->FloatPrice($totalProductPrice));
                                    }
                                   ?> TL</span>
                                </li>


                              </ul>
                            </div>
                            <!-- Order Summary -->

                            <div class="form-group">
                                <?php if($orderArray['ORDER_CHECK'] || $orderArray['C_ORDER_CANCEL']) { ?>
                                   <?php if($orderArray['NEXT_CARGO'] == '') { ?>
                                      <button class="btn btn-success btn-block mt-2" onclick="OrderNextCargo();">Kargoya Verildi</button>
                                   <?php } ?>
                                    <button class="btn btn-danger btn-block mt-2" onclick="OrderDelete();">Sil</button>
                                <?php } else { ?>
                                    <button class="btn btn-success btn-block mt-2" style="height: 34px; font-size: 0.8em;" onclick="OrderCheck();">Onayla</button>
                                <?php } ?>                              
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <label>Sipariş Edilen Ürün(ler)</label>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                        <tr>
                                            <th>#</th>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Kategorisi</th>
                                            <th>Ürün Markası</th>
                                            <th>Ürün Fiyatı</th>
                                            <th>İndirim</th>
                                            <th>Stok Durumu</th>
                                            <th>Sipariş Adedi</th>
                                            <th>Tutar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($orderProductArray as $key => $value) {
                                        	$productId = $value['PRODUCT_ID'];
                                            $productName = $value['PRODUCT_NAME'];
                                            $categoryName = $value['CATEGORY_NAME'];
                                            $brandName = $value["BRAND_NAME"];
                                            $productPrice = $func->FloatPrice($value["PRODUCT_PRICE"]).' TL';
                                            $productDiscount = $value['PRODUCT_DISCOUNT'];
                                            $productStock = $value['PRODUCT_STOCK_QUANTITY'];
                                            $productQuantity = $value["QUANTITY"].' Adet';

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
                                              $total = ($m * $quantity);
                                            }
                                            else{
                                              $total = ((float) $productPrice) * $productQuantity; 
                                            }

                                            

                                            ?>
                                            <!-- Row -->
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $productName; ?></td>
                                                <td><?php echo $categoryName;  ?></td>
                                                <td><?php echo $brandName; ?></td>
                                                <td><?php echo $productPrice; ?></td>
                                                <td><?php if($productDiscount == '') echo 'YOK'; else echo '%'.$productDiscount; ?></td>
                                                <td onclick="window.location.href='dashboard.php?page=add-product&pid=<?php echo $productId; ?>'" style="font-weight: bold; cursor: pointer;"><?php echo $productStock; ?> Adet Kaldı</td>
                                                <td><?php echo $productQuantity; ?></td>
                                                <td><?php echo $func->FloatPrice($total).' TL'; ?></td>
                                            </tr>
                                             <!-- /Row -->
                                         <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                  function OrderCheck(){
                    var orderCode = "<?php echo $orderArray["ORDER_CODE"]; ?>";
                    AjaxRequest('POST','class/check_order.php', {
                      'ORDER_CODE': orderCode
                    }, (code) => {
                      if(code == 'success'){
                        window.location.href = 'dashboard.php?page=orders&check=success';
                      }
                      else{
                        GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                      }
                    });
                  }

                  function OrderDelete(){
                    var orderCode = "<?php echo $orderArray["ORDER_CODE"]; ?>";
                    AjaxRequest('POST','class/delete_order.php', {
                      'ORDER_CODE': orderCode
                    }, (code) => {
                      if(code == 'success'){
                        window.location.href = 'dashboard.php?page=orders&delete=success';
                      }
                      else{
                        GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                      }
                    });
                  }

                  function OrderNextCargo(){
                    var orderCode = "<?php echo $orderArray["ORDER_CODE"]; ?>";
                    AjaxRequest('POST','class/next_cargo_order.php', {
                      'ORDER_CODE': orderCode
                    }, (code) => {
                      if(code == 'success'){
                        window.location.href = 'dashboard.php?page=orders&next-cargo=success';
                      }
                      else{
                        GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                      }
                    });
                  }
                </script>
            <?php } ?>

            <?php if($page == 'product-list') { ?>
                <?php $productArray = $db->GetProducts('dashboard');?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                        <tr>
                                            <th>#</th>
                                            <th>Ürün Adı</th>
                                            <th>Fiyat</th>
                                            <th>Marka</th>
                                            <th>Stok Durumu</th>
                                            <th>İndirim</th>
                                            <th>İndirim Kodu</th>
                                            <th>Kayıt Tarihi</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($productArray as $key => $value) {
                                           $productId = $value['ID'];
                                           $productName = $value['PRODUCT_NAME'];
                                           $price = $value['PRODUCT_PRICE'];
                                           $brand = $value['BRAND_NAME'];
                                           $stock = $value['PRODUCT_STOCK_QUANTITY'];
                                           $discountType = $value['PRODUCT_DISCOUNT_TYPE'];
                                           $discountValue = $value['PRODUCT_DISCOUNT'];
                                           $discountCode = $value['PRODUCT_DISCOUNT_CODE'];
                                           $date = $value['PRODUCT_DATE'];
                                           if($discountType == 1) $discountValue = $discountValue.' TL';
                                           if($discountType == false) $discountValue = '%'.$discountValue;
                                           if($discountType == null || $discountType == ''){ $discountValue = 'YOK'; $discountCode = 'YOK'; } ?>
                                           <!-- Row -->
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $productName; ?></td>
                                                <td><?php echo $func->FloatPrice($price).' TL'; ?></td>
                                                <td><?php echo $brand; ?></td>
                                                <td><?php echo $stock.' Adet'; ?></td>
                                                <td><?php echo $discountValue; ?></td>
                                                <td><?php echo $discountCode; ?></td>
                                                <td><?php echo $date; ?></td>
                                                <td>
                                                    <i class="fas fa-edit mr-2" style="cursor: pointer;" onclick="window.location.href = 'dashboard.php?page=add-product&pid=<?php echo $productId; ?>'"></i>
                                                    <i class="fas fa-trash mr-2" style="cursor: pointer;" onclick="DeleteModal(<?php echo $productId; ?>,0,null,ProductDelete)"></i>
                                                    <i class="fas fa-eye mr-2" style="cursor: pointer;" onclick="window.open('../urun.php?urunId=<?php echo $productId; ?>','_blank')"></i>
                                                    <i class="fas fa-comment-dots" style="cursor: pointer;" onclick="window.location.href='dashboard.php?page=comment&pid=<?php echo $productId; ?>'"></i>
                                                </td>
                                            </tr>
                                            <!-- /Row -->
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>        
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    function ProductDelete(productId,emp){
                        AjaxRequest('POST','class/delete_product.php', {
                            'PRODUCT_ID': productId
                        }, (code) => {
                            if(code == 'success'){
                                window.location.href = 'dashboard.php?page=product-list&delete=success';
                            }
                            else{
                                GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                            }
                        });
                    }
                </script>
            <?php } ?>

            <?php if($page == 'most-sale') { ?>
                <?php $productArray = $db->GetProducts('most_admin'); ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="white-space: nowrap; background-color: #7386D5; color:white;">
                                        <tr>
                                            <th>#</th>
                                            <th>Ürün Adı</th>
                                            <th>Fiyat</th>
                                            <th>Stok Durumu</th>
                                            <th>Toplam Satış</th>
                                            <th>İndirim</th>
                                            <th>Kayıt Tarihi</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($productArray as $key => $value) {
                                           $productId = $value['ID'];
                                           $productName = $value['PRODUCT_NAME'];
                                           $price = $value['PRODUCT_PRICE'];
                                           $sum = $value['SUM'];
                                           $stock = $value['PRODUCT_STOCK_QUANTITY'];
                                           $discountType = $value['PRODUCT_DISCOUNT_TYPE'];
                                           $discountValue = $value['PRODUCT_DISCOUNT'];
                                           $discountCode = $value['PRODUCT_DISCOUNT_CODE'];
                                           $date = $value['PRODUCT_DATE'];
                                           if($discountType == 1) $discountValue = $discountValue.' TL';
                                           if($discountType == false) $discountValue = '%'.$discountValue;
                                           if($discountType == null || $discountType == ''){ $discountValue = 'YOK'; $discountCode = 'YOK'; } ?>
                                           <!-- Row -->
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $productName; ?></td>
                                                <td><?php echo $func->FloatPrice($price).' TL'; ?></td>
                                                <td><?php echo $stock.' Adet'; ?></td>
                                                <td><?php echo $sum; ?> Adet</td>
                                                <td><?php echo $discountValue; ?></td>
                                                <td><?php echo $date; ?></td>
                                                <td>
                                                    <i class="fas fa-edit mr-2" style="cursor: pointer;" onclick="window.location.href = 'dashboard.php?page=add-product&pid=<?php echo $productId; ?>'"></i>
                                                    <i class="fas fa-trash mr-2" style="cursor: pointer;" onclick="DeleteModal(<?php echo $productId; ?>,0,null,ProductDelete)"></i>
                                                    <i class="fas fa-eye mr-2" style="cursor: pointer;" onclick="window.open('../urun.php?urunId=<?php echo $productId; ?>','_blank')"></i>
                                                    <i class="fas fa-comment-dots" style="cursor: pointer;" onclick="window.location.href='dashboard.php?page=comment&pid=<?php echo $productId; ?>'"></i>
                                                </td>
                                            </tr>
                                            <!-- /Row -->
                                       <?php } ?>
                                    </tbody>
                                </table>
                            </div>        
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    function ProductDelete(productId,emp){
                        AjaxRequest('POST','class/delete_product.php', {
                            'PRODUCT_ID': productId
                        }, (code) => {
                            if(code == 'success'){
                                window.location.href = 'dashboard.php?page=most-sale&delete=success';
                            }
                            else{
                                GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                            }
                        });
                    }
                </script>
            <?php } ?>


            <?php if($page == 'add-product') { ?>
                <?php $infoArray = $db->GetInfos()[0]; ?>
                <?php $categoryArray = $db->GetCategory(); ?>
                <?php $brandArray = $db->GetBrand(); ?>
                <?php $pidArray = $db->GetProductWithId($_GET['pid'])[0]; ?>
                <?php $subcategoryArray = $db->GetSubCategory('admin',$pidArray['PRODUCT_CATEGORY']); ?>
                <?php $subsubcategoryArray = $db->GetSubSubCategory('admin',$pidArray['PRODUCT_CATEGORY'],$pidArray['PRODUCT_SUB_CATEGORY']); ?>
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-4 mb-2">
                            <div class="form-group">
                                <label>Ürün Kategorisi</label><img id="categoryLoading" src="" width="17">
                                
                                <i class="fas fa-edit selectionRenameIcon" onclick="RenameModal('r1')"></i>
                                <i class="fas fa-trash selectionDeleteIcon" onclick="DeleteModal(getCategoryId('CategorySelect'),getCategoryId('SubcategorySelect'),getCategoryId('SubSubcategorySelect'),DeleteCategory)"></i>
                                
                                <select class="form-control" style="font-size: 0.9em;" id="CategorySelect" onchange="getCategoryId('CategorySelect') == 0 ? AddModal('category',AddCategory) : GetSubCategory();"> 
                                    <option>Seç...</option>
                                    <?php foreach ($categoryArray as $key => $value) {
                                        $categoryId = $value["ID"];
                                        $categoryName = $value["CATEGORY_NAME"];
                                        if($pidArray['PRODUCT_CATEGORY'] == $categoryId){
                                            echo "<option value='$categoryId' selected>$categoryName</option>";
                                        }
                                        else{
                                            echo "<option value='$categoryId'>$categoryName</option>";
                                        }
                                    } ?>
                                    <option value="0"> + Yeni Kategori Ekle</option>
                                </select>

                                <i class="fas fa-edit selectionRenameIcon mt-3 mb-1" onclick="RenameModal('r2')"></i>
                                <select class="form-control mt-2" style="font-size: 0.9em;" id="SubcategorySelect" onchange="getCategoryId('CategorySelect') != 'Seç...' && getCategoryId('CategorySelect') != 0 && getCategoryId('SubcategorySelect') == 0 ? AddModal('subcategory',AddSubCategory,getCategoryId('CategorySelect')) : GetSubSubCategory();">
                                    <option>Seç...</option>
                                    <?php 
                                        foreach ($subcategoryArray as $key => $value) {
                                            $subcategoryId = $value['ID'];
                                            $subcategoryName = $value['SUB_CATEGORY_NAME'];

                                            if($pidArray['PRODUCT_SUB_CATEGORY'] == $subcategoryId){
                                                echo "<option value='$subcategoryId' selected>$subcategoryName</option>";
                                            }
                                            else{
                                                echo "<option value='$subcategoryId'>$subcategoryName</option>";
                                            }
                                        }
                                    ?>
                                    <option value="0"> + Yeni Kategori Ekle</option>
                                </select>
                                <!-- Sub Sub Category Start -->
                                <i class="fas fa-edit selectionRenameIcon mt-3 mb-1" onclick="RenameModal('r3')"></i>
                                <select class="form-control mt-2" style="font-size: 0.9em;" id="SubSubcategorySelect" onchange="getCategoryId('CategorySelect') != 'Seç...' && getCategoryId('CategorySelect') != 0 && getCategoryId('SubSubcategorySelect') == 0 ? AddModal('subsubcategory',AddSubSubCategory,getCategoryId('CategorySelect'),getCategoryId('SubcategorySelect')) : null">
                                    <option>Seç...</option>
                                    <?php 
                                        foreach ($subsubcategoryArray as $key => $value) {
                                            $subsubcategoryId = $value['ID'];
                                            $subsubcategoryName = $value['SUB_SUB_CATEGORY_NAME'];

                                            if($pidArray['PRODUCT_SUB_SUB_CATEGORY'] == $subsubcategoryId){
                                                echo "<option value='$subsubcategoryId' selected>$subsubcategoryName</option>";
                                            }
                                            else{
                                                echo "<option value='$subsubcategoryId'>$subsubcategoryName</option>";
                                            }
                                        }
                                    ?>
                                    <option value="0"> + Yeni Kategori Ekle</option>
                                </select>
                                <!-- Sub Sub Category End -->
                            </div>
                            <div class="form-group">
                              <!-- Product Status -->
                              <label>Ürün Durumu</label>
                              <select class="form-control" style="font-size: 0.9em;" id="ProductStatusSelect">
                                <option value="0" <?php if($pidArray['PRODUCT_TOP_STATUS'] == 'NONE') echo 'selected'; ?>>YOK</option>
                                <option value="1" <?php if($pidArray['PRODUCT_TOP_STATUS'] == 'NEW') echo 'selected'; ?>>Yeni Ürün</option>
                                <option value="2" <?php if($pidArray['PRODUCT_TOP_STATUS'] == 'WEB') echo 'selected'; ?>>Web'e Özel</option>
                              </select>
                              <!-- Product Status -->
                            </div>
                            <div class="form-group">
                                <label>Ürün Markası</label> 

                                <i class="fas fa-edit selectionRenameIcon" onclick="RenameModal('r4')"></i>
                                <i class="fas fa-trash selectionDeleteIcon" onclick="DeleteModal(getCategoryId('BrandCategory'),0,null,DeleteBrand)"></i>
                                <select class="form-control" style="font-size: 0.9em;" id="BrandCategory" onchange="getCategoryId('BrandCategory') == 0 ? AddModal('brand',AddBrand) : null">
                                    <option>Seç...</option>
                                    <?php foreach ($brandArray as $key => $value) {
                                        $brandId = $value["ID"];
                                        $brandName = $value["BRAND_NAME"];         

                                        if($pidArray['PRODUCT_BRAND'] == $brandId){
                                            echo "<option value='$brandId' selected>$brandName</option>";
                                        }
                                        else{
                                            echo "<option value='$brandId'>$brandName</option>";
                                        }
                                    } ?>
                                    <option value="0"> + Yeni Marka Ekle</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label>Ürün Adı</label>
                              <input type="text" id="productName" class="form-control" value="<?php if(count($pidArray)>0) echo $pidArray['PRODUCT_NAME']; ?>">
                            </div>
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label>Stok Adedi</label>
                                  <input type="number" id="stockQuantity" class="form-control" autocomplete="off" min="1" value="<?php if(count($pidArray)>0) echo $pidArray['PRODUCT_STOCK_QUANTITY']; ?>">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label>Ürün Fiyatı</label>
                                  <input type="number" id="price" class="form-control" autocomplete="off" placeholder="TL" step="0.01" value="<?php if(count($pidArray)>0) echo $func->FloatPrice($pidArray['PRODUCT_PRICE']); ?>" min="0.01">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label>İndirim</label>
                                  <select class="form-control" id="DiscountSelect" style="font-size: 0.9em;" onchange="DiscountEnable(getCategoryId('DiscountSelect'))">
                                    <option value="-1" >YOK</option>
                                    <option value="0" <?php if($pidArray['PRODUCT_DISCOUNT_TYPE'] == "0") echo 'selected'; ?>>Yüzde</option>
                                    <!-- <option value="1" <?php if($pidArray['PRODUCT_DISCOUNT_TYPE'] == "1") echo 'selected'; ?>>Tutar</option> (Removed) -->
                                  </select>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label>Değer</label>
                                  <input type="number" id="descValue" class="form-control" autocomplete="off" placeholder="" step="0.01" value="<?php if($pidArray['PRODUCT_DISCOUNT'] != '') echo $pidArray['PRODUCT_DISCOUNT']; ?>" min="0.01" <?php if($pidArray['PRODUCT_DISCOUNT'] == '') echo 'disabled'; ?>>
                                </div>
                              </div>
                            </div>
                            <?php 
                                if($pidArray['PRODUCT_DISCOUNT_CODE'] != '') { ?>
                                    <!-- <label id="rndCodeText">İndirim Kodu: <label style="font-weight: bold;" id="rndCode"><?php echo $pidArray['PRODUCT_DISCOUNT_CODE']; ?></label> (Removed) -->
                                    <div class="row mt-1">
                                      <div class="col-6">
                                        <label>Arkaplan Rengi: </label>
                                      </div>
                                      <div class="col-6">
                                        <input type="color" class="form-control" id="topLeftBgColor" value="<?php echo $infoArray["TOP_LEFT_BGCOLOR"]; ?>">
                                      </div>

                                       <div class="col-6">
                                        <label>Metin Rengi: </label>
                                      </div>
                                      <div class="col-6">
                                        <input type="color" class="form-control" id="topLeftFrColor" value="<?php echo $infoArray["TOP_LEFT_FRCOLOR"]; ?>">
                                      </div>
                                    </div>

                                    <button class="btn btn-success btn-block mt-1" onclick="DiscountStyleUpdate();"> Kaydet</button>
                                    </label>
                                <?php } else { ?>
                                    <label style="display: none;" id="rndCodeText">İndirim Kodu: <label style="font-weight: bold;" id="rndCode"></label>
                                    
                                    <div class="row mt-1">
                                      <div class="col-6">
                                        <label>Arkaplan Rengi: </label>
                                      </div>
                                      <div class="col-6">
                                        <input type="color" class="form-control" id="topLeftBgColor" value="<?php echo $infoArray["TOP_LEFT_BGCOLOR"]; ?>">
                                      </div>

                                       <div class="col-6">
                                        <label>Metin Rengi: </label>
                                      </div>
                                      <div class="col-6">
                                        <input type="color" class="form-control" id="topLeftFrColor" value="<?php echo $infoArray["TOP_LEFT_FRCOLOR"]; ?>">
                                      </div>
                                    </div>

                                    <button class="btn btn-success btn-block mt-1" onclick="DiscountStyleUpdate();"> Kaydet</button>
                                  </label>
                                <?php } ?>
                            
                        </div>
                        <div class="col-12 col-lg-8">
                          <label>Ürün Detayı</label>
                          <textarea name="editor1" id="editor1"><?php if(count($pidArray)>0) echo $pidArray['PRODUCT_DETAIL']; ?></textarea>
                        </div>

                        <!-- Non Edit Case -->
                        <?php if(count($pidArray) == 0) { ?>
                        <div class="col-12 upload-place-wrapper mt-4" style="border: 2px dotted gray; max-height: 500px; min-height: 100px;">
                          <center>
                            <img src="" class="img-fluid" id="PrevImage">
                          </center>
                          <input type="file" id="selectFile" onchange="ImagePreview(event);" accept="image/*"/>
                          <center id="scText">
                            <p id="selectText"><i class="fas fa-camera fa-2x"></i> <br> Resim seçmek için tıklayınız <br/> <label style="font-size: 15px;">Önerilen boyut: 500x500</label></p>
                          </center>
                        </div>
                        <div id="ImageTools">
                          <button class="btn btn-info mt-2 mr-3" onclick="$('#selectFile').trigger('click');"><i class="fas fa-trash"></i> Yeniden Seç</button>
                          <button class="btn btn-success mt-2" onclick="AddImage();"><i class="fas fa-plus"></i> Ekle</button>
                        </div>
                        <div class="col-12 mt-5">
                          <label style="font-weight: bold;">Ön izleme</label>
                        </div>
                        <div class="col-12" style="border-top: 1px solid gray;"></div>
                        <div id="preview-place" class="row"></div>
                        <?php } ?>
                        <!-- Non Edit Case End -->
                        <!-- Edit Case Start -->
                        <?php if(count($pidArray) > 0) { ?>
                          <div class="col-12 upload-place-wrapper mt-4" style="border: 2px dotted gray; max-height: 500px; min-height: 100px;">
                            <center>
                              <img src="" class="img-fluid" id="PrevImage">
                            </center>
                            <input type="file" id="selectFile" onchange="ImagePreview(event);" accept="image/*"/>
                            <center id="scText">
                              <p id="selectText"><i class="fas fa-camera fa-2x"></i> <br> Resim seçmek için tıklayınız <br/> <label style="font-size: 15px;">Önerilen boyut: 500x500</label></p>
                            </center>
                          </div>
                          <div id="ImageTools">
                            <button class="btn btn-info mt-2 mr-3" onclick="$('#selectFile').trigger('click');"><i class="fas fa-trash"></i> Yeniden Seç</button>
                            <button class="btn btn-success mt-2" onclick="AddImage();"><i class="fas fa-plus"></i> Ekle</button>
                          </div>
                          <div class="col-12 mt-5">
                            <label style="font-weight: bold;">Ön izleme</label>
                          </div>
                          <div class="col-12" style="border-top: 1px solid gray;"></div>
                          <div id="preview-place" class="row">
                          <?php $productImageArray = $db->GetProductImages($_GET['pid']); foreach ($productImageArray as $key => $value) { ?>
                              <!-- image Box -->
                              <div id="image_content_up" class="col-12 col-lg-4 mt-4">
                                <div id="image_content_card_up" class="card">
                                  <img id="image_content_card_up" class="img-fluid" src="../product/<?php echo $value['PRODUCT_IMAGE_NAME']; ?>">
                                  <button id="delete_button_up" class="btn btn-danger  mt-1" onclick="DeleteModal(<?php echo $value["ID"]; ?>,'<?php echo $value["PRODUCT_IMAGE_NAME"]; ?>',null,AddProductImageDelete);"> Sil
                                  </button>
                                  <button class="btn btn-success mt-1" onclick="ProductImageEditModal(<?php echo $value["ID"]; ?>,'<?php echo $value["PRODUCT_IMAGE_NAME"]; ?>');">
                                     Düzenle
                                  </button>
                                </div>
                              </div>
                              <!-- Image Box End -->
                          <?php } } ?>
                        <!-- Edit Case End -->
                        </div>
                    </div>
                    <div class="row">
                      <?php if(count($pidArray) == 0) { ?>
                          <div class="col-12">
                            <button class="btn btn-success mt-3" id="myBtns" onclick="ProductSave();">Kaydet</button>
                          </div>
                      <?php } else { ?>
                       <div class="col-12">
                          <button class="btn btn-success mt-3" id="myBtns" style="float: right;" onclick="ProductSave();">Güncelle</button>
                       </div>
                      <?php } ?>
                    </div>
              </div>
                <script type="text/javascript">
                  CKEDITOR.replace('editor1', {
                    height: 350
                  });
                    var imagesArray = [];
                    function AddCategory(input){
                        if(input != ''){
                            AjaxRequest('POST', 'class/add_category.php', {
                                'CATEGORY_NAME': input
                            },(code) => {
                                $('.add-modal').modal('hide');
                                if(code > 0){ 
                                    $("#CategorySelect option[value='0']").remove();

                                    AddOption('CategorySelect',input,code);
                                    AddOption('CategorySelect',' + Yeni Kategori Ekle',0);

                                    GlobalInfoModal("Yeni kategori eklendi!");
                                }
                                else {
                                    GlobalInfoModal("Bu isimde kategori mevcut!");
                                }
                            });
                        }
                    }

                    function DiscountStyleUpdate(){
                      var bgcolor = GetInput("topLeftBgColor");
                      var frcolor = GetInput("topLeftFrColor");

                      AjaxRequest('POST','class/top_left_update.php', {
                        'BGCOLOR': bgcolor,
                        'FRCOLOR': frcolor
                      },(code) => {
                        if(code == 'success'){
                          GlobalInfoModal("Renkler kaydedildi!");
                        }
                        else{
                          GlobalInfoModal("Renkler kaydedildi!");
                        }
                      })
                    }

                    function AddProductImageDelete(imgId,imgName){
                      AjaxRequest('POST','class/delete_product_image.php', {
                        'IMAGE_ID': imgId,
                        'IMAGE_NAME': imgName
                      },(code) => {
                        if(code == 'success'){
                          var pid = <?php if($_GET['pid'] > 0) echo $_GET['pid']; else echo 0;?>;
                          window.location.href = 'dashboard.php?page=add-product&pid=' + pid + '&delete=success'; 
                        }
                        else{
                          GlobalInfoModal("Bir sorun oluştu!");
                        }
                      })
                      
                    }

                    function ProductImageEditModal(imgId,imgName){
                      document.getElementById('editProductImageId').value = imgId;
                      document.getElementById('editProductImageName').value = imgName;

                      $('.product-edit-modal').modal('show');
                    }

                    function ProductImageUpdateModal(){
                      document.getElementById("myBtn").disabled = true;  
                      document.getElementById("myBtn").innerHTML = 'Bekleyin...';
                      var imgId = GetInput('editProductImageId');
                      var imgName = GetInput('editProductImageName');

                      var newImage = document.getElementById("selectFile5").files;
                      var formData = new FormData();

                      if(newImage.length == 1){
                        formData.append('IMAGE', newImage[0]);
                        formData.append('IMAGE_ID', imgId);
                        formData.append('IMAGE_NAME', imgName);

                        AjaxRequest('POST','class/update_product_image.php',formData,(code) => {
                            if(code == 'success'){
                              var pid = <?php if($_GET['pid'] > 0) echo $_GET['pid']; else echo 0;?>;
                              window.location.href = 'dashboard.php?page=add-product&pid=' + pid + '&update=success'; 
                            }else{
                              GlobalInfoModal('Bir sorun oluştu!');
                            }
                        },true);
                      }

                    }

                    function AddSubCategory(input,catId){
                        if(input != '' && catId != ''){
                            AjaxRequest('POST', 'class/add_subcategory.php', {
                                'CATEGORY_ID': catId,
                                'SUBCATEGORY_NAME': input
                            },(code) => {
                                $('.add-modal').modal('hide');
                                if(code > 0){
                                    $("#SubcategorySelect option[value='0']").remove();

                                    AddOption('SubcategorySelect',input,code);
                                    AddOption('SubcategorySelect',' + Yeni Kategori Ekle',0);

                                    GlobalInfoModal("Yeni kategori eklendi!");
                                }
                                else {
                                    GlobalInfoModal("Bu isimde kategori mevcut!");
                                }
                            });
                        }
                    }

                    function AddSubSubCategory(input,catId,subCatId){
                        if(input != '' && catId != '' && subCatId != ''){
                            AjaxRequest('POST', 'class/add_subsubcategory.php', {
                                'CATEGORY_ID': catId,
                                'SUB_CATEGORY_ID': subCatId,
                                'SUBSUBCATEGORY_NAME': input
                            },(code) => {
                                $('.add-modal').modal('hide');
                                if(code > 0){
                                    $("#SubSubcategorySelect option[value='0']").remove();

                                    AddOption('SubSubcategorySelect',input,code);
                                    AddOption('SubSubcategorySelect',' + Yeni Kategori Ekle',0);

                                    GlobalInfoModal("Yeni kategori eklendi!");
                                }
                                else {
                                    GlobalInfoModal("Bu isimde kategori mevcut!");
                                }
                            });
                        }
                        //console.log(input,catId,subCatId);
                    }

                    function DeleteCategory(catId,subId,sub2Id){
                        if(catId != 'Seç...' && catId != '0'){
                            var data;
                            if(subId != 'Seç...' && subId != '0' && (sub2Id == 'Seç...' || sub2Id == '0')){
                                data = {
                                    'CATEGORY_ID'   : catId,
                                    'SUBCATEGORY_ID': subId
                                };
                            }
                            else if(subId != 'Seç...' && subId != '0' && (sub2Id != 'Seç...' && sub2Id != '0')){
                              data = {
                                    'CATEGORY_ID'   : catId,
                                    'SUBCATEGORY_ID': subId,
                                    'SUBSUBCATEGORY_ID': sub2Id
                                };
                            }
                            else{
                                data = {
                                    'CATEGORY_ID'   : catId
                                };
                            }

                            AjaxRequest('POST','class/delete_category.php', data, (code) => {
                                if(code == 'success'){
                                    window.location.href = 'dashboard.php?page=add-product&delete=success';
                                }
                                else{
                                    $('.delete-modal').modal('hide');
                                    GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                                }
                            });
                        }
                        else{
                            $('.delete-modal').modal('hide');
                            GlobalInfoModal("Lütfen bir kategori seçin!");
                        }
                        
                    }

                    function GetSubCategory(){
                      GetSubSubCategory();

                        var categoryId = getCategoryId("CategorySelect");
                        if(parseInt(categoryId) > 0){
                            var categoryLoading = document.getElementById("categoryLoading");
                            categoryLoading.src = 'img/loading2.gif';

                            AjaxRequest('POST','class/get_subcategory.php', {
                                'CATEGORY_ID': categoryId
                            }, (code) => {
                                if(code != 'error'){
                                    $("#SubcategorySelect").empty();

                                    AddOption('SubcategorySelect','Seç...');
                                    for(let i = 0; i < code.length; i++){
                                        AddOption('SubcategorySelect',code[i]["SUB_CATEGORY_NAME"],code[i]["ID"]);
                                    }
                                    AddOption('SubcategorySelect',' + Yeni Kategori Ekle',0);
                                }
                                else{
                                    $("#SubcategorySelect").empty();

                                    AddOption('SubcategorySelect','Seç...');
                                    AddOption('SubcategorySelect',' + Yeni Kategori Ekle',0);
                                }
                            });

                            categoryLoading.src = '';
                        }
                    }

                    function GetSubSubCategory(){

                        var categoryId = getCategoryId("CategorySelect");
                        var subcategoryId = getCategoryId("SubcategorySelect");
                        if(parseInt(categoryId) > 0 && parseInt(subcategoryId)){
                            var categoryLoading = document.getElementById("categoryLoading");
                            categoryLoading.src = 'img/loading2.gif';

                            AjaxRequest('POST','class/get_subsubcategory.php', {
                                'CATEGORY_ID': categoryId,
                                'SUBCATEGORY_ID': subcategoryId
                            }, (code) => {
                                if(code != 'error'){
                                    $("#SubSubcategorySelect").empty();

                                    AddOption('SubSubcategorySelect','Seç...');
                                    for(let i = 0; i < code.length; i++){
                                        AddOption('SubSubcategorySelect',code[i]["SUB_SUB_CATEGORY_NAME"],code[i]["ID"]);
                                    }
                                    AddOption('SubSubcategorySelect',' + Yeni Kategori Ekle',0);
                                }
                                else{
                                    $("#SubSubcategorySelect").empty();

                                    AddOption('SubSubcategorySelect','Seç...');
                                    AddOption('SubSubcategorySelect',' + Yeni Kategori Ekle',0);
                                }
                            });

                            categoryLoading.src = '';
                        }
                    }

                    function AddBrand(input){
                        if(input != ''){
                            AjaxRequest('POST', 'class/add_brand.php', {
                                'BRAND_NAME': input
                            },(code) => {
                                $('.add-modal').modal('hide');
                                if(code > 0){
                                    $("#BrandCategory option[value='0']").remove();

                                    AddOption('BrandCategory',input,code);
                                    AddOption('BrandCategory',' + Yeni Marka Ekle',0);

                                    GlobalInfoModal("Yeni marka eklendi!");
                                }
                                else {
                                    GlobalInfoModal("Bu isimde marka mevcut!");
                                }
                            });
                        }
                    }

                    function DeleteBrand(brandId){
                        if(brandId != 'Seç...' && brandId != '0'){
                            AjaxRequest('POST','class/delete_brand.php', {
                                'BRAND_ID': brandId
                            }, (code) => {
                                if(code == 'success'){
                                    window.location.href = 'dashboard.php?page=add-product&delete=success';
                                }
                                else{
                                    $('.delete-modal').modal('hide');
                                    GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                                }
                            });
                        }
                        else{
                            $('.delete-modal').modal('hide');
                            GlobalInfoModal("Lütfen bir marka seçin!");
                        }
                    }

                    function DiscountEnable(value){
                      if(value == '-1'){
                        $("#descValue").prop("disabled",true);
                        $('#descValue').attr('placeholder','');
                        ClearInput("descValue");
                        $("#rndCodeText").prop("style",'display: none');
                      }
                      else if(value == "0"){
                        $("#descValue").prop("disabled",false);
                        
                        $('#descValue').attr('placeholder','%');
                        $('#descValue').attr('step','1');
                        $('#descValue').attr('min','1');
                        $('#descValue').attr('max','100');
                        ClearInput("descValue");
                        document.getElementById('rndCode').textContent = RandomCode();
                        $("#rndCodeText").prop("style",'display: block');
                      }
                      else if (value == "1"){
                        $("#descValue").prop("disabled",false);

                        $('#descValue').attr('placeholder','TL');
                        $('#descValue').attr('step','0.01');
                        $('#descValue').attr('min','0.01');
                        ClearInput("descValue");
                        document.getElementById('rndCode').textContent = RandomCode();
                        $("#rndCodeText").prop("style",'display: block');
                      }
                    }

                    function RandomCode(length = 10) {
                       var result           = '';
                       var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                       var charactersLength = characters.length;
                       for ( var i = 0; i < length; i++ ) {
                          result += characters.charAt(Math.floor(Math.random() * charactersLength));
                       }
                       return result;
                    }


                    function AddImage(){
                        var x = RandomCode();
                        var y = RandomCode();

                        let _src = URL.createObjectURL(document.getElementById('selectFile').files[0]);
                        
                        let temp = [
                            'image_content_card_img' + y,
                            document.getElementById('selectFile').files[0]
                        ]
                        imagesArray.push(temp);

                        $('#preview-place').append(
                            $('<div>').prop({
                              id: 'image_content_' + x,
                              className: 'col-12 col-lg-4 mt-4'
                            })
                        );

                        $('#image_content_' + x).append(
                            $('<div>').prop({
                              id: 'image_content_card_' + y,
                              className: 'card'
                            })
                        );

                        $('#image_content_card_' + y).append(
                            $('<img>').prop({
                              id: 'image_content_card_img' + y,
                              className: 'img-fluid',
                              src: _src
                            })
                        );

                        $('#image_content_card_' + y).append(
                            $('<button>').prop({
                              id: 'delete_button_' + y,
                              className: 'btn btn-danger mt-1',
                              innerHTML: 'Sil'
                            })
                        );

                        $('#image_content_card_' + y).append(
                            $('<button disabled>').prop({
                              id: 'disable_button_' + y,
                              className: 'btn btn-success mt-1',
                              innerHTML: 'Düzenle'
                            })
                        );

                        $("#delete_button_" + y).click(function() { _image_delete('image_content_' + x, 'image_content_card_img' + y); });

                        $('#scText').append(
                            '<p id="selectText"><i class="fas fa-camera fa-2x"></i> <br> Resim seçmek için tıklayınız <br/> <label style="font-size: 15px;">Önerilen boyut: 500x500</label></p>'
                        );
                        document.getElementById("ImageTools").style.display = "none";
                        
                        let preview = document.getElementById("PrevImage");
                        preview.src = '';
                    }

                    function _image_delete(id,img_id){
                        document.getElementById(id).remove();

                        for (var key in imagesArray) {
                            var index = imagesArray[key].indexOf(img_id);
                            if (index !== -1)
                                imagesArray.splice(imagesArray[key], 1);
                        }
                    }

                    function ProductSave(){


                      var categoryId    = getCategoryId("CategorySelect");
                      var subcategoryId = getCategoryId("SubcategorySelect");
                      var subsubcategoryId = getCategoryId("SubSubcategorySelect");
                      var brandId = getCategoryId("BrandCategory");
                      var productName = GetInput("productName");
                      var stockQuantity = GetInput("stockQuantity");
                      var price = GetInput("price");
                      var detail = CKEDITOR.instances.editor1.getData();

                      var productStatus = getCategoryId("ProductStatusSelect");
                      if(productStatus == 0) productStatus = 'NONE';
                      if(productStatus == 1) productStatus = 'NEW';
                      if(productStatus == 2) productStatus = 'WEB';

                      var discountType = getCategoryId("DiscountSelect"); //Optional
                      var discountValue = GetInput("descValue");
                      /*var discountCode = document.getElementById('rndCode').textContent; (Removed) */
                      var discountCode = '(Removed)';
                        var formData = new FormData();

                      if(categoryId != 'Seç...'){
                        if(brandId != 'Seç...'){
                          if(productName != ''){
                            if(stockQuantity > 0){
                              if(price > 0.00){
                                if(detail != ''){

                                  formData.append('CATEGORY_ID',categoryId);
                                                formData.append('SUBCATEGORY_ID',subcategoryId);
                                                formData.append('SUBSUBCATEGORY_ID',subsubcategoryId);
                                                formData.append('BRAND_ID',brandId);
                                                formData.append('PRODUCT_STATUS',productStatus);
                                                formData.append('PRODUCT_NAME',productName);
                                                formData.append('STOCK_QUANTITY', stockQuantity);
                                                formData.append('PRICE',price);
                                                formData.append('DETAIL',detail);

                                  if(discountType == "-1"){
                                                    formData.append('DISCOUNT_TYPE','NONE');

                                                    <?php if(count($pidArray) == 0) { ?>
                                                      __ProductSave(formData);
                                                    <?php } else { ?>
                                                      __ProductUpdate(formData);
                                                    <?php } ?>

                                  }
                                  else if((discountType == "0" || discountType == "1") && discountValue != ''){                                                
                                                    if(discountType == "0" && (discountValue > 0 && discountValue <= 100)){
                                                        formData.append('DISCOUNT_TYPE','ZERO');
                                                        formData.append('DISCOUNT_VALUE', discountValue);
                                                        formData.append('DISCOUNT_CODE',discountCode);

                                                        <?php if(count($pidArray) == 0) { ?>
                                                        __ProductSave(formData);
                                                      <?php } else { ?>
                                                        __ProductUpdate(formData);
                                                      <?php } ?>
                                                    }
                                                    else if(discountType == "0"){
                                                        GlobalInfoModal("İndirim değeri en düşük %1, en yüksek %100 olabilir!");
                                                    }

                                                    if(discountType == "1" && discountValue >= 0.01){
                                                        formData.append('DISCOUNT_TYPE','ONE');
                                                        formData.append('DISCOUNT_VALUE', discountValue);
                                                        formData.append('DISCOUNT_CODE',discountCode);

                                                        <?php if(count($pidArray) == 0) { ?>
                                                        __ProductSave(formData);
                                                      <?php } else { ?>
                                                        __ProductUpdate(formData);
                                                      <?php } ?>
                                                    }
                                                    else if(discountType == "1") {
                                                        GlobalInfoModal("İndirim değeri en düşük 0,01 TL olabilir!");
                                                    }

                                  }
                                  else{
                                    GlobalInfoModal("Lütfen indirim miktarını girin!");
                                  }
                                }
                                else{
                                  GlobalInfoModal("Lütfen ürün detaylarını girin!");
                                }
                              }
                              else{
                                GlobalInfoModal("Ürün fiyatı en düşük 0,01 olmalıdır!");
                              }
                            }
                            else{
                              GlobalInfoModal("En az 1 adet stok olmalıdır!");
                            }
                          }
                          else{
                            GlobalInfoModal("Lütfen ürün adını girin!");
                          }
                        }
                        else{
                          GlobalInfoModal("Lütfen bir marka seçin!");
                        }
                      }
                      else{
                        GlobalInfoModal("Lütfen bir kategori seçin!");
                      }
                    }

                    function __ProductSave(formData){
                      document.getElementById("myBtns").disabled = true;
                      document.getElementById("myBtns").innerHTML = 'Bekleyin...';

                        if(imagesArray.length > 0){
                            formData.append('SUM_IMAGE', imagesArray.length);

                            let i = 1;
                            for (var key in imagesArray) {
                              formData.append('IMAGE_' + i, imagesArray[key][1]);
                              i++;
                            }

                            AjaxRequest('POST','class/new_product.php',formData, (code) => {
                                if(code == 'success'){
                                    window.location.href = 'dashboard.php?page=add-product&add=success';
                                }
                                else{
                                    console.log(code);
                                    GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                                    document.getElementById("myBtns").disabled = false;
                                    document.getElementById("myBtns").innerHTML = 'Kaydet';
                                }
                            },true);
                        }
                        else{
                            GlobalInfoModal("En az 1 adet ürün resmi eklemelisiniz!");
                        }
                    }

                    function __ProductUpdate(formData){
                      document.getElementById("myBtns").disabled = true;
                      document.getElementById("myBtns").innerHTML = 'Bekleyin...';

                        formData.append('PRODUCT_ID',<?php echo $pidArray['ID']; ?>);

                        if(imagesArray.length > 0){
                          formData.append('SUM_IMAGE', imagesArray.length);
                          let i = 1;
                            for (var key in imagesArray) {
                              formData.append('IMAGE_' + i, imagesArray[key][1]);
                              i++;
                            }
                        }

                        AjaxRequest('POST','class/update_product.php',formData, (code) => {
                            if(code == 'success'){
                                window.location.href = 'dashboard.php?page=product-list&update=success';
                            }
                            else{
                                console.log(code);
                                GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                                document.getElementById("myBtns").disabled = false;
                                document.getElementById("myBtns").innerHTML = 'Güncelle';
                            }
                        },true);
                    }

                    function RenameModal(modal) {
                      if(modal == 'r1'){
                        if(getCategoryId('CategorySelect') != '0' && getCategoryId('CategorySelect') != 'Seç...'){
                          document.getElementById('r1-modal-input').value = getCategoryText('CategorySelect');
                          document.getElementById('r1-modal-hidden').value = getCategoryId('CategorySelect');
                          $('.r1-modal').modal('show'); 
                        }
                      }
                      else if(modal == 'r2'){
                        if(getCategoryId('SubcategorySelect') != '0' && getCategoryId('SubcategorySelect') != 'Seç...'){
                          document.getElementById('r2-modal-input').value = getCategoryText('SubcategorySelect');
                          document.getElementById('r2-modal-hidden').value = getCategoryId('SubcategorySelect');
                          $('.r2-modal').modal('show');
                        }
                      }
                      else if (modal == 'r3'){
                        if(getCategoryId('SubSubcategorySelect') != '0' && getCategoryId('SubSubcategorySelect') != 'Seç...'){
                          document.getElementById('r3-modal-input').value = getCategoryText('SubSubcategorySelect');
                          document.getElementById('r3-modal-hidden').value = getCategoryId('SubSubcategorySelect');
                          $('.r3-modal').modal('show');
                        }
                      }
                      else if (modal == 'r4'){
                        if(getCategoryId('BrandCategory') != '0' && getCategoryId('BrandCategory') != 'Seç...'){
                          document.getElementById('r4-modal-input').value = getCategoryText('BrandCategory');
                          document.getElementById('r4-modal-hidden').value = getCategoryId('BrandCategory');
                          $('.r4-modal').modal('show');
                        }
                      }
                    }

                    function RenameClick(type){
                      var newName = GetInput(type+'-modal-input');

                      if(type == 'r1' && newName != ''){
                        var id = GetInput('r1-modal-hidden');
                        
                        AjaxRequest('POST','class/rename.php',{
                          'TYPE': 'R1',
                          'NEW_NAME': newName,
                          'ID': id
                        }, (code) => {
                                if(code == 'success'){
                                    window.location.href = 'dashboard.php?page=add-product&rename=success';
                                }
                                else{
                                    console.log(code);
                                    GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                                }
                            });
    
                      }
                      else if(type == 'r2' && newName != ''){
                        var id = GetInput('r2-modal-hidden');
                        
                        AjaxRequest('POST','class/rename.php',{
                          'TYPE': 'R2',
                          'NEW_NAME': newName,
                          'ID': id
                        }, (code) => {
                                if(code == 'success'){
                                    window.location.href = 'dashboard.php?page=add-product&rename=success';
                                }
                                else{
                                    console.log(code);
                                    GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                                }
                            });
                      }
                      else if(type == 'r3' && newName != ''){
                        var id = GetInput('r3-modal-hidden');
                        
                        AjaxRequest('POST','class/rename.php',{
                          'TYPE': 'R3',
                          'NEW_NAME': newName,
                          'ID': id
                        }, (code) => {
                                if(code == 'success'){
                                    window.location.href = 'dashboard.php?page=add-product&rename=success';
                                }
                                else{
                                    console.log(code);
                                    GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                                }
                            });
                      }
                      else if(type == 'r4' && newName != ''){
                        var id = GetInput('r4-modal-hidden');
                        
                        AjaxRequest('POST','class/rename.php',{
                          'TYPE': 'R4',
                          'NEW_NAME': newName,
                          'ID': id
                        }, (code) => {
                                if(code == 'success'){
                                    window.location.href = 'dashboard.php?page=add-product&rename=success';
                                }
                                else{
                                    console.log(code);
                                    GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                                }
                            });
                      }
                    }
                </script>
            <?php } ?>


            <?php if($page == 'slide') { ?>
              <?php $imageArray = $db->GetSlideImages(); ?>
              <div class="container">
                <div class="row">
                  <div class="col-12 upload-place-wrapper" style="border: 2px dotted gray; max-height: 500px; min-height: 100px;">
                    <center>
                      <img src="" class="img-fluid" id="PrevImage">
                    </center>
                    <input type="file" id="selectFile" onchange="ImagePreview(event);" accept="image/*"/>
                    <center>
                      
                      <p id="selectText"><i class="fas fa-camera fa-2x"></i> <br> Resim seçmek için tıklayınız <br/> <label style="font-size: 15px;">Önerilen boyut: 1000x500</label></p>
                    </center>
                  </div>
                  <div id="ImageTools">
                    <button class="btn btn-danger mt-2 mr-3" onclick="javascript:window.location.href='dashboard.php?page=slide';"><i class="fas fa-trash"></i> Seçimi temizle</button>
                    <button class="btn btn-success mt-2" onclick="SlideImageUpload();"><i class="fas fa-upload"></i> Yükle ve Kaydet</button>
                  </div>
                  <div class="col-12 mt-5">
                    <label style="font-weight: bold;">Marka Seç</label>
                    <div class="col-12" style="border-top: 1px solid gray;"></div>
                    <!-- Brand List Start -->
                    <?php $brandArray = $db->GetBrand(); ?>
                      <?php foreach ($brandArray as $key => $value) { ?>              
                      <div class="form-check form-check-inline" style="padding: 10px;">
                        <input class="form-check-input" type="radio" name="BrandRadio1" id="inlineRadio<?php echo $value['ID']; ?>" value="<?php echo $value['ID']; ?>">
                        <label class="form-check-label" for="inlineRadio<?php echo $value['ID']; ?>"><?php echo $value['BRAND_NAME']; ?></label>
                      </div>
                      <?php } ?>
                    <!-- Brand List End -->
                  </div>
                  
                  <div class="col-12 mt-3">
                    <label style="font-weight: bold;">Slayt Resimleri</label>
                  </div>
                  <div class="col-12" style="border-top: 1px solid gray;"></div>
                </div>
                <!-- Images -->
                <div class="row">
                  <?php foreach ($imageArray as $id => $value) { ?>
                    <!-- Image -->
                    <div class="col-12 col-lg-4 mt-4" id="<?php echo 'image_'.$value["ID"]; ?>">
                      <div class="card">
                  <img class="img-fluid" src="../images/<?php echo $value["IMG_NAME"]; ?>">
                  <button class="btn btn-danger mt-1" onclick="DeleteModal(<?php echo $value["ID"]; ?>,'<?php echo $value["IMG_NAME"]; ?>',null,SlideImageDelete);"><i class="fas fa-trash"></i> Sil</button>
                  <button class="btn btn-success mt-1" onclick="SlideEditModal(<?php echo $value["ID"]; ?>,<?php echo $value["ROUTE_BRAND_ID"]; ?>);"><i class="fas fa-edit"></i> Düzenle</button>
                </div>
                    </div>
                    <!-- /Image -->
                  <?php } ?>
                </div>
                <!-- /Images -->
              </div>
              <script type="text/javascript">
                function SlideEditModal(slideId,brandId){
                  document.getElementById('editSlideId').value = slideId;

                  const brandSelect = document.querySelector('#SlideBrandSelect');
                  brandSelect.value = brandId;
                  brandSelect.options[brandSelect.selectedIndex].defaultSelected = true;

                  //document.forms[0].reset(); // "Indonesia" is still selected

                  $('.image-edit-modal').modal('show');
                }

                function SlideUpdate(){ /*Yeni resimSeçilen marka id*/
                  var brandId = getCategoryId('SlideBrandSelect');
                  var slideId = GetInput('editSlideId');
                  var newImage = document.getElementById("selectFile2").files;
                  var formData = new FormData();

                  formData.append('IMAGE', newImage[0]);
                  formData.append('BRAND_ID',brandId);
                  formData.append('SLIDE_ID',slideId);

                  AjaxRequest('POST','class/slide_update.php', formData, (code) => {
                    if(code == 'success'){
                      window.location.href = 'dashboard.php?page=slide&update=success';
                    }
                    else{
                      //GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                    }
                  }, true);

                }

                function ReturnRadio() {  
                    var checkRadio = document.querySelector( 
                        'input[name="BrandRadio1"]:checked'); 
                      
                    if(checkRadio != null) { 
                        return checkRadio.value;
                    } 
                    else { 
                        return '';
                    } 
                } 

                function SlideImageUpload(){
                  
                  var image = document.getElementById("selectFile").files;
                  var brandId = ReturnRadio();
                  var formData = new FormData();

                  if(image.length == 1){
                    if(brandId != ''){
                      formData.append('IMAGE', image[0]);
                      formData.append('BRAND_ID',brandId);

                      AjaxRequest('POST','class/slide_image.php', formData, (code) => {
                        if(code == 'success'){
                          window.location.href = 'dashboard.php?page=slide&upload=success';
                        }
                        else{
                          GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                        }
                      }, true);
                    }
                    else{
                      GlobalInfoModal("Lütfen bir marka seçin!");
                    }
                  }
                  else{
                    GlobalInfoModal("Lütfen bir resim seçin!");
                  }
                }

                function SlideImageDelete(imgId,imgNo){
                  AjaxRequest('POST','class/slide_delete.php', {
                    'IMAGE_ID': imgId,
                    'IMAGE_NAME': imgNo
                  }, (code) => {
                    if(code == 'success'){
                      $('.delete-modal').modal('hide');
                      document.getElementById('image_' + imgId).remove();
                    }
                    else {
                      GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                    }
                  })
                }
              </script> 
            <?php } ?>


            <?php if($page == 'poster') { ?>
              <?php $imageArray = $db->GetPosterImages(); ?>
              <?php $categoryArray = $db->GetCategory(); ?>
              <div class="container">
                <div class="row">
                  <div class="col-12 upload-place-wrapper" style="border: 2px dotted gray; max-height: 500px; min-height: 100px;">
                    <center>
                      <img src="" class="img-fluid" id="PrevImage">
                    </center>
              <input type="file" id="selectFile" onchange="ImagePreview(event);" accept="image/*"/>
              <center>
                
                <p id="selectText"><i class="fas fa-camera fa-2x"></i> <br> Resim seçmek için tıklayınız <br/> <label style="font-size: 15px;">Önerilen boyut: 360x390</label></p>
              </center>
                  </div>
                  <div id="ImageTools">
                    <button class="btn btn-danger mt-2 mr-3" onclick="javascript:window.location.href='dashboard.php?page=poster';"><i class="fas fa-trash"></i> Seçimi temizle</button>
                    <button class="btn btn-success mt-2" onclick="PosterImageUpload();"><i class="fas fa-upload"></i> Yükle ve Kaydet</button>
                  </div>
                  <div class="col-12 mt-5">
                    <label style="font-weight: bold;">Kategori/Ürün Seç</label>
                  </div>
                  <div class="col-12" style="border-top: 1px solid gray;"></div>
                   <div class="container">
                      <div class="row">
                        <!-- Main Category -->
                        <div class="col-12 col-lg-3">
                          <div class="form-group mt-3">
                            <label>Ana Kategori</label>
                            <select class="form-control" style="font-size: 0.9em;" id="CategorySelect" onchange="GetSubCategory();"> 
                                  <option>Seç...</option>
                                  <?php foreach ($categoryArray as $key => $value) {
                                      $categoryId = $value["ID"];
                                      $categoryName = $value["CATEGORY_NAME"];
                                      echo "<option value='$categoryId'>$categoryName</option>";
                                  } ?>
                              </select>
                          </div>
                        </div>
                        <!-- Main Category End -->

                        <!-- Primary Category -->
                        <div class="col-12 col-lg-3">
                          <div class="form-group mt-3">
                            <label>Birincil Kategori</label>
                            <select class="form-control" style="font-size: 0.9em;" id="SubcategorySelect" onchange="GetSubSubCategory();">
                                  <option>Seç...</option>
                                  <?php 
                                      foreach ($subcategoryArray as $key => $value) {
                                          $subcategoryId = $value['ID'];
                                          $subcategoryName = $value['SUB_CATEGORY_NAME'];
                                          echo "<option value='$subcategoryId'>$subcategoryName</option>";
                                      }
                                  ?>
                              </select>
                          </div>
                        </div>
                        <!-- Primary Category End -->

                        <!-- Secondary Category -->
                        <div class="col-12 col-lg-3">
                          <div class="form-group mt-3">
                            <label>İkincil Kategori</label>
                            <select class="form-control" style="font-size: 0.9em;" id="SubSubcategorySelect" onchange="GetPosterProducts();">
                                  <option>Seç...</option>
                                  <?php 
                                      foreach ($subsubcategoryArray as $key => $value) {
                                          $subsubcategoryId = $value['ID'];
                                          $subsubcategoryName = $value['SUB_SUB_CATEGORY_NAME'];
                                          echo "<option value='$subsubcategoryId'>$subsubcategoryName</option>";
                                      }
                                  ?>
                              </select>
                          </div>
                        </div>
                        <!-- Secondary Category End -->

                        <!-- Product List -->
                        <div class="col-12 col-lg-3">
                          <div class="form-group mt-3">
                            <label>Ürün Listesi</label>
                            <select class="form-control" id="ProductSelect">
                              <option>Seç...</option>
                            </select>
                          </div>
                        </div>
                        <!-- Product List End -->
                      </div>
                    </div>
                  <div class="col-12 mt-5">
                    <label style="font-weight: bold;">Posterler</label>
                  </div>
                  <div class="col-12" style="border-top: 1px solid gray;"></div>
                </div>
                <!-- Images -->
                <div class="row">
                  <?php foreach ($imageArray as $id => $value) { ?>
                    <!-- Image -->
                    <div class="col-12 col-lg-4 mt-4" id="<?php echo 'image_'.$value["ID"]; ?>">
                      <div class="card">
                  <img class="img-fluid" src="../images/<?php echo $value["IMG_NAME"]; ?>">
                  <button class="btn btn-danger mt-1" onclick="DeleteModal(<?php echo $value["ID"]; ?>,'<?php echo $value["IMG_NAME"]; ?>',null,PosterImageDelete);"><i class="fas fa-trash"></i> Sil</button>
                  <button class="btn btn-success mt-1" onclick="PosterEditModal(<?php echo $value["ID"]; ?>,<?php echo $value["MAIN_ID"]; ?>,<?php echo $value["PRIMARY_ID"]; ?>,<?php echo $value["SECONDARY_ID"]; ?>,<?php echo $value["PRODUCT_ID"]; ?>);"><i class="fas fa-edit"></i> Düzenle</button>
                </div>
                    </div>
                    <!-- /Image -->
                  <?php } ?>
                </div>
                <!-- /Images -->
              </div>
              <script type="text/javascript">
                function PosterUpdate(){ /*Yeni resimSeçilen marka id*/
                  var mainId = getCategoryId('EditMainCategorySelect');
                  var primaryId = getCategoryId('EditPrimarySelect');
                  var secondaryId = getCategoryId('EditSecondarycategorySelect');
                  var productId = getCategoryId('EditProductSelect');

                  var newImage = document.getElementById("selectFile3").files;
                  var posterId = GetInput('editPosterId');
                  var formData = new FormData();

                  if(newImage.length == 1){
                    formData.append('IMAGE', newImage[0]);
                  }
                  
                  formData.append('POSTER_ID',posterId);
                  formData.append('MAIN_ID',mainId);
                  formData.append('PRIMARY_ID', primaryId);
                  formData.append('SECONDARY_ID',secondaryId);
                  formData.append('PRODUCT_ID',productId);

                  if(mainId != 'Seç...' && mainId != 0){
                      AjaxRequest('POST','class/poster_update.php', formData, (code) => {
                      if(code == 'success'){
                        window.location.href = 'dashboard.php?page=poster&update=success';
                      }
                      else{
                        //GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                      }
                    }, true);
                  }

                }

                var PosterCount = <?php echo count($imageArray); ?>;
                function PosterImageUpload(){ 
                  if(PosterCount < 6){
                    var image = document.getElementById("selectFile").files;
                    var formData = new FormData();

                    //Route IDs
                    var mainId = getCategoryId('CategorySelect');
                    var primaryId = getCategoryId('SubcategorySelect');
                    var secondaryId = getCategoryId('SubSubcategorySelect');
                    var productId = getCategoryId('ProductSelect');

                    if(image.length == 1){
                      formData.append('IMAGE', image[0]);

                      if(mainId != 'Seç...'){
                          formData.append('MAIN_ID', mainId);
                          formData.append('PRIMARY_ID', primaryId);
                          formData.append('SECONDARY_ID', secondaryId);
                          formData.append('PRODUCT_ID', productId);

                          AjaxRequest('POST','class/poster_image.php', formData, (code) => {
                          if(code == 'success'){
                            window.location.href = 'dashboard.php?page=poster&upload=success';
                          }
                          else{
                            GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                          }
                        }, true);
                      }
                      else{
                        GlobalInfoModal("Lütfen bir ana kategori seçin!");
                      }
                    }
                    else{
                      GlobalInfoModal("Lütfen bir resim seçin!");
                    }
                  }
                  else{
                    GlobalInfoModal("En fazla 6 adet poster yükleyebilirsiniz!");
                  }
                }

                function PosterImageDelete(imgId,imgNo){
                  AjaxRequest('POST','class/poster_delete.php', {
                    'IMAGE_ID': imgId,
                    'IMAGE_NAME': imgNo
                  }, (code) => {
                    if(code == 'success'){
                      $('.delete-modal').modal('hide');
                      document.getElementById('image_' + imgId).remove();
                      PosterCount--;
                    }
                    else {
                      GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                    }
                  })
                }

                /*Route Functions*/
                function GetSubCategory(type=false){
                    if(type == false){
                      GetSubSubCategory();

                      var categoryId = getCategoryId("CategorySelect");
                      if(parseInt(categoryId) > 0){

                          AjaxRequest('POST','class/get_subcategory.php', {
                              'CATEGORY_ID': categoryId
                          }, (code) => {
                              if(code != 'error'){
                                  $("#SubcategorySelect").empty();

                                  AddOption('SubcategorySelect','Seç...');
                                  for(let i = 0; i < code.length; i++){
                                      AddOption('SubcategorySelect',code[i]["SUB_CATEGORY_NAME"],code[i]["ID"]);
                                  }
                              }
                              else{
                                  $("#SubcategorySelect").empty();

                                  AddOption('SubcategorySelect','Seç...');
                              }
                          });
                      }
                    }else{
                      GetSubSubCategory(true);

                      var categoryId = getCategoryId("EditMainCategorySelect");
                      if(parseInt(categoryId) > 0){

                          AjaxRequest('POST','class/get_subcategory.php', {
                              'CATEGORY_ID': categoryId
                          }, (code) => {
                              if(code != 'error'){
                                  $("#EditPrimarySelect").empty();

                                  AddOption('EditPrimarySelect','Seç...');
                                  for(let i = 0; i < code.length; i++){
                                      AddOption('EditPrimarySelect',code[i]["SUB_CATEGORY_NAME"],code[i]["ID"]);
                                  }
                              }
                              else{
                                  $("#EditPrimarySelect").empty();

                                  AddOption('EditPrimarySelect','Seç...');
                              }
                          });
                      }
                    }    
                }

                  function GetSubSubCategory(type=false){

                      if(type==false){
                        GetPosterProducts();
                          var categoryId = getCategoryId("CategorySelect");
                          var subcategoryId = getCategoryId("SubcategorySelect");
                          if(parseInt(categoryId) > 0 && parseInt(subcategoryId)){

                              AjaxRequest('POST','class/get_subsubcategory.php', {
                                  'CATEGORY_ID': categoryId,
                                  'SUBCATEGORY_ID': subcategoryId
                              }, (code) => {
                                  if(code != 'error'){
                                      $("#SubSubcategorySelect").empty();

                                      AddOption('SubSubcategorySelect','Seç...');
                                      for(let i = 0; i < code.length; i++){
                                          AddOption('SubSubcategorySelect',code[i]["SUB_SUB_CATEGORY_NAME"],code[i]["ID"]);
                                      }
                                  }
                                  else{
                                      $("#SubSubcategorySelect").empty();

                                      AddOption('SubSubcategorySelect','Seç...',0);
                                  }
                              });
                          }
                      }else{
                          GetPosterProducts(true);
                          var categoryId = getCategoryId("EditMainCategorySelect");
                          var subcategoryId = getCategoryId("EditPrimarySelect");
                          if(parseInt(categoryId) > 0 && parseInt(subcategoryId)){

                              AjaxRequest('POST','class/get_subsubcategory.php', {
                                  'CATEGORY_ID': categoryId,
                                  'SUBCATEGORY_ID': subcategoryId
                              }, (code) => {
                                  if(code != 'error'){
                                      $("#EditSecondarycategorySelect").empty();

                                      AddOption('EditSecondarycategorySelect','Seç...');
                                      for(let i = 0; i < code.length; i++){
                                          AddOption('EditSecondarycategorySelect',code[i]["SUB_SUB_CATEGORY_NAME"],code[i]["ID"]);
                                      }
                                  }
                                  else{
                                      $("#EditSecondarycategorySelect").empty();

                                      AddOption('EditSecondarycategorySelect','Seç...',0);
                                  }
                              });
                          }
                      }
                  }

                  function GetPosterProducts(type=false){ 
                      if(type == false){
                          var mainId = getCategoryId('CategorySelect');
                          var primaryId = getCategoryId('SubcategorySelect');
                          var secondaryId = getCategoryId('SubSubcategorySelect');

                          if(mainId > 0 && primaryId > 0 && secondaryId > 0){
                            AjaxRequest('POST','class/poster_products.php',{
                              'MAIN_ID': mainId,
                              'PRIMARY_ID': primaryId,
                              'SECONDARY_ID': secondaryId
                            },(code) => {
                                if(code != 'error'){
                                    $("#ProductSelect").empty();

                                    AddOption('ProductSelect','Seç...');
                                    for(let i = 0; i < code.length; i++){
                                        AddOption('ProductSelect',code[i]["PRODUCT_NAME"],code[i]["ID"]);
                                    }

                                }
                                else{
                                    $("#ProductSelect").empty();
                                    AddOption('ProductSelect','Seç...',0);
                                }
                            });
                          }
                      }
                      else{
                          var mainId = getCategoryId('EditMainCategorySelect');
                          var primaryId = getCategoryId('EditPrimarySelect');
                          var secondaryId = getCategoryId('EditSecondarycategorySelect');

                          if(mainId != '' && primaryId != '' && secondaryId != ''){
                            AjaxRequest('POST','class/poster_products.php',{
                              'MAIN_ID': mainId,
                              'PRIMARY_ID': primaryId,
                              'SECONDARY_ID': secondaryId
                            },(code) => {
                                if(code != 'error'){
                                    $("#EditProductSelect").empty();

                                    AddOption('EditProductSelect','Seç...');
                                    for(let i = 0; i < code.length; i++){
                                        AddOption('EditProductSelect',code[i]["PRODUCT_NAME"],code[i]["ID"]);
                                    }

                                }
                                else{
                                    $("#EditProductSelect").empty();
                                    AddOption('EditProductSelect','Seç...',0);
                                }
                            });
                          }
                      }
                  }

                  function PosterEditModal(editPosterId,mainId,primaryId,secondaryId,productId){
                    document.getElementById('editPosterId').value = editPosterId;

                    const editMainCategorySelect = document.querySelector('#EditMainCategorySelect');
                    editMainCategorySelect.value = mainId;
                    editMainCategorySelect.options[editMainCategorySelect.selectedIndex].defaultSelected = true;

                    if(primaryId > 0){
                      AjaxRequest('POST','class/get_subcategory.php', {
                          'CATEGORY_ID': mainId
                      }, (code) => {
                          if(code != 'error'){
                              $("#EditPrimarySelect").empty();

                              AddOption('EditPrimarySelect','Seç...');
                              for(let i = 0; i < code.length; i++){
                                  AddOption('EditPrimarySelect',code[i]["SUB_CATEGORY_NAME"],code[i]["ID"]);
                              }
                          }
                          else{
                              $("#EditPrimarySelect").empty();

                              AddOption('EditPrimarySelect','Seç...');
                          }

                          const editPrimarySelect = document.querySelector('#EditPrimarySelect');
                          editPrimarySelect.value = primaryId;
                          editPrimarySelect.options[editPrimarySelect.selectedIndex].defaultSelected = true;
                      });
                    }

                    if(secondaryId > 0){
                        AjaxRequest('POST','class/get_subsubcategory.php', {
                          'CATEGORY_ID': mainId,
                          'SUBCATEGORY_ID': primaryId
                        }, (code) => {
                            if(code != 'error'){
                                $("#EditSecondarycategorySelect").empty();

                                AddOption('EditSecondarycategorySelect','Seç...');
                                for(let i = 0; i < code.length; i++){
                                    AddOption('EditSecondarycategorySelect',code[i]["SUB_SUB_CATEGORY_NAME"],code[i]["ID"]);
                                }
                            }
                            else{
                                $("#EditSecondarycategorySelect").empty();

                                AddOption('EditSecondarycategorySelect','Seç...');
                            }

                            const editSecondarycategorySelect = document.querySelector('#EditSecondarycategorySelect');
                            editSecondarycategorySelect.value = secondaryId;
                            editSecondarycategorySelect.options[editSecondarycategorySelect.selectedIndex].defaultSelected = true;
                        });
                    }

                    if(productId > 0){
                        AjaxRequest('POST','class/poster_products.php', {
                          'MAIN_ID': mainId,
                          'PRIMARY_ID': primaryId,
                          'SECONDARY_ID': secondaryId
                        }, (code) => {
                            if(code != 'error'){
                                $("#EditProductSelect").empty();

                                AddOption('EditProductSelect','Seç...');
                                for(let i = 0; i < code.length; i++){
                                    AddOption('EditProductSelect',code[i]["PRODUCT_NAME"],code[i]["ID"]);
                                }
                            }
                            else{
                                $("#EditProductSelect").empty();

                                AddOption('EditProductSelect','Seç...');
                            }

                            const editProductSelect = document.querySelector('#EditProductSelect');
                            editProductSelect.value = productId;
                            editProductSelect.options[editProductSelect.selectedIndex].defaultSelected = true;
                        });
                    }

                    $('.poster-edit-modal').modal('show');
                  }
              </script>
            <?php } ?>


            <?php if($page == 'advert') { ?>
              <?php $imageArray = $db->GetAdvertImages(); ?>
              <?php $categoryArray = $db->GetCategory(); ?>
              <div class="container">
                <div class="row">
                  <div class="col-12 upload-place-wrapper" style="border: 2px dotted gray; max-height: 500px; min-height: 100px;">
                    <center>
                      <img src="" class="img-fluid" id="PrevImage">
                    </center>
              <input type="file" id="selectFile" onchange="ImagePreview(event);" accept="image/*"/>
              <center>
                
                <p id="selectText"><i class="fas fa-camera fa-2x"></i> <br> Resim seçmek için tıklayınız <br/> <label style="font-size: 15px;">Önerilen boyut: 740x320</label></p>
              </center>
                  </div>
                  <div id="ImageTools">
                    <button class="btn btn-danger mt-2 mr-3" onclick="javascript:window.location.href='dashboard.php?page=advert';"><i class="fas fa-trash"></i> Seçimi temizle</button>
                    <button class="btn btn-success mt-2" onclick="AdvertImageUpload();"><i class="fas fa-upload"></i> Yükle ve Kaydet</button>
                  </div>
                  <div class="col-12 mt-5">
                    <label style="font-weight: bold;">Kategori/Ürün Seç</label>
                  </div>
                   <div class="col-12" style="border-top: 1px solid gray;"></div>
                   <div class="container">
                      <div class="row">
                        <!-- Main Category -->
                        <div class="col-12 col-lg-3">
                          <div class="form-group mt-3">
                            <label>Ana Kategori</label>
                            <select class="form-control" style="font-size: 0.9em;" id="CategorySelect" onchange="GetSubCategory();"> 
                                  <option>Seç...</option>
                                  <?php foreach ($categoryArray as $key => $value) {
                                      $categoryId = $value["ID"];
                                      $categoryName = $value["CATEGORY_NAME"];
                                      echo "<option value='$categoryId'>$categoryName</option>";
                                  } ?>
                              </select>
                          </div>
                        </div>
                        <!-- Main Category End -->

                        <!-- Primary Category -->
                        <div class="col-12 col-lg-3">
                          <div class="form-group mt-3">
                            <label>Birincil Kategori</label>
                            <select class="form-control" style="font-size: 0.9em;" id="SubcategorySelect" onchange="GetSubSubCategory();">
                                  <option>Seç...</option>
                                  <?php 
                                      foreach ($subcategoryArray as $key => $value) {
                                          $subcategoryId = $value['ID'];
                                          $subcategoryName = $value['SUB_CATEGORY_NAME'];
                                          echo "<option value='$subcategoryId'>$subcategoryName</option>";
                                      }
                                  ?>
                              </select>
                          </div>
                        </div>
                        <!-- Primary Category End -->

                        <!-- Secondary Category -->
                        <div class="col-12 col-lg-3">
                          <div class="form-group mt-3">
                            <label>İkincil Kategori</label>
                            <select class="form-control" style="font-size: 0.9em;" id="SubSubcategorySelect" onchange="GetPosterProducts();">
                                  <option>Seç...</option>
                                  <?php 
                                      foreach ($subsubcategoryArray as $key => $value) {
                                          $subsubcategoryId = $value['ID'];
                                          $subsubcategoryName = $value['SUB_SUB_CATEGORY_NAME'];
                                          echo "<option value='$subsubcategoryId'>$subsubcategoryName</option>";
                                      }
                                  ?>
                              </select>
                          </div>
                        </div>
                        <!-- Secondary Category End -->

                        <!-- Product List -->
                        <div class="col-12 col-lg-3">
                          <div class="form-group mt-3">
                            <label>Ürün Listesi</label>
                            <select class="form-control" id="ProductSelect">
                              <option>Seç...</option>
                            </select>
                          </div>
                        </div>
                        <!-- Product List End -->
                      </div>
                    </div>

                  <div class="col-12 mt-5">
                    <label style="font-weight: bold;">Reklamlar</label>
                  </div>
                  <div class="col-12" style="border-top: 1px solid gray;"></div>
                </div>
                <!-- Images -->
                <div class="row">
                  <?php foreach ($imageArray as $id => $value) { ?>
                    <!-- Image -->
                    <div class="col-12 col-lg-4 mt-4" id="<?php echo 'image_'.$value["ID"]; ?>">
                      <div class="card">
                  <img class="img-fluid" src="../images/<?php echo $value["IMG_NAME"]; ?>">
                  <button class="btn btn-danger mt-1" onclick="DeleteModal(<?php echo $value["ID"]; ?>,'<?php echo $value["IMG_NAME"]; ?>',null,AdvertImageDelete);"><i class="fas fa-trash"></i> Sil</button>
                  <button class="btn btn-success mt-1" onclick="AdvertEditModal(<?php echo $value["ID"]; ?>,<?php echo $value["MAIN_ID"]; ?>,<?php echo $value["PRIMARY_ID"]; ?>,<?php echo $value["SECONDARY_ID"]; ?>,<?php echo $value["PRODUCT_ID"]; ?>);"><i class="fas fa-edit"></i> Düzenle</button>
                </div>
                    </div>
                    <!-- /Image -->
                  <?php } ?>
                </div>
                <!-- /Images -->
              </div>
              <script type="text/javascript">
                function AdvertUpdate(){ /*Yeni resimSeçilen marka id*/
                  var mainId = getCategoryId('EditMainCategorySelect2');
                  var primaryId = getCategoryId('EditPrimarySelect2');
                  var secondaryId = getCategoryId('EditSecondarycategorySelect2');
                  var productId = getCategoryId('EditProductSelect2');

                  var newImage = document.getElementById("selectFile4").files;
                  var advId = GetInput('editAdvertId');
                  var formData = new FormData();

                  if(newImage.length == 1){
                    formData.append('IMAGE', newImage[0]);
                  }
                  
                  formData.append('ADV_ID',advId);
                  formData.append('MAIN_ID',mainId);
                  formData.append('PRIMARY_ID', primaryId);
                  formData.append('SECONDARY_ID',secondaryId);
                  formData.append('PRODUCT_ID',productId);

                  if(mainId != 'Seç...' && mainId != 0){
                      AjaxRequest('POST','class/adv_update.php', formData, (code) => {
                      if(code == 'success'){
                        window.location.href = 'dashboard.php?page=advert&update=success';
                      }
                      else{
                        //GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                      }
                    }, true);
                  }

                }

                var AdvertCount = <?php echo count($imageArray); ?>;
                function AdvertImageUpload(){ 
                  if(AdvertCount < 4){
                    var image = document.getElementById("selectFile").files;
                    var formData = new FormData();

                    //Route IDs
                    var mainId = getCategoryId('CategorySelect');
                    var primaryId = getCategoryId('SubcategorySelect');
                    var secondaryId = getCategoryId('SubSubcategorySelect');
                    var productId = getCategoryId('ProductSelect');

                    if(image.length == 1){
                      formData.append('IMAGE', image[0]);

                      if(mainId != 'Seç...'){
                          formData.append('MAIN_ID', mainId);
                          formData.append('PRIMARY_ID', primaryId);
                          formData.append('SECONDARY_ID', secondaryId);
                          formData.append('PRODUCT_ID', productId);
                              
                          AjaxRequest('POST','class/adv_image.php', formData, (code) => {
                            if(code == 'success'){
                              window.location.href = 'dashboard.php?page=advert&upload=success';
                            }
                            else{
                              GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                            }
                          }, true);
                      }
                      else{
                          GlobalInfoModal("Lütfen bir ana kategori seçin!");
                      }
                    }
                    else{
                      GlobalInfoModal("Lütfen bir resim seçin!");
                    }
                  }
                  else{
                    GlobalInfoModal("En fazla 4 adet reklam resmi yükleyebilirsiniz!");
                  }
                }

                function AdvertImageDelete(imgId,imgNo){
                  AjaxRequest('POST','class/adv_delete.php', {
                    'IMAGE_ID': imgId,
                    'IMAGE_NAME': imgNo
                  }, (code) => {
                    if(code == 'success'){
                      $('.delete-modal').modal('hide');
                      document.getElementById('image_' + imgId).remove();
                      AdvertCount--;
                    }
                    else {
                      GlobalInfoModal("Bir sorun oluştu. Lütfen tekrar deneyin!");
                    }
                  })
                }

                /*Route Functions*/
                function GetSubCategory(type=false){
                    if(type == false){
                      GetSubSubCategory();

                      var categoryId = getCategoryId("CategorySelect");
                      if(parseInt(categoryId) > 0){

                          AjaxRequest('POST','class/get_subcategory.php', {
                              'CATEGORY_ID': categoryId
                          }, (code) => {
                              if(code != 'error'){
                                  $("#SubcategorySelect").empty();

                                  AddOption('SubcategorySelect','Seç...');
                                  for(let i = 0; i < code.length; i++){
                                      AddOption('SubcategorySelect',code[i]["SUB_CATEGORY_NAME"],code[i]["ID"]);
                                  }
                              }
                              else{
                                  $("#SubcategorySelect").empty();

                                  AddOption('SubcategorySelect','Seç...');
                              }
                          });
                      }
                    }else{
                      GetSubSubCategory(true);

                      var categoryId = getCategoryId("EditMainCategorySelect2");
                      if(parseInt(categoryId) > 0){

                          AjaxRequest('POST','class/get_subcategory.php', {
                              'CATEGORY_ID': categoryId
                          }, (code) => {
                              if(code != 'error'){
                                  $("#EditPrimarySelect2").empty();

                                  AddOption('EditPrimarySelect2','Seç...');
                                  for(let i = 0; i < code.length; i++){
                                      AddOption('EditPrimarySelect2',code[i]["SUB_CATEGORY_NAME"],code[i]["ID"]);
                                  }
                              }
                              else{
                                  $("#EditPrimarySelect2").empty();

                                  AddOption('EditPrimarySelect2','Seç...');
                              }
                          });
                      }
                    }    
                }

                  function GetSubSubCategory(type=false){

                      if(type==false){
                        GetPosterProducts();
                          var categoryId = getCategoryId("CategorySelect");
                          var subcategoryId = getCategoryId("SubcategorySelect");
                          if(parseInt(categoryId) > 0 && parseInt(subcategoryId)){

                              AjaxRequest('POST','class/get_subsubcategory.php', {
                                  'CATEGORY_ID': categoryId,
                                  'SUBCATEGORY_ID': subcategoryId
                              }, (code) => {
                                  if(code != 'error'){
                                      $("#SubSubcategorySelect").empty();

                                      AddOption('SubSubcategorySelect','Seç...');
                                      for(let i = 0; i < code.length; i++){
                                          AddOption('SubSubcategorySelect',code[i]["SUB_SUB_CATEGORY_NAME"],code[i]["ID"]);
                                      }
                                  }
                                  else{
                                      $("#SubSubcategorySelect").empty();

                                      AddOption('SubSubcategorySelect','Seç...',0);
                                  }
                              });
                          }
                      }else{
                          GetPosterProducts(true);
                          var categoryId = getCategoryId("EditMainCategorySelect2");
                          var subcategoryId = getCategoryId("EditPrimarySelect2");
                          if(parseInt(categoryId) > 0 && parseInt(subcategoryId)){

                              AjaxRequest('POST','class/get_subsubcategory.php', {
                                  'CATEGORY_ID': categoryId,
                                  'SUBCATEGORY_ID': subcategoryId
                              }, (code) => {
                                  if(code != 'error'){
                                      $("#EditSecondarycategorySelect2").empty();

                                      AddOption('EditSecondarycategorySelect2','Seç...');
                                      for(let i = 0; i < code.length; i++){
                                          AddOption('EditSecondarycategorySelect2',code[i]["SUB_SUB_CATEGORY_NAME"],code[i]["ID"]);
                                      }
                                  }
                                  else{
                                      $("#EditSecondarycategorySelect2").empty();

                                      AddOption('EditSecondarycategorySelect2','Seç...',0);
                                  }
                              });
                          }
                      }
                  }

                  function GetPosterProducts(type=false){ 
                      if(type == false){
                          var mainId = getCategoryId('CategorySelect');
                          var primaryId = getCategoryId('SubcategorySelect');
                          var secondaryId = getCategoryId('SubSubcategorySelect');

                          if(mainId > 0 && primaryId > 0 && secondaryId > 0){
                            AjaxRequest('POST','class/poster_products.php',{
                              'MAIN_ID': mainId,
                              'PRIMARY_ID': primaryId,
                              'SECONDARY_ID': secondaryId
                            },(code) => {
                                if(code != 'error'){
                                    $("#ProductSelect").empty();

                                    AddOption('ProductSelect','Seç...');
                                    for(let i = 0; i < code.length; i++){
                                        AddOption('ProductSelect',code[i]["PRODUCT_NAME"],code[i]["ID"]);
                                    }

                                }
                                else{
                                    $("#ProductSelect").empty();
                                    AddOption('ProductSelect','Seç...',0);
                                }
                            });
                          }
                      }
                      else{
                          var mainId = getCategoryId('EditMainCategorySelect2');
                          var primaryId = getCategoryId('EditPrimarySelect2');
                          var secondaryId = getCategoryId('EditSecondarycategorySelect2');

                          if(mainId != '' && primaryId != '' && secondaryId != ''){
                            AjaxRequest('POST','class/poster_products.php',{
                              'MAIN_ID': mainId,
                              'PRIMARY_ID': primaryId,
                              'SECONDARY_ID': secondaryId
                            },(code) => {
                                if(code != 'error'){
                                    $("#EditProductSelect2").empty();

                                    AddOption('EditProductSelect2','Seç...');
                                    for(let i = 0; i < code.length; i++){
                                        AddOption('EditProductSelect2',code[i]["PRODUCT_NAME"],code[i]["ID"]);
                                    }

                                }
                                else{
                                    $("#EditProductSelect2").empty();
                                    AddOption('EditProductSelect2','Seç...',0);
                                }
                            });
                          }
                      }
                  }

                  function AdvertEditModal(editAdvertId,mainId,primaryId,secondaryId,productId){
                    document.getElementById('editAdvertId').value = editAdvertId;

                    const editMainCategorySelect = document.querySelector('#EditMainCategorySelect2');
                    editMainCategorySelect.value = mainId;
                    editMainCategorySelect.options[editMainCategorySelect.selectedIndex].defaultSelected = true;

                    if(primaryId > 0){
                      AjaxRequest('POST','class/get_subcategory.php', {
                          'CATEGORY_ID': mainId
                      }, (code) => {
                          if(code != 'error'){
                              $("#EditPrimarySelect2").empty();

                              AddOption('EditPrimarySelect2','Seç...');
                              for(let i = 0; i < code.length; i++){
                                  AddOption('EditPrimarySelect2',code[i]["SUB_CATEGORY_NAME"],code[i]["ID"]);
                              }
                          }
                          else{
                              $("#EditPrimarySelect2").empty();

                              AddOption('EditPrimarySelect2','Seç...');
                          }

                          const editPrimarySelect = document.querySelector('#EditPrimarySelect2');
                          editPrimarySelect.value = primaryId;
                          editPrimarySelect.options[editPrimarySelect.selectedIndex].defaultSelected = true;
                      });
                    }

                    if(secondaryId > 0){
                        AjaxRequest('POST','class/get_subsubcategory.php', {
                          'CATEGORY_ID': mainId,
                          'SUBCATEGORY_ID': primaryId
                        }, (code) => {
                            if(code != 'error'){
                                $("#EditSecondarycategorySelect2").empty();

                                AddOption('EditSecondarycategorySelect2','Seç...');
                                for(let i = 0; i < code.length; i++){
                                    AddOption('EditSecondarycategorySelect2',code[i]["SUB_SUB_CATEGORY_NAME"],code[i]["ID"]);
                                }
                            }
                            else{
                                $("#EditSecondarycategorySelect2").empty();

                                AddOption('EditSecondarycategorySelect2','Seç...');
                            }

                            const editSecondarycategorySelect = document.querySelector('#EditSecondarycategorySelect2');
                            editSecondarycategorySelect.value = secondaryId;
                            editSecondarycategorySelect.options[editSecondarycategorySelect.selectedIndex].defaultSelected = true;
                        });
                    }

                    if(productId > 0){
                        AjaxRequest('POST','class/poster_products.php', {
                          'MAIN_ID': mainId,
                          'PRIMARY_ID': primaryId,
                          'SECONDARY_ID': secondaryId
                        }, (code) => {
                            if(code != 'error'){
                                $("#EditProductSelect2").empty();

                                AddOption('EditProductSelect2','Seç...');
                                for(let i = 0; i < code.length; i++){
                                    AddOption('EditProductSelect2',code[i]["PRODUCT_NAME"],code[i]["ID"]);
                                }
                            }
                            else{
                                $("#EditProductSelect2").empty();

                                AddOption('EditProductSelect2','Seç...');
                            }

                            const editProductSelect = document.querySelector('#EditProductSelect2');
                            editProductSelect.value = productId;
                            editProductSelect.options[editProductSelect.selectedIndex].defaultSelected = true;
                        });
                    }

                    $('.advert-edit-modal').modal('show');
                  }
              </script> 
            <?php } ?>


            <?php if($page == 'site-settings') { ?>
             <?php $infoArray = $db->GetInfos()[0]; ?>
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-4">
                    <div class="form-group">
                      <label for="txtEmail">E-Posta</label>
                      <input type="text" id="txtEmail" class="form-control" value="<?php echo $infoArray["EMAIL"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="txtPhone">Telefon</label>
                      <input type="text" id="txtPhone" class="form-control" value="<?php echo $infoArray["PHONE"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="txtAddress">Adres</label>
                      <input type="text" id="txtAddress" class="form-control" value="<?php echo $infoArray["ADDRESS"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="txtWorkTime">Çalışma Saatleri</label>
                      <input type="text" id="txtWorkTime" class="form-control" value="<?php echo $infoArray["WORKTIME"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="txtInstagram">Instagram</label>
                      <input type="text" id="txtInstagram" class="form-control" value="<?php echo $infoArray["INSTAGRAM"]; ?>">
                    </div>
                  </div>
                  <div class="col-12 col-lg-4">
                    <div class="form-group">
                      <label for="txtWhatsapp">Whatsapp</label>
                      <input type="text" id="txtWhatsapp" class="form-control" value="<?php echo $infoArray["WHATSAPP"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="txtFacebook">Facebook</label>
                      <input type="text" id="txtFacebook" class="form-control" value="<?php echo $infoArray["FACEBOOK"]; ?>">
                      <button class="btn btn-success mt-4 mb-4" onclick="UpdateInfo();">Kaydet</button>
                    </div>
                    <label></label>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Obje Sınır Yarıçapı</label>
                                <input type="number" class="form-control" placeholder="px" id="GlobalRadiusVal" value="<?php echo $infoArray["GLOBAL_RADIUS"]; ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Obje Renk Ayarı</label>
                                <input type="color" class="form-control" id="globalColorVal" value="<?php echo $infoArray["GLOBAL_COLOR"]; ?>">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-block" onclick="UpdateGlobal();">Kaydet</button>
                  </div>
                  <div class="col-12 col-lg-4">
                    <div class="form-group">
                      <label for="txtAboutMe">Hakkımızda</label>
                      <textarea id="txtAboutMe" class="form-control" style="height:220px; font-size: 0.9em;"><?php echo $infoArray["ABOUT_ME"]; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Fotoğraf</label>
                      <input type="file" class="mt-2" id="selectFile" onchange="/*ImagePreview(event);*/" accept="image/*">
                      <button class="btn btn-success mt-4 mb-4 btn-block" onclick="UpdateAboutMe();">Yükle ve Kaydet</button>
                    </div>
                  </div>
                  <div class="col-12 col-lg-4 mt-2">
                    <label>Özel Kategori İkonu</label>
                    <input type="file" class="mt-2" id="selectFile22" onchange="/*ImagePreview(event);*/" accept="image/*">
                    <button class="btn btn-success mt-1 mb-4 btn-block" onclick="UpdateCategoryIcon();">İkon Yükle</button>
                  </div>
                  <div class="col-12 col-lg-4 mt-2">
                    <label>Kargo Ücreti Belirle (TL)</label>
                    <input type="number" id="cargoPrice" placeholder="TL" class="form-control" value="<?php echo $infoArray['CARGO_PRICE']; ?>">
                    <button class="btn btn-success mt-1 mb-4 btn-block" onclick="UpdateCargoPrice();">Kaydet</button>
                  </div>
                  <div class="col-12 col-lg-4 mt-2">
                    <label>Kargo Ücreti Sınırı (TL)</label>
                    <input type="number" id="cargoPriceLimit" placeholder="TL" class="form-control" value="<?php echo $infoArray['CARGO_PRICE_LIMIT']; ?>">
                    <button class="btn btn-success mt-1 mb-4 btn-block" onclick="UpdateCargoPriceLimit();">Kaydet</button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-lg-4 mt-2">
                    <label>Yeni Ürün Renk Ayarları</label>
                    <div class="row">
                      <div class="col-6">
                        <label>Arkaplan Rengi: </label>
                      </div>
                      <div class="col-6">
                        <input type="color" class="form-control" id="newTopRightBgColor" value="<?php echo $infoArray["NEW_TOP_RIGHT_BGCOLOR"]; ?>">
                      </div>

                       <div class="col-6">
                        <label>Metin Rengi: </label>
                      </div>
                      <div class="col-6">
                        <input type="color" class="form-control" id="newTopRightFrColor" value="<?php echo $infoArray["NEW_TOP_RIGHT_FRCOLOR"]; ?>">
                      </div>
                    </div>
                    <button class="btn btn-success btn-block mt-2" onclick="NewProductColorUpdate();">Kaydet</button>
                  </div>

                  <div class="col-12 col-lg-4 mt-2">
                    <label>Web'e Özel Renk Ayarları</label>
                    <div class="row">
                      <div class="col-6">
                        <label>Arkaplan Rengi: </label>
                      </div>
                      <div class="col-6">
                        <input type="color" class="form-control" id="webTopRightBgColor" value="<?php echo $infoArray["WEB_TOP_RIGHT_BGCOLOR"]; ?>">
                      </div>

                       <div class="col-6">
                        <label>Metin Rengi: </label>
                      </div>
                      <div class="col-6">
                        <input type="color" class="form-control" id="webTopRightFrColor" value="<?php echo $infoArray["WEB_TOP_RIGHT_FRCOLOR"]; ?>">
                      </div>
                    </div>
                    <button class="btn btn-success btn-block mt-2" onclick="WebProductColorUpdate();">Kaydet</button>
                  </div>

                </div>
              </div>
              <script type="text/javascript">
                function UpdateCargoPrice(){
                  var cargoPrice = GetInput("cargoPrice");

                  if(cargoPrice != '' && parseInt(cargoPrice) > 0){
                    AjaxRequest('POST','class/cargo_price.php', {
                      'CARGO_PRICE': cargoPrice
                    }, (code) => {
                      if(code == 'success'){
                        GlobalInfoModal("Kargo ücreti kaydedildi!");
                      }
                      else{
                        GlobalInfoModal("Kargo ücreti kaydedildi!");
                      }
                    })
                  }
                  else{
                    GlobalInfoModal("Kargo Ücreti 0'dan büyük olmalıdır!");
                  }
                }

                function UpdateCargoPriceLimit(){
                  var cargoPriceLimit = GetInput("cargoPriceLimit");

                  if(cargoPriceLimit != '' && parseInt(cargoPriceLimit) > 0){
                    AjaxRequest('POST','class/cargo_price_limit.php', {
                      'CARGO_PRICE_LIMIT': cargoPriceLimit
                    }, (code) => {
                      if(code == 'success'){
                        GlobalInfoModal("Kaydedildi!");
                      }
                      else{
                        GlobalInfoModal("Kaydedildi!");
                      }
                    })
                  }
                  else{
                    GlobalInfoModal("Kargo Ücreti 0'dan büyük olmalıdır!");
                  }
                }

                function UpdateInfo(){
                  var email     = GetInput("txtEmail");
                  var phone     = GetInput("txtPhone");
                  var address   = GetInput("txtAddress");
                  var worktime  = GetInput("txtWorkTime");
                  var instagram = GetInput("txtInstagram");
                  var whatsapp  = GetInput("txtWhatsapp");
                  var facebook  = GetInput("txtFacebook");

                  if(email != '' && phone != '' && address != '' && worktime != '' && instagram != '' && whatsapp != '' && facebook != ''){
                    AjaxRequest('POST', 'class/update_info.php', {
                      'EMAIL'    : email,
                      'PHONE'    : phone,
                      'ADDRESS'  : address,
                      'WORKTIME' : worktime,
                      'INSTAGRAM': instagram,
                      'WHATSAPP' : whatsapp,
                      'FACEBOOK' : facebook
                    }, (code) => {
                      if(code == 'success'){
                        GlobalInfoModal("Bilgiler güncellendi!");
                      }
                      else{
                        GlobalInfoModal("Bilgiler güncellendi!");
                      }
                    });
                  }
                  else{
                    GlobalInfoModal("Lütfen gerekli alanları doldurunuz!");
                  }
                }

                function NewProductColorUpdate(){
                    var bgcolor = GetInput('newTopRightBgColor');
                    var frcolor = GetInput('newTopRightFrColor');

                    AjaxRequest('POST','class/update_color_new.php', {
                        'BGCOLOR': bgcolor,
                        'FRCOLOR': frcolor,
                    }, (code) => {
                        if(code == 'success'){
                            GlobalInfoModal("Renkler kaydedildi!");
                        }
                        else{
                          GlobalInfoModal("Renkler kaydedildi!");
                        }
                    })
                }

                function WebProductColorUpdate(){
                    var bgcolor = GetInput('webTopRightBgColor');
                    var frcolor = GetInput('webTopRightFrColor');

                    AjaxRequest('POST','class/update_color_web.php', {
                        'BGCOLOR': bgcolor,
                        'FRCOLOR': frcolor,
                    }, (code) => {
                        if(code == 'success'){
                            GlobalInfoModal("Renkler kaydedildi!");
                        }
                        else{
                          GlobalInfoModal("Renkler kaydedildi!");
                        }
                    })
                }

                function UpdateAboutMe(){
                  var aboutMe = GetInput("txtAboutMe");
                  var image = document.getElementById("selectFile").files;
                  var formData = new FormData();

                  if(image.length == 1){
                    formData.append('IMAGE', image[0]);
                  }

                  formData.append('ABOUT_ME', aboutMe);

                  AjaxRequest('POST','class/update_about.php', formData, (code) => {
                    if(code == 'success'){
                      GlobalInfoModal("Bilgiler güncellendi!");
                    }
                  }, true);

                }

                function UpdateCategoryIcon(){
                  var image = document.getElementById("selectFile22").files;
                  var formData = new FormData();

                  if(image.length == 1){
                    formData.append('IMAGE', image[0]);
                  }
                  else{
                    GlobalInfoModal("Lütfen bir resim seçin!");
                  }

                  AjaxRequest('POST','class/update_category_icon.php', formData, (code) => {
                    if(code == 'success'){
                      GlobalInfoModal("Kategori ikonu yüklendi!");
                    }
                  }, true);

                }

                    function UpdateGlobal(){
                        var color = GetInput('globalColorVal');
                        var radius = GetInput('GlobalRadiusVal');

                        AjaxRequest('POST','class/update_global.php', {
                            'GLOBAL_COLOR': color,
                            'GLOBAL_RADIUS': radius,
                        }, (code) => {
                            if(code == 'success'){
                                GlobalInfoModal("Bilgiler güncellendi!");
                            }
                        })
                    }
              </script>
            <?php } ?>


            <?php if($page == 'user-settings') { ?>
              <div class="container">
                <div class="row">
                  <div class="col-12 col-lg-6">
                    <div class="form-group">
                      <label for="txtUsername">Kullanıcı Adı</label>
                      <input type="text" id="txtUsername" class="form-control" value="<?php echo $_SESSION["USERNAME"]; ?>">
                      <button class="btn btn-success mt-4 mb-4" onclick="UpdateUsername();">Güncelle</button>
                    </div>
                    <div class="form-group">
                      <label for="txtCurrentPassword">Geçerli Parola</label>
                      <input type="password" id="txtCurrentPassword" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="txtNewPassword">Yeni Parola</label>
                      <input type="password" id="txtNewPassword" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="txtNewPasswordCheck">Yeni Parola Onayı</label>
                      <input type="password" id="txtNewPasswordCheck" class="form-control" oncancel="">
                      <button class="btn btn-success mt-3 mb-3" onclick="UpdatePassword();">Güncelle</button>
                    </div>
                  </div>
                </div>
              </div>
              <script type="text/javascript">
                function UpdateUsername(){
                  var newUsername = GetInput("txtUsername");

                  if(newUsername.length >= 5){
                    AjaxRequest('POST','class/update_username.php',{
                      'NEW_USERNAME': newUsername
                    },(code) => {
                      GlobalInfoModal("Kullanıcı adınız değiştirildi!");
                    });
                  }
                  else{
                    GlobalInfoModal("Kullanıcı adınız en az 5 karakterli olmalıdır!");
                  }
                }

                function UpdatePassword(){
                  var currentPassword = GetInput("txtCurrentPassword");
                  var newPassword = GetInput("txtNewPassword");
                  var newPasswordCheck = GetInput("txtNewPasswordCheck");

                  if(currentPassword != ''){
                    if(newPassword >= 8){
                      if(newPassword == newPasswordCheck){
                        if(currentPassword != newPassword){
                          AjaxRequest('POST','class/update_password.php',{
                            'NEW_PASSWORD': newPassword
                          },(code) => {
                            if(code == 'success'){
                              ClearInput("txtCurrentPassword");
                              ClearInput("txtNewPassword");
                              ClearInput("txtNewPasswordCheck");

                              GlobalInfoModal("Şifreniz değiştirildi!");
                            }
                            else {
                              GlobalInfoModal("Geçerli şifreniz yanlış. Lütfen tekrar deneyin!");
                            }
                          })
                        }
                        else{
                          GlobalInfoModal("Yeni şifreniz geçerli şifreniz ile aynı olamaz!");
                        }
                      }
                      else{
                        GlobalInfoModal("Şifreniz eşleşmiyor. Lütfen doğru şifreyi giriniz!");
                      }
                    }
                    else{
                      GlobalInfoModal("Yeni şifreniz en az 8 karakterli olmalıdır!");
                    }
                  }
                  else{
                    GlobalInfoModal("Lütfen geçerli şifrenizi giriniz!");
                  }
                }
              </script>
            <?php } ?>

        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });

        function GlobalInfoModal(text){
      document.getElementById('info-modal-text').textContent = text;
        $('.info-modal').modal('show');
    }

    function GetInput(input){
            return document.getElementById(input).value;
        }

    function ClearInput(input){
      document.getElementById(input).value = '';
    }

        function AjaxRequest(RequestType, Url, Data, callback, formData = false, res_json = false){
            if(!formData){
              $.ajax({
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

        function ImagePreview(event,type=false){
            if (event.target.files.length > 0 && type == false) {
              let src = URL.createObjectURL(event.target.files[0]);
              let preview = document.getElementById("PrevImage");
              preview.src = src;

              document.getElementById("selectText").remove();
              document.getElementById("ImageTools").style.display = "block";
            }
            else if(event.target.files.length > 0 && type == true) {
              let src = URL.createObjectURL(event.target.files[0]);
              let preview = document.getElementById("PrevImage2");
              preview.src = src;

              document.getElementById("selectText2").remove();
              document.getElementById("ImageTools2").style.display = "block";
            }
            else if(event.target.files.length > 0 && type == 'poster'){
              let src = URL.createObjectURL(event.target.files[0]);
              let preview = document.getElementById("PrevImage3");
              preview.src = src;

              document.getElementById("selectText3").remove();
              document.getElementById("ImageTools3").style.display = "block";
            }
            else if(event.target.files.length > 0 && type == 'advert'){
              let src = URL.createObjectURL(event.target.files[0]);
              let preview = document.getElementById("PrevImage4");
              preview.src = src;

              document.getElementById("selectText4").remove();
              document.getElementById("ImageTools4").style.display = "block";
            }
            else if(event.target.files.length > 0 && type == 'product-image'){
              let src = URL.createObjectURL(event.target.files[0]);
              let preview = document.getElementById("PrevImage5");
              preview.src = src;

              document.getElementById("selectText5").remove();
              document.getElementById("ImageTools5").style.display = "block";
            }
        }

    function DeleteModal(Id,No,sub2Id,funcName){
        var deleteButton = document.getElementById("delete-button");
        deleteButton.onclick = function() {funcName(Id,No,sub2Id)};
        $('.delete-modal').modal('show');
    }

        function AddModal(type,funcName,catId = 0,subId = 0){
            var addButton = document.getElementById("add-button");
            document.getElementById('add-modal-input').value = '';

            if(type == 'category'){
                document.getElementById('add-modal-title').textContent = 'Kategori Ekle';
                addButton.onclick = function() {funcName(GetInput("add-modal-input"))}
            }
            else if(type == 'subcategory'){
                document.getElementById('add-modal-title').textContent = getCategoryText("CategorySelect")  + ' için alt kategori ekle';
                addButton.onclick = function() {funcName(GetInput("add-modal-input"),catId)}
            }
            else if(type == 'subsubcategory'){
              document.getElementById('add-modal-title').textContent = getCategoryText("SubcategorySelect")  + ' için alt kategori ekle';
                addButton.onclick = function() {funcName(GetInput("add-modal-input"),catId,subId)}
            }
            else if(type == 'brand'){
                document.getElementById('add-modal-title').textContent = 'Marka Ekle';
                addButton.onclick = function() {funcName(GetInput("add-modal-input"))}
            }

            $('.add-modal').modal('show');
        }

        function getCategoryId(elm){
            var element = document.getElementById(elm); 
            try {
                return element.options[element.selectedIndex].value;
            }catch(err){
                return 0;
            }
        }

        function getCategoryText(elm){
            var element = document.getElementById(elm); 
            try {
                return element.options[element.selectedIndex].text;
            }catch(err){
                return 0;
            }
        }

        function AddOption(element,optionText,optionValue) {
            $('#' + element).append(new Option(optionText, optionValue));
        }

    //Messages
    <?php if($_GET['upload'] == 'success') { ?>
      GlobalInfoModal("Resim Yüklendi ve Kayıt Edildi!");
    <?php } ?>

        <?php if($_GET['delete'] == 'success') { ?>
            GlobalInfoModal("Silme İşlemi Başarılı!");
        <?php } ?>

        <?php if($_GET['add'] == 'success') { ?>
            GlobalInfoModal("Yeni Ürün Eklendi!");
        <?php } ?>

        <?php if($_GET['update'] == 'success') { ?>
            GlobalInfoModal("Güncelleme Başarılı!");
        <?php } ?>

        <?php if($_GET['check'] == 'success') { ?>
            GlobalInfoModal("Sipariş Onaylandı!");
        <?php } ?>

        <?php if($_GET['next-cargo'] == 'success') { ?>
            GlobalInfoModal("Sipariş kargoya verildi olarak işaretlendi!");
        <?php } ?>

        <?php if($_GET['rename'] == 'success') { ?>
            GlobalInfoModal("Yeniden Adlandırma Başarılı!");
        <?php } ?>
    </script>

</body>
</html>