<?php 
	include
	error_reporting(1);
    error_log(1);
	if($_GET["account"] == 'exit'){
		session_start();
		session_destroy();
	}
?>
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
		 <style type="text/css">
    	.MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; margin-top: -30px; margin-bottom: -30px;}
    	.MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
        .MultiCarousel .MultiCarousel-inner .item { float: left;}
        .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; /*padding:10px;*/ margin:10px; /*background:#f1f1f1; color:#666;*/ }
    	.MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; background:<?php echo $globalColor; ?>;/*'#E73394';*/ top:calc(33%);  opacity: 50%;}
    	.MultiCarousel .leftLst { left:0; }
    	.MultiCarousel .rightLst { right:0; }
        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none;  }
    </style>
    <?php if($_GET['order'] == 'ok' || $_GET['order'] == 're') { ?>
 		<div class="modal fade order-ok-modal" tabindex="-1" role="dialog" aria-hidden="true">
	        <div class="modal-dialog modal-dialog-centered">
	            <div class="modal-content">
	                <div class="modal-body">
	                	<center>
	                		<i class="fa fa-check-circle fa-6x" style="color: green;"></i>
	                		<p class="mt-3" style="font-size: 19px;">Teşekkürler! <br> Siparişiniz Başarıyla Tamamlandı! <br>
	                			<span style="font-size: 17px; font-weight: bold;">
	                				Sipariş Kodunuz: <?php 
	                					$customerOrderArray = $db->GetCustomerOrderNonLogin();
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
		<?php include 'extra/main.php'; ?>

		<?php if($_GET['create'] == 'success') { ?>
			<div class="woocommerce-notices-wrapper" id="alertDiv" onclick="document.getElementById('alertDiv').style.display = 'none';"><ul class="woocommerce-error" role="alert"><li><strong >Bilgi: </strong> Tebrikler. Hesabınız başarıyla oluşturuldu! Doğrulama linki için lütfen gelen kutunuzu kontrol ediniz.</li></ul></div>
		<?php } ?>

		<?php if($_GET['reset'] == 'success') { ?>
			<div class="woocommerce-notices-wrapper" id="alertDiv" onclick="document.getElementById('alertDiv').style.display = 'none';"><ul class="woocommerce-error" role="alert"><li><strong >Bilgi: </strong> Parola sıfırlama linki e-posta adresinize gönderildi. Lütfen gelen kutunuzu kontrol ediniz!</li></ul></div>
		<?php } ?>
		
		<?php if($_GET['order'] == 'cancel') { ?>
			<div class="woocommerce-notices-wrapper" id="alertDiv" onclick="document.getElementById('alertDiv').style.display = 'none';"><ul class="woocommerce-error" role="alert"><li><strong >Bilgi: </strong> Siparişiniz iptal edildi.</li></ul></div>
		<?php } ?>

		<?php /*if($_GET['order'] == 're') { ?>
			<div class="woocommerce-notices-wrapper" id="alertDiv" onclick="document.getElementById('alertDiv').style.display = 'none';"><ul class="woocommerce-error" role="alert"><li><strong >Bilgi: </strong> Siparişiniz yeniden gönderildi. Onay süreci başladı.</li></ul></div>
		<?php } */?>

		<?php /*if($_GET['sepet'] == 'ack') { ?>
			<div class="woocommerce-notices-wrapper" id="alertDiv" onclick="document.getElementById('alertDiv').style.display = 'none';"><ul class="woocommerce-error" role="alert"><li><strong >Bilgi: </strong> Siparişiniz alındı. Onay süreci başladı.</li></ul></div>
		<?php } */?>

		<?php if($_GET['subscibe'] == 'ok') { ?>
			<div class="woocommerce-notices-wrapper" id="alertDiv" onclick="document.getElementById('alertDiv').style.display = 'none';"><ul class="woocommerce-error" role="alert"><li><strong >Bilgi: </strong> Tebrikler, haber bültenimize kayıt oldunuz. Kampanya ve diğer fırsatlardan sizi haberdar edeceğiz!</li></ul></div>
		<?php } ?>

		<?php if($_GET['subscibe'] == 'error') { ?>
			<div class="woocommerce-notices-wrapper" id="alertDiv" onclick="document.getElementById('alertDiv').style.display = 'none';"><ul class="woocommerce-error" role="alert"><li><strong >Uyarı: </strong> Haber bültenimize zaten kayıtlısınız!</li></ul></div>
		<?php } ?>

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

		<?php 
			$cOrder = count($customerOrderArray);
			if($cOrder > 0){
				echo "jQuery('.order-ok-modal').modal('show');";
			} 
		 ?>

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

		

		$(document).ready(function () {
		    var itemsMainDiv = ('.MultiCarousel');
		    var itemsDiv = ('.MultiCarousel-inner');
		    var itemWidth = "";

		    $('.leftLst, .rightLst').click(function () {
		        var condition = $(this).hasClass("leftLst");
		        if (condition)
		            click(0, this);
		        else
		            click(1, this)
		    });

		    ResCarouselSize();
		    $(window).resize(function () {
		        ResCarouselSize();
		    });

		    function ResCarouselSize() {
		        var incno = 0;
		        var dataItems = ("data-items");
		        var itemClass = ('.item');
		        var id = 0;
		        var btnParentSb = '';
		        var itemsSplit = '';
		        var sampwidth = $(itemsMainDiv).width();
		        var bodyWidth = $('body').width();
		        $(itemsDiv).each(function () {
		            id = id + 1;
		            var itemNumbers = $(this).find(itemClass).length;
		            btnParentSb = $(this).parent().attr(dataItems);
		            itemsSplit = btnParentSb.split(',');
		            $(this).parent().attr("id", "MultiCarousel" + id);


		            if (bodyWidth >= 1200) {
		                incno = itemsSplit[3];
		                itemWidth = sampwidth / incno;
		            }
		            else if (bodyWidth >= 992) {
		                incno = itemsSplit[2];
		                itemWidth = sampwidth / incno;
		            }
		            else if (bodyWidth >= 768) {
		                incno = itemsSplit[1];
		                itemWidth = sampwidth / incno;
		            }
		            else {
		                incno = itemsSplit[0];
		                itemWidth = sampwidth / incno;
		            }
		            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
		            $(this).find(itemClass).each(function () {
		                $(this).outerWidth(itemWidth);
		            });

		            $(".leftLst").addClass("over");
		            $(".rightLst").removeClass("over");

		        });
		    }

		    function ResCarousel(e, el, s) {
		        var leftBtn = ('.leftLst');
		        var rightBtn = ('.rightLst');
		        var translateXval = '';
		        var divStyle = $(el + ' ' + itemsDiv).css('transform');
		        var values = divStyle.match(/-?[\d\.]+/g);
		        var xds = Math.abs(values[4]);
		        if (e == 0) {
		            translateXval = parseInt(xds) - parseInt(itemWidth * s);
		            $(el + ' ' + rightBtn).removeClass("over");

		            if (translateXval <= itemWidth / 2) {
		                translateXval = 0;
		                $(el + ' ' + leftBtn).addClass("over");
		            }
		        }
		        else if (e == 1) {
		            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
		            translateXval = parseInt(xds) + parseInt(itemWidth * s);
		            $(el + ' ' + leftBtn).removeClass("over");

		            if (translateXval >= itemsCondition - itemWidth / 2) {
		                translateXval = itemsCondition;
		                $(el + ' ' + rightBtn).addClass("over");
		            }
		        }
		        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
		    }

		    function click(ell, ee) {
		        var Parent = "#" + $(ee).parent().attr("id");
		        var slide = $(Parent).attr("data-slide");
		        ResCarousel(ell, Parent, slide);
		    }

		});

		function m1(){
			document.getElementById("LastProduct").style.display = '';
			document.getElementById("MostProduct").style.display = 'none';
			document.getElementById('m1').style.color = '<?php echo $globalColor; ?>';/*'#E73394';*/
			document.getElementById('m2').style.color = '#717171';
			//document.getElementById('m3').style.color = '#717171';
		}

		function m2(){
			document.getElementById("LastProduct").style.display = 'none';
			document.getElementById("MostProduct").style.display = '';
			document.getElementById('m1').style.color = '#717171';
			document.getElementById('m2').style.color = '<?php echo $globalColor; ?>';/*'#E73394';*/
			//document.getElementById('m3').style.color = '#717171';
		}

		function m3(){
			document.getElementById('m1').style.color = '#717171';
			document.getElementById('m2').style.color = '#717171';
			document.getElementById('m3').style.color = '<?php echo $globalColor; ?>';/*'#E73394';*/
		}
	</script>
</body>
</html>