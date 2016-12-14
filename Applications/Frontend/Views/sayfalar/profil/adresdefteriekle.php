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
          <div class="col-md-8">
            <?=Warning::get();?>
            <form action="<?=baseurl("profil/adresEkleniyor/"); ?>" method="post">
							<div class="form-group">
								<label for="">Alıcı Adı Soyadı</label>
								<input type="text" name="adisoyadi" value="" placeholder="Adreslere özel alıcı belirtmek için kullanılır" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Adres Başlığı</label>
								<input type="text" name="baslik" value="" placeholder="Ev, İş adresi gibi adresinizi giriniz" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Adresiniz </label>
								<textarea type="text" rows="8" name="adres" placeholder="Adresinizi açık ve tam bir şekilde giriniz" class="form-control"></textarea>
							</div>
 							<input type="submit" value="Adresi Ekle" class="btn btn--ys btn--xl pull-right" style="margin-right:0px;">

						</form>
          </div>
				<!-- /center-col -->
			</div>
			<!-- /two col -->
		</div>
	</div>
	<!-- End CONTENT section -->
