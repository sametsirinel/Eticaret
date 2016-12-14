<?php

  class kategoriler extends Controller{

    public function index(){

      $model = $this->kategoriler_model->getall();
      if($model && $model->totalRows()>0){

        $result = (array)$model->result();
        $dizi = ["durum"=>1,"mesaj"=>"İşlem Başarılı","kategoriler"=>$result];

      }else{

        $dizi = ["durum"=>0,"mesaj"=>"Veritabanına bağlanırken bir sorunla karşılaştık"];

      }
      //print_r($dizi);
      echo json::encode($dizi);

    }

  }

?>
