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
	<script type="text/javascript">
		
	</script>
</head>
<body class="home page-template-default page page-id-1724 theme-woodmart woocommerce-js wrapper-full-width form-style-square form-border-width-2 categories-accordion-on header-banner-enabled woodmart-ajax-shop-on offcanvas-sidebar-mobile offcanvas-sidebar-tablet notifications-sticky sticky-toolbar-on btns-default-flat btns-default-dark btns-default-hover-dark btns-shop-3d btns-shop-light btns-shop-hover-light btns-accent-flat btns-accent-light btns-accent-hover-light wpb-js-composer js-comp-ver-6.3.0 vc_responsive header-banner-hide">

	<div class="website-wrapper">
		<?php include 'extra/header.php'; ?>
		<div class="main-page-wrapper">
		   <div class="page-title page-title-default title-size-small title-design-centered color-scheme-light" style="">
		      <div class="container">
		         <header class="entry-header">
		            <h1 class="entry-title">Üye Ol</h1>
		            <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#"><a href="/" rel="v:url" property="v:title">Anasayfa</a> » <span class="current">Üye Ol</span>
		            </div>										
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
									   <h2 class="wd-login-title">Üye Ol</h2>
									   <div class="woocommerce-form woocommerce-form-register register" accept="preventDefault()">
									   	  <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									         <label for="reg_username">Ad&nbsp;<span class="required">*</span></label>
									         <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="name" autocomplete="off" value="">
									      </p>
									      <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									         <label for="reg_username">Soyad&nbsp;<span class="required">*</span></label>
									         <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="surname" autocomplete="off" value="">
									      </p>
									      <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									         <label for="reg_username">E-posta Adresi&nbsp;<span class="required">*</span></label>
									         <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="email" autocomplete="off" value="">
									      </p>
									      <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									         <label for="reg_phone">Cep Telefonu&nbsp;<span class="required">*</span></label>
									         <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="phone" autocomplete="off" value="05">
									      </p>
									      <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									         <label for="reg_birthday">Doğum Tarihi&nbsp;<span class="required">*</span></label>
									         <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="birthday" autocomplete="off" value="" placeholder="GG/AA/YYYY">
									      </p>
									      <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									         <div class="">
									         	<div class="row">
									         		<div class="col-4" style="padding-left: 10px; margin-top: -20px; margin-bottom: -20px;">
									         			 <label for="reg_gender">Cinsiyet&nbsp;<span class="required">*</span></label>
									         		</div>
									         		<div class="col-4" style="margin-top: -15px; ">
										         		<input class="form-check-input" type="radio" value="opt1" id="gender_woman" onchange="HandleWoman()" checked="true">
										         		 <label class="form-check-label" for="gender_woman" style="margin-top: -4px; cursor: pointer;">
														    Kadın
														 </label>
										         	</div>
										         	<div class="col-4" style="margin-top: -15px; ">
										         		<input class="form-check-input" type="radio" value="opt1" id="gender_man" onchange="HandleMan();">
										         		 <label class="form-check-label" for="gender_man" style="margin-top: -4px; cursor: pointer;">
														    Erkek
														 </label>
										         	</div>
									         	</div>
									         </div>
									      </p>
									      <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									         <label for="reg_email" >Parola&nbsp;<span class="required">*</span></label>
									         <input style="-webkit-text-security: disc;" type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="password"  autocomplete="off" value="">
									      </p>
									      <p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
									         <label for="reg_email">Parola (Tekrar)&nbsp;<span class="required">*</span></label>
									         <input style="-webkit-text-security: disc;" type="text" class="woocommerce-Input woocommerce-Input--text input-text" id="passwordCheck"  autocomplete="off" value="">
									      </p>
									      <div style="left: -999em; position: absolute;"><label for="trap">Anti-spam</label><input type="text" name="email_2" id="trap" tabindex="-1"></div>
									      <div class="clear"></div>
									      <div class="woocommerce-privacy-policy-text">
									         <p>Kişisel verileriniz bu web sitesindeki deneyiminizi desteklemek, hesabınıza erişimi yönetmek ve <a href="/gizlilik-politikasi" class="woocommerce-privacy-policy-link" target="_blank">gizlilik ilkesi</a> sayfamızda açıklanan diğer amaçlar için kullanılacaktır.</p>
									      </div>
									      <p class="woocommerce-FormRow form-row">
									        <button id="CreateButton" class="woocommerce-Button button" value="Üye Ol" onclick="AccountCreate();" style="border-radius: <?php echo $globalRadius; ?>px">Üye Ol</button>
									      </p>
									   </div>
									</div>
		                           <div class="col-12 col-md-6 col-register-text">
		                              <span class="register-or wood-login-divider">Veya</span>
		                              <h2 class="wd-login-title">Kayıt Ol</h2>
		                              <div class="registration-info">Bu siteye kaydolmak, sipariş durumunuza ve geçmişinize erişmenizi sağlar. Aşağıdaki alanları doldurmanız yeterlidir, sizin için kısa sürede yeni bir hesap oluşturacağız. Sizden yalnızca satın alma sürecini daha hızlı ve daha kolay hale getirmek için gerekli bilgileri isteyeceğiz.</div>
		                              <a href="/giris-yap" class="btn woodmart-switch-to-register" data-login="Giriş Yap" data-login-title="Giriş" data-reg-title="Giriş Yap" data-register="Giriş Yap" style="border-radius: <?php echo $globalRadius; ?>px">Giriş Yap</a>
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

	<script src="vendor/js/jq.js" type="text/javascript"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/js/jquery.inputmask.min.js"></script>
	<script type="text/javascript">
		jQuery(":input").inputmask();
		jQuery("#phone").inputmask({"mask": "(9999) 999-9999"});
		jQuery("#birthday").inputmask({"mask": "99/99/9999"});


		function HandleWoman(){
        	var checked = document.getElementById("gender_woman").checked;
        	if(checked == true){
        		var checked = document.getElementById("gender_man").checked = false;
        	}
        	else{
        		var checked = document.getElementById("gender_man").checked = true;
        	}
        }

        function HandleMan(){
        	var checked = document.getElementById("gender_man").checked;
        	if(checked == true){
        		var checked = document.getElementById("gender_woman").checked = false;
        	}
        	else{
        		var checked = document.getElementById("gender_woman").checked = true;
        	}
        }


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

	  	function AccountCreate() {
	  		var email = GetInput("email");
	  		var password = GetInput("password");
	  		var passwordCheck = GetInput("passwordCheck");
	  		var name = GetInput("name");
	  		var surname = GetInput("surname");

	  		var phone = jQuery("#phone").inputmask('unmaskedvalue');
	  		var gender = document.getElementById("gender_man").checked == true ? 'Erkek' : 'Kadın';
	  		var birthday = GetInput("birthday");
	  		var isValidDate = Inputmask.isValid(birthday, { alias: "datetime", inputFormat: "dd/mm/yyyy"});

	  		if(name != ''){
	  			if(surname != ''){
	  				if(email != ''){
			  			if(password.length >= 8){
			  				if(password == passwordCheck){
			  					if(phone.length == 11){
			  						if(isValidDate){
			  							document.getElementById('CreateButton').textContent = "Bekleyin...";
			  							document.getElementById('CreateButton').disabled = true;

					  					firebase.auth().createUserWithEmailAndPassword(email, password)
									    .then((user) => {
										    firebase.auth().currentUser.sendEmailVerification()
										    .then(() => {
										       AjaxRequest('POST','extra/_create_account.php', {
										       		'FIREBASE_USER_ID': user.user.uid,
										       		'NAME': name,
										       		'SURNAME': surname,
										       		'EMAIL': email,
										       		'PHONE': phone,
										       		'DATE': birthday,
										       		'GENDER': gender 
										       }, (code) => {
										       		if(code == 'success'){
										       			window.location.href = '/?create=success';
										       		}
										       		else{
										       			AlertBox("Bir sorun oluştu!");
										       		}
										       		document.getElementById('CreateButton').disabled = false;
										   			document.getElementById('CreateButton').textContent = "Üye Ol";
										       })
										    });
									    })
									    .catch((error) => {
									    	document.getElementById('CreateButton').disabled = false;
										    document.getElementById('CreateButton').textContent = "Üye Ol";
									      var errorCode = error.code;
									      if(errorCode == 'auth/email-already-in-use')
									      	AlertBox("Bu eposta adresi kullanılmaktadır!");
									      else if(errorCode == 'auth/invalid-email')
									      	AlertBox("Geçersiz eposta adresi!");
									    });
			  						}
			  						else{
			  							AlertBox("Lütfen doğum tarihinizi yazınız!");
			  						}
			  					}
			  					else{
			  						AlertBox("Lütfen telefon numaranızı yazınız!");
			  					}
			  				}
			  				else{
			  					AlertBox("Parolanız uyuşmuyor!");
			  				}
			  			}
			  			else{
			  				AlertBox("Parolanız en az 8 haneli olmalıdır!");
			  			}
			  		}
			  		else{
			  			AlertBox("E-Posta adresini boş bırakmayınız!");
			  		}
	  			}
	  			else{
	  				AlertBox("Lütfen soyadınızı yazınız!");
	  			}
	  		}
	  		else{
	  			AlertBox("Lütfen adınızı yazınız!");
	  		}
	  	}

	  	function GetInput(input){
            return document.getElementById(input).value;
        }

        function AlertBox(message){
        	document.getElementById('alertDiv').style.display = 'block';
        	document.getElementById('alertMessage').textContent = message;
        	setTimeout(function(){ document.getElementById('alertDiv').style.display = 'none'; }, 3000);
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
	</script>
</body>
</html>