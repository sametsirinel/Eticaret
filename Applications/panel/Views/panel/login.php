<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login 2</title>

    <link href="<?php echo baseurl(STYLES_DIR) ?>panel/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo baseurl(STYLES_DIR) ?>../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo baseurl(STYLES_DIR) ?>panel/animate.css" rel="stylesheet">
    <link href="<?php echo baseurl(STYLES_DIR) ?>panel/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold"><span style="color:#222;">Merkez</span><span style="color:#e1172c"> Yazılım</span> <small>Kurumsal Scripti</small> </h2>
				<h4 style="color:#999">v1.0</h4>

                <p>
                    Bir Hata İle Karşılaşmanız Durumunda Derhal Bize Bildirin İlgilenelim Sorunu Veya Sorunlarınızı Çözelim.
                </p>
				<p><a href="http://www.merkezyazilim.com">Sorunlarınızı Bildirmek İçin Tıklayın</a></p>

                <p>
                    <small>Merkez Yazılım © 2016 - Tüm Haklası Saklıdır. </small>
                </p>

            </div>
			<div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="<?php echo baseurl("panel/plogin/send") ?>" method="post">
						<?php echo Warning::get(); ?>
						<div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Kullanıcı Adı" required="*">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="sifre" placeholder="Şifre" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Giriş Yap</button>
                        <a href="#">
                            <small>© 2016</small>
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Tüm Hakları Saklıdır.
            </div>
            <div class="col-md-6 text-right">
               <small>© 2016</small>
            </div>
        </div>
    </div>

</body>

</html>
