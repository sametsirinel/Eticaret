
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
                            </div>
                            <div class="table-responsive">
                               <table class="table">
									<thead>
										<tr>
											<?php foreach($columns as $key=>$val){ ?>
												<th><?=$key ?></th>
											<?php } ?>
											<?php if($EditKontrol){ ?>
											<th>Düzenle</th>
											<?php } ?>
											<?php if($RemoveKontrol){ ?>
											<th>Sil</th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach($DataGrid->result() as $row){ ?>
											<tr>
												<?php foreach($columns as $val){ ?>
													<td><?=$row->{$val}; ?></td>
												<?php } ?>
												<?php if($EditKontrol){ ?>
												<td><a href="<?php echo baseurl("panel/".Uri::segment(1)."/edit/".$row->id); ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Düzenle</a></td>
												<?php } ?>
												<?php if($RemoveKontrol){ ?>
												<td><a href="<?php echo baseurl("panel/".Uri::segment(1)."/delete/".$row->id); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Sil</a></td>
												<?php } ?>
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