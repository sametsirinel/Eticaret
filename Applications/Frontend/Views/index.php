			<div class="row row-wrap">
				<?php foreach($vitrinler as $vitrin){ ?>
                <div class="col-md-4">
                    <div class="product-banner">
                        <img src="<?php echo baseurl(UPLOADS_DIR).$vitrin->resmi ?>" alt="<?=$vitrin->adi ?>" title="<?=$vitrin->baslik ?>" />
                        <div class="product-banner-inner">
                            <h5><?=$vitrin->adi ?></h5><a class="btn btn-sm btn-white btn-ghost">Hemen İncele</a>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
            <div class="gap gap-small"></div>
            <h1 class="mb20 text-center">En Yeni Ürünler <small><a href="#">Hepsini Gör</a></small></h1>
            <div class="row row-wrap">
				<?php foreach($urunler as $urun){ ?>
					<div class="col-md-3">
						<div class="product-thumb">
							<header class="product-header"><span class="product-label label label-danger">Yeni</span>
								<img src="<?php echo baseurl(UPLOADS_DIR).$urun->resmi ?>" alt="<?=$urun->adi ?>" title="<?=$urun->baslik ?>" />
							</header>
							<div class="product-inner">
								<h5 class="product-title"><?=$urun->adi ?></h5>
								<p class="product-desciption" style="height:100px;"><?=$urun->kisaaciklama ?></p>
								<div class="product-meta">
									<ul class="product-price-list">
										<li><span class="product-price"><?=$urun->minfiyat==$urun->maxfiyat ? $urun->minfiyat : $urun->minfiyat.' <i class="fa fa-try"></i> - '.$urun->maxfiyat ; ?> <i class="fa fa-try"></i></span>
										</li>
									</ul>
									<p class="product-category"><strong >Kategorisi :</strong> furniture</p>
									<ul class="product-actions-list">
										<li><a class="btn btn-sm" href="#"><i class="fa fa-shopping-cart"></i> Sepete At</a>
										</li>
										<li><a href="<?=baseurl("urun/{$urun->seo_link}/{$urun->id}"); ?>" class="btn btn-sm"><i class="fa fa-bars"></i> Ürün Detayı</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
            </div>
            <div class="gap"></div>
