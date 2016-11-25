<?php 

	class giris_model extends Model{
		
		public function GirisKontrol($kadi,$sifre){
			
			$sifre = sha1(md5($sifre));
			return $this->db->where("kadi=",$kadi,"and")->where("sifre=",$sifre,"and")->get("kullanici");
			
		}
		
	}

?>