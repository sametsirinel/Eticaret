<?php 

	class palanyetkisi_model extends Controller{
		
		public $dbname = "alanyetkisi";
		
		public function getall(){
			
			return $this->db->orderBy($this->dbname.".id","desc")->get($this->dbname);
			
		}
		
		public function insert($postlar=array()){
			
			return  $this->db->insert($this->dbname,$postlar);
			
		}
		
		public function deleteAlan($id){
			
			return $this->db->where("id=",$id)->delete($this->dbname);
			
		}
		
	}

?>