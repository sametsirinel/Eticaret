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
                            <?=Import::page("panel/sayfalar/gruplar/ajaxEdit",["id"=>$id],true); ?>
                        </div>
                    </div>
                </div>
            </div>