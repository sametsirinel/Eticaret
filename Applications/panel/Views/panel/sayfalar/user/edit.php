
<div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
				<div class="col-md-12">
				<?php echo Warning::get(); ?>
				</div>
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Profil Detay</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
								<div class="row">
									<img alt="image" class="col-xs-12" src="<?php echo baseurl(UPLOADS_DIR.$user->resimi) ?>">
								</div>
                            </div>
                            <div class="ibox-content profile-content">
                                <h4><strong><?php echo $user->adisoyadi ?></strong></h4>
                                <h5>
                                    Kullanıcı Hakkında Bilgi
                                </h5>
                                <p>
                                    <?php echo $user->hakkinda ?>
                                </p>
                            </div>
                    </div>
                </div>
                    </div>
                <div class="col-md-8">
				<div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#kullanici_bilgi" aria-expanded="true"> Kullanıcı Bilgileri</a></li>
                            <li class=""><a data-toggle="tab" href="#sifredegis" aria-expanded="false">Şifre Değiş</a></li>
							<?php if($user->yetki>=User::yetki() || $user->yetki==0){ ?>
                            <li class=""><a data-toggle="tab" href="#yetkidegis" aria-expanded="false">Yetki Ata</a></li>
							<?php } ?>
                            <li class=""><a data-toggle="tab" href="#resimdegis" aria-expanded="false">Kullanıcı Resmi</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="kullanici_bilgi" class="tab-pane active">
                                <div class="panel-body">
									<form method="post" action="<?php echo baseurl("panel/puser/doedit/".$user->id); ?>" class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-2 control-label">Kullanıcı Adı</label>
											<div class="col-sm-10">
												<input type="text" disabled value="<?php echo $user->kadi ?>"  name="kadi" class="form-control"> 
												<span class="help-block m-b-none"></span>
											</div>
										</div>
										<div class="hr-line-dashed"></div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Adı</label>
											<div class="col-sm-10">
												<input type="text" value="<?php echo $user->adi ?>"  name="adi" class="form-control"> 
												<span class="help-block m-b-none"></span>
											</div>
										</div>
										<div class="hr-line-dashed"></div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Soyadı</label>
											<div class="col-sm-10">
												<input type="text" value="<?php echo $user->soyadi ?>"  name="soyadi" class="form-control"> 
												<span class="help-block m-b-none"></span>
											</div>
										</div>
										<div class="hr-line-dashed"></div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Email</label>
											<div class="col-sm-10">
												<input type="text" value="<?php echo $user->email ?>"  name="email" class="form-control"> 
												<span class="help-block m-b-none"></span>
											</div>
										</div>
										<div class="hr-line-dashed"></div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Hakkında Bilgisi</label>
											<div class="col-sm-10">
												<textarea name="hakkinda" id="" cols="30" rows="10" class="form-control"><?php echo $user->hakkinda ?></textarea>
												<span class="help-block m-b-none"></span>
											</div>
										</div>
										<div class="hr-line-dashed"></div>
										<div class="form-group">
											<div class="col-sm-4 col-sm-offset-2">
												<a class="btn btn-white" href="">İptal</a>
												<button class="btn btn-primary" type="submit">Bilgileri Kaydet</button>
											</div>
										</div>
									</form>
                                </div>
                            </div>
                            
                            <div id="sifredegis" class="tab-pane ">
                                <div class="panel-body">
                                    <form method="post" action="<?php echo baseurl("panel/puser/changePassword/".$user->id)?>" class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-2 control-label">Eski Şifreniz</label>
											<div class="col-sm-10">
												<input type="password"  name="eskisifre" class="form-control"> 
												<span class="help-block m-b-none"></span>
											</div>
										</div>
										<div class="hr-line-dashed"></div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Yeni Şifreniz</label>
											<div class="col-sm-10">
												<input type="password"  name="sifre" class="form-control"> 
												<span class="help-block m-b-none"></span>
											</div>
										</div>
										<div class="hr-line-dashed"></div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Yeni Şifre Tekrar</label>
											<div class="col-sm-10">
												<input type="password"  name="sifret" class="form-control"> 
												<span class="help-block m-b-none"></span>
											</div>
										</div>
										<div class="hr-line-dashed"></div>
										<div class="form-group">
											<div class="col-sm-4 col-sm-offset-2">
												<a class="btn btn-white" href="">İptal</a>
												<button class="btn btn-primary" type="submit">Şifreyi Değiş</button>
											</div>
										</div>
									</form>
                                </div>
                            </div>
							<?php if($user->yetki>=User::yetki() || $user->yetki==0){ ?>
                            <div id="yetkidegis" class="tab-pane ">
                                <div class="panel-body">
                                    <form method="post" action="<?php echo baseurl("panel/puser/changeyetki/".$user->id)?>" class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-2 control-label">Kullanıcı Yetkisi Seçiniz</label>
											<div class="col-sm-10">
												<?php foreach($yetkiler as $yetki){ ?>
													<label class="checkbox-inline" for="yetki<?php echo $yetki->id ?>"><input type="radio" name="yetki" <?php if($yetki->id==$user->yetki){ echo "checked";} ?> value="<?php echo $yetki->id ?>" id="yetki<?php echo $yetki->id ?>"> <?php echo $yetki->yetkiadi ?></label> 
												<?php } ?>
											</div>
										</div>
										<div class="hr-line-dashed"></div>
										<div class="form-group">
											<div class="col-sm-4 col-sm-offset-2">
												<a class="btn btn-white" href="">İptal</a>
												<button class="btn btn-primary" type="submit">Yetki Ata</button>
											</div>
										</div>
									</form>
                                </div>
							</div>
							<?php } ?>
                            <div id="resimdegis" class="tab-pane ">
                                <div class="panel-body">
                                    <form method="post" action="<?php echo baseurl("panel/puser/doUploadImg/".$user->id)?>" enctype="multipart/form-data" class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-2 control-label">Bir Resim Seçiniz</label>
											<div class="col-sm-10">
												<input type="file"  name="file" class="form-control"> 
												<span class="help-block m-b-none"></span>
											</div>
										</div>
										<div class="hr-line-dashed"></div>
										<div class="form-group">
											<div class="col-sm-4 col-sm-offset-2">
												<a class="btn btn-white" href="">İptal</a>
												<button class="btn btn-primary" type="submit">Resmi Değiltir.</button>
											</div>
										</div>
									</form>
                                </div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
		
			<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="modal-content animated bounceInRight">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
								<i class="fa fa-search modal-icon"></i>
								<h4 class="modal-title">Firma Ara</h4>
								<input type="text" name="firmaAra" placeholder="Filitrelemek İçin Firmanın Adını Giriniz" onkeyup="firmaAra()" class="form-control">
							</div>
							<div class="modal-body" id="firmasonuc">
								<h2 style="color:#555;font-weight:bold;text-align:center">Yukarıdaki arama kutusunu kullanarak firma araması yapabilirsiniz.</h2>
								<div class="clearfix"></div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-white" data-dismiss="modal">Kapat</button>
								<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="firmakaydet()">Firmayı Kaydet</button>
							</div>
						</div>
					</div>
				</div>
				
				