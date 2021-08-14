<?php 
  error_reporting(0);
  session_start();

  if ($_SESSION["USERNAME"] != '' && strlen($_SESSION["PASSWORD"]) == 32) {
    header("Location: dashboard.php");
    exit();
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tuna Kardeşler - Admin Paneli</title>
	<link rel="shortcut-icon" href="img/favicon.ico"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<script src="https://www.google.com/recaptcha/api.js?hl=tr"></script>
    <script src="https://use.fontawesome.com/da55be849d.js"></script>
	<style type="text/css">
		body{
			background-color: #D7DBDD;
		}
	</style>
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-12">
				<center>
					<div class="card" style="width: 21rem; border-radius: 10px;">
						<center style="padding-top: 30px;">
							<img src="img/user_avatar.png" width="120">
						</center>
						<div class="card-body">
							<h3>Yönetici Girişi</h3>
							<form onsubmit="return false">
								<div class="form-group mt-5">
									<input type="text" id="username" class="form-control mt-3" autocomplete="off" placeholder="Kullanıcı Adı">
									<input type="password" id="password" class="form-control mt-3" autocomplete="off" placeholder="Parola">
									<div class="g-recaptcha mt-3" data-sitekey="6LdXdhYaAAAAABa1Mw2xScP5M9YBvvuvsdYdeNjl"></div>
								</div>
							</form>
							<button class="btn btn-info btn-block btn-lg" onclick="adminLogin()">Giriş Yap</button>
						</div>
					</div>
					<br/>
					<span style="font-weight: bold;">Kodlama ve Tasarım: İlkcan DOĞAN</span>
				</center>
			</div>
		</div>
	</div>
	<div class="modal fade info-modal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	     <div class="modal-content">
	        <div class="modal-header" style="color: white; background-color: #138496;">
	           <h5 class="modal-title" id="info-modal-title"><i class="fa fa-info-circle fa-lg"></i>&nbsp;&nbsp;Bilgi</h5>
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

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function globalInfoModal(text){
			document.getElementById('info-modal-text').textContent = text;
		    $('.info-modal').modal('show');
		}

		function getInput(input){
            return document.getElementById(input).value;
        }

        function adminLogin(){
        	var username = getInput('username');
        	var password = getInput('password');
        	var ResponseCaptcha = grecaptcha.getResponse();
        	
        	if(username != '' && password != ''){
        		if(ResponseCaptcha != ''){
        			$.ajax({
						type: 'POST',
						url: 'login.php',
						data: {
							"USERNAME": username,
							"PASSWORD": password,
							"RESPONSE_CAPTCHA": ResponseCaptcha
						},
						success: function(response){
							grecaptcha.reset();
							
							if(response["status"] == "success"){
								window.location.href = "dashboard.php";
							}
							else if(response["status"] == "error"){
								globalInfoModal("Kullanıcı adı veya şifreniz yanlış. Lütfen tekrar deneyin!");
							}
							else if(response["status"] == "invalid captcha"){
								window.location.reload(true);
							}
							else {
								globalInfoModal("Bir hata oluştu. Lütfen tekrar deneyin!");
							}
						}
					})
        		}
        		else{
        			globalInfoModal("Lütfen robot olmadığınızı doğrulayın!");
        		}
        	}
        	else{
        		globalInfoModal("Lütfen kullanıcı adınızı ve parolanızı girin!");
        	}
        }
		
	</script>
</body>
</html>