<div class="wrapper wrapper-content animated fadeIn">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Dosya Ekleme Alanı</h5>
					<div class="ibox-tools">
						<a href="<?php echo baseurl("panel/".Uri::segment(2)."/"); ?>">
							Geri Dön
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<form id="my-awesome-dropzone" class="dropzone dz-clickable" action="<?php echo baseurl("panel/pdosyalar/doInsert") ?>">
						<div class="dropzone-previews"></div>
						<button type="submit" class="btn btn-primary pull-right">Resimleri Ekle</button>
					<div class="dz-default dz-message"><span>Drop files here to upload</span></div></form>
				</div>
			</div>
		</div>
	</div>
</div>