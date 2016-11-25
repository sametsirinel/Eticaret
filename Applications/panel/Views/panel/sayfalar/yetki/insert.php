			<?php echo Warning::get(); ?>
			<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $title ?> <small><?php echo $titlesmall ?></small></h5>
                            <div class="ibox-tools">
                               <a href="<?php echo baseurl("panel/".Uri::segment(1)."/") ?>">Geri Dön</a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" action="<?php echo baseurl("panel/".Uri::segment(1)."/doInsert") ?>" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Yetki Adı Giriniz</label>

                                    <div class="col-sm-10"><input type="text" name="yetkiadi" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
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