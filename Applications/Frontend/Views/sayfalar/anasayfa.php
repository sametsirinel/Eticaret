<div class="row row-wrap">
      <div class="gap gap-small"></div>
      <h1 class="mb20 text-center">En Yeni Ürünler <small><a href="#">Hepsini Gör</a></small></h1>
      <div class="row row-wrap">
  <?php foreach($urunler as $urun){ ?>
    <div class="col-md-4">
      <div class="product-banner">
        <a href="<?=baseurl("detay/".$urun->seo_link."/".$urun->id) ?>">
          <img src="<?php echo baseurl(UPLOADS_DIR).$urun->resmi ?>" alt="<?=ucwords(strtolower($urun->adi)) ?>" title="<?=$urun->baslik ?>" />
          <div class="product-banner-inner">
              <h5><?=ucwords(strtolower($urun->adi)) ?></h5><a class="btn btn-sm btn-white btn-ghost">Ürünü İncele</a>
          </div>
        </a>
      </div>
    </div>
  <?php } ?>
      </div>
      <div class="gap"></div>
    </div>
