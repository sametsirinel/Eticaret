<?php 

	class pkampanyalar_model extends Controller{
		
		public $dbname = "kampanyalar";
		
		
		public function getall(){
			
			return $this->db->orderBy($this->dbname.".id","desc")->select("id,(select count(id) from firmakupon where firmakupon.kampanyaid=".$this->dbname.".id and firmakupon.onay=0) as kuponsayi,if(onay=1,'Kampanya Yayında','Yayından Kaldırıldı') as onay,afis,afis1,adi,baslangictarihi,bitistarihi")->get($this->dbname);
			
		}
		
		public function searchFirma($key){
			
			return $this->db->where("adi like ","%$key%")->get("firmalar");
			
		}
		
		public function get($id){
			
			return $this->db->select($this->dbname.".*,IFNULL(kresim.adi,'noimg.gif') as resim,kresim.id as resimid,f.adi as firmadi,IFNULL(d.adi,'noimg.gif') as firmaresim,(select count(id) from firmakupon where firmakupon.kampanyaid = $id and onay=0 ) as biletsayi")->
			join("firmalar as f","f.id = kampanyalar.firmaid","inner")->join("dosyalar as d","d.id = f.resim","left")->join("dosyalar as kresim","kresim.id = ".$this->dbname.".resim","left")->where($this->dbname.".id=",$id)->get($this->dbname);
			
		}
		
		public function kuponVarmi($kupon,$kampanyaid){

			return $this->db->where("kupon=",$kupon,"and")->where("kampanyaid=",$kampanyaid,"and")->where("onay=",0)->get("firmakupon");
			
		}
		
		public function kuponEkle($kupon,$firmaid){

			return $this->db->insert("firmakupon",array("kupon"=>$kupon,"kampanyaid"=>$firmaid));
			
		}
		
		public function insert($postlar=array()){
			
			return  $this->db->insert($this->dbname,$postlar);
			
		}
		
		public function insertImg($id,$resimid){
			
			return  $this->db->insert("kampanya_resmi",array("resim"=>$resimid,"kampanyaid"=>$id));
			
		}
		
		public function edit($postlar=array(),$id=0){
			
			return  $this->db->where("id=",$id)->update($this->dbname,$postlar);
			
		}
		
		public function deleteAlan($id){
			
			return $this->db->where("id=",$id)->delete($this->dbname);
			
		}
		
		public function deleteKampanyaImg($id){
			
			return $this->db->where("id=",$id)->delete("kampanya_resmi");
			
		}
		
		public function totalBilet($id){
			
			return $this->db->where("kampanyaid=",$id,"and")->where("onay=",0)->get("firmakupon");
			
		}
		
		public function getKampanyaImg($id){
			
			return $this->db->select("kampanya_resmi.*,IFNULL(dosyalar.kucuk,'noimg.gif') as resimadi")->join("dosyalar","dosyalar.id = kampanya_resmi.resim","left")->where("kampanyaid=",$id)->get("kampanya_resmi");
			
		}
		
		public function getKategori(){
			
			return $this->db->get("kategoriler");
			
		}
		
		
	}

?>