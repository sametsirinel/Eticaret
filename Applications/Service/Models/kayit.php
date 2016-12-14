<?php 

	class kayit_model extends Model{
		
		public function ekleniyor($postlar){
			
			$postlar["sifre"] = sha1(md5($postlar["sifre"]));
			return $this->db->insert("kullanici",$postlar);
			
		}
		
		public function kontrolUserEmail($email){
			
			return $this->db->where("kadi=",$email,"or")->where("email=",$email)->get("kullanici");
			
		}
		
	}

?>