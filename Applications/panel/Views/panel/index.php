
        <div class="row">
			<div class="col-lg-3">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Kampanya Sayısı</h5>
					</div>
					<div class="ibox-content">
						<h1 class="no-margins"><?php echo $kampanyaSayi ?></h1>
						<small>Sitenizdeki tüm kampanyaların sayısı</small>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Kullanici Sayısı</h5>
					</div>
					<div class="ibox-content">
						<h1 class="no-margins"><?php echo $kullaniciSayi ?></h1>
						<small>Sitenizdeki tüm kullanıcıların sayısı</small>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Firma Sayısı</h5>
					</div>
					<div class="ibox-content">
						<h1 class="no-margins"><?php echo $firmaSayi ?></h1>
						<small>Sitenizdeki tüm firmaların sayısı</small>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>Kategori Sayısı</h5>
					</div>
					<div class="ibox-content">
						<h1 class="no-margins"><?php echo $kategoriSayi ?></h1>
						<small>Sitenizdeki tüm kategorilerin sayısı</small>
					</div>
				</div>
            </div>
        </div>
             <div class="row">
					<div class="col-lg-12">
						<?php echo Warning::get(); ?>
					</div>
					<div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Onay Bekleyen Yorumlar</h5>
                            </div>
                            <div class="ibox-content ibox-heading">
                                <h3><i class="fa fa-envelope-o"></i> Yeni Yorumlar </h3>
                                <small><i class="fa fa-tim"></i> İncelenmesi Gereken <?php echo $yorumSayi ?> Yeni Yorumunuz Var</small>
                            </div>
                            <div class="ibox-content">
                                <div class="feed-activity-list">
									<?php foreach($yorumlar as $yorum){ ?>
										<div class="feed-element">
											<div>
												<strong><?php echo $yorum->adi." ".$yorum->soyadi ?></strong>
												<div><?php echo $yorum->yorum ?></div>
												<small class="text-muted"><?php echo date("H:i - d.m.Y",strtotime($yorum->tarih))?> </small>
												<br/>
												<a href="<?php echo baseurl("panel/phome/yorumSil/".$yorum->id) ?>" class="btn btn-warning pull-right" style="margin:10px">Yorumu Sil</a>
												<a href="<?php echo baseurl("panel/phome/yorumOnlayla/".$yorum->id) ?>" class="btn btn-primary pull-right" style="margin:10px">Yorumu Onayla</a>
											</div>
										</div>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </div>