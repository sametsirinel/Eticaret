<?php 
	
	class pdosyalar_model extends Controller{
		
		public $dbname = "dosyalar";
		
		public function getall(){
			
			return $this->db->orderBy($this->dbname.".id","desc")->get($this->dbname);
			
		}
		
		public function get($id){
			
			return $this->db->where("id=",$id)->get($this->dbname);
			
		}
		
		public function delete($id){
			
			return $this->db->where("id=",$id)->delete($this->dbname);
			
		}
		
		public function getdocument(){
			
			return $this->db->query("select * from ".$this->dbname." where adi like '%.doc%' or adi like '%.pdf%' or adi like '%.docx%' or adi like  '%.xsl%'");
			
		}
		
		public function getaudio(){
			
			return $this->db->query("select * from ".$this->dbname." where adi like '%.mp3%' or adi like '%.mp4%' or adi like '%.flv%' or adi like  '%.avi%'");
			
		}
		
		public function getimg(){
			
			return $this->db->query("select * from ".$this->dbname." where adi like '%.png%' or adi like '%.jpg%' or adi like '%.jpeg%' or adi like  '%.gif%'");
			
		}
		
		public function lastItem(){
			
			return $this->db->orderBy("id","desc")->limit(20)->get($this->dbname);
			
		}
		
		public function SearchImg($key){
			
			return $this->db->where("adi like","%$key%")->get($this->dbname);
			
		}
		
	}

?>