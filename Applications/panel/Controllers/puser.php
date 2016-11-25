<?php

	class puser extends Controller{	
		
		protected $alan = 2;
		
		protected $select = 1;
		
		protected $insert = 2;
		
		protected $update = 3;
		
		protected $delete = 4;
		
		protected $OnayKontrol = 5;
		
		protected $klasor = "user";
		
		protected $model = "user_model";
		
		protected $modulAdi = "Kullanıcı";
		
		protected $modulAdic = "";
		
		public function index($params = ''){	
			
			Yetki::select($this->alan);
			
			$data["EditKontrol"] = Yetki::kontrol($this->alan,$this->update);
			$data["RemoveKontrol"] = Yetki::kontrol($this->alan,$this->delete);
			$data["InsertKontrol"] = Yetki::kontrol($this->alan,$this->insert);
			$data["OnayKontrol"] = Yetki::kontrol($this->alan,$this->OnayKontrol);
			$data["columns"] = array("#"=>"id","Kullanıcı Adı"=>"kadi","Adı"=>"adi","Soyadı"=>"soyadi","İlçesi"=>"adres","Email Adresi"=>"email","Telefon Numarası"=>"tel","Onay Durumu"=>"onay");
			$data["DataGrid"] = $this->{$this->model}->getall();
			$data["tableTitle"] = "Kullanıcılar";
			$data["DbName"] = $this->{$this->model}->dbname;
			
			
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/TopluIslem/list.php",$data,true),	
				"method"=>"Listele",
				"class"=>"{$this->modulAdi}"
			
			));
			
		}	
		
		public function ekle(){
			
			Yetki::insert($this->alan);
			
			$data = array(
				
				"title"=>"{$this->modulAdi} Ekleme Formu",
				"titlesmall"=>""
			);
			
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/insert.php",$data,true),	
				"class"=>"{$this->modulAdi}",
				"method"=>"Ekle"
			
			));
			
			
		}
		
		public function doUploadImg($id=0){
			
			Yetki::update($this->alan);
			
			$postlar = $_FILES;
			
			if($postlar){
				
				if(is_numeric($id)){
				
					$resimid = Dosya::profilimg();
					
					 if($this->{$this->model}->editImg($id,$resimid)){
						 
						 Warning::set("Resim Başarıyla Güncellendi.","success");
						 
					 }else{
						 
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
						 
					 }
					
					
				}else{
					
					Warning::set("Güvenlik Duvarı !");
					
				}
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
		public function doInsert(){
			
			Yetki::insert($this->alan);
			
			$postlar = Method::post();
			
			$postlar["sifre"] = sha1(md5($postlar["sifre"])); 
			
			if($postlar){
					
				Validation::rules("adi",array("injection","maxchar"=>15,"trim","required"),"Adı: ");
				Validation::rules("soyadi",array("injection","maxchar"=>15,"trim","required"),"Soyadı: ");
				Validation::rules("kadi",array("injection","maxchar"=>10,"trim","required"),"Kullanıcı Adı: ");
				Validation::rules("email",array("injection","maxchar"=>50,"email","trim","required"),"Email Adresi : ");
				Validation::rules("sifre",array("injection","trim","required"),"Şifresi : ");
				
				$hata = Validation::error("string");
				
				if($hata){
					
					Warning::set($hata,"warning");
					
				}else{
					
					if($this->{$this->model}->cemail($postlar["email"])->totalRows()<1){
						
						if($this->{$this->model}->cuser($postlar["kadi"])->totalRows()<1){
							
							if($this->{$this->model}->insert($postlar)){
														
								$id = DB::insertId();
								$ayar = DB::get("ayarlar")->row();
								$email = json::decode($ayar->email);
								Email::To($postlar["email"])->subject('Yeni Üyelik Activasyon Maili')->receiver($email->replyto)->message('<div style="background:#eee;width:100%;height:100%;padding:50px 0px"><div style="width:500px;margin:50px auto;height:300px;background:#fff;border:1px solid #cecece"><h1 style="text-align:center;color:#555;padding:20px 0px;">Yeni üyelik aktivasyon maili</h1><p style="widt:400px;margin:0px auto;text-align:centeR;padding:10px 0px 40px 0px;">Üyeliğinizi aktif etmek için aşağıdaki üyeliği doğrula butonuna basmanız yeterlidir.Sonrasında üyeliğiniz aktif olacaktır.</p><a  href='.baseurl("users/active/?k=".$postlar["kadi"]."&s=".$postlar["sifre"]).' style="background:#c32c4d;color:#fff;padding:20px;display:block;text-decoration:none;border: 1px solid #9c1230;border-radius: 3px;margin:0px auto;width:200px;text-align: center;font-size:24px;font-weight:bold;">Üyeliği Doğrula</a></div></div>')->send();
								
								redirect(baseurl("panel/puser/edit/?dataGridId=$id"));
								
							}else{
								
								Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
								
							}
					
						}else{
					
							Warning::set("Kullanıcı Adı Kullanılıyor.","warning");
						
						}
						
					}else{
					
						Warning::set("Email Adresi Kullanılıyor.","warning");
						
					}
					
				}
					
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
		
		
		public function delete($id=0){
			
			Yetki::delete($this->alan);
			
			Validation::rules("dataGridId",array("injection"),"DataGridID");
			
			$hata = Validation::error("string");
			
			if($hata){
				
				Warning::set($hata,"warning");
				
			}else{
			
				if($this->{$this->model}->removeUser($id)){
					
					Warning::set("{$this->modulAdi} Başarıyla Silindi.","success");
					
				}else{
						
					Warning::set("Bir sorunla karşılaştık lütfen daha sonra tekrar deneyin.");
					
				}
				
			}
			
		}
		
		public function edit($id=0){
			
			Yetki::update($this->alan);
			
			if(is_numeric($id)){
				
				$model = $this->{$this->model}->getid($id);
				
				if($model){
					
					$data["user"] = $model->row();
					$data["yetkiler"] = $this->{$this->model}->yetkiler(User::yetki())->result();
					
				}else{
					
					Warning::set("Güvenlik Duvarı !","info");
					
				}
				
			}else{
				$data = array();
				Warning::set("Güvenlik Duvarı !","info");
				
			}
			
			
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/edit.php",$data,true),	
				"method"=>"Düzenle",
				"class"=>"{$this->modulAdi}"
			
			));
			
		}
		
		public function changeyetki($id){
			
			Yetki::update($this->alan);
			
			$postlar = Method::post();
			$yetki = Method::post("yetki");
			
			print_r($postlar);
			
			if($postlar){
				
				if(is_numeric($id)){
					
					Validation::rules("yetki",array("injection","numeric"),"Yetki Idsi: ");
					
					$hata = Validation::error("string");
					
					if($hata){
						
						Warning::set($hata,"warning");
						
					}else{
				
						if(User::yetki() <= $yetki){
							
							if($this->{$this->model}->updateYetki($id,$yetki)){
								
								Warning::set("{$this->modulAdi} Başarıyla Güncellendi","success");
								
							}else{
								
								Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
								
							}
							
						}else{
							
							Warning::set("Güvenlik Duvarı !");
							
						}
						
					}
					
				}else{
					
					Warning::set("Güvenlik Duvarı !");
					
				}
				
			}else{
							
				Warning::set("Güvenlik Duvarı !");
				
			}
			
		}

		public function doedit($id){
			
			Yetki::update($this->alan);
			
			$postlar = Method::post();
			
			if(is_numeric($id)){
				
				Validation::rules("adi",array("injection","maxchar"=>15),"Adı Alanı : ");
				Validation::rules("soyadi",array("injection","maxchar"=>15),"Soyadı Alanı : ");
				Validation::rules("email",array("injection","maxchar"=>50,"email"),"Email Adresi : ");
				Validation::rules("hakkinda",array("injection",),"Email Adresi : ");
				
				if($postlar["cinsiyet"]!=1){
					
					$postlar["cinsiyet"]=1;
					
				}
				
				$hata = Validation::error("string");
				
				if($hata){
					
					Warning::set($hata,"warning");
					
				}else{
				
					if($postlar){
						
						$email = Method::post("email");
						
						if($this->{$this->model}->checkemail($email,$id)->totalRows()>0){
							
							Warning::set("Email Adresi Başka Bir Kullanıcı Tarafından Kullanılıyor.");
							
						}else{
							
							if($this->{$this->model}->doEdit($postlar,$id)){
								
								Warning::set("Veriler Başarıyla Güncellendi","success");
								
							}else{
								
								Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
								
							}
							
						}
						
					}else{
						
						Warning::set("Güvenlik Duvarı !");
						
					}
					
				}
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
		}
		
		public function doFirmaEdit($id){
			
			Yetki::update($this->alan);
			
			$postlar = Method::post();
						
			if(is_numeric($id)){
				
				Validation::rules("firmaid",array("injection","maxchar"=>15),"Firma İdsi : ");
				
				$hata = Validation::error("string");
				
				if($hata){
					
					Warning::set($hata,"warning");
					
				}else{
				
					if($postlar){
						
						if($this->{$this->model}->doEdit($postlar,$id)){
							
							Warning::set("Veriler Başarıyla Güncellendi","success");
							
						}else{
							
							Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
							
						}
						
					}else{
						
						Warning::set("Güvenlik Duvarı !");
						
					}
					
				}
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
		}
		
		public function changePassword($id){
			
			Yetki::update($this->alan);
			
			$postlar = Method::post();
			
			$eskisifre = Method::post("eskisifre");
			$sifre = Method::post("sifre");
			$sifret = Method::post("sifret");
			
			if(is_numeric($id)){
				
				Validation::rules("eskisifre",array("injection","trim","required"),"Şifre Alanı : ");
				Validation::rules("sifre",array("injection","trim","required"),"Şifre  Alanı : ");
				Validation::rules("sifret",array("injection","trim","required"),"Şifre Tekrar Alanı : ");
				
				$hata = Validation::error("string");
				
				if($hata){
					
					Warning::set($hata,"warning");
					
				}else{
				
					if($postlar){
						
						
						if($this->{$this->model}->checkPassword($eskisifre,$id)->totalRows()<1){
							
							Warning::set("Hatalı Şifre Girişi Yaptınız");
							
						}else{
							
							if($sifre==$sifret){
								
								if($this->{$this->model}->doChangePassword($sifre,$id)){
								
									Warning::set("Veriler Başarıyla Güncellendi","success");
									
								}else{
									
									Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
									
								}
								
							}else{
							
								Warning::set("Şifreler Uyuşmuyor!","warning");
							
							}
							
						}
						
					}else{
						
						Warning::set("Güvenlik Duvarı !");
						
					}
					
				}
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
		}
		
	}

?>