<?php 

	class pgruplar_model extends Controller{
		
		public $dbname = "gruplar";
		
		public function getall(){
			
			return $this->db->orderBy($this->dbname.".id","desc")->get($this->dbname);
			
		}
		
		public function insert($postlar=array()){
			
			return  $this->db->insert($this->dbname,$postlar);
			
		}
		
		public function deleteAllOzellik($id){
			
			return $this->db->where("grupid=",$id)->delete("ozellikIliski");
			
		}
		
		public function deleteAlan($id){
			
			return $this->db->where("id=",$id)->delete($this->dbname);
			
		}
		
		public function checkInsert(){
			
			return $this->db->where("onay=",2)->get($this->dbname);
			
		}
		
		public function update( $id = 0 , $postlar = [] ){
			
			return $this->db->where("id=",$id)->update($this->dbname,$postlar);
			
		}
		
		public function insertOzellik($ozellik){
			
			return $this->db->insert("ozellikler",["adi"=>$ozellik]);
			
		}
		
		public function getId($id){
			
			return $this->db->where("id=",$id)->get($this->dbname);
			
		}
		
		public function getOzellik($id){
			
			return $this->db->where("grupid=",$id)->
			join("ozellikler","ozellikler.id = ozellikIliski.ozellikid","inner")->
			get("ozellikIliski");
			
		}
		
		public function insertIliski($postlar){
			
			return $this->db->insert("ozellikIliski",$postlar);
			
		}
		
		public function checkOzellik($ozellik){
			
			return $this->db->where("adi=",$ozellik)->get("ozellikler");
			
		}
		
	}

?>