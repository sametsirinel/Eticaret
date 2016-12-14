<?php

	class kayit extends Controller{

		public function index(){

			$postlar = Method::post();

			if($postlar){

				Validation::rules("adi",array("injection","html","trim","required","max"=>15),"Adı ");
				Validation::rules("soyadi",array("injection","html","trim","required","max"=>15),"Soyadı ");
				Validation::rules("kadi",array("injection","html","trim","required","max"=>20),"Kullanıcı Adı ");
				Validation::rules("sifre",array("injection","html","trim","required"),"Şifre ");
				Validation::rules("email",array("injection","html","trim","required","email","max"=>50),"Email Adresi ");
				Validation::rules("tel",array("injection","html","trim","required","max"=>15),"Telefon Numarası ");

				$error = Validation::error("string");

				if($error){
					
					$dizi = ["durum"=>0,"type"=>2,"mesaj"=>$error];

				}else{

					$postlar = Method::post();

					$kadi = Method::post("kadi");
					$sifre = Method::post("sifre");
					$email = Method::post("email");

					$kontrolKadi = $this->kayit_model->kontrolUserEmail($kadi);

					if($kontrolKadi){

						if($kontrolKadi->totalRows()>0){

							$dizi = ["durum"=>0,"type"=>5,"mesaj"=>"Bu Kullanıcı Adı Sistemde Kayıtlı"];

						}else{

							$kontrolEmail = $this->kayit_model->kontrolUserEmail($email);

							if($kontrolEmail){

								if($kontrolEmail->totalRows()>0){

									$dizi = ["durum"=>0,"type"=>5,"mesaj"=>"Bu Email Adresi Sistemde Kayıtlı"];

								}else{

									$kayit = $this->kayit_model->ekleniyor($postlar);

									if($kayit){

										$model = $this->giris_model->girisKontrol($kadi,$sifre);

										if($model){

											if($model->totalRows()>0){

												$row = $model->row();
												$row = (array)$row;
												$row["durum"] = 1;
												$row["type"] = 0;
												$row["mesaj"] = "Başarıyla Giriş Yaptınız";

												$dizi = $row;

											}else{

												$dizi = ["durum"=>0,"type"=>4,"mesaj"=>"Kullanıcı Adı Veya Şifre Hatalı "];

											}

										}else{

											$dizi = ["durum"=>0,"type"=>3,"mesaj"=>"Sunucu Erişim Problemi "];

										}

									}else{

										$dizi = ["durum"=>0,"type"=>3,"mesaj"=>"Sunucu Erişim Problemi "];

									}

								}

							}else{

								$dizi = ["durum"=>0,"type"=>3,"mesaj"=>"Sunucu Erişim Problemi "];

							}

						}

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

			Import::page("kayitForm");

		}

	}

?>
