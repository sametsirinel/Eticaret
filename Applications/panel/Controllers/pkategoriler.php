<?php

	class pkategoriler extends Controller{	
		
		protected $alan = 8;
		
		protected $select = 1;
		
		protected $insert = 2;
		
		protected $update = 3;
		
		protected $delete = 4;
		
		protected $OnayKontrol = 5;
	
		protected $klasor = "kategoriler";
		
		protected $model = "pkategoriler_model";
		
		protected $modulAdi = "Kategori";
		
		protected $modulAdic = "";
		
		public function index($params = ''){	
			
			Yetki::select($this->alan);
			
			$data["EditKontrol"] = Yetki::kontrol($this->alan,$this->update);
			$data["RemoveKontrol"] = Yetki::kontrol($this->alan,$this->delete);
			$data["InsertKontrol"] = Yetki::kontrol($this->alan,$this->insert);
			$data["OnayKontrol"] = Yetki::kontrol($this->alan,$this->OnayKontrol);
			$data["columns"] = array("#"=>"id","Alan Adı"=>"adi");
			$data["DataGrid"] = $this->{$this->model}->getall();
			$data["tableTitle"] = "{$this->modulAdi}";
			$data["DbName"] = $this->{$this->model}->dbname;
			
						
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/TopluIslem/list.php",$data,true),	
				"method"=>"Listele",
				"class"=>"{$this->modulAdi}"
			
			));
			
		}	
		
		
		public function sirala($params = ''){	
			
			Yetki::select($this->alan);
			
			$data["EditKontrol"] = Yetki::kontrol($this->alan,$this->update);
			$data["RemoveKontrol"] = Yetki::kontrol($this->alan,$this->delete);
			$data["InsertKontrol"] = Yetki::kontrol($this->alan,$this->insert);
			
						
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/kategoriler/list.php",$data,true),	
				"method"=>"Listele",
				"class"=>"{$this->modulAdi}"
			
			));
			
		}	
		
		public function doSirala(){
			
			$json = Method::post("json");
			$json = json_decode(htmlspecialchars_decode($json),true);
			$this->siraekle($json);
			
		}
		
		public function test(){
			
			output($this->{$this->model}->updateSira(array("sira"=>1,"kim"=>0),2));
			
		}
		
		public function siraekle($degisgen,$kim=0){
			
			$postlar = array();
			for($x=0;$x<count($degisgen);$x++){
				if(isset($degisgen[$x]["id"])){
					
					$id = $degisgen[$x]["id"];
					
				}else{
					
					$id=0;
					
				}
				if(isset($degisgen[$x]["children"])){
					
					$alt = $degisgen[$x]["children"];
					
				}else{
					
					$alt=array();
					
				}
				if($id>0){
					
					$postlar = array(
						
						"sirasi"=>$x+1,
						"kim"=>$kim
							
					);
	
					
					if($this->{$this->model}->updateSira($postlar,$id))
						echo "başarılı";
					else
						echo "başarısız";
					
					$this->siraekle($alt,$id);
					
				}
				
			}
			
		}
		
		public function ekle(){
			
			Yetki::insert($this->alan);
			
			$data = array(
				
				"title"=>"{$this->modulAdi} Ekleme Formu",
				"titlesmall"=>"{$this->modulAdi}"
			
			);
			
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/insert.php",$data,true),	
				"class"=>"{$this->modulAdi}",
				"method"=>"Ekle"
			
			));
			
			
		}
		
		public function edit($id = 0){
			
			Yetki::update($this->alan);
			
			$postlar = Method::get();
			
			if(is_numeric($id)){
				
				$data = array(
					
					"title"=>"{$this->modulAdi} Ekleme Formu",
					"titlesmall"=>"",
					"row"=>$this->{$this->model}->get($id)->row()
				
				);
				
				Import::page("panel/MasterPage",array(
					
					"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/edit.php",$data,true),	
					"class"=>"{$this->modulAdi}",
					"method"=>"Düzenle"
				
				));
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
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
			
			$postlar["seo_link"] = Convert::urlword($postlar["adi"]);
			
			if($postlar){
					
				Validation::rules("adi",array("injection","maxchar"=>70,"trim","required"),"Alan Adı : ");
				
				$hata = Validation::error("string");
				
				if($hata){
					
					Warning::set($hata,"warning");
					
				}else{
					
					if($this->{$this->model}->insert($postlar)){
						
						Warning::set("{$this->modulAdi} Başarıyla Eklendi","success");
						
					}else{
						
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
						
					}
					
				}
					
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
		public function doEdit($id){
			
			Yetki::insert($this->alan);
			
			$postlar = Method::post();
			
			$postlar["icon"] = $postlar["resim"];
			
			unset($postlar["resim"]);
			
			if($postlar){
					
				if(is_numeric($id)){
					
					Validation::rules("adi",array("injection","maxchar"=>70,"trim","required"),"Alan Adı : ");
					
					$hata = Validation::error("string");
					
					if($hata){
						
						Warning::set($hata,"warning");
						
					}else{
				
						if($this->{$this->model}->edit($postlar,$id)){
							
							$id = DB::insertId();
							
							Warning::set("{$this->modulAdi} Başarıyla Eklendi","success");
							
						}else{
							
							Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
							
						}
						
					}
						
				}else{
					
					Warning::set("Güvenlik Duvarı !");
					
				}
				
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
	}

?>