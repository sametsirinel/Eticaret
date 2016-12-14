<?php

	class urunler extends Controller{

		public function index(){

			$data = array(


			);

			$veriler = array(

				"sayfa"=>Import::page("sayfalar/anasayfa",$data,true)

			);

			Import::MasterPage($veriler);

		}

		public function ajaxDetail($seo_link=null,$id=0){

      $id = Uri::Segment(-1);
      $seo_link = Uri::segment(-2);

      if($seo_link==null || $id==0 || !is_numeric($id)){
        echo Import::page("sayfalar/page404",[],true); return true;
      }

      $model = $this->detail_model->getSeo($seo_link,$id);
      //echo $model->stringQuery();exit;
      if($model->totalRows()<1 && $model){
        echo Import::page("sayfalar/page404",[],true); return true;
      }

      $row = $model->row();

      $urunid = $row->id;

      $data = array(

        "urun"=>$row,
        "urunResimleri"=>$this->detail_model->getUrunResim($urunid)->result(),
        "urunOzellikleri"=>$this->detail_model->getOzellik($urunid)->result(),
        "maxmin"=>$this->detail_model->getMaxMin($urunid)->row(),

      );


      echo Import::page("sayfalar/urunler/ajaxModal",$data,true);


		}

	}

?>
