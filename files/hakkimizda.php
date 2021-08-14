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
		<!-- Star -->
		<div class="">
		   <div class="page-title page-title-default title-size-small title-design-centered color-scheme-light" style="">
		      <div class="container">
		         <header class="entry-header">
		            <h1 class="entry-title">Hakkımızda</h1>
		            <div class="breadcrumbs"><a href="/" rel="v:url" property="v:title">Anasayfa</a> » <span class="current">Hakkımızda</span></div>
		         </header>
		      </div>
		   </div>
		   <div class="container">
		      <div class="row content-layout-wrapper align-items-start">
		         <div class="site-content col-lg-12 col-12 col-md-12" role="main">
		            <article id="post-1629" class="post-1629 page type-page status-publish hentry">
		               <div class="entry-content">
		                  <div class="vc_row-full-width vc_clearfix"></div>
		                  <div class="vc_row wpb_row vc_row-fluid">
		                     <div class="wpb_column vc_column_container vc_col-sm-12">
		                        <div class="vc_column-inner vc_custom_1527240190798">
		                           <div class="wpb_wrapper">
		                           </div>
		                        </div>
		                     </div>
		                  </div>
		               <?php $aboutData = $db->GetAbout(); ?>
		               <div class="container-fluid">
		               	<div class="row">
		               		<div class="col-12 col-lg-6 mb-3">
		               			<img src="images/<?php echo $aboutData[0]['PHOTO_NAME']; ?>" class="img-fluid ">
		               		</div>
		               		<div class="col-12 col-lg-6">
		               			<?php echo $aboutData[0]['ABOUT_ME']; ?>
		               		</div>
		               	</div>
		               </div>
		            </article>
		         </div>
		      </div>
		   </div>
		</div>
		<!-- End -->
		<?php include 'extra/footer.php'; ?>
	</div>
	<div id="dark-panel" class="woodmart-close-side" onclick="DarkPanelClose();"></div>
	<?php include 'extra/mobile_menu.php'; ?>
	<?php include 'extra/shopping_menu.php'; ?>

	<script defer="" src="vendor/js/s1.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		var dropOpen = 0;
		var mobileMenuOpen = 0;
		var shoppingMenuOpen = 0;

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
		
	</script>
</body>
</html>