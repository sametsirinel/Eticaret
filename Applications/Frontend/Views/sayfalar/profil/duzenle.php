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
            <?=Warning::get();?>
            <form action="<?=baseurl("profil/duzenleniyor/"); ?>" method="post">
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label for="">Adınız</label>
										<input type="text" name="adi" value="<?=$user->adi ?>" class="form-control">
									</div>
									<div class="col-md-6">
										<label for="">Soyadınız</label>
										<input type="text" name="soyadi" value="<?=$user->soyadi ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="">Email Adresiniz</label>
								<input type="text" name="email" value="<?=$user->email ?>" class="form-control">
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label for="">Doğum Tarihiniz</label>
										<input type="date" name="dtarihi" max="2100-12-31" min="1900-01-01" value="<?=$user->dtarihi ?>" class="form-control">
									</div>
									<div class="col-md-6">
										<label for="">Cinsiyetiniz</label>
										<select name="cinsiyet" class="form-control">
											<option <?=$user->cinsiyet==0 ? "selected" : ""; ?> value="0">Kadın</option>
											<option <?=$user->cinsiyet==1 ? "selected" : ""; ?> value="1">Erkek</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="">Telefon Numaranız</label>
								<input type="text" name="tel" value="<?=$user->tel ?>" placeholder="xxxx xxx xx xx" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Hakkınızda </label>
								<textarea type="text" name="hakkinda" class="form-control"><?=$user->hakkinda ?></textarea>
							</div>
 							<input type="submit" value="Bilgileri Güncelle" class="btn btn-success pull-right">

						</form>
          </div>
				<!-- /center-col -->
			</div>
			<!-- /two col -->
		</div>
	</div>
	<!-- End CONTENT section -->
