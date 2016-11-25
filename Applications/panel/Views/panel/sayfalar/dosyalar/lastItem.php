<div class="row">
	<?php foreach($resimler as $resim){ ?>

		<label for="radio<?php echo $resim->id ?>" class="col-md-4">
			<div class="thumnail">
				<img src="<?php echo baseurl(UPLOADS_DIR.$resim->kucuk); ?>" class="col-xs-12 selectImg<?php echo $resim->id ?>" style="height:150px;"/>
				<h2 style="color:#555;font-weight:bold;"><?php  echo $resim->adi ?></h2>
				<input type="radio" id="radio<?php echo $resim->id ?>" onclick="selectImg(<?php echo $resim->id ?>)" />
			</div>
			<div class="clearfix"></div>
		</label>	

	<?php } ?>
</div>
<div class="clearfix"></div>