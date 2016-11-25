
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
					<?=Warning::get() ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#tab-1"> Ürün Bilgileri</a></li>
							<li class=""><a data-toggle="tab" href="#tab-4"> Urun Resimleri</a></li>
							<li class=""><a data-toggle="tab" href="#kategoriler"> Urun Kategorileri</a></li>
							<li class=""><a data-toggle="tab" href="#ozellik"> Urun Özellikleri</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab-1" class="tab-pane active">
								<div class="panel-body">
									<form id="postform" action="<?=baseurl("panel/purunler/doEdit/".$row->id) ?>" method="post">
										<fieldset class="form-horizontal">
											<div class="form-group"><label class="col-sm-2 control-label">Ürün Adı:</label>
												<div class="col-sm-10"><input type="text" value="<?=$row->adi ?>" name="adi" class="form-control" placeholder="Ürünün Adını Veya Kodunu Giriniz"></div>
											</div>
											<div class="hr-line-dashed"></div>
											<div class="form-group"><label class="col-sm-2 control-label">Ürün Açıklaması:</label>
												<div class="col-sm-10">
													<textarea class="input-block-level summernote" name="aciklama" id="summernote" name="content" rows="18"><?=$row->aciklama ?>
													</textarea>
												</div>
											</div>
											<div class="hr-line-dashed"></div>
											<div class="form-group"><label class="col-sm-2 control-label">Ürün Başlığı:</label>
												<div class="col-sm-10"><input name="baslik" value="<?=$row->baslik ?>" type="text" class="form-control" placeholder="Ürün başlığı giriniz bu alan ürün listelenirken gözükecek alandır"></div>
											</div>
											<div class="hr-line-dashed"></div>
											<div class="form-group"><label class="col-sm-2 control-label">Ürün Kısa Açıklaması:</label>
												<div class="col-sm-10"><input type="text" value="<?=$row->kisaaciklama ?>" name="kisaaciklama" class="form-control" placeholder="Ürün için kısa bir açıklama yazısı girin"></div>
											</div>
											<div class="hr-line-dashed"></div>
											<div class="form-group"><label class="col-sm-2 control-label">Ürün Etiketleri:</label>
												<div class="col-sm-10"><input type="text" value="<?=$row->etiketler ?>" name="etiketler" class="form-control" placeholder="Ürün Etiketleri giriniz google da bu etiketlerde arandığında cıkacaktır. Örnek 'bileklik,kolye,vs '"></div>
											</div>
											<div class="hr-line-dashed"></div>
											<div class="form-group"><label class="col-sm-2 control-label">Ürün Görünümü</label>
												<div class="col-sm-10">
													<label for="evet">
														<input type="radio" <?php if($row->onay==1 || $row->onay==2){ echo "checked"; } ?> name="onay" value="1" id="evet"/> Evet Gözüksün
													</label>
													<label for="hayir">
														<input type="radio" <?php if($row->onay==0){ echo "checked"; } ?> name="onay" value="2" id="hayir"/> Hayır Gözükmesi
													</label>
												</div>
											</div>
											<div class="hr-line-dashed"></div>
											<button type="button" class="gosummer btn btn-primary btn-lg pull-right">Kaydet</button>
										</fieldset>
									</form>
								</div>
							</div>
							<div id="tab-4" class="tab-pane">
								<div class="panel-body">
									<input type="hidden" value="<?=$row->id ?>" id="urunId"/>
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
							<div id="kategoriler" class="tab-pane">
								<div class="panel-body">
									<form action="<?=baseurl("panel/purunler/doKatEdit/".$row->id) ?>" method="post">
										<div class="hr-line-dashed"></div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Ürün Kategorileri : </label>
											<div class="col-sm-10">
												<div class="row">
													<?php foreach($kategoriler as $kategori){ ?>
														<?php $checked =""; ?>
														<?php foreach($urunKat as $kat){ if($kategori->id==$kat->katid){ $checked = "checked";break; } } ?>
														<label class="col-md-4">
															<input type="checkbox" <?=$checked ?> name="kategori[]" value="<?=$kategori->id?>"/> <?=$kategori->adi ?>
														</label>
													<?php } ?>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="hr-line-dashed"></div>
										<button class="btn btn-primary pull-right btn-lg" type="submit">Gönder</button>
									</form>
								</div>
							</div>
							<div id="ozellik" class="tab-pane">
									<div class="panel-body">
                    <form action="<?=baseurl("panel/".Uri::segment(1)."/ozellikMiktar/".$row->id) ?>" method="post">
										<div class="form-group">
											<label class="col-sm-2 control-label">Ürün Grubu Seçimi</label>
                      <?php if($grupvarmi<1){ ?>
  											<div class="col-sm-8">
  												<select id="grupSelector" clasS="form-control">
  													<?php foreach($gruplar as $grup){ ?>
  														<option value="<?=$grup->id ?>"><?=$grup->adi ?></option>
  													<?php } ?>
  												</select>
  											</div>
  											<div class="col-sm-2">
  												<button type="button" id="GrupModel" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal5">Yeni Grup Ekle</button>
  											</div>
                      <?php }else{ ?>
  											<div class="col-sm-8">
  												<select id="grupSelector" disabled clasS="form-control">
  													<?php foreach($gruplar as $grup){ ?>
  														<option <?=isset($row->grupid) ? ( $row->grupid==$grup->id ? "selected" : "" ) : ""; ?> value="<?=$grup->id ?>"><?=$grup->adi ?></option>
  													<?php } ?>
  												</select>
  											</div>
                        <div class="col-sm-2">
                          <a href="<?=baseurl("panel/".Uri::segment(1)."/grubuBoşalt/".$row->id) ?>" class="btn btn-danger btn-block">Grubu Boşalt</a>
                        </div>
                      <?php } ?>


											<div class="clearfix"></div>
										</div>
										<div class="table-responsive refreshTable">

										</div>
                    <button class="btn btn-primary pull-right btn-lg">Özellikleri ekle</button>
                  </form>
									</div>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
				<div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
              <form action="<?=baseurl("panel/".Uri::segment(1)."/editOzellik/"); ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Grup Ekleme Formu</h4>
                        <small class="font-bold">Yeni ürün grupları oluşturmak istediğinizde kullanabilirsiniz.</small>
                    </div>
                    <div class="modal-body" id="newCevap">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
			<script>

					$(function(){

						$("#GrupModel").click(function(){

							$.ajax({

								type:"POST",
								url:"<?=baseurl("panel/pgruplar/ajaxEkle") ?>",
								data:"",
								success:function(cevap){

									$("#newCevap").html(cevap);

								}

							})

						});

						$("#grupSelector").change(function(){

							$.ajax({

								type:"POST",
								url:"<?=baseurl("panel/purunler/getGrup/".$row->id)?>",
								data:"id="+$(this).val(),
								success:function(cevap){

									$(".refreshTable").html(cevap);

								}


							})

						});

						$("#grupSelector").trigger("change");

					});

				</script>
