<?php

	class giris extends Controller{

		public function index(){

			$postlar = Method::post();

			if($postlar){

				Validation::rules("kadi",array("injection","html","trim","required"),"Kullanıcı Adı ");
				Validation::rules("sifre",array("injection","html","trim","required"),"Şifre ");

				$error = Validation::error("string");

				if($error){

					$dizi = ["durum"=>0,"type"=>2,"mesaj"=>$error];

				}else{

					$kadi = Method::post("kadi");
					$sifre = Method::post("sifre");

					$model = $this->giris_model->girisKontrol($kadi,$sifre);

					if($model){

						if($model->totalRows()>0){

							$row = $model->row();
							$row = (array)$row;
							$row["durum"] = 1;
							$row["type"] = 0;
							$row["mesaj"] = "Başarıyla Giriş Yaptınız";
							$row["resim"] = baseurl(UPLOADS_DIR).$row["resim"];
							$dizi = $row;

						}else{

							$dizi = ["durum"=>0,"type"=>4,"mesaj"=>"Kullanıcı Adı Veya Şifre Hatalı "];

						}

					}else{

						$dizi = ["durum"=>0,"type"=>3,"mesaj"=>"Sunucu Erişim Problemi "];

					}


				}

			}else{

				$dizi = ["durum"=>0,"type"=>1,"mesaj"=>"Güvenlik Duvarı !"];

			}
			// print_r($_POST);
			echo json::encode($dizi);

		}

		public function view(){

			Import::page("form");

		}

	}

?>
