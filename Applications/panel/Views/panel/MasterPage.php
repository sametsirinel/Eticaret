<?php

	if(!User::check() || User::yetki()<1){

		User::logout();
		redirect(baseurl("panel/plogin"));

	}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Merkez Yazılım Yönetim Paneli</title>

    <link href="<?php echo baseurl(STYLES_DIR) ?>panel/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo baseurl(STYLES_DIR) ?>../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo baseurl(STYLES_DIR) ?>panel/animate.css" rel="stylesheet">
    <link href="<?php echo baseurl(STYLES_DIR) ?>panel/cropper.min.css" rel="stylesheet">
    <link href="<?php echo baseurl(STYLES_DIR) ?>panel/style.css" rel="stylesheet">
    <link href="<?php echo baseurl(STYLES_DIR) ?>panel/sweetalert.css" rel="stylesheet">
    <link href="<?php echo baseurl(STYLES_DIR) ?>panel/dropzone/dropzone.css" rel="stylesheet">
    <link href="<?php echo baseurl(STYLES_DIR) ?>panel/dropzone/basic.css" rel="stylesheet">
    <link href="<?php echo baseurl(STYLES_DIR) ?>panel/summernote/summernote.css" rel="stylesheet">
	<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/jquery-2.1.1.js"></script>
	<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/sweetalert.min.js"></script>

</head>

<body>

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
				<li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo baseurl(UPLOADS_DIR).User::kucukresim() ?>" style="width:50px;height:50px;">
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo User::adisoyadi() ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo User::yetkiadi() ?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo baseurl("panel/puser/edit/?dataGridType=dataGridTypeEdit&dataGridId=".User::id());?>">Profil</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo baseurl("panel/plogin/logout/") ?>">Çıkış Yap</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li <?php if(Uri::segment(2)=="phome"){ echo ' class="active"'; } ?>>
                    <a href="<?php echo baseurl("panel/phome/index/") ?>"><i class="fa fa-home"></i> <span class="nav-label">Anasayfa</span></a>
                </li>

				<?php if(Yetki::check(9)){ ?>
					<li <?php if(Uri::segment(2)=="purunler"){ echo ' class="active"'; } ?>>
						<a href="#"><i class="fa fa-gift"></i> <span class="nav-label">Ürünler</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse" style="height: 0px;">
							<?php if(Yetki::kontrol(9,2)){ ?>
								<li><a href="<?php echo baseurl("panel/purunler/ekle") ?>">Ürün Ekle</a></li>
							<?php } ?>
							<?php if(Yetki::kontrol(9,1)){ ?>
								<li><a href="<?php echo baseurl("panel/purunler/index/") ?>">Ürünler</a></li>
							<?php } ?>
							<?php if(Yetki::kontrol(11,1)){ ?>
								<li><a href="<?php echo baseurl("panel/pgruplar/index/") ?>">Ürün Grupları</a></li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>
				<?php if(Yetki::check(8)){ ?>
					<li <?php if(Uri::segment(2)=="pkategoriler"){ echo ' class="active"'; } ?>>
						<a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Kategoriler</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse" style="height: 0px;">
							<?php if(Yetki::kontrol(8,2)){ ?>
								<li><a href="<?php echo baseurl("panel/pkategoriler/ekle") ?>">Kategori Ekle</a></li>
							<?php } ?>
							<?php if(Yetki::kontrol(8,1)){ ?>
								<li><a href="<?php echo baseurl("panel/pkategoriler/index/") ?>">Kategoriler</a></li>
							<?php } ?>
							<?php if(Yetki::kontrol(8,3)){ ?>
								<li><a href="<?php echo baseurl("panel/pkategoriler/sirala") ?>">Kategorileri Sırala</a></li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>
				<?php if(Yetki::check(2)){ ?>
					<li <?php if(Uri::segment(2)=="puser"){ echo ' class="active"'; } ?>>
						<a href="<?php echo baseurl("panel/puser/index/") ?>"><i class="fa fa-users"></i> <span class="nav-label">Kullanıcılar</span></a>
					</li>
				<?php } ?>
				<?php if(Yetki::check(7)){ ?>
					<li <?php if(Uri::segment(2)=="pdosyalar"){ echo ' class="active"'; } ?>>
						<a href="<?php echo baseurl("panel/pdosyalar/index/") ?>"><i class="fa fa-folder-open-o"></i> <span class="nav-label">Resim ve Dosya Galeri</span></a>
					</li>
				<?php } ?>

				<?php if(Yetki::check(2) || Yetki::check(11)){ ?>
					<li <?php if(Uri::segment(2)=="pyetki" || Uri::segment(2)=="payarlar"){ echo ' class="active"'; } ?>>
						<a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Site Ayarları</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<?php if(Yetki::check(1)){ ?>
								<li <?php if(Uri::segment(2)=="pyetki"){ echo ' class="active"'; } ?>>
									<a href="#"><span class="nav-label">Yetkiler</span><span class="fa arrow"></span></a>
									<ul class="nav nav-third-level collapse" >
										<?php if(Yetki::kontrol(1,2)){ ?>
											<li><a href="<?php echo baseurl("panel/pyetki/ekle") ?>">Yetki Ekle</a></li>
										<?php } ?>
										<?php if(Yetki::kontrol(1,1)){ ?>
											<li><a href="<?php echo baseurl("panel/pyetki/index/") ?>">Yetkiler</a></li>
										<?php } ?>
										<?php if(Yetki::kontrol(3,2)){ ?>
											<li><a href="<?php echo baseurl("panel/palanlar/ekle") ?>">Yetki Alanı Ekle</a></li>
										<?php } ?>
										<?php if(Yetki::kontrol(3,1)){ ?>
											<li><a href="<?php echo baseurl("panel/palanlar/index/") ?>">Yetki Alanları</a></li>
										<?php } ?>
										<?php if(Yetki::kontrol(6,2)){ ?>
											<li><a href="<?php echo baseurl("panel/palanyetkisi/ekle") ?>">Alan Yetkisi Ekle</a></li>
										<?php } ?>
										<?php if(Yetki::kontrol(6,1)){ ?>
											<li><a href="<?php echo baseurl("panel/palanyetkisi/index/") ?>">Alan Yetkileri</a></li>
										<?php } ?>
									</ul>
								</li>
							<?php } ?>
							<?php if(Yetki::check(4)){ ?>
							<li><a href="<?php echo baseurl("panel/payarlar/index/") ?>">Genel Ayarlar</a></li>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">

        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Merkez Yazılım Yönetim Paneline Hoşgeldiniz.</span>
                </li>
                <li>
                    <a href="<?php echo baseurl("panel/plogin/logout/") ?>">
                        <i class="fa fa-sign-out"></i> Çıkış Yap
                    </a>
                </li>
            </ul>

        </nav>
        </div>

		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Profile</h2>
				<ol class="breadcrumb">
					<li>
						<a href="<?php echo baseurl() ?>">Anasayfa</a>
					</li>
					<li>
						<a href="<?php echo baseurl(Uri::segment(1)."/".Uri::segment(2)."/") ?>"><?php if(isset($class)){ echo $class; } ?></a>
					</li>
					<li class="active">
						<strong><?php if(isset($method)){ echo $method; } ?></strong>
					</li>
				</ol>
			</div>
			<div class="col-lg-2">

			</div>
		</div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <?php echo $sayfa; ?>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/bootstrap.min.js"></script>
<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/plugins/dropzone/dropzone.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/inspinia.js"></script>
<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/plugins/pace/pace.min.js"></script>
<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/plugins/clipboard/clipboard.min.js"></script>
<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/plugins/nestable/jquery.nestable.js"></script>
<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/plugins/cropper/cropper.min.js"></script>
<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/main.js"></script>

<script src="<?php echo baseurl(SCRIPTS_DIR) ?>panel/plugins/summernote/summernote.min.js"></script>

		<script>
        $(document).ready(function(){

				var $image = $(".image-crop > img")
				$($image).cropper({
					aspectRatio: 16/9,
					preview: ".img-preview",
					done: function(data) {
						// Output the result data for cropping image.
					}
				});

				var $inputImage = $("#inputImage");
				if (window.FileReader) {
					$inputImage.change(function() {
						var fileReader = new FileReader(),
								files = this.files,
								file;

						if (!files.length) {
							return;
						}

						file = files[0];

						if (/^image\/\w+$/.test(file.type)) {
							fileReader.readAsDataURL(file);
							fileReader.onload = function () {
								$inputImage.val("");
								$image.cropper("reset", true).cropper("replace", this.result);
							};
						} else {
							showMessage("Please choose an image file.");
						}
					});
				} else {
					$inputImage.addClass("hide");
				}

				$("#download").click(function() {

					val  = $("#urunId").attr("value");
					img = $image.cropper("getDataURL");

					swal({   title: "<i class='fa fa-refresh fa-spin'></i> Lütfen Bekleyin . . . ",  html:true, text: "Bu işlem resmin büyüklüne göre zaman alabilir sayfa yenilenene kadar bekleyin",  showCancelButton: false,showConfirmButton: false });
					$.ajax({

						type:"post",
						url:"<?=baseurl("panel/purunler/urunResimEkle") ?>",
						data:"urunid="+val+"&resim="+img,
						success:function(cevap){
							window.location = "";

						}

					});

				});

				$("#zoomIn").click(function() {
					$image.cropper("zoom", 0.1);
				});

				$("#zoomOut").click(function() {
					$image.cropper("zoom", -0.1);
				});

				$("#rotateLeft").click(function() {
					$image.cropper("rotate", 45);
				});

				$("#rotateRight").click(function() {
					$image.cropper("rotate", -45);
				});

			});
		</script>
<script>

    $(document).ready(function (){

        new Clipboard('.btnaaa');

		$(".part2").hide();
		$(".part4").hide();

    });

</script>

<script>

	$(document).ready(function(){

		$('.summernote').summernote();

	});

	$(function(){

		$(".gosummer").click(function(){

			$("textarea[name=aciklama]").html($(".summernote").code());
			$("#postform").submit();
		});

	})
</script>

<script>


	Dropzone.options.myAwesomeDropzone = {

		init: function() {

			this.on("complete", function(file) {

				$.ajax({

					type:"POST",
					url:"<?php echo baseurl("panel/pdosyalar/lastItem"); ?>",
					success:function(cevap){

						$("#lastItem").html(cevap);

					}

				});

			});

		}

	};

	function searchImg(){

		$.ajax({

			type:"POST",
			url:"<?php echo baseurl("panel/pdosyalar/searchImg") ?>",
			data:"ara="+$("input[name=ImgSearch]").val(),
			success:function(cevap){

				$("#lastItem").html(cevap);

			}


		});

	}

	<?php  if(Uri::segment(2)=="pkategoriler" && Uri::segment(3)=="sirala"){ ?>

		 $(document).ready(function(){

			 var updateOutput = function (e) {
				 var list = e.length ? e : $(e.target),
				output = list.data('output');
				 if (window.JSON) {
					 output.val(window.JSON.stringify(list.nestable('serialize')));
				 } else {
					 output.val('JSON browser support required for this demo.');
				 }
				 $.ajax({

					 type:"POST",
					 url:"<?php echo baseurl("panel/pkategoriler/doSirala") ?>",
					 data:"json="+window.JSON.stringify(list.nestable('serialize')),
					 dataType:"json",
					 success:function(cevap){

						 alert("Başarılı");

					 }

				 })
			 };

			 $('#nestable2').nestable({
				 group: 1
			 }).on('change', updateOutput);

			 updateOutput($('#nestable2').data('output', $('#nestable2-output')));

		 });

	<?php } ?>

	function firmaAra(){

		var kelime = $("input[name=firmaAra]").val();

		$.ajax({

			type:"POST",
			url:"<?php echo baseurl("panel/pkampanyalar/firmaSearch/") ?>",
			data:"ara="+kelime,
			success:function(cevap){

				$("#firmasonuc").html(cevap);

			}

		})

	}

	function firmaSec(id){

		var firmaimg = $(".firmaimg"+id).attr("src");
		var firmaadi = $(".firmaadi"+id).html();

		$(".firmaimg").attr("src",firmaimg);
		$(".firmaadi").html(firmaadi);
		$("input[name=firmaid]").val(id);

	}

	function selectImg(id){

		var firmaimg = $(".selectImg"+id).attr("src");

		$(".selectImg").attr("src",firmaimg);
		$("input[name=resim]").val(id);

	}

	function firmakaydet(){

		$(".part1").slideToggle();
		$(".part2").slideToggle();

	}

	function ImgToggle(){

		$(".part3").slideToggle();
		$(".part4").slideToggle();

	}

	function firmaTekrarSec(){

		$(".part1").slideToggle();
		$(".part2").slideToggle();

		$("input[name=firmaAra]").val("");
		$("#firmasonuc").html("<h2 style='color:#555;font-weight:bold;text-align:center'>Yukarıdaki arama kutusunu kullanarak firma araması yapabilirsiniz.</h2><div class='clearfix'></div>");

	}

</script>

<script type="text/javascript">


</script>

</body>

</html>
