
<div class="breadcrumbs">
			<div class="container">
				<ol class="breadcrumb breadcrumb--ys pull-left">
					<li class="home-link"><a href="<?=baseurl(); ?>" class="icon icon-home"></a></li>
					<li class="active"><a href="<?=baseurl("sepet"); ?>">Sepet</a></li>
				</ol>
			</div>
		</div>
<div id="pageContent">
			<div class="container">
				<!-- title -->
				<div class="title-box">
					<h1 class="text-center text-uppercase title-under">SHOPPING CART</h1>
				</div>
				<!-- /title -->
				<!-- Shopping cart table -->
				<form action="<?=baseurl("sepet/guncelle") ?>" method="post">
				<div class="container-widget">
					<table class="shopping-cart-table">
						<thead>
							<tr>
								<th>Resim</th>
								<th>Ürün Özellikleri</th>
								<th>Fiyatı</th>
								<th>Miktarı</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>

							<?php if(Cart::selectItems()){ ?>
								<?php foreach(Cart::selectItems() as $item){ ?>

									<tr>
										<td>
											<div class="shopping-cart-table__product-image">
												<a href="<?=baseurl("detay/{$item["seo_link"]}/{$item["id"]}") ?>">
													<img class="img-responsive" src="<?php echo baseurl(UPLOADS_DIR).$item["resmi"] ?>" alt="">
												</a>
											</div>
										</td>
										<td>
											<h5 class="shopping-cart-table__product-name text-left text-uppercase">
												<a href="<?=baseurl("detay/{$item["seo_link"]}/{$item["id"]}") ?>"><?=$item["baslik"] ?></a>
											</h5>
											<ul class="shopping-cart-table__list-parameters">
												<li>
													<span>Color:</span> Purple
												</li>
												<li>
													<span>Quantity:</span> 200
												</li>
												<li>
													<span>Image:</span> No
												</li>
												<li>
													<span>Paper:</span> Type Linen
												</li>
												<li>
													<span>Size:</span> 4"x3.5"
												</li>
												<li class="visible-xs">
													<span>Qty:</span>
													<!--  -->
													<div class="number input-counter">
													    <span class="minus-btn"></span>
      												<input type="text" ><i class="fa fa-plus cart-item-plus"></i>
      												<input type="hidden" name="id[]" value="<?=$item["name"] ?>">
													    <span class="plus-btn"></span>
													</div>
													<!-- / -->
												</li>
											</ul>
										</td>
										<td>
											<div class="shopping-cart-table__input">
												<!--  -->
												<div class="number input-counter">
												    <span class="minus-btn"></span>
												    <input type="text" name="adet[]" value="<?=$item["quantity"] ?>">
												    <span class="plus-btn"></span>
												</div>
												<!-- / -->
											</div>
										</td>
										<td>
											<div class="shopping-cart-table__product-price subtotal">
													<?=$item["price"] ?>
											</div>
										</td>
										<td>
											<a class="shopping-cart-table__delete icon icon-clear" href="<?=baseurl("sepet/cikar/".$item["name"]); ?>"></a>
										</td>
									</tr>
								<?php } ?>
							<?php }else{ ?>
								<tr>
									<td class="text-center" colspan="5">
										Sepetinizde Ürün Bulunmamakta
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /Shopping cart table -->
				<div class="divider divider--xs"></div>
				<div class="clearfix shopping-cart-btns">
					<button class="btn btn--ys btn--light pull-right" ><span class="icon icon-autorenew"></span>Sepeti Güncelle</button>
					<div class="divider divider--xs visible-xs"></div>
		            <a class="btn btn--ys btn--light" href="JavaScript:;" data-href="<?=baseurl("sepet/tumCikar") ?>" title="Dikkat !" data-text="Sepeti boşaltmak istediğinizden eminmisiniz ? "><span class="icon icon-delete"></span>Sepeti Boşalt</a>
		            <div class="divider divider--xs visible-xs"></div>
		            <a class="btn btn--ys btn--light pull-left btn-right" href="#"><span class="icon icon-keyboard_arrow_left"></span>CONTINUE SHOPPING </a>
		            <div class="divider divider--xs visible-xs"></div>

		        </div>
				<div class="divider--md"></div>
			</form>
				<div class="row">
					<div class="col-md-4">
						<div class="card card--padding">
							<h4>ESTIMATE SHIPPING AND TAX</h4>
							<p>Enter your destination to get a shipping estimate.</p>
							<form>
								<div class="form-group">
									<label for="selectCountry">Country <sup>*</sup></label>
									<select id="selectCountry" class="form-control selectpicker  bs-select-hidden" data-style="select--ys" data-width="100%">
										<option>Austria </option>
					                    <option>Belgium</option>
					                    <option>Cyprus </option>
					                    <option>Croatia </option>
					                    <option>Czech Republic </option>
					                    <option>Denmark </option>
					                    <option>Finland </option>
					                    <option>France </option>
					                    <option>Germany </option>
					                    <option>Greece </option>
					                    <option>Hungary </option>
					                    <option>Ireland </option>
					                    <option>France </option>
					                    <option>Italy </option>
					                    <option>Luxembourg </option>
					                    <option>Netherlands </option>
					                    <option>Poland </option>
					                    <option>Portugal </option>
					                    <option>Slovakia </option>
					                    <option>Slovenia </option>
					                    <option>Spain </option>
					                    <option>United Kingdom </option>
					                </select><div class="btn-group bootstrap-select form-control" style="width: 100%;"><button type="button" class="btn dropdown-toggle select--ys" data-toggle="dropdown" data-id="selectCountry" title="Austria"><span class="filter-option pull-left">Austria </span>&nbsp;<span class="caret"></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="selected"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Austria </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Belgium</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Cyprus </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Croatia </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Czech Republic </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Denmark </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Finland </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">France </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="8"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Germany </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="9"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Greece </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="10"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Hungary </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="11"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Ireland </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="12"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">France </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="13"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Italy </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="14"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Luxembourg </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="15"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Netherlands </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="16"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Poland </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="17"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Portugal </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="18"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Slovakia </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="19"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Slovenia </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="20"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Spain </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="21"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">United Kingdom </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div></div>
								</div>
								<div class="form-group">
									<label for="selectState">State/Province <sup>*</sup></label>
									<select id="selectState" class="form-control selectpicker  bs-select-hidden" data-style="select--ys" data-width="100%">
										<option>State/Province </option>
					                    <option>Austria </option>
					                    <option>Belgium</option>
					                    <option>Cyprus </option>
					                    <option>Croatia </option>
					                    <option>Czech Republic </option>
					                    <option>Denmark </option>
					                    <option>Finland </option>
					                    <option>France </option>
					                    <option>Germany </option>
					                    <option>Greece </option>
					                    <option>Hungary </option>
					                    <option>Ireland </option>
					                    <option>France </option>
					                    <option>Italy </option>
					                    <option>Luxembourg </option>
					                    <option>Netherlands </option>
					                    <option>Poland </option>
					                    <option>Portugal </option>
					                    <option>Slovakia </option>
					                    <option>Slovenia </option>
					                    <option>Spain </option>
					                    <option>United Kingdom </option>
									</select><div class="btn-group bootstrap-select form-control" style="width: 100%;"><button type="button" class="btn dropdown-toggle select--ys" data-toggle="dropdown" data-id="selectState" title="State/Province"><span class="filter-option pull-left">State/Province </span>&nbsp;<span class="caret"></span></button><div class="dropdown-menu open"><ul class="dropdown-menu inner" role="menu"><li data-original-index="0" class="selected"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">State/Province </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Austria </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Belgium</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Cyprus </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Croatia </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Czech Republic </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Denmark </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Finland </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="8"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">France </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="9"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Germany </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="10"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Greece </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="11"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Hungary </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="12"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Ireland </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="13"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">France </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="14"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Italy </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="15"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Luxembourg </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="16"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Netherlands </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="17"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Poland </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="18"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Portugal </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="19"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Slovakia </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="20"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Slovenia </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="21"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">Spain </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="22"><a tabindex="0" class="" style="" data-tokens="null"><span class="text">United Kingdom </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div></div>
								</div>
								<div class="form-group">
							      <label for="inputCity">City</label>
							      <input type="text" class="form-control" id="inputCity">
							    </div>
							    <div class="form-group">
							      <label for="inputZip">Zip/Postal Code</label>
							      <input type="text" class="form-control" id="inputZip">
							    </div>
							    <button type="submit" class="btn btn-top btn--ys btn--light">Get a quote</button>
							</form>
						</div>
					</div>
					<div class="divider--md visible-sm visible-xs"></div>
					<div class="col-md-4">
						<div class=" card card--padding">
							<h4>DISCOUNT CODES</h4>
							<form>
								<div class="form-group">
							      <label for="inputDiscountCodes">Enter your coupon code if you have one.</label>
							      <input type="text" class="form-control" id="inputDiscountCodes">
							    </div>
								<button type="submit" class="btn btn--ys btn-top btn--light">apply coupon</button>
							</form>
						</div>
					</div>
					<div class="divider--md visible-sm visible-xs"></div>
						<?php

							$miktar = Cart::totalPrices() ;
							$kargo = 5;
							$kdv = 18;
							if( $miktar == 0 ){

								$total = 0 ;$kargo =0;

							}else{

								$total =  $miktar + ( $miktar  * $kdv/100 ) + $kargo;

							}

						?>
					<div class="col-md-4">
						<div class="card card--padding">
							<table class="table-total">
								<tbody>
									<tr>
										<th class="text-left">Ürün Fiyatı</th>
										<td class="text-right"><?=$miktar?> <i class="fa fa-try"></i></td>
									</tr>
									<tr>
										<th class="text-left">Kargo : </th>
										<td class="text-right"><?=$kargo ?>  <i class="fa fa-try"></i></td>
									</tr>
									<tr>
										<th class="text-left">KDV :  </th>
										<td class="text-right"><?=$kdv ?> %  </td>
									</tr>
									<tr>
										<th class="text-left">Toplam : </th>
										<td class="text-right"><?=$total ?> <i class="fa fa-try"></i></td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th>Genel Toplam:</th>
										<td><?=$total ?> <i class="fa fa-try"></i></td>
									</tr>
								</tfoot>
							</table>
							<a href="#" class="btn btn--ys btn--full btn--xl">PROCEED TO CHECKOUT <span class="icon icon--flippedX icon-reply"></span></a>
							<div class="text-right link-top">
								<a class="link-underline" href="#">Checkout with Multiple Addresses</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
