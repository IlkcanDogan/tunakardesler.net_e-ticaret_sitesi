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
		<div class="main-page-wrapper">
		   <div class="page-title page-title-default title-size-small title-design-centered color-scheme-light" style="">
		      <div class="container">
		         <header class="entry-header">
		            <h1 class="entry-title">Giriş Yap</h1>
		            <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#"><a href="/" rel="v:url" property="v:title">Anasayfa</a> » <span class="current">Giriş Yap</span></div>
		         </header>
		      </div>
		   </div>
		   <div class="container">
		      <div class="row content-layout-wrapper align-items-start">
		         <div class="site-content col-lg-12 col-12 col-md-12" role="main">
		            <article id="post-10" class="post-10 page type-page status-publish hentry">
		               <div class="entry-content">
		                  <div class="woocommerce">
		                     <div class="woocommerce-notices-wrapper"></div>
		                     <div class="woodmart-registration-page woodmart-register-tabs">
		                        <div class="row" id="customer_login">
		                           <div class="col-12 col-md-6 col-login">
		                              <h2 class="wd-login-title">Giriş Yap</h2>
		                              <div method="post" class="login woocommerce-form woocommerce-form-login " action="#">
		                                 <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-username">
		                                    <label for="email">E-posta adresi&nbsp;</label>
		                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="email" autocomplete="off" value="">
		                                 </p>
		                                 <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide form-row-username">
		                                    <label for="password">Parola&nbsp;</label>
		                                    <input type="text" style="-webkit-text-security: disc;" class="woocommerce-Input woocommerce-Input--password input-text" id="password" autocomplete="off" value="">
		                                 </p>
		                                 <p class="form-row">
		                                   <button style="border-radius: <?php echo $globalRadius; ?>px" id="loginButton" class="button woocommerce-button woocommerce-form-login__submit" name="login" value="Giriş Yap" onclick="Login()">Giriş Yap</button>
		                                 </p>
		                                 <div class="login-form-footer">
		                                    <a href="/sifremi-unuttum" class="woocommerce-LostPassword lost_password">Parolanı mı unuttun?</a>
		                                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
		                                    </label>
		                                 </div>
		                              </div>
		                           </div>
		                           <div class="col-12 col-md-6 col-register-text">
		                              <span class="register-or wood-login-divider">Veya</span>
		                              <h2 class="wd-login-title">Kayıt Ol</h2>
		                              <div class="registration-info">Bu siteye kaydolmak, sipariş durumunuza ve geçmişinize erişmenizi sağlar. Aşağıdaki alanları doldurmanız yeterlidir, sizin için kısa sürede yeni bir hesap oluşturacağız. Sizden yalnızca satın alma sürecini daha hızlı ve daha kolay hale getirmek için gerekli bilgileri isteyeceğiz.</div>
		                              <a href="/kayit-ol" class="btn woodmart-switch-to-register" data-login="Kayıt Ol" data-login-title="Kayıt Ol" data-reg-title="Kayıt Ol" data-register="Üye Ol" style="border-radius: <?php echo $globalRadius; ?>px">Üye Ol</a>
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

		<div style="display: none;" class="woocommerce-notices-wrapper" id="alertDiv" onclick="document.getElementById('alertDiv').style.display = 'none';"><ul class="woocommerce-error" role="alert"><li><strong >Hata:</strong> <span id="alertMessage"></span></li></ul></div>

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

		var firebaseConfig = {
		    apiKey: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
		    authDomain: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.firebaseapp.com",
		    projectId: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
		    storageBucket: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.appspot.com",
		    messagingSenderId: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
		    appId: "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
		};
	  	firebase.initializeApp(firebaseConfig);

	  	function GetInput(input){
            return document.getElementById(input).value;
        }

        function AlertBox(message,time=3000){
        	document.getElementById('alertDiv').style.display = 'block';
        	document.getElementById('alertMessage').textContent = message;
        	setTimeout(function(){ document.getElementById('alertDiv').style.display = 'none'; }, time);
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

		function Login(){
			var email = GetInput("email");
			var password = GetInput("password");

			if(email != ''){
				if(password != ''){
					document.getElementById('loginButton').textContent = "Bekleyin...";
	  				document.getElementById('loginButton').disabled = true;

					firebase.auth().signInWithEmailAndPassword(email, password)
					  .then((user) => {
					      var emailVerified = user.user.emailVerified;
					      if(emailVerified){
					      	 AjaxRequest('POST','extra/_login.php',{
					      	 	'EMAIL': email,
					      	 	'FIREBASE_ID': user.user.uid
					      	 }, (code) => {
					      	 	if(code == 'success'){
					      	 		window.location.href = '/?login=success';
					      	 	}
					      	 	else{
					      	 		AlertBox("Bir sorun oluştu!");
					      	 	}
					      	 });
					      }
					      else{
							document.getElementById('loginButton').disabled = false;
							document.getElementById('loginButton').textContent = "Giriş Yap";
					      	AlertBox("Hesabınız doğrulanmadı. Lütfen e-posta adresinize gönderilen link ile onaylayın!",4000);
					      }
					  })
					  .catch((error) => {
					  	document.getElementById('loginButton').disabled = false;
						document.getElementById('loginButton').textContent = "Giriş Yap";

					    AlertBox("E-Posta adresiniz veya parolanız yanlış. Lütfen tekrar deneyin!");
					});
				}
				else{
					AlertBox("Parolayı boş bırakmayınız!");
				}
			}
			else{
				AlertBox("E-Posta adresini boş bırakmayınız!");
			}
		}

	</script>
</body>
</html>