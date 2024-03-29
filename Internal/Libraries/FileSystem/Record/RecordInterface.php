<?php
namespace ZN\FileSystem;

interface RecordInterface
{
	//----------------------------------------------------------------------------------------------------
	//
	// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	// Site       : www.zntr.net
	// Lisans     : The MIT License
	// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
	//
	//----------------------------------------------------------------------------------------------------
	
	/******************************************************************************************
	* CREATE RECORD                                                                       	  *
	*******************************************************************************************
	| Genel Kullanım: Yeni kayıt dizini oluşturuluyor.		   							      |
	******************************************************************************************/	
	public function createRecord($recordName);
	
	/******************************************************************************************
	* SELECT RECORD                                                                       	  *
	*******************************************************************************************
	| Genel Kullanım: Kayıt dizini seçiliyor     			   							      |
	******************************************************************************************/	
	public function selectRecord($recordName);
	
	/******************************************************************************************
	* CREATE TABLE                                                                         	  *
	*******************************************************************************************
	| Genel Kullanım: Tablo oluşturmak için kullanılıyor.								      |
	******************************************************************************************/	
	public function createTable($tableName);
	
	/******************************************************************************************
	* TABLE                                                                              	  *
	*******************************************************************************************
	| Genel Kullanım: Tablo seçmek için kullanılıyor.		   							      |
	******************************************************************************************/	
	public function table($table);
	
	/******************************************************************************************
	* WHERE                                                                              	  *
	*******************************************************************************************
	| Genel Kullanım: Silinecek veri id'sini belirtmek için kullanılır.					      |
	******************************************************************************************/	
	public function where($where);
	
	/******************************************************************************************
	* SELECT / GET                                                                            *
	*******************************************************************************************
	| Genel Kullanım: Veri seçmek için kullanılır.			   							      |
	******************************************************************************************/	
	public function select($table, $where);
	
	/******************************************************************************************
	* GET / SELECT                                                                            *
	*******************************************************************************************
	| Genel Kullanım: Veri seçmek için kullanılır.			   							      |
	******************************************************************************************/	
	public function get($table, $where);
	
	/******************************************************************************************
	* ROW                                                                                	  *
	*******************************************************************************************
	| Genel Kullanım: Tek bir kayıdı seçmek için kullanılır	   							      |
	******************************************************************************************/	
	public function row($where);
	
	/******************************************************************************************
	* RESULT                                                                             	  *
	*******************************************************************************************
	| Genel Kullanım: Object veri türünde sonuçları listeler. 							      |
	******************************************************************************************/	
	public function result($type);
	
	/******************************************************************************************
	* RESULT ARRAY                                                                        	  *
	*******************************************************************************************
	| Genel Kullanım: Array veri türünde sonuçları listeler.  							      |
	******************************************************************************************/	
	public function resultArray();
	
	/******************************************************************************************
	* JSON                                                                                    *
	******************************************************************************************/
	public function resultJson();
	
	/******************************************************************************************
	* INSERT                                                                             	  *
	*******************************************************************************************
	| Genel Kullanım: Kayıt eklemek için kullanılır.			   							  |
	******************************************************************************************/	
	public function insert($table, $data);
	
	/******************************************************************************************
	* UPDATE                                                                              	  *
	*******************************************************************************************
	| Genel Kullanım: Kayıtları güncellemek için kullanılmaktadır.   					      |
	******************************************************************************************/	
	public function update($table, $data, $where);
	
	/******************************************************************************************
	* DELETE                                                                             	  *
	*******************************************************************************************
	| Genel Kullanım: Kayıt silmek için kullanılır.			   							      |
	******************************************************************************************/	
	public function delete($table, $where);
}