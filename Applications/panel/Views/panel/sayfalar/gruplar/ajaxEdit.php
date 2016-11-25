<form method="post" id="ajaxForm" action="<?php echo baseurl("panel/".Uri::segment(1)."/doEdit/$id") ?>" class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label">Grup Adı Giriniz</label>
		<div class="col-sm-10"><input type="text" required name="adi" class="form-control"></div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="AddNewItem">
		<div class="form-group">
			<label class="col-sm-2 control-label">Özellik Adı</label>
			<div class="col-sm-10"><input type="text" required name="ozellik[]" class="form-control"></div>
		</div>
		<div class="hr-line-dashed"></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label"></label>
		<div class="col-sm-10"><button type="button" class="btn btn-default AddNewItemClick"> <i class="fa fa-plus"></i> Yeni Özellik Ekle</button></div>
	</div>
	<div class="hr-line-dashed"></div>
	<div class="form-group">
		<div class="col-sm-4 col-sm-offset-2">
			<button class="btn btn-white" type="reset">İptal</button>
			<button class="btn btn-primary" type="submit">Veriyi Ekle</button>
		</div>
	</div>
</form>

<script>

	$(function(){

		$("#ajaxForm").submit(function(e){

			e.preventDefault();
			swal({

				html:true,
				title:"<i clasS='fa fa-refresh fa-spin'></i> Lütfen Bekleyin",

			});

			$.ajax({

				type:$(this).attr("method"),
				url:$(this).attr("action"),
				dataType:"json",
				data:$(this).serialize(),
				success:function(cevap){

					swal({

						type:cevap.type,
						title:cevap.title,
						text:cevap.text,
						html:true

					});


					$("input").val('');

					if($("#grupSelector").length==1){

						$.ajax({
							type:"POST",
							url:"<?=baseurl("panel/purunler/refreshGrup")?>",
							data:"",
							success:function(cevap){

								$("#grupSelector").html(cevap);

							}

						})

					}

				},
				error: function (xhr, ajaxOptions, thrownError) {

				swal("Dikkat","Lütfen internet bağlantınızı kontrol edin.","info");

			  }

			});



		});

		$(".AddNewItemClick").click(function(){

			$(".AddNewItem").append('<div class="form-group"><label class="col-sm-2 control-label">Özellik Adı</label><div class="col-sm-10"><input type="text" name="ozellik[]" class="form-control"></div></div><div class="hr-line-dashed"></div>');

		});

	});

</script>
