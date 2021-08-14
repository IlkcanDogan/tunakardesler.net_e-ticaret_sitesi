<div id="account-menu-div" class="mobile-nav slide-from-left">
    <div class="mobile-menu-tab mobile-pages-menu active">
        <div class="menu-mega-menu-container">
            
            <ul id="menu-mega-menu-1" class="site-mobile-menu">
                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1724 current_page_item menu-item-3054 item-level-0">
                    <a href="javascript:void(0)" class="woodmart-nav-link">
                        <span class="nav-link-text" style="font-size: 1.5em;">Hesabım</span>
                    </a>
                </li>
                <ul>
                  <li class="woocommerce-MyAccount-navigation-link <?php if($_GET['ct'] == '1') echo 'is-active'; ?>" onclick="OpenSubOrderMobile();">
                     <a href="javascript:void(0);">Siparişlerim</a>
                     <ul id="subOrderAreaMobile" <?php if($_GET['ct'] != '1') echo 'style="display: none;"'; ?>>
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
                  <li class="woodmart-nav-link">
                     <a class="nav-link-text" href="/?account=exit">Çıkış Yap</a>
                  </li>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    var subOrderMobile = 0;
    function OpenSubOrderMobile() {

            if(subOrderMobile){
                document.getElementById('subOrderAreaMobile').style.display = 'none';
                subOrderMobile = 0;
            }
            else{
                document.getElementById('subOrderAreaMobile').style.display = 'block';
                subOrderMobile = 1;
            }
            
        }
</script>