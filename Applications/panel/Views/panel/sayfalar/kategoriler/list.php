<?php 
	
	function getkim($id=0){
		
		$model =DB::query("select k.*,(select count(*) from kategoriler where kim=k.id) as altvarmi from kategoriler as k where k.kim='$id'");
		if($model->totalRows()>0){
			
			$query = $model->result();?>
			
			<ol class="dd-list">
			<?php foreach($query as $row){ ?>
				
					<li class="dd-item" data-id="<?php echo $row->id ?>"><button data-action="collapse" style="display: none;" type="button">Collapse</button><button data-action="expand" type="button" style="display: none;">Expand</button>
						<div class="dd-handle">
							<span class="label label-info"><i class="fa fa-users"></i></span> <?php echo $row->adi ?>
						</div>
					<?php if($row->altvarmi>0){ ?>
						<?php getkim($row->id); ?>
					<?php } ?>
					</li>
				
		<?php } ?>
			</ol>
	<?php }		
		
	}
	
	

?>

<div class="wrapper wrapper-content  animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox ">
				<div class="ibox-title">
					<h5><?php ?></h5>
				</div>
				<div class="ibox-content">


					<div class="dd" id="nestable2">
						<?php getkim(); ?>
					</div>


				</div>

			</div>
		</div>
	</div>
</div>
