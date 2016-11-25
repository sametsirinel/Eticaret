<?php

	class iletisim extends Controller{

		public function index(){

			$postlar = Method::post();

			if($postlar){

				Validation::rules("baslik",array("injection","html","trim","required","max"=>15),"İletişim Konusu ");
				Validation::rules("adisoyadi",array("injection","html","trim","required","max"=>15),"Adı - Soyadı ");
				Validation::rules("email",array("injection","html","trim","required","max"=>20),"Email Adresi ");
				Validation::rules("mesaj",array("injection","html","trim","required"),"Mesaj  ");

				$error = Validation::error("string");

				if($error){

					$dizi = ["durum"=>0,"type"=>2,"mesaj"=>$error];

				}else{

					$postlar = Method::post();

					$kayit = $this->iletisim_model->ekleniyor($postlar);

					if($kayit){

						$row["durum"] = 1;
						$row["type"] = 0;
						$row["mesaj"] = "Başarıyla Giriş Yaptınız";

						$dizi = $row;

					}else{

						$dizi = ["durum"=>0,"type"=>3,"mesaj"=>"Sunucu Erişim Problemi "];

					}

				}

			}else{

				$dizi = ["durum"=>0,"type"=>1,"mesaj"=>"Güvenlik Duvarı !"];

			}

			echo json::encode($dizi);

		}

		public function view(){

			Import::page("iletisim");

		}

	}

?>
