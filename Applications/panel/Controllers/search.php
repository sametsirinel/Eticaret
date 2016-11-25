<?php

  class search extends Controller{

    public function index(){

      Import::page("panel/sayfalar/search/search","");

    }

    public function doSearch(){

      $postlar= Method::post();

      if($postlar){

        Validation::rules("search",array("html","injection","trim","required"),"Arama Alanı");

        $error = Validation::error("string");

        if($error){

          Warning::set($error,"Warning");

        }else{

          $model = $this->search_model->getAll(Method::post("search"));

          if($model){

            foreach($model->result() as $row){

              echo $row->adi;
              if($row->type==1){

                echo "<br/> Kullanıcı Sayfasına Gider<br><br>";

              }else if($row->type==2){

                echo "<br/> Urunler Sayfasına Gider<br><br>";

              }else{

                echo "<br/> Kategoriler Sayfasına Gider<br><br>";

              }

            }

          }else{

              Warning::Set("Baglantı Hatası");

          }

        }

      }else{

        Warning::set("Post YOk");

      }

    }

  }
?>
