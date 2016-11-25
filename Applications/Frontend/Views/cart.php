			<div class="row" style="padding-bottom:200px;">
				<div class="col-md-12"><?php echo Warning::get(); ?></div>
                <div class="col-md-8">
					<form action="<?=baseurl("sepet/guncelle") ?>" method="post">
						<table class="table cart-table">
							<thead>
								<tr>
									<th>Resim</th>
									<th>Ürün Adı</th>
									<th>Miktarı</th>
									<th>Fiyatı</th>
									<th>Sepetten Çıkar</th>
								</tr>
							</thead>
							<tbody>
								<?php

									// $urun = array(

										// "name" => 5,
										// "quantity" => 1,
										// "price" => 13,
										// "baslik"=> "Bir kaç ürün ekleyelim",
										// "seo_link"=>"bir-kac-urun-ekleyelim"

									// );

									// Cart::insertItem($urun);

								?>
								<?php if(Cart::selectItems()){ ?>
									<?php foreach(Cart::selectItems() as $item){ ?>
										<tr>
											<td class="cart-item-image">
												<a href="#">
													<img src="<?php echo baseurl(UPLOADS_DIR).$item["resmi"] ?>" style="width:100px;" alt="Image Alternative text" title="AMaze">
												</a>
											</td>
											<td><a href="#"><?=$item["baslik"] ?></a>
											</td>
											<td class="cart-item-quantity"><i class="fa fa-minus cart-item-minus"></i>
												<input type="text" name="adet[]" class="cart-quantity" value="<?=$item["quantity"] ?>"><i class="fa fa-plus cart-item-plus"></i>
												<input type="hidden" name="id[]" class="cart-quantity" value="<?=$item["name"] ?>">
											</td>
											<td><?=$item["price"] ?> <i class="fa fa-try"></i></td>
											<td class="cart-item-remove">
												<a class="fa fa-times" href="<?=baseurl("sepet/cikar/".$item["name"]); ?>"></a>
											</td>
										</tr>
									<?php } ?>
								<?php }else{ ?>
									<tr>
										<td class="text-center" colspan="4">
											Sepetinizde Ürün Bulunmamakta
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-refresh"></i> Sepeti Güncelle</button>
					</form>
						<a type="submit" class="btn btn-warning swal" href="JavaScript:;" data-href="<?=baseurl("sepet/tumCikar") ?>" title="Dikkat !" data-text="Sepeti boşaltmak istediğinizden eminmisiniz ? "><i class="fa fa-times"></i> Sepeti Boşalt</a>
                </div>
                <div class="col-md-3">
                    <ul class="cart-total-list">

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
                        <li><span>Ürün Fiyatı</span><span> <?=$miktar?> <i class="fa fa-try"></i></span>
                        </li>
                        <li><span>Kargo : </span><span><?=$kargo ?>  <i class="fa fa-try"></i></span>
                        </li>
                        <li><span>KDV : </span><span>%<?=$kdv ?> </span>
                        </li>
                        <li><span>Toplam</span><span><?=$total ?> <i class="fa fa-try"></i></span>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary btn-block">Alışverişi Tamamla</a>
                </div>
            </div>
			<div class="gap"></div>
