<?php

	class pyetki extends Controller{	
		
		protected $alan = 1;
		
		protected $select = 1;
		
		protected $insert = 2;
		
		protected $update = 3;
		
		protected $delete = 4;
		
		protected $OnayKontrol = 5;
		
		protected $klasor = "yetki";
		
		protected $model = "pyetki_model";
		
		protected $modulAdi = "Yetki";
		
		protected $modulAdic = "";
		
		public function index($params = ''){	
			
			Yetki::select($this->alan);
			
			$data["EditKontrol"] = Yetki::kontrol($this->alan,$this->update);
			$data["RemoveKontrol"] = Yetki::kontrol($this->alan,$this->delete);
			$data["InsertKontrol"] = Yetki::kontrol($this->alan,$this->insert);
			$data["OnayKontrol"] = Yetki::kontrol($this->alan,$this->OnayKontrol);
			$data["columns"] = array("#"=>"id","Yetki Adı"=>"yetkiadi");
			$data["DataGrid"] = $this->{$this->model}->getall();
			$data["tableTitle"] = "{$this->modulAdi}";
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
		
		public function delete($id = 0){
			
			Yetki::delete($this->alan);
			
			if(!is_numeric($id)){
				
				Warning::set("Güvenlik Duvarı !");
				
			}else{
				
				if($id<=User::yetki()){
					
					Warning::set("Kendi Yetkinizi Veya Sizden Önce Üretilmiş Bir Yetkiyi Silemezsiniz");
					
				}else{
				
					if($this->{$this->model}->deleteYetki($id)){
						
						Warning::set("{$this->modulAdi} Başarıyla Silindi","success");
						
					}else{
						
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
						
					}
					
				}
				
			}
		
		}
		
		public function doEdit(){
			
			Yetki::update($this->alan);
			
			$postlar = Method::post();
			$yetkiId = Method::post("yetkiId");
			$bolgeler = $_POST["bolgeler"];
			
			
			if($postlar){
					
				Validation::rules("yetkiId",array("injection","trim","required"),"Yetki Idsi : ");
				
				$hata = Validation::error("string");
				
				if($hata){
					
					Warning::set($hata,"warning");
					
				}else{
					
					if($this->{$this->model}->deleteyetkiler($yetkiId)){
					
						$hata =0;
						
						foreach($bolgeler as $bolge){
							
							$parcala = explode(",",$bolge);
							
							$alani = $parcala[0];
							$yetkisi = $parcala[1];
							
							if($this->{$this->model}->insertYetkilimi($yetkiId,$alani,$yetkisi)){
								
								$hata = 0;
								
							}else{
								
								$hata = 1;
								
							}
							
						}
						
						if($hata==1){
								
							Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
							
						}else{
							
							redirect("panel/pyetki/");
							
						}
						
					}else{
						
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
						
					}
				
				}
					
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
		public function edit($id=0){
			
			Yetki::update($this->alan);
			
			$yetkiler = array();
						
			$model = $this->{$this->model}->yetkialanlari($id);
			
			foreach($model->result() as $row){
				
				$yetkiler[$row->alanid.",".$row->alanyetkiid] = $row->alanid.",".$row->alanyetkiid;
				
			}
			
			
			$useryetki = User::yetki();
			
			$model = $this->{$this->model}->yetkialanlari($useryetki);
			
			foreach($model->result() as $row){
				
				$useryetkisi[$row->alanid.",".$row->alanyetkiid] = $row->alanid.",".$row->alanyetkiid;
				
			}
			
			$data = array(
				
				"title"=>"Özel Yetki Düzenleme Formu",
				"titlesmall"=>"Özel bir yetki düzenlemek istediğinizde sadece adını yazın ve  gerekli işlemleri yapın",
				"alanlar"=>$this->{$this->model}->getalanlar()->result(),
				"alanyetkisi"=>$this->{$this->model}->getalanyetkisi()->result(),
				"yetkiler"=>$yetkiler,
				"useryetkisi"=>$useryetkisi,
				"yetkiId"=>$id,
				"id"=>$id
			
			);
			
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/edit.php",$data,true),	
				"class"=>"{$this->modulAdi}",
				"method"=>"Duzenle"
			
			));
			
		}
		
		public function doInsert(){
			
			Yetki::insert($this->alan);
			
			$postlar = Method::post();
			
			
			if($postlar){
					
				Validation::rules("yetkiadi",array("injection","maxchar"=>50,"trim","required"),"Yetki Adı : ");
				
				$hata = Validation::error("string");
				
				if($hata){
					
					Warning::set($hata,"warning");
					
				}else{
			
					if($this->{$this->model}->insert($postlar)){
						
						$id = DB::insertId();
						
						redirect("panel/pyetki/insertstep/$id");
						
					}else{
						
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
						
					}
					
				}
					
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
			
		}
		
		public function insertstep($id=0){
			
			Yetki::insert($this->alan);
			
			
			$useryetki = User::yetki();
			
			$model = $this->{$this->model}->yetkialanlari($useryetki);
			
			foreach($model->result() as $row){
				
				$yetkiler[$row->alanid.",".$row->alanyetkiid] = $row->alanid.",".$row->alanyetkiid;
				
			}
			
			$data = array(
				
				"title"=>"Özel Yetki Ekleme Formu - 2.Adım",
				"titlesmall"=>"Özel bir yetki eklemek istediğinizde sadece adını yazın ve  gerekli işlemleri yapın",
				"alanlar"=>$this->{$this->model}->getalanlar()->result(),
				"alanyetkisi"=>$this->{$this->model}->getalanyetkisi()->result(),
				"yetkiId"=>$id,
				"yetkiler"=>$yetkiler
			
			);
			
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/sayfalar/{$this->klasor}/insertstep.php",$data,true),	
				"class"=>"{$this->modulAdi}",
				"method"=>"Ekle"
			
			));
			
		}
		
		public function doYetkiler(){
			
			Yetki::insert($this->alan);
			
			$postlar = Method::post();
			$yetkiId = Method::post("yetkiId");
			$bolgeler = $_POST["bolgeler"];
			
			
			if($postlar){
					
				Validation::rules("yetkiId",array("injection","trim","required"),"Yetki Idsi : ");
				
				$hata = Validation::error("string");
				
				if($hata){
					
					Warning::set($hata,"warning");
					
				}else{
					$hata =0;
					
					foreach($bolgeler as $bolge){
						
						$parcala = explode(",",$bolge);
						
						$alani = $parcala[0];
						$yetkisi = $parcala[1];
						
						if($this->{$this->model}->insertYetkilimi($yetkiId,$alani,$yetkisi)){
							
							$hata = 0;
							
						}else{
							
							$hata = 1;
							
						}
						
						
					}
					
					if($hata==1){
							
						Warning::set("Veritabanına Bağlanırken Bir Sorunla Karşılaştık. Lütfen Daha Sonra Tekrar Deneyin.");
						
					}else{
						
						redirect("panel/pyetki/");
						
					}
				
				}
					
			}else{
				
				Warning::set("Güvenlik Duvarı !");
				
			}
			
		}
		
	}

?>