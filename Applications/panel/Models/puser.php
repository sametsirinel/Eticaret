<?php 

	class user_model extends Controller{
		
		public $dbname = "kullanici";
		
		public function getall(){
			
			return $this->db->orderBy($this->dbname.".id","desc")->get($this->dbname);
			
		}
		
		public function getid($id){
			
			return $this->db->select($this->dbname.".*,
			concat(".$this->dbname.".adi,' ',".$this->dbname.".soyadi) as adisoyadi,
			ifnull(dosyalar.adi,'noimg.gif') as resimi")->
			join("dosyalar","dosyalar.id = ".$this->dbname.".resim","left")->
			where($this->dbname.".id=",$id)->
			get($this->dbname);
			
		}
		
		public function checkemail($email,$id){
			
			return $this->db->where("email=",$email,"and")->where("id<>",$id)->get($this->dbname);
			
		}
		
		public function cuser($email){
			
			return $this->db->where("kadi=",$email)->get($this->dbname);
			
		}
		
		public function cemail($email){
			
			return $this->db->where("email=",$email)->get($this->dbname);
			
		}
		
		public function checkpassword($sifre,$id){
			
			return $this->db->where("sifre=",sha1(md5($sifre)),"and")->where("id=",$id)->get($this->dbname);
			
		}
		
		public function doEdit($postlar,$id){
			
			return $this->db->where("id=",$id)->update($this->dbname,$postlar);
			
		}
		
		public function doChangePassword($sifre,$id){
			
			return $this->db->where("id=",$id)->update($this->dbname,array("sifre"=>sha1(md5($sifre))));
			
		}
		
		public function removeUser($id){
			
			return $this->db->where("id=",$id)->delete($this->dbname);
			
		}
		
		public function insert($postlar){
			
			return $this->db->insert($this->dbname,$postlar);
			
		}
		
		public function yetkiler($id){
			
			return $this->db->where("id>",$id,"or")->where("id=",$id)->get("yetki");
			
		}
		
		public function updateYetki($userid,$yetki){
			
			return $this->db->where("id=",$userid)->update($this->dbname,array("yetki"=>$yetki));
			
		}
		
		public function editImg($id,$resim){
			
			return $this->db->where("id=",$id)->update($this->dbname,array("resim"=>$resim));
			
		}
		
	}

?>