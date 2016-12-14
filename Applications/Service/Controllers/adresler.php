<?php

	class adresler extends Controller{

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

  						$kid = $model->row()->id;
            	$dizi = ["durum"=>1,"type"=>0,"mesaj"=>$error,"adresler"=>$this->adresler_model->getall($kid)->result()];

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

    public function ekle(){

			$postlar = Method::post();

			if($postlar){

				Validation::rules("kadi",array("injection","html","trim","required"),"Kullanıcı Adı ");
				Validation::rules("sifre",array("injection","html","trim","required"),"Şifre ");
				Validation::rules("baslik",array("injection","html","trim","required"),"Adres Başlığı ");
				Validation::rules("adres",array("injection","html","trim","required"),"Adres Açıklaması ");


				$error = Validation::error("string");

				if($error){

					$dizi = ["durum"=>0,"type"=>2,"mesaj"=>$error];

				}else{

					$kadi = Method::post("kadi");
					$sifre = Method::post("sifre");
          $baslik = Method::post("baslik");
          $aciklama = Method::post("aciklama");

					$model = $this->giris_model->girisKontrol($kadi,$sifre);

					if($model){

						if($model->totalRows()>0){

							$kid = $model->row()->id;
              if($this->adresler_model->ekle($baslik,$aciklama,$kid)){

                $dizi = ["durum"=>1,"type"=>0,"mesaj"=>"Veriler Başarıyla Eklendi"];

              }else{

                $dizi = ["durum"=>0,"type"=>5,"mesaj"=>"Veriler eklenirken problem cıktı"];

              }

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

    public function sil(){

      $postlar = Method::post();

      if($postlar){

        Validation::rules("kadi",array("injection","html","trim","required"),"Kullanıcı Adı ");
        Validation::rules("sifre",array("injection","html","trim","required"),"Şifre ");
        Validation::rules("adresid",array("injection","html","trim","required"),"Adres Başlığı ");


        $error = Validation::error("string");

        if($error){

          $dizi = ["durum"=>0,"type"=>2,"mesaj"=>$error];

        }else{

          $kadi = Method::post("kadi");
          $sifre = Method::post("sifre");
          $adresid = Method::post("adresid");

          $model = $this->giris_model->girisKontrol($kadi,$sifre);

          if($model){

            if($model->totalRows()>0){

              $kid = $model->row()->id;
              if($this->adresler_model->sil($adresid,$kid)){

                $dizi = ["durum"=>1,"type"=>0,"mesaj"=>"Veri Başarıyla Silindi"];

              }else{

                $dizi = ["durum"=>0,"type"=>5,"mesaj"=>"Veriler Silinirken Problem  Çıktı"];

              }

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

	}

?>
