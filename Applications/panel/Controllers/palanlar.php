<?php

	class palanlar extends Controller{	
		
		protected $alan = 3;
		
		protected $select = 1;
		
		protected $insert = 2;
		
		protected $update = 3;
		
		protected $delete = 4;
		
		protected $OnayKontrol = 5;
		
		protected $klasor = "alanlar";
		
		protected $model = "palanlar_model";
		
		protected $modulAdi = "Ürün";
		
		protected $modulAdic = "Ürünler";
		
		public function index($params = ''){	
			
			Yetki::select($this->alan);
			
			$data["EditKontrol"] = Yetki::kontrol($this->alan,$this->update);
			$data["RemoveKontrol"] = Yetki::kontrol($this->alan,$this->delete);
			$data["InsertKontrol"] = Yetki::kontrol($this->alan,$this->insert);
			$data["OnayKontrol"] = Yetki::kontrol($this->alan,$this->OnayKontrol);
			$data["columns"] = array("#"=>"id","Alan Adı"=>"alanadi");
			$data["DataGrid"] = $this->{$this->model}->getall();
			$data["tableTitle"] = "{$this->modulAdic}";
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
				
				"title"=>"{$this->modulAdi} Alan Ekleme Formu",
				"titlesmall"=>"{$this->modulAdi} bir yönetim alanı eklemek için kullanılır."
			
			);
			
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/insert.php",$data,true),	
				"class"=>"{$this->modulAdi}",
				"method"=>"Ekle"
			
			));
			
			
		}
		
		public function delete(){
			
			Yetki::delete($this->alan);
			
			$postlar = Method::get();
			
			$id = Method::get("dataGridId");
			
			
			if($postlar){
					
				
				if(!is_numeric($id)){
					
					Warning::set("Güvenlik Duvarı !");
					
				}else{
			
					if($this->{$this->model}->deleteAlan($id)){
						
						Warning::set("{$this->modulAdi} Başarıyla Silindi","success");
						
					}else{
						
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
						
					}
					
				}
					
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
		}
		
		public function doInsert(){
			
			Yetki::insert($this->alan);
			
			$postlar = Method::post();
			
			
			if($postlar){
					
				Validation::rules("alanadi",array("injection","maxchar"=>50,"trim","required"),"Alan Adı : ");
				
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