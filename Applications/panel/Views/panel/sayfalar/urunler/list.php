
		<?php echo Warning::get(); ?>
		<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $tableTitle ?></h5>
                            <div class="ibox-tools">
                                <a href="<?php echo baseurl(Uri::segment(1)."/".Uri::segment(2)."/".Uri::segment(3)."/") ?>">
                                    Geri Dön
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-5 m-b-xs">
									<?php if($InsertKontrol){ ?>
										<a href="<?php echo baseurl("panel/".Uri::segment(1)."/ekle") ?>" class="btn btn-primary pull-left" style="margin-right:5px;"><i class="fa fa-plus"></i> Yeni Veri Ekle</a>
									<?php } ?>
									</div>
                                <div class="col-sm-3 pull-right">
									<form action="" method="post">
										<div class="input-group">	
											<input type="hidden" name="dataGridType" value="dataGridSearch">
											<input type="text" placeholder="Tabloda Arayın" name="query" class="input-sm form-control"> 
											<span class="input-group-btn">
												<button type="submit" class="btn btn-sm btn-primary"> Ara !</button> 
											</span>
										</div>
									</form>
                                </div>
                            </div>
                            <div class="table-responsive">
                               <table class="table">
									<thead>
										<tr>
											<th>Ürün Resmi</th>
											<?php foreach($columns as $key=>$val){ ?>
												<th><?=$key ?></th>
											<?php } ?>
											<th>Düzenle</th>
											<th>Sil</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($DataGrid->result() as $row){ ?>
											<tr>
												<td><img src="<?=baseurl(UPLOADS_DIR.$row->resmi) ?>" alt=""/></td>
												<?php foreach($columns as $val){ ?>
													<td><?=$row->{$val} ?></td>
												<?php } ?>
												<td><a href="<?php echo baseurl("panel/".Uri::segment(1)."/edit/".$row->id); ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Düzenle</a></td>
												<td><a href="<?php echo baseurl("panel/".Uri::segment(1)."/delete/".$row->id); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Sil</a></td>
											</tr>
										<?php } ?>
									</tbody>
							   </table>
							   <?php if(count($DataGrid->result())>0){ ?>
									<?php echo $DataGrid->pagination("",array("url"=>"panel/".Uri::segment(1,"all")."/index/")) ?>
							   <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>