<?php 

	class phome_model extends Controller{
		
		public $dbname = "yorumlar";
		
		public function getNewYorum(){
			
			return $this->db->join("kullanici","kullanici.id = yorumlar.userid","inner")->select("kullanici.adi,kullanici.soyadi,yorumlar.*")->where("yorumlar.onay=",0)->get($this->dbname);
			
		}
		
		public function yorumSil($id){
			
			return $this->db->where("id=",$id)->delete("yorumlar");
			
		}
		
		public function yorumOnlayla($id){
			
			return $this->db->where("id=",$id)->update("yorumlar",array("onay"=>1));
			
		}
		
		public function kampanyaSayi(){
			
			return $this->db->get("kampanyalar");
			
		}
		
		public function kullaniciSayi(){
			
			return $this->db->get("kullanici");
			
		}
		
		public function firmaSayi(){
			
			return $this->db->get("firmalar");
			
		}
		
		public function kategoriSayi(){
			
			return $this->db->get("kategoriler");
			
		}
		
	}

?>