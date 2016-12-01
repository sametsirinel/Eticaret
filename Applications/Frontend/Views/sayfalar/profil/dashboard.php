<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb--ys pull-left">
				<li class="home-link"><a href="index.html" class="icon icon-home"></a></li>
				<li class="active">My Dashboard</li>
			</ol>
		</div>
	</div>
	<!-- /breadcrumbs -->
	<!-- CONTENT section -->
	<div id="pageContent">
		<div class="container">
			<!-- two col -->
			<div class="row">
				<!-- left-col -->
				<aside class="col-md-3">
					<!-- title -->
					<?=Import::page("sayfalar/profil/profilyan","",true) ?>
				</aside>
				<!-- /left-col -->
				<div class="divider divider--lg  visible-sm visible-xs"></div>
				<!-- center-col -->
				<div class="col-md-9">
					<!-- title -->
					<div class="title-box">
						<h1 class="text-left text-uppercase title-under">Anasayfa</h1>
					</div>
					<!-- /title -->
					<p>
						<strong class="color-dark">Hoşgeldin , <?=$user->adi." ".$user->soyadi ?></strong>
					</p>
					<?=$user->hakkinda ?>
					<hr>
					<h3 class="color font22">Kullanıcı Bilgileri</h3>
					<div class="divider divider--lg "></div>
					<div class="row">
						<div class="col-md-12 col-lg-5">
							<a class="btn btn--ys btn--light pull-right" href="<?=baseurl("profil/duzenle"); ?>"><span class="icon icon-create"></span> Düzenle</a>
							<h4>İletişim Bilgileri</h4>
							<p><?=$user->adi." ".$user->soyadi ?></p>
							<p><?=$user->email ?></p>
							<a class="color text-uppercase font-middle font13" href="<?=baseurl("profil/sifredegis") ?>">Şifre Değitşir</a>
						</div>
						<div class="divider divider--lg visible-md visible-sm visible-xs "></div>
						<div class="col-md-12 col-md-offset-0 col-lg-5 col-lg-offset-2">
							<a class="btn btn--ys btn--light pull-right" href="#"><span class="icon icon-create"></span> Düzenle</a>
							<h4>NEWSLETTERS</h4>
							<p>You are currently not subscribed to any newsletter.</p>


						</div>
					</div>
					<div class="divider divider--lg "></div>
					<a class="btn btn--ys btn--light pull-right" href="#"><span class="icon icon-create"></span> Manage Addresses</a>
					<h4>Adreslerim</h4>
					<div class="row">
						<div class="col-lg-12 col-xl-5">

							<p><strong class="color-dark">Default billing address</strong></p>
							<p>You have not set a default billing address.</p>
							<a class="color text-uppercase font-middle font13" href="#">Edit Address</a>
						</div>
						<div class="divider divider--lg hidden-xl "></div>
						<div class="col-lg-12 col-lg-offset-0 col-xl-5 col-xl-offset-2">
							<h4>Default Shipping address</h4>
							<p>You have not set a default shipping address.</p>
							<a class="color text-uppercase font-middle font13" href="#">Edit Address</a>

						</div>
					</div>
				</div>
				<!-- /center-col -->
			</div>
			<!-- /two col -->
		</div>
	</div>
	<!-- End CONTENT section -->
