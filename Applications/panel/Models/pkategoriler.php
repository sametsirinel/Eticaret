<?php 

	class pkategoriler_model extends Controller{
		
		public $dbname = "kategoriler";
		
		
		public function getall(){
			
			return $this->db->orderBy($this->dbname.".id","desc")->select("id,adi")->get($this->dbname);
			
		}
		
		public function get($id){
			
			return $this->db->where("id=",$id)->get($this->dbname);
			
		}
		
		public function insert($postlar=array()){
			
			return  $this->db->insert($this->dbname,$postlar);
			
		}
		
		public function edit($postlar=array(),$id=0){
			
			return  $this->db->where("id=",$id)->update($this->dbname,$postlar);
			
		}
		
		public function deleteAlan($id){
			
			return $this->db->where("id=",$id)->delete($this->dbname);
			
		}
		
		public function updateSira($postlar,$id){
			
			return $this->db->where("id=",$id)->update($this->dbname,$postlar);
			
		}
		
		
	}

?>