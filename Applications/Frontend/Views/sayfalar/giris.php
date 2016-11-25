<div class="container" style="padding-bottom:200px;">
            <div class="row">
               <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7" style="margin-top:20px;">

                            <h3>Sitemize Üyemisiniz ? </h3>
                            <p>Artık sistemimize giriş yapmak çok kolay. Sizde kampanyalardan yararlanmak için veya kampanyalardan haberdar olmak için giriş yapın.</p>
                            <a href="<?=baseurl("kayit")?>" class="btn btn-success">Kayıt Ol</a>
                            <a class="btn btn-primary popup-text" href="#password-recover-dialog" data-effect="mfp-zoom-out">Şifremi Unuttum</a>
              							<br>
                            <br>

                            <?=Warning::Get(); ?>
                        </div>
                        <div class="col-md-5">
                            <h3>Giriş Yapın</h3>
                            <form action="<?=baseurl("giris/yap")?>" method="post">
                                <!-- <legend>Personal Information</legend> -->
                                <div class="form-group">
                                    <label for="">Kullanıcı Adınız</label>
                                    <input type="text" name="kadi" placeholder="Lütfen Bir Kullanıcı Adı Giriniz" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Şifreniz</label>
                                    <input type="password" name="sifre" placeholder="Lütfen Bir Şifre Giriniz" class="form-control">
                                </div>
			                          <input type="submit" class="btn btn-primary pull-right" value="Giriş Yap">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>
