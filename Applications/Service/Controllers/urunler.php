<?php

  class urunler extends Controller{

    public function index(){

      $model = $this->urunler_model->getall();
      if($model && $model->totalRows()>0){

        $result = (array)$model->result();
        for($x=0;$x<count($result);$x++){
          $result[$x] = (array)$result[$x];
          $result[$x]["resmi"] = baseurl(UPLOADS_DIR.$result[$x]["resmi"]);

        }
        
        $dizi = ["durum"=>1,"mesaj"=>"İşlem Başarılı","urunler"=>$result];

      }else{

        $dizi = ["durum"=>0,"mesaj"=>"Veritabanına bağlanırken bir sorunla karşılaştık"];

      }
      //print_r($dizi);
      echo json::encode($dizi);

    }

  }

?>
