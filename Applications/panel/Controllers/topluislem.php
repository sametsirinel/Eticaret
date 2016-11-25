<?php 

	class topluislem extends Controller{
		
		protected $alan = 2;
		
		protected $select = 1;
		
		protected $insert = 2;
		
		protected $update = 3;
		
		protected $delete = 4;
		
		protected $OnayKontrol = 5;
		
		protected $klasor = "user";
		
		protected $model = "user_model";
		
		protected $modulAdi = "Kullanýcý";
		
		protected $modulAdic = "";
		
		public function index(){
			
			if(Method::post()){
				
				$hata = 0;
				$TobluIslemType  = Method::post("TobluIslemType");
				$TobluIslemDbName  = Method::post("TobluIslemDbName");
				
				$idler = explode(",",Method::post("TopluIslemHidden"));
				
				foreach($idler as $id){
					
					
					if($TobluIslemType=="oDegis"){
						
						$onay = Db::where("id=",$id)->get($TobluIslemDbName)->row()->onay;
						
						if($onay==1){
							
							$onay= 0;
							
						}else{
							
							$onay = 1;
							
						}
						
						if(!DB::where("id=",$id)->update($TobluIslemDbName,array("onay"=>$onay)))
							$hata = 1;
							
							
					}else{
						
						
						DB::where("id=",$id)->delete($TobluIslemDbName);
						
						
						if(!DB::where("id=",$id)->update($TobluIslemDbName,array("onay"=>$onay)))
							$hata = 1;
						
					}
						
				}
				
				if($hata==0){
					
					Warning::set("Onay Durumlarý Deðiþtildi.","success");
					
				}else{
					
					Warning::set("Bir sorunla kaþýlaþtýk. Lütfen daha sonra tekrar deneyin.","warning");
					
				}
				
			
			}else{
				
				Warning::set("Herhangi Bir Post Veri Bulunamadý","warning");
				
			}
			
		}
		
	}

?>