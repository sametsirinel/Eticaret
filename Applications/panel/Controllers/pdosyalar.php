<?php

	class pdosyalar extends Controller{	
		
		protected $alan = 7;
		
		protected $select = 1;
		
		protected $insert = 2;
		
		protected $update = 3;
		
		protected $delete = 4;
		
		protected $OnayKontrol = 5;
		
		protected $klasor = "dosyalar";
		
		protected $model = "pdosyalar_model";
		
		protected $modulAdi = "Dosya";
		
		protected $modulAdic = "Dosyalar";
		
		public function index($params = ''){	
			
			Yetki::select($this->alan);
			
			$data["RemoveKontrol"] = Yetki::kontrol($this->alan,$this->delete);
			$data["InsertKontrol"] = Yetki::kontrol($this->alan,$this->insert);
			$data["OnayKontrol"] = Yetki::kontrol($this->alan,$this->OnayKontrol);
			$data["dosyalar"] = $this->{$this->model}->getall()->result();
			
						
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/listele.php",$data,true),	
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
				
				"sayfa"=>Import::page("panel/sayfalar/dosyalar/ekle.php",$data,true),	
				"class"=>"{$this->modulAdi}",
				"method"=>"Ekle"
			
			));
			
			
		}
		
		public function delete($id){
			
			Yetki::delete($this->alan);
									
				
			if(!is_numeric($id)){
				
				Warning::set("Güvenlik Duvarı !");
				
			}else{
				
				$dosya = $this->{$this->model}->get($id)->row();
				
				$konum = UPLOADS_DIR.$dosya->adi;
				
				if(file_exists($konum)){
					
					unlink($konum);
					
				}
				$konum = UPLOADS_DIR.$dosya->kucuk;
				
				if(file_exists($konum)){
					
					unlink($konum);
					
				}
				$konum = UPLOADS_DIR.$dosya->orta;
				
				if(file_exists($konum)){
					
					unlink($konum);
					
				}
				
				if($this->{$this->model}->delete($id)){
					
					Warning::set("{$this->modulAdi} Başarıyla Silindi","success");
					
				}else{
					
					Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
					
				}
				
			}
					
		}
		
		public function lastItem(){
			
			$data = array(
			
				"resimler"=>$this->{$this->model}->lastItem()->result()
			
			);
			
			Import::page("panel/sayfalar/dosyalar/lastItem.php",$data);
						
		}
		
		public function searchImg(){
			
			$ara = Method::post("ara");
			
			$data = array(
			
				"resimler"=>$this->{$this->model}->SearchImg($ara)->result()
			
			);
			
			Import::page("panel/sayfalar/dosyalar/lastItem.php",$data);
						
		}
		
		public function doInsert(){
			
			Yetki::insert($this->alan);
			
			if($_FILES){
			
				echo Dosya::upload();
				
			}			
			
		}
		
		public function filter($type){
			
			if($type=="document"){
				
				$data["dosyalar"] = $this->{$this->model}->getdocument()->result();
				
			}else if($type=="audio"){
				
				$data["dosyalar"] = $this->{$this->model}->getaudio()->result();
				
			}else if($type=="img"){
				
				$data["dosyalar"] = $this->{$this->model}->getimg()->result();
				
			}else{
				
				$data["dosyalar"] = $this->{$this->model}->getall()->result();
				
			}
			
			Yetki::select($this->alan);
			
			$data["RemoveKontrol"] = Yetki::kontrol($this->alan,$this->delete);
			$data["InsertKontrol"] = Yetki::kontrol($this->alan,$this->insert);
			
						
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/dosyalar/listele.php",$data,true),	
				"method"=>"Listele",
				"class"=>"{$this->modulAdi}"
			
			));
			
		}
		
		public function dosyadetay($id){
			
			if(is_numeric($id)){
				
				$type = "other";
				
				$satir = $this->{$this->model}->get($id);
				
				if($satir){
					
					$dosya = $satir->row();
					
					$type = substr($dosya->adi,-4);
					
					if($type==".jpg" || $type=="jpeg" || $type==".png" || $type==".gif"){
						
						$type="img";
						
					}
					
					$array = array(
						
						"url"=>baseurl(UPLOADS_DIR.$dosya->adi),
						"type"=>$type
					
					);
					echo json_encode($array);
					
				}else{
					
					Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
					
				}
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
		}
		
	}

?>