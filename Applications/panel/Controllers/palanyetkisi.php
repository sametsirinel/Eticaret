<?php

	class palanyetkisi extends Controller{	
		
		protected $alan = 3;
		
		protected $select = 1;
		
		protected $insert = 2;
		
		protected $update = 3;
		
		protected $delete = 4;
		
		protected $OnayKontrol = 5;
		
		protected $klasor = "alanyetkisi";
		
		protected $model = "palanyetkisi_model";
		
		protected $modulAdi = "Alan";
		
		protected $modulAdic = "Alanlar";
		
		public function index($params = ''){	
			
			Yetki::select($this->alan);
			
			$data["EditKontrol"] = Yetki::kontrol($this->alan,$this->update);
			$data["RemoveKontrol"] = Yetki::kontrol($this->alan,$this->delete);
			$data["InsertKontrol"] = Yetki::kontrol($this->alan,$this->insert);
			$data["OnayKontrol"] = Yetki::kontrol($this->alan,$this->OnayKontrol);
			$data["columns"] = array("#"=>"id","Alan Adı"=>"alanyetkisi");
			$data["tableTitle"] = "{$this->modulAdi} Yetkileri";
			$data["DbName"] = $this->{$this->model}->dbname;
			$data["DataGrid"] = $this->{$this->model}->getall();
			
						
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/TopluIslem/list.php",$data,true),	
				"method"=>"Listele",
				"class"=>"{$this->modulAdi}"
			
			));
			
		}	
		
		public function ekle(){
			
			Yetki::insert($this->alan);
			
			$data = array(
				
				"title"=>"{$this->modulAdi} Yetkisi Ekleme Formu",
				"titlesmall"=>""
			
			);
			
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/alanyetkisi/insert.php",$data,true),	
				"class"=>"{$this->modulAdi}",
				"method"=>"Ekle"
			
			));
			
			
		}
		
		public function delete($id=0){
			
			Yetki::delete($this->alan);
			
			if(!is_numeric($id)){
				
				Warning::set("Güvenlik Duvarı !");
				
			}else{
		
				if($this->{$this->model}->deleteAlan($id)){
					
					Warning::set("{$this->modulAdi} Başarıyla Silindi","success");
					
				}else{
					
					Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
					
				}
				
			}
					
		}
		
		public function doInsert(){
			
			Yetki::insert($this->alan);
			
			$postlar = Method::post();
			
			
			if($postlar){
					
				Validation::rules("alanyetkisi",array("injection","maxchar"=>50,"trim","required"),"Alan Adı : ");
				
				$hata = Validation::error("string");
				
				if($hata){
					
					Warning::set($hata,"warning");
					
				}else{
			
					if($this->{$this->model}->insert($postlar)){
						
						$id = DB::insertId();
						
						Warning::set("{$this->modulAdi} Başarıyla Eklendi. Alan Idsi = $id","success");
						
					}else{
						
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
						
					}
					
				}
					
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
	}

?>