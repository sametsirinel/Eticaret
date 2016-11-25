<div class="global-wrap">
			<div class="top-main-area">
					<div class="container">
							<div class="row">
									<div class="col-md-2">
											<a href="index.html" class="logo mt5">
													<img src="<?php echo baseurl(UPLOADS_DIR) ?>logo-small-dark.png" alt="Image Alternative text" title="Image Title">
											</a>
									</div>
									<div class="col-md-6 col-md-offset-4">
											<div class="pull-right">
													<ul class="login-register">
															<li class="shopping-cart shopping-cart-white"><a href="page-cart.html"><i class="fa fa-shopping-cart"></i>Sepet ( <?=Cart::totalItems() ?> )</a>
																	<div class="shopping-cart-box">
																			<ul class="shopping-cart-items">
																				<?php $sayi = 0; ?>
																				<?php if(!empty(Cart::selectItems())){ ?>
																					<?php foreach(Cart::selectItems() as $item){ ?>
																						<li>
																							<a href="product-shop-sidebar.html">
																								<img src="<?php echo baseurl(UPLOADS_DIR) ?>70x70.png" alt="Image Alternative text" title="AMaze">
																								<h5><?=$item["baslik"] ?></h5>
																								<span class="shopping-cart-item-price">Fiyat : <?=$item["price"] ?> <i class="fa fa-try"></i>  -   Adet : <?=$item["quantity"] ?></span></a>
																						</li>
																						<?php

																							$sayi++;

																							if($sayi==5)
																								break;

																						?>
																					<?php } ?>
																				<?php }else{ ?>
																					<li class="text-center">Sepetinizde Ürün Bulunamadı</li>
																				<?php } ?>
																			</ul>
																			<ul class="list-inline text-center shopping-cart-items">
																					<li>Ürünler : <?=!empty(Cart::totalItems()) ? Cart::totalItems() : 0; ?></li>
																					<li>Total : <?=!empty(Cart::totalPrices()) ? Cart::totalItems() : 0; ?> <i class="fa fa-try"></i></a>
																					</li>
																			</ul>
																			<ul class="list-inline text-center">
																					<li><a href="<?=baseurl("sepet") ?>"><i class="fa fa-shopping-cart"></i> Tümünü Gör</a>
																					</li>
																					<li><a href="page-checkout.html"><i class="fa fa-check-square"></i> Satın Al</a>
																					</li>
																			</ul>
																	</div>
															</li>
															<?php if(User::check()){ ?>
																<li><a  href="<?=baseurl("siparisler")?>" data-effect="mfp-move-from-top"><i class="fa fa-truck"></i>Siparişlerim</a>
																</li>
																<li><a href="<?=baseurl("profil")?>" data-effect="mfp-move-from-top"><i class="fa fa-edit"></i>Profilim</a>
																</li>
																<li><a href="<?=baseurl("cikis")?>" data-effect="mfp-move-from-top"><i class="fa fa-sign-out"></i>Çıkış Yap</a>
																</li>
															<?php }else{ ?>
																<li><a  href="<?=baseurl("giris")?>" data-effect="mfp-move-from-top"><i class="fa fa-sign-in"></i>Giriş Yap</a>
																</li>
																<li><a href="<?=baseurl("kayit")?>" data-effect="mfp-move-from-top"><i class="fa fa-edit"></i>Sign up</a>
																</li>
															<?php } ?>
													</ul>
											</div>
									</div>
							</div>
					</div>
			</div>
			<header class="main">
					<div class="container">
							<div class="row">
									<div class="col-md-6">
											<!-- MAIN NAVIGATION -->
											<div class="flexnav-menu-button" id="flexnav-menu-button">Menu</div>
											<nav>
													<ul class="nav nav-pills flexnav" id="flexnav" data-breakpoint="800">
															 <li><a href="<?=baseurl() ?>"><i class="fa fa-home"></i> Anasayfa</a></li>
						</ul>
											</nav>
											<!-- END MAIN NAVIGATION -->
									</div>
								 <div class="col-md-6">
											<div class="pull-right">
													<div class="header-search-bar">
															<label>Birşeyler Arayın :</label>
															<input type="text" placeholder="aramak istediğiniz ürün adını giriniz">
															<button><i class="fa fa-search"></i>
															</button>
													</div>
											</div>
									</div>
			</div>
					</div>
			</header>


	<?php if(Uri::segment(1)=="" || Uri::segment(1)=="anasayfa"){ ?>

		<div class="top-area">
			<div class="owl-carousel owl-slider" id="owl-carousel-slider" data-inner-pagination="true" data-white-pagination="true">
				<div>
					<div class="bg-holder">
						<img src="<?php echo baseurl(UPLOADS_DIR) ?>1200x480.png" alt="Image Alternative text" title="Branding  iPad Interactive Design" />
						<div class="vert-center text-white text-center slider-caption">
							<h2 class="text-uc">New Bloke Collection</h2>
							<p class="text-bigger">Egestas et est aenean ipsum lorem fringilla</p>
							<p class="text-hero">Save up to 30%</p><a class="btn btn-lg btn-ghost btn-white" href="#">Shop Now</a>
						</div>
					</div>
				</div>
				<div>
					<div class="bg-holder">
						<img src="<?php echo baseurl(UPLOADS_DIR) ?>1200x480.png" alt="Image Alternative text" title="Hot mixer" />
						<div class="vert-center text-white text-center slider-caption">
							<h2 class="text-uc">Modern DJ Sets</h2>
							<p class="text-bigger">Justo cursus ridiculus erat et varius est</p>
							<p class="text-hero">Save up to 70%</p><a class="btn btn-lg btn-ghost btn-white" href="#">Shop Now</a>
						</div>
					</div>
				</div>
				<div>
					<div class="bg-holder">
						<img src="<?php echo baseurl(UPLOADS_DIR) ?>1200x480.png" alt="Image Alternative text" title="iPhone 5 iPad mini iPad 3" />
						<div class="vert-center text-white text-center slider-caption">
							<h2 class="text-uc">Gatgets Giveaway</h2>
							<p class="text-bigger">Erat lacus praesent montes aptent eget venenatis</p>
							<p class="text-hero">Save up to 30%</p><a class="btn btn-lg btn-ghost btn-white" href="#">Shop Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>

			<!-- SEARCH AREA -->
			<form class="search-area form-group">
					<div class="container">
					</div>
			</form>

			<!-- END SEARCH AREA -->

			<div class="gap"></div>



			<div class="container">
		<?php if(Uri::segment(1)=="" || Uri::segment(1)=="anasayfa"){ ?>
					<div class="row">
							<div class="col-md-3">
									<aside class="sidebar-left">
											<h3 class="mb20 text-center">I am looking for</h3>
											<ul class="nav nav-tabs nav-stacked nav-coupon-category nav-coupon-category-left">
													<li><a href="#"><i class="fa fa-cutlery"></i>Food & Drink</a>
													</li>
													<li><a href="#"><i class="fa fa-calendar"></i>Events</a>
													</li>
													<li><a href="#"><i class="fa fa-female"></i>Beauty</a>
													</li>
													<li><a href="#"><i class="fa fa-bolt"></i>Fitness</a>
													</li>
													<li><a href="#"><i class="fa fa-headphones"></i>Electronics</a>
													</li>
													<li><a href="#"><i class="fa fa-image"></i>Furniture</a>
													</li>
													<li><a href="#"><i class="fa fa-umbrella"></i>Fashion</a>
													</li>
													<li><a href="#"><i class="fa fa-shopping-cart"></i>Shopping</a>
													</li>
													<li><a href="#"><i class="fa fa-home"></i>Home & Graden</a>
													</li>
													<li><a href="#"><i class="fa fa-plane"></i>Travel</a>
													</li>
											</ul>
									</aside>
							</div>
							<div class="col-md-9">
									<h1 class="mb20 text-center">Weekly Featured <small><a href="#">View All</a></small></h1>
									<div class="row row-wrap">
											<div class="col-md-4">
													<div class="product-thumb">
															<header class="product-header">
																	<img src="<?php echo baseurl(UPLOADS_DIR) ?>800x600.png" alt="Image Alternative text" title="Ana 29" />
															</header>
															<div class="product-inner">
																	<ul class="icon-group icon-list-rating icon-list-non-rated" title="not rated yet">
																			<li><i class="fa fa-star"></i>
																			</li>
																			<li><i class="fa fa-star"></i>
																			</li>
																			<li><i class="fa fa-star"></i>
																			</li>
																			<li><i class="fa fa-star"></i>
																			</li>
																			<li><i class="fa fa-star"></i>
																			</li>
																	</ul>
																	<h5 class="product-title">Hot Summer Collection</h5>
																	<p class="product-desciption">Nibh imperdiet nascetur inceptos maecenas suscipit natoque diam</p>
																	<div class="product-meta">
																			<ul class="product-price-list">
																					<li><span class="product-price">$69</span>
																					</li>
																					<li><span class="product-old-price">$224</span>
																					</li>
																					<li><span class="product-save">Save 31%</span>
																					</li>
																			</ul>
																			<ul class="product-actions-list">
																					<li><a class="btn btn-sm" href="#"><i class="fa fa-shopping-cart"></i> To Cart</a>
																					</li>
																					<li><a class="btn btn-sm"><i class="fa fa-bars"></i> Details</a>
																					</li>
																			</ul>
																	</div>
															</div>
													</div>
											</div>
											<div class="col-md-4">
													<div class="product-thumb">
															<header class="product-header">
																	<img src="<?php echo baseurl(UPLOADS_DIR) ?>800x600.png" alt="Image Alternative text" title="the best mode of transport here in maldives" />
															</header>
															<div class="product-inner">
																	<ul class="icon-group icon-list-rating" title="3.4/5 rating">
																			<li><i class="fa fa-star"></i>
																			</li>
																			<li><i class="fa fa-star"></i>
																			</li>
																			<li><i class="fa fa-star"></i>
																			</li>
																			<li><i class="fa fa-star-half-empty"></i>
																			</li>
																			<li><i class="fa fa-star-o"></i>
																			</li>
																	</ul>
																	<h5 class="product-title">Finshing in Maldives</h5>
																	<p class="product-desciption">Nibh imperdiet nascetur inceptos maecenas suscipit natoque diam</p>
																	<div class="product-meta">
																			<ul class="product-price-list">
																					<li><span class="product-price">$176</span>
																					</li>
																			</ul>
																			<ul class="product-actions-list">
																					<li><a class="btn btn-sm" href="#"><i class="fa fa-shopping-cart"></i> To Cart</a>
																					</li>
																					<li><a class="btn btn-sm"><i class="fa fa-bars"></i> Details</a>
																					</li>
																			</ul>
																	</div>
															</div>
													</div>
											</div>
											<div class="col-md-4">
													<div class="product-thumb">
															<header class="product-header">
																	<img src="<?php echo baseurl(UPLOADS_DIR) ?>800x600.png" alt="Image Alternative text" title="Hot mixer" />
															</header>
															<div class="product-inner">
																	<ul class="icon-group icon-list-rating icon-list-non-rated" title="not rated yet">
																			<li><i class="fa fa-star"></i>
																			</li>
																			<li><i class="fa fa-star"></i>
																			</li>
																			<li><i class="fa fa-star"></i>
																			</li>
																			<li><i class="fa fa-star"></i>
																			</li>
																			<li><i class="fa fa-star"></i>
																			</li>
																	</ul>
																	<h5 class="product-title">Modern DJ Set</h5>
																	<p class="product-desciption">Nibh imperdiet nascetur inceptos maecenas suscipit natoque diam</p>
																	<div class="product-meta">
																			<ul class="product-price-list">
																					<li><span class="product-price">$276</span>
																					</li>
																			</ul>
																			<ul class="product-actions-list">
																					<li><a class="btn btn-sm" href="#"><i class="fa fa-shopping-cart"></i> To Cart</a>
																					</li>
																					<li><a class="btn btn-sm"><i class="fa fa-bars"></i> Details</a>
																					</li>
																			</ul>
																	</div>
															</div>
													</div>
											</div>
									</div>
							</div>
					</div>

		<?php } ?>
		<?=$sayfa ?>
			</div>


			<!-- //////////////////////////////////
//////////////END PAGE CONTENT/////////
////////////////////////////////////-->



			<!-- //////////////////////////////////
//////////////MAIN FOOTER//////////////
////////////////////////////////////-->

			<footer class="main">
					<div class="footer-top-area">
							<div class="container">
									<div class="row row-wrap">
											<div class="col-md-3">
													<a href="index.html">
															<img src="<?php echo baseurl(UPLOADS_DIR) ?>logo.png" alt="logo" title="logo" class="logo">
													</a>
													<ul class="list list-social">
															<li>
																	<a class="fa fa-facebook box-icon" href="#" data-toggle="tooltip" title="Facebook"></a>
															</li>
															<li>
																	<a class="fa fa-twitter box-icon" href="#" data-toggle="tooltip" title="Twitter"></a>
															</li>
															<li>
																	<a class="fa fa-flickr box-icon" href="#" data-toggle="tooltip" title="Flickr"></a>
															</li>
															<li>
																	<a class="fa fa-linkedin box-icon" href="#" data-toggle="tooltip" title="LinkedIn"></a>
															</li>
															<li>
																	<a class="fa fa-tumblr box-icon" href="#" data-toggle="tooltip" title="Tumblr"></a>
															</li>
													</ul>
													<p>Convallis morbi lobortis laoreet augue fermentum class congue tempor montes purus vitae quam augue inceptos nunc justo erat mauris cursus</p>
											</div>
											<div class="col-md-3">
													<h4>Sign Up to the Newsletter</h4>
													<div class="box">
															<form>
																	<div class="form-group mb10">
																			<label>E-mail</label>
																			<input type="text" class="form-control" />
																	</div>
																	<p class="mb10">Facilisis feugiat pulvinar nullam nec fusce purus</p>
																	<input type="submit" class="btn btn-primary" value="Sign Up" />
															</form>
													</div>
											</div>
											<div class="col-md-3">
													<h4>Couponia on Twitter</h4>
													<!-- START TWITTER -->
													<div class="twitter-ticker" id="twitter-ticker"></div>
													<!-- END TWITTER -->
											</div>
											<div class="col-md-3">
													<h4>Recent News</h4>
													<ul class="thumb-list">
															<li>
																	<a href="#">
																			<img src="<?php echo baseurl(UPLOADS_DIR) ?>70x70.png" alt="Image Alternative text" title="Urbex Esch/Lux with Laney and Laaaaag" />
																	</a>
																	<div class="thumb-list-item-caption">
																			<p class="thumb-list-item-meta">Jul 18, 2014</p>
																			<h5 class="thumb-list-item-title"><a href="#">Cubilia enim</a></h5>
																			<p class="thumb-list-item-desciption">Sem ullamcorper iaculis convallis imperdiet</p>
																	</div>
															</li>
															<li>
																	<a href="#">
																			<img src="<?php echo baseurl(UPLOADS_DIR) ?>70x70.png" alt="Image Alternative text" title="AMaze" />
																	</a>
																	<div class="thumb-list-item-caption">
																			<p class="thumb-list-item-meta">Jul 18, 2014</p>
																			<h5 class="thumb-list-item-title"><a href="#">Blandit suscipit</a></h5>
																			<p class="thumb-list-item-desciption">Aptent accumsan curabitur aptent condimentum</p>
																	</div>
															</li>
															<li>
																	<a href="#">
																			<img src="<?php echo baseurl(UPLOADS_DIR) ?>70x70.png" alt="Image Alternative text" title="The Hidden Power of the Heart" />
																	</a>
																	<div class="thumb-list-item-caption">
																			<p class="thumb-list-item-meta">Jul 18, 2014</p>
																			<h5 class="thumb-list-item-title"><a href="#">Tortor venenatis</a></h5>
																			<p class="thumb-list-item-desciption">Ut tempus rhoncus suscipit vitae</p>
																	</div>
															</li>
													</ul>
											</div>
									</div>
							</div>
					</div>
					<div class="footer-copyright">
							<div class="container">
									<div class="row">
											<div class="col-md-4">
													<p>Copyright © 2014, Your Store, All Rights Reserved</p>
											</div>
											<div class="col-md-6 col-md-offset-2">
													<div class="pull-right">
															<ul class="list-inline list-payment">
																	<li>
																			<img src="<?php echo baseurl(UPLOADS_DIR) ?>payment/american-express-curved-32px.png" alt="Image Alternative text" title="Image Title" />
																	</li>
																	<li>
																			<img src="<?php echo baseurl(UPLOADS_DIR) ?>payment/cirrus-curved-32px.png" alt="Image Alternative text" title="Image Title" />
																	</li>
																	<li>
																			<img src="<?php echo baseurl(UPLOADS_DIR) ?>payment/discover-curved-32px.png" alt="Image Alternative text" title="Image Title" />
																	</li>
																	<li>
																			<img src="<?php echo baseurl(UPLOADS_DIR) ?>payment/ebay-curved-32px.png" alt="Image Alternative text" title="Image Title" />
																	</li>
																	<li>
																			<img src="<?php echo baseurl(UPLOADS_DIR) ?>payment/maestro-curved-32px.png" alt="Image Alternative text" title="Image Title" />
																	</li>
																	<li>
																			<img src="<?php echo baseurl(UPLOADS_DIR) ?>payment/mastercard-curved-32px.png" alt="Image Alternative text" title="Image Title" />
																	</li>
																	<li>
																			<img src="<?php echo baseurl(UPLOADS_DIR) ?>payment/visa-curved-32px.png" alt="Image Alternative text" title="Image Title" />
																	</li>
															</ul>
													</div>
											</div>
									</div>
							</div>
					</div>
			</footer>
	<script src="<?php echo baseurl(SCRIPTS_DIR) ?>sweetalert.min.js"></script>
	<script type="text/javascript">

		$(function(){

			$(".swal").click(function(){

				var a = $(this);

				swal({

						title: a.attr("title"),
						text: a.attr("data-text"),
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						cancelButtonText:"İptal",
						confirmButtonText: "Evet , devam et ",
						closeOnConfirm: false

				}, function(){

					window.location = a.attr("data-href");

				});

				return false;

			});

		});

	</script>


			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>boostrap.min.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>countdown.min.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>flexnav.min.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>magnific.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>tweet.min.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>fitvids.min.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>mail.min.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>ionrangeslider.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>icheck.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>fotorama.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>card-payment.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>owl-carousel.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>masonry.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>nicescroll.js"></script>
			<script src="<?php echo baseurl(SCRIPTS_DIR) ?>custom.js"></script>
	</div>
