<div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">
                                <h5>Göster:</h5>
                                <a href="<?php echo baseurl("panel/pdosyalar/filter/all") ?>" class="file-control active">Tümünü Göster</a>
                                <a href="<?php echo baseurl("panel/pdosyalar/filter/document") ?>" class="file-control">Word Dosyaları</a>
                                <a href="<?php echo baseurl("panel/pdosyalar/filter/audio") ?>" class="file-control">Videolar</a>
                                <a href="<?php echo baseurl("panel/pdosyalar/filter/img") ?>" class="file-control">Resimler</a>
                                <div class="hr-line-dashed"></div>
								<?php if($InsertKontrol){ ?>
                                <a href="<?php echo baseurl("panel/pdosyalar/ekle") ?>" class="btn btn-primary btn-block">Dosya Yükle</a>
                                <div class="hr-line-dashed"></div>
								<?php } ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
							<?php if(count($dosyalar)<1){ ?>
								Herhangi Bir Dosya Bulunamadı
							<?php }else{ ?>
								<?php foreach($dosyalar as $dosya){ ?>
									<?php $uzanti = substr($dosya->adi,-4); ?>
										<?php if($uzanti==".jpg" || $uzanti == "jpeg" || $uzanti == ".gif" || $uzanti == ".png"){ ?>
											<div class="file-box">
												<div class="file">
													<a href="#" class="dosyadetay" data-id="<?php echo $dosya->id ?>" data-toggle="modal" data-target="#myModal5">
														<span class="corner"></span>

														<div class="image">
															<div class="row">
																<img alt="image" class="img-responsive col-xs-12" src="<?php echo baseurl(UPLOADS_DIR.$dosya->orta) ?>">
															</div>
														</div>
														<div class="file-name">
															<?php echo $dosya->adi ?>
															<?php if($RemoveKontrol){ ?>
															<br>
															<br>
															<br>
															<div class="row">
																<div class="col-xs-12">
																	<a href="<?php echo baseurl("panel/pdosyalar/delete/".$dosya->id) ?>" class="btn btn-danger col-xs-12"><i class="fa fa-trash"></i> Resmi Sil</a>
																</div>
															</div>
															<?php } ?>
														</div>
													</a>

												</div>
											</div>
										<?php }else if($uzanti == "docx" || $uzanti== ".doc"){ ?>
											<div class="file-box">
												<div class="file">
													<a href="#" class="dosyadetay" data-id="<?php echo $dosya->id ?>"  data-toggle="modal" data-target="#myModal5">
														<span class="corner"></span>
														<div class="icon">
															<i class="fa fa-file"></i>
														</div>
														<div class="file-name">
															<?php echo $dosya->adi ?>
															<?php if($RemoveKontrol){ ?>
															<br>
															<br>
															<br>
															<div class="row">
																<div class="col-xs-12">
																	<a href="<?php echo baseurl("panel/pdosyalar/delete/".$dosya->id) ?>" class="btn btn-danger col-xs-12"><i class="fa fa-trash"></i> Resmi Sil</a>
																</div>
															</div>
															<?php } ?>
														</div>
													</a>
												</div>
											</div>
										<?php }else if($uzanti ==".mp4" || $uzanti==".avi" || $uzanti == ".flv"){ ?>
											<div class="file-box">
												<div class="file">
													<a href="#" class="dosyadetay" data-id="<?php echo $dosya->id ?>"  data-toggle="modal" data-target="#myModal5">
														<span class="corner"></span>

														<div class="icon">
															<i class="img-responsive fa fa-film"></i>
														</div>
														<div class="file-name">
															<?php echo $dosya->adi ?>
															<?php if($RemoveKontrol){ ?>
															<br>
															<br>
															<br>
															<div class="row">
																<div class="col-xs-12">
																	<a href="<?php echo baseurl("panel/pdosyalar/delete/".$dosya->id) ?>" class="btn btn-danger col-xs-12"><i class="fa fa-trash"></i> Resmi Sil</a>
																</div>
															</div>
															<?php } ?>
														</div>
													</a>
												</div>
											</div>
										<?php }else if($uzanti=="xls"){ ?>
											<div class="file-box">
												<a href="#" class="dosyadetay" data-id="<?php echo $dosya->id ?>"  data-toggle="modal" data-target="#myModal5">
													<div class="file">
														<span class="corner"></span>

														<div class="icon">
															<i class="fa fa-bar-chart-o"></i>
														</div>
														<div class="file-name">
															<?php echo $dosya->adi ?>
															<?php if($RemoveKontrol){ ?>
															<br>
															<br>
															<br>
															<div class="row">
																<div class="col-xs-12">
																	<a href="<?php echo baseurl("panel/pdosyalar/delete/".$dosya->id) ?>" class="btn btn-danger col-xs-12"><i class="fa fa-trash"></i> Resmi Sil</a>
																</div>
															</div>
															<?php } ?>
														</div>
													</div>
												</a>
											</div>
										<?php }else{ ?>
											<div class="file-box">
												<a href="#" class="dosyadetay" data-id="<?php echo $dosya->id ?>"  data-toggle="modal" data-target="#myModal5">
													<div class="file">
														<span class="corner"></span>

														<div class="icon">
															<i class="fa fa-file-archive-o"></i>
														</div>
														<div class="file-name">
															<?php echo $dosya->adi ?>
															<?php if($RemoveKontrol){ ?>
															<br>
															<br>
															<br>
															<div class="row">
																<div class="col-xs-12">
																	<a href="<?php echo baseurl("panel/pdosyalar/delete/".$dosya->id) ?>" class="btn btn-danger col-xs-12"><i class="fa fa-trash"></i> Resmi Sil</a>
																</div>
															</div>
															<?php } ?>
														</div>
													</div>
												</a>
											</div>
										<?php } ?>
								<?php } ?>
							<?php } ?>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<div class="modal inmodal fade in" id="myModal5" tabindex="-1" role="dialog" aria-hidden="true" >
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">Dosya Detayı</h4>
						<small class="font-bold">Dosyanın site içerisindeki konumunu alabileceğiniz veya resimse daha büyük görebileceğiniz detay alanıdır.</small>
					</div>
					<div class="modal-body">
						<div class="text-center imgalan">
							<img class="buyukresim" src="" style="max-height:100%;" alt=""/>
						</div>
						<br/>
						<p id="copytext" class=" text-center"></p>
						<button class="btn btn-white col-xs-12" data-clipboard-target="#copytext"><i class="fa fa-copy"></i> Linki Kopyalamak İçin Butona Basınız</button>
						<div class="clearfix"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Modeli Kapat</button>
					</div>
				</div>
			</div>
		</div>