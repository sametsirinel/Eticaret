<?php 

	class pfirmalar_model extends Controller{
		
		public $dbname = "firmalar";
		
		
		public function getall(){
			
			return $this->db->orderBy($this->dbname.".id","desc")->get($this->dbname);
			
		}
		
		public function get($id){
			
			return $this->db->select($this->dbname.".*,IFNULL(dosyalar.adi,'noimg.gif') as resimadi,IFNULL(dosyalar.id,'0') as resimid")->join("dosyalar","dosyalar.id = ".$this->dbname.".resim","left")->where($this->dbname.".id=",$id)->get($this->dbname);
			
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