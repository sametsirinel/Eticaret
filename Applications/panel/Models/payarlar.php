<?php 

	class payarlar_model extends Controller{
		
		public $dbname = "ayarlar";
		
		public function getall(){
			
			return $this->db->orderBy($this->dbname.".id","desc")->get($this->dbname);
			
		}
		
		public function editGenelAyar($postlar=array()){
			
			return  $this->db->update($this->dbname,array("siteayari"=>$postlar));
			
		}
		
		public function editIletisim($postlar=array()){
			
			return  $this->db->update($this->dbname,array("iletisim"=>$postlar));
			
		}
		
		public function editEmail($postlar=array()){
			
			return  $this->db->update($this->dbname,array("email"=>$postlar));
			
		}
		
		public function editIcerik($postlar=array()){
			
			return  $this->db->update($this->dbname,array("icerik"=>$postlar));
			
		}
		
		public function editSsl($postlar=array()){
			
			return  $this->db->update($this->dbname,array("sslayari"=>$postlar));
			
		}
		
		public function editSiteDurumu($postlar=array()){
			
			return  $this->db->update($this->dbname,array("sitedurum"=>$postlar));
			
		}
		
		public function getIcerik(){
			
			return  $this->db->where("tur=",1)->get("radio");
			
		}
		
		public function getSsl(){
			
			return  $this->db->where("tur=",2)->get("radio");
			
		}
		
		public function getSiteDurum(){
			
			return  $this->db->where("tur=",3)->get("radio");
			
		}
		
	}

?>