<?php 

	class pyetki_model extends Controller{
		
		public $dbname = "yetki";
		
		public function getall(){
			
			return $this->db->limit(Uri::segment(-1),12)->orderBy($this->dbname.".id","desc")->get($this->dbname);
			
		}
		
		public function insert($postlar=array()){
			
			return  $this->db->insert($this->dbname,$postlar);
			
		}
		
		public function getalanlar(){
			
			return $this->db->get("alanlar");
			
		}
		
		public function getalanyetkisi(){
			
			return $this->db->get("alanyetkisi");
			
		}
		
		public function insertYetkilimi($yetkiId,$alanId,$alanyetkisi){
			
			return $this->db->insert("yetkilimi",array("yetkiid"=>$yetkiId,"alanid"=>$alanId,"alanyetkiid"=>$alanyetkisi));
			
		}
		
		public function yetkialanlari($id){
			
			return $this->db->where("yetkiid=",$id)->orderBy("alanid")->get("yetkilimi");
			
		}
		
		public function deleteYetki($id){
			
			return $this->db->where("id=",$id)->delete($this->dbname);
			
		}
		
		public function deleteyetkiler($id){
			
			return $this->db->where("yetkiid=",$id)->delete("yetkilimi");
			
		}
		
	}

?>