			<?php echo Warning::get(); ?>
			<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $title ?> <small><?php echo $titlesmall ?></small></h5>
                            <div class="ibox-tools">
                               <a href="<?php echo baseurl("panel/".Uri::segment(2)."/") ?>">Geri Dön</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" action="<?php echo baseurl("panel/".Uri::segment(2)."/doYetkiler") ?>" class="form-horizontal">
								<input type="hidden" name="yetkiId" value="<?php echo $yetkiId ?>"/>
								  <?php foreach($alanlar as $alan){ ?>
										<div class="form-group">
											<label class="col-sm-2 control-label"><?php echo $alan->alanadi ?></label>
											<div class="col-sm-10">
												<?php foreach($alanyetkisi as $yetki){ ?>
													<?php if(isset($yetkiler[$alan->id.",".$yetki->id])){ ?>
														<label class="checkbox-inline"> 
															<input type="checkbox" name="bolgeler[]" value="<?php echo $alan->id ?>,<?php echo $yetki->id ?>" id="tip<?php echo $alan->id ?><?php echo $yetki->id ?>"> <?php echo $yetki->alanyetkisi ?> 
														</label>
													<?php } ?>
												<?php } ?>
											</div>
										</div>
									<div class="hr-line-dashed"></div>
								  <?php } ?>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">İptal</button>
                                        <button class="btn btn-primary" type="submit">Veriyi Ekle</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>