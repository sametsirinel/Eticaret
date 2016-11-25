		
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			<?=Warning::get() ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1"> Ürün Bilgileri</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-4"> Urun Resimleri</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
										<form id="postform" action="<?=baseurl("panel/purunler/doEdit/".$id) ?>" method="post">
											<?php if(Session::select("postBack")){
												
												$row = json::decode(Session::select("postBack"));
											} ?>
											<fieldset class="form-horizontal">
												<div class="form-group"><label class="col-sm-2 control-label">Ürün Adı:</label>
													<div class="col-sm-10"><input type="text" value="<?php if(isset($row->adi)){ echo $row->adi;} ?>" name="adi" class="form-control" placeholder="Ürünün Adını Veya Kodunu Giriniz"></div>
												</div>
												<div class="form-group"><label class="col-sm-2 control-label">Ürün Fiyatı:</label>
													<div class="col-sm-10"><input type="text" value="<?php if(isset($row->fiyat)){ echo $row->fiyat;} ?>" name="fiyat" class="form-control" placeholder="100 TRY"></div>
												</div>
												<div class="form-group"><label class="col-sm-2 control-label">Ürün Açıklaması:</label>
													<div class="col-sm-10">
														<textarea class="input-block-level summernote" name="aciklama" id="summernote" name="content" rows="18">
															<?php if(isset($row->aciklama)){ echo $row->aciklama;} ?>
														</textarea>
													</div>
												</div>
												<div class="form-group"><label class="col-sm-2 control-label">Ürün Başlığı:</label>
													<div class="col-sm-10"><input name="baslik" value="<?php if(isset($row->baslik)){ echo $row->baslik;} ?>" type="text" class="form-control" placeholder="Ürün başlığı giriniz bu alan ürün listelenirken gözükecek alandır"></div>
												</div>
												<div class="form-group"><label class="col-sm-2 control-label">Ürün Kısa Açıklaması:</label>
													<div class="col-sm-10"><input type="text" value="<?php if(isset($row->kisaaciklama)){ echo $row->kisaaciklama;} ?>" name="kisaaciklama" class="form-control" placeholder="Ürün için kısa bir açıklama yazısı girin"></div>
												</div>
												<div class="form-group"><label class="col-sm-2 control-label">Ürün Etiketleri:</label>
													<div class="col-sm-10"><input type="text" value="<?php if(isset($row->etiketler)){ echo $row->etiketler;} ?>" name="etiketler" class="form-control" placeholder="Ürün Etiketleri giriniz google da bu etiketlerde arandığında cıkacaktır. Örnek 'bileklik,kolye,vs '"></div>
												</div>
												<div class="form-group"><label class="col-sm-2 control-label">Ürün Görünümü</label>
													<div class="col-sm-10">
														<label for="evet">
															<input type="radio" <?php if(isset($row->onay)){ if($row->onay==1 || $row->onay==2 || $row->onay==""){ echo "checked"; } } ?> name="onay" value="1" id="evet"/> Evet Gözüksün
														</label>
														<label for="hayir">
															<input type="radio" <?php if(isset($row->onay)){ if($row->onay==0){ echo "checked"; } } ?> name="onay" value="2" id="hayir"/> Hayır Gözükmesi
														</label>
													</div>
												</div>
												<button type="button" class="gosummer btn btn-primary btn-lg pull-right">Kaydet</button>
											</fieldset>
										</form>
                                    </div>
                                </div>
                               <div id="tab-4" class="tab-pane">
                                    <div class="panel-body">
										<input type="hidden" value="<?=$id ?>" id="urunId"/>
										<div class="row">
											<div class="col-md-6">
												<div class="image-crop">
													<img src="<?=baseurl(UPLOADS_DIR."noimg.jpg") ?>" >
												</div>
											</div>
											<div class="col-md-6">
												<h4>Resim Çıktısı</h4>
												<div class="img-preview img-preview-sm"></div>
												<h4>Resim İşlemleri</h4>
												<div class="btn-group">
													<label title="Upload image file" for="inputImage" class="btn btn-primary" style="margin:5px 5px 5px 0px">
														<input type="file" accept="image/jpeg" name="file" id="inputImage" class="hide">
														Resmi Seç 	
													</label>
													<label title="Donload image" id="download" class="btn btn-primary" style="margin:5px">Kırp ve Kaydet</label>
												</div>
												<div class="btn-group">
													<button class="btn btn-white" id="zoomIn" type="button">Resmi Büyüt</button>
													<button class="btn btn-white" id="zoomOut" type="button">Resmi Kücült</button>
													<button class="btn btn-white" id="rotateLeft" type="button">Sola Döndür</button>
													<button class="btn btn-white" id="rotateRight" type="button">Sağa Döndür</button>
												</div>
											</div>
										</div>
                                        <div class="table-responsive" style="margin-top:50px;">
                                            <table class="table table-bordered table-stripped">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        Resim Görüntüsü 
                                                    </th>
                                                    <th>
                                                        Resim Urlsi
                                                    </th>
                                                    <th>
                                                        İşlemler
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
													<?php foreach($urunResim as $resim){ ?>
														<tr>
															<td>
																<img src="<?=baseurl(UPLOADS_DIR.$resim->resmi) ?>">
															</td>
															<td>
																<input type="text" class="form-control" disabled value="<?=baseurl(UPLOADS_DIR.$resim->resmi) ?>">
															</td>
															<td>
																<a href="<?php echo baseurl("panel/".Uri::segment(1)."/resimSil/".$resim->id) ?>" class="btn btn-white"><i class="fa fa-trash"></i> </a>
															</td>
														</tr>
													<?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

        </div>