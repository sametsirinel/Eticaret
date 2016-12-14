<?php

  class detail extends Controller{

    public function index(){

      $id = Uri::Segment(-1);
      $seo_link = Uri::segment(-2);

      if($seo_link==null || $id==0 || !is_numeric($id))
        redirect(baseurl("404"));

      $model = $this->detail_model->getSeo($seo_link,$id);
      //echo $model->stringQuery();exit;
      if($model->totalRows()<1 && $model)
        redirect(baseurl("404"));

      $row = $model->row();

      $urunid = $row->id;

      $data = array(

        "urun"=>$row,
        "urunResimleri"=>$this->detail_model->getUrunResim($urunid)->result(),
        "urunOzellikleri"=>$this->detail_model->getOzellik($urunid)->result(),
        "maxmin"=>$this->detail_model->getMaxMin($urunid)->row(),

      );

      $veriler = array(

        "sayfa"=>Import::page("sayfalar/detay",$data,true)

      );

      Import::MasterPage($veriler);


    }

  }

?>
