<?php

	class payarlar extends Controller{	
		
		protected $alan = 4;
		
		protected $select = 1;
		
		protected $insert = 2;
		
		protected $update = 3;
		
		protected $delete = 4;
		
		protected $OnayKontrol = 5;
		
		protected $klasor = "ayarlar";
		
		protected $model = "payarlar_model";
		
		protected $modulAdi = "Ayar";
		
		protected $modulAdic = "Ayarlar";
		
		public function index($params = ''){
			
			Yetki::select($this->alan);
			
			$data["EditKontrol"] = Yetki::kontrol($this->alan,$this->update);
			$data["ayar"] = $this->{$this->model}->getall()->row();
			$data["icerikler"] = $this->{$this->model}->getIcerik()->result();
			$data["sslayari"] = $this->{$this->model}->getSsl()->result();
			$data["AcikKapali"] = $this->{$this->model}->getSiteDurum()->result();
			
						
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/ayarlar.php",$data,true),	
				"method"=>"Düzenle",
				"class"=>"{$this->modulAdi}"
			
			));
			
		}	
		
		public function editGenelAyar(){
			
			$post = Method::post();
			
			if($post){
				
				Validation::rules("adi",array("required","trim"),"Site Adı : ");
				Validation::rules("baslik",array("required","trim"),"Site Başlığı : ");
				Validation::rules("etiketler",array("required","trim"),"Site Etiketleri : ");
				Validation::rules("aciklama",array("required","trim"),"Site Açıklaması : ");
				
				$error = Validation::error("string");
				
				if($error){
					
					Warning::set($error,"warning");
					
				}else{
					
					if($this->{$this->model}->editGenelAyar(Json::encode($post))){
						
						Warning::set("Veriler Başarıyla Güncellendi.","success");
						
					}else{
						
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık Lütfen Daha Sonra Tekrar Deneyin.");
						
					}
					
				}
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
		public function editIletisim(){
			
			$post = Method::post();
			
			if($post){
				
				Validation::rules("email",array("required","trim"),"Email Adresi : ");
				Validation::rules("telefon",array("required","trim"),"Telefon Numarası : ");
				Validation::rules("adres",array("required","trim"),"Adres : ");
				if(!$post["iframe"]){
					
					$post["iframe"] = "";
					
				}
				
				$error = Validation::error("string");
				
				if($error){
					
					Warning::set($error,"warning");
					
				}else{
					
					if($this->{$this->model}->editIletisim(Json::encode($post))){
						
						Warning::set("Veriler Başarıyla Güncellendi.","success");
						
					}else{
						
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık Lütfen Daha Sonra Tekrar Deneyin.");
						
					}
					
				}
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
		public function editEmail(){
			
			$post = Method::post();
			
			if($post){
				
				Validation::rules("iletisim",array("required","trim","email"),"İletişim Maili : ");
				Validation::rules("replyto",array("required","trim","email"),"Reply To Maili : ");
				
				
				$error = Validation::error("string");
				
				if($error){
					
					Warning::set($error,"warning");
					
				}else{
					
					if($this->{$this->model}->editEmail(Json::encode($post))){
						
						Warning::set("Veriler Başarıyla Güncellendi.","success");
						
					}else{
						
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık Lütfen Daha Sonra Tekrar Deneyin.");
						
					}
					
				}
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
		public function editIcerik(){
			
			$post = Method::post();
			
			if($post){
				
				Validation::rules("icerigi",array("required","trim"),"İçerik Seçimi: ");
				
				
				$error = Validation::error("string");
				
				if($error){
					
					Warning::set($error,"warning");
					
				}else{
					
					if($this->{$this->model}->editIcerik(Json::encode($post))){
						
						Warning::set("Veriler Başarıyla Güncellendi.","success");
						
					}else{
						
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık Lütfen Daha Sonra Tekrar Deneyin.");
						
					}
					
				}
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
		public function mailTest(){
			
			$ayar = $this->{$this->model}->getall()->row();
			$email = json::decode($ayar->email);
			
			
			if(Email::To($email->iletisim)->subject('Konu')->message('Mesaj')->send()){
			
				Warning::set("Aşağıdaki İletişim Adresine Mail Gönderimi Yapıldı. Lütfen Gelen Kutusunu Ve Spawn Gönderimleri Kontrol Ediniz.","success");
				 
			}else{
				 
				 Warning::set("Bir Sorunla Karşılaştık. Lütfen Mail Ayarlarının Doğruluğunu Kontrol Ederek Tekrar Deneyin.");
				 
			}
			
		}
		
		public function editSsl(){
			
			$post = Method::post();
			
			if($post){
				
				Validation::rules("ssl",array("required","trim"),"Ssl Seçimi : ");
				
				
				$error = Validation::error("string");
				
				if($error){
					
					Warning::set($error,"warning");
					
				}else{
					
					if($this->{$this->model}->editSsl(Json::encode($post))){
						
						Warning::set("Veriler Başarıyla Güncellendi.","success");
						
					}else{
						
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık Lütfen Daha Sonra Tekrar Deneyin.");
						
					}
					
				}
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
		public function editSiteDurumu(){
			
			$post = Method::post();
			
			if($post){
				
				Validation::rules("sitedurumu",array("required","trim"),"Site Durumu : ");
				
				
				$error = Validation::error("string");
				
				if($error){
					
					Warning::set($error,"warning");
					
				}else{
					
					if($this->{$this->model}->editSiteDurumu(Json::encode($post))){
						
						Warning::set("Veriler Başarıyla Güncellendi.","success");
						
					}else{
						
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık Lütfen Daha Sonra Tekrar Deneyin.");
						
					}
					
				}
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
	}

?>