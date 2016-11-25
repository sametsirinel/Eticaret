<?php

	class phome extends Controller{	
	
		protected $klasor = "home";
		
		protected $model = "phome_model";
		
		protected $modulAdi = "Anasayfa";
		
		protected $modulAdic = "";

		public function index($params = ''){	
			
			$yorum = $this->{$this->model}->getNewYorum();
			
			$yorumSayi = $yorum->totalRows();
			
			$data["yorumlar"] = $yorum->result();
			
			$data["yorumSayi"] = $yorumSayi;
			
			$data["kampanyaSayi"] = $this->{$this->model}->kampanyaSayi()->totalRows();
			
			$data["kullaniciSayi"] = $this->{$this->model}->kullaniciSayi()->totalRows();
			
			$data["firmaSayi"] = $this->{$this->model}->firmaSayi()->totalRows();
			
			$data["kategoriSayi"] = $this->{$this->model}->kategoriSayi()->totalRows();
			
			Import::page("panel/MasterPage",array(
				
				"sayfa"=>Import::page("panel/index.php",$data,true)
			
			));
		
		}

		public function yorumSil($id){
			
			if($this->{$this->model}->yorumSil($id)){
				
				Warning::set("Yorum Başarıyla Kaldırıldı.","success");
				
			}else{
				
				Warning::set("Bir Sorunla Karşılaştık Lütfen Daha Sonra Tekrar Deneyin.");
				
			}
			
		}

		public function yorumOnlayla($id){
			
			if($this->{$this->model}->yorumOnlayla($id)){
				
				Warning::set("Yorum Başarıyla Onaylandı.","success");
				
			}else{
				
				Warning::set("Bir Sorunla Karşılaştık Lütfen Daha Sonra Tekrar Deneyin.");
				
			}
			
		}
		
	}

?>