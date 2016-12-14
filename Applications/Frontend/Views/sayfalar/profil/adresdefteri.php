
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
						<?=Warning::get(); ?>
						<a href="<?=baseurl("profil/adresdefteriekle"); ?>" class="btn btn--ys btn--xl pull-right" style="margin-right:0px;margin-bottom:20px; "><i class="fa fa-map-marker"></i> Adres Ekle</a>
		     		<table class="table table-params">
							<thead>
								<tr>
									<th>Alıcı Adı - Soyadı </th>
									<th>Adres Başlığı </th>
									<th>Adres </th>
									<th>İşlemler </th>
								</tr>
							</thead>
							<tbody>
								<?php if(count($adresler)<1){ ?>
									<tr>
										<td colspan="4" class="text-center">Henüz adres eklememişsiniz</td>
									</tr>
								<?php }else{ ?>
									<?php foreach($adresler as $adres){ ?>
										<tr>
											<td><?=$adres->adisoyadi ?></td>
											<td><?=$adres->baslik ?></td>
											<td><?=$adres->adres ?></td>
											<td><a href="<?=baseurl("profil/adresSil/".$adres->id); ?>"><i class="fa fa-trash"></i> Sil</a></td>
										</tr>
									<?php } ?>
								<?php } ?>
	            </tbody>
	          </table>
						<?php if(count($adresler)>0){ ?>
							<?=$pagination ?>
						<?php } ?>
				<!-- /center-col -->
			</div>
			<!-- /two col -->
		</div>
	</div>
	<!-- End CONTENT section -->
