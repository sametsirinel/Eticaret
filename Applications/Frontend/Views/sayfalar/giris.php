<div class="breadcrumbs">
			<div class="container">
				<ol class="breadcrumb breadcrumb--ys pull-left">
					<li class="home-link"><a href="<?=baseurl()?>" class="icon icon-home"></a></li>
					<li class="active">Giriş Yap</li>
				</ol>
			</div>
		</div>
    <div id="pageContent">
			<div class="container">
				<!-- title -->
				<div class="title-box">
					<h1 class="text-center text-uppercase title-under">Giriş Yap veya Yeni Hesap Oluştur</h1>



				</div>
				<!-- /title -->
				<div class="row">
					<section class="col-sm-12 col-md-6 col-lg-6 col-xl-4 col-xl-offset-2">
						 <div class="login-form-box">
						 	 <h3 class="color small">Hesabınız Yokmu ? </h3>
				             <p>Hemen bir hesap oluşturun ayrıcalıklı alışverişin tadını çıkarın.Hemde sadece bir kaç adımda .</p>
				            <br>
				            <a href="<?=baseurl("kayit"); ?>" class="btn btn--ys btn--xl"><span class="icon icon-person_add"></span>Yeni Bir Hesap Aç</a>
                    <br><br><?=Warning::get();?>
             </div>
					</section>
					<div class="divider divider--md visible-sm visible-xs"></div>
					<section class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
						<div class="login-form-box">
							<h3 class="color small">Kullanıcı Giriş Formu</h3>
							<p>
								Sitemize tekrardan hoş geldiniz.
							</p>
				              <form action="<?=baseurl("giris/yap")?>" method="post" id="form-returning">
				                <div class="form-group">
				                  <label for="email">Kullanıcı Adınız <sup>*</sup></label>
				                  <input type="text" name="kadi" class="form-control" id="email">
				                </div>
				                <div class="form-group">
				                  <label for="password">Şifre <sup>*</sup></label>
				                  <input type="password" name="sifre" class="form-control" id="password">
				                </div>
				                <div class="row">
				                	<div class="col-xs-12 col-sm-6 col-md-6">
				                		<button type="submit" class="btn btn--ys btn-top btn--xl" onclick="document.getElementById('form-returning').submit();"><span class="icon icon-vpn_key"></span>Giriş Yap</button>
				                	</div>
				                	<div class="divider divider--md visible-xs"></div>
				                	<div class="col-xs-12 col-sm-6 col-md-6">
				                		<div class="pull-right note btn-top">* Zorunlu alan</div>
				                	</div>
				                </div>
				                <p class="btn-top">
		               				<a class="link-color" href="#">Şifremi Unuttum</a>
		               			</p>
				              </form>
						</div>
					</section>
				</div>
			</div>
		</div>
