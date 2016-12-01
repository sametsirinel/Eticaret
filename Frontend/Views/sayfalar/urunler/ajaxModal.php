<div class="modal-dialog white-modal">
  <div class="modal-content container">
    <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
     </div>
    <!--  -->
    <div class="product-popup">
      <div class="product-popup-content">
        <div class="container-fluid">
          <div class="row product-info-outer">
            <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
              <div class="product-main-image">
                <?php foreach($urunResimleri as $urunResmi){ ?>
                  <img src="<?=baseurl(UPLOADS_DIR.$urunResmi->resim) ?>" alt="Image Alternative text" title="Gamer Chick" />
                  <?php break; ?>
                <?php } ?>
              </div>
            </div>
            <div class="product-info col-xs-12 col-sm-7 col-md-6 col-lg-6">
              <div class="wrapper">
                <div class="product-info__sku pull-left">SKU: <strong>mtk012c</strong></div>
                <div class="product-info__availabilitu pull-right">Availability:   <strong class="color">In Stock</strong></div>
              </div>
              <div class="product-info__title">
                <h2><?=$urun->adi ?></h2>
              </div>
              <div class="price-box product-info__price"><span class="price-box__new fiyat"><?=$maxmin->min." - ".$maxmin->max; ?> <i class="fa fa-try"></i></span><!-- <span class="price-box__old">$84.00</span>--></div>
              <div class="divider divider--xs product-info__divider"></div>
              <div class="product-info__description">
                <div class="product-info__description__brand"><!--<img src="images/custom/brand.png" alt=""> --></div>
                <div class="product-info__description__text"><?=$urun->kisaaciklama ?><br/><a class="btn btn--ys btn-sm" href="<?=baseurl("detay/".$urun->seo_link."/".$urun->id) ?>"><i class="fa fa-search"></i> Detaylı İncele</a></div>
              </div>
              <div class="divider divider--xs product-info__divider"></div>
              <div class="wrapper">
                <form class="sepet-form" action="<?=baseurl("sepet/ekle/".$urun->id); ?>" method="post">
                  <div class="pull-left"><span class="option-label"><?=$urun->grupadi ?></div>
                  <div class="pull-right required">* Gerekli Alan</div>
                  <div class="clearfix"></div>
                  <ul class="options-swatch options-swatch--size options-swatch--lg select-attr">
                    <?php foreach($urunOzellikleri as $urunozellik){ ?>
                      <li><a href="Javascript:;" class="" data-fiyat="<?=$urunozellik->fiyat ?>"><?=$urunozellik->ozellikadi ?></a></li>
                    <?php } ?>
                  </ul>
                </form>

              </div>


              <div class="divider divider--sm"></div>
              <div class="wrapper">
                <div class="pull-left"><span class="qty-label">Miktar:</span></div>
                <div class="pull-left"><input type="text" name="quantity" class="input--ys qty-input pull-left" value="1"></div>
                <div class="pull-left"><button type="submit" class="btn btn--ys btn--xxl"><span class="icon icon-shopping_basket"></span> Sepete Ekle</button></div>
              </div>
              <ul class="product-link">
                <li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Favorilere ekle</span></a></li>
                <li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#"><span class="text">Add to compare</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / -->
  </div>
</div>

	<script src="<?=baseurl(SCRIPTS_DIR); ?>jquery.js"></script>

	<script type="text/javascript">

		$(function(){

			$(".select-attr a").click(function(){
        $(".select-attr li").removeClass("active");
				$(this).parent().addClass("active");
				var id = $(this).attr("data-fiyat");
				$(".fiyat").html(id+" <i class='fa fa-try'></i>");

			});

			$(".btn-sepet-submit").click(function(){

				$(".sepet-form").submit();

			});

		});

	</script>
