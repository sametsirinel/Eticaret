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
					<h1 class="text-center text-uppercase title-under">Bir kaç adımda kayıt olun </h1>



				</div>
				<!-- /title -->
				<div class="row">
					<section class="col-sm-12 col-md-6 col-lg-6 col-xl-4 col-xl-offset-2">
						 <div class="login-form-box">
						 	 <h3 class="color small">Zaten Hesabınız Var mı ?  </h3>
				             <p>Giriş sayfasına ulaşmak için aşağıdaki linki kullanabilirsiniz.</p>
				            <br>
				            <a href="<?=baseurl("giris"); ?>" class="btn btn--ys btn--xl"><span class="icon icon-vpn_key"></span>Giriş Yapın</a>
                    <br><br><?=Warning::get();?>
             </div>
					</section>
					<div class="divider divider--md visible-sm visible-xs"></div>
					<section class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
						<div class="login-form-box">
							<h3 class="color small">Yeni üyelik Formu</h3>
				              <form action="<?=baseurl("kayit/yap")?>" method="post" id="form-returning">
                        <div class="form-group">
                            <label for="">Kullanıcı Adınız <sup>*</sup></label>
                            <input type="text" name="kadi" placeholder="Lütfen Bir Kullanıcı Adı Giriniz" class="form-control">
                        </div>
                        <div class="form-group row">
          <div class="col-md-6">
            <label for="">Adınız <sup>*</sup></label>
            <input type="text" name="adi" placeholder="Lütfen Adınızı Giriniz" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="">Soyadınız <sup>*</sup></label>
            <input type="text" name="soyadi" placeholder="Lütfen Soyadınızı Giriniz" class="form-control">
          </div>
                        </div>
                        <div class="form-group">
                            <label for="">Email Adresiniz <sup>*</sup></label>
                            <input type="text" name="email" placeholder="Lütfen Bir Email Adresi Giriniz" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Şifreniz <sup>*</sup></label>
                            <input type="password" name="sifre" placeholder="Lütfen Bir Şifre Giriniz" class="form-control">
                        </div>
				                <div class="row">
				                	<div class="col-xs-12 col-sm-6 col-md-6">
				                		<button type="submit" class="btn btn--ys btn-top btn--xl" onclick="document.getElementById('form-returning').submit();"><span class="icon icon-person_add"></span>Üye Ol</button>
				                	</div>
				                	<div class="divider divider--md visible-xs"></div>
				                	<div class="col-xs-12 col-sm-6 col-md-6">
				                		<div class="pull-right note btn-top">* Zorunlu alan</div>
				                	</div>
				                </div>
				              </form>
						</div>
					</section>
				</div>
			</div>
		</div>
