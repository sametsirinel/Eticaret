<?php 

	class InternalDataGrid{
		
		protected $titles = array();
		protected $sql = null;
		protected $lonay = 1;
		protected $checkEdit = 1;
		protected $checkRemove = 1;
		protected $goEdit = null;
		protected $goRemove = null;
		protected $query = null;
		protected $itemCount = 0;
		protected $page = 0;
		protected $pageCount = 0;
		protected $limitStart = 0;
		protected $limit = 12;
		protected $limitQuery = null;
		protected $identityColumn = null;
		protected $columns=array();
		protected $dataGridMethod=null;
		protected $sqlOrderBy=null;
		protected $dataGridQuery=null;
		protected $dataGridOrderByColumn=null;
		protected $dataGridOrderByColumnType=null;
		
		
		public function sql($sql){
			if(Method::request("DataGridPage")){
				$page = Method::request("DataGridPage");
			}else{
				$page = 1;				
			}
			
			$this->tableName = $sql->tableName();
			$this->columns = $sql->columns();
			
			if(Method::request("query")){
				
				$this->dataGridQuery = Method::request("query");
				
				$query = Method::request("query");
				
				$ara = "";
				
				foreach($this->columns as $val=>$key){
				
					$ara.= $key." like '%$query%' or ";
									
				}
				
				$sql = DB::query("select * from ".$this->tableName." where ".substr($ara,0,-4));
				
			}
			
			$this->sql = $sql;
			
			$this->itemCount	=  $sql->totalRows();
			
			$this->query =  preg_replace('/limit\s+[0-9]+\s{0,}+\,\s{0,}+[0-9]+/i', '',strtolower( $sql->stringQuery()));
			
			$this->pageCount = ceil($this->itemCount/$this->limit);
			
			if(!isset($this->columns)){
				$this->columns = $this->sql->columns();
			}
			
			if($page<=1 || !is_numeric($page)){
					
				$this->page = 1;
				
			}else{
				
				$this->page = $page;
				
			}
			
			
			if(Method::request("OrderByColumn")){
				
				$this->dataGridOrderByColumn = Method::request("OrderByColumn");
				$this->dataGridOrderByColumnType = Method::request("OrderByColumnType");
				$this->sqlOrderBy = " order by ".$this->dataGridOrderByColumn." ".$this->dataGridOrderByColumnType;
				
			}
			
			$this->limitStart = $this->limit*( $this->page -1 );
			$this->limitQuery = DB::query($this->query.$this->sqlOrderBy." limit ".$this->limitStart.",".$this->limit);
			
			
			return $this;
			
		}
		
		public function titles($dizi){
			
			$this->titles = $dizi;
			
			return $this;
			
		}
		
		public function create($settings=array()){
			
			$config = Config::get('DataGrid');
			
			if(isset($settings["DataGridMethod"])){ $DataGridMethod = strtolower($settings["DataGridMethod"]); }else{ $DataGridMethod = strtolower($config["DataGridMethod"]); }
			$this->dataGridMethod = $DataGridMethod;
			if(isset($settings["tableBorder"])){ $tableBorder = $settings["tableBorder"]; }else{ $tableBorder = $config["tableBorder"]; }
			if(isset($settings["tableClass"])){ $tableClass = $settings["tableClass"]; }else{ $tableClass = $config["tableClass"]; }
			if(isset($settings["tableStyle"])){ $tableStyle = $settings["tableStyle"]; }else{ $tableStyle = $config["tableStyle"]; }
			
			if(isset($settings["editButtonName"])){ $editButtonName = $settings["editButtonName"]; }else{ $editButtonName = $config["editButtonName"]; }
			if(isset($settings["editButtonClass"])){ $editButtonClass = $settings["editButtonClass"]; }else{ $editButtonClass = $config["editButtonClass"]; }
			
			if(isset($settings["removeButtonName"])){ $removeButtonName = $settings["removeButtonName"]; }else{ $removeButtonName = $config["removeButtonName"]; }
			if(isset($settings["removeButtonClass"])){ $removeButtonClass = $settings["removeButtonClass"]; }else{ $removeButtonClass = $config["removeButtonClass"]; }
		
			if(isset($settings["searchButtonName"])){ $searchButtonName = $settings["searchButtonName"]; }else{ $searchButtonName = $config["searchButtonName"]; }
			if(isset($settings["searchButtonClass"])){ $searchButtonClass = $settings["searchButtonClass"]; }else{ $searchButtonClass = $config["searchButtonClass"]; }
			
			if(isset($settings["searchInputPlaceholder"])){ $searchInputPlaceholder = $settings["searchInputPlaceholder"]; }else{ $searchInputPlaceholder = $config["searchInputPlaceholder"]; }
			if(isset($settings["searchInputClass"])){ $searchInputClass = $settings["searchInputClass"]; }else{ $searchInputClass = $config["searchInputClass"]; }
		
			if(isset($settings["identityColumn"])){ $identityColumn = $settings["identityColumn"]; }else{ $identityColumn = $config["identityColumn"]; $this->identityColumn = $identityColumn; }
			
			$dataGridType = Method::request("dataGridType"); 
			
			if($dataGridType=="dataGridTypeRemove"){
				
				$this->doRemove();
				
			}else if($dataGridType=="dataGridTypeEdit"){
				
				return $this->doEdit();
				
			}else if($dataGridType=="dataGridTypeMakeEdit"){
				
				$this->makeEdit();
				
			}else{
				
				$baslik = "";$alanlar="";
				
				$baslik = "<th><input type='checkbox' id='allchecked'/></th>";
				
				foreach($this->columns as $val =>$key){
					
					$orderBy = "asc";
						
					if(Method::request("OrderByColumnType")=="asc" && Method::request("OrderByColumn")==$key){
						
						$orderBy="desc";
						
					}
				
					if(is_numeric($val)){
						
						
						
						$baslik .= "
							<th>
								<form action='' method='".$this->dataGridMethod."'>
									<input type='hidden' name='query' value='".$this->dataGridQuery."'/>
									<input type='hidden' name='type' value='DataGridPage'/>
									<input type='hidden' name='DataGridPage' value='".$this->page."'/>
									<input type='hidden' name='OrderByColumn' value='".$key."'/>
									<input type='hidden' name='OrderByColumnType' value='".$orderBy."'/>
									<button href='' onclick='submit()' style='border:none;background:none'>".$val."</button>
								</form>
							</th>";
					
					}else{
						
						$baslik .= "
							<th>
								<form action='' method='".$this->dataGridMethod."'>
									<input type='hidden' name='query' value='".$this->dataGridQuery."'/>
									<input type='hidden' name='type' value='DataGridPage'/>
									<input type='hidden' name='DataGridPage' value='".$this->page."'/>
									<input type='hidden' name='OrderByColumn' value='".$key."'/>
									<input type='hidden' name='OrderByColumnType' value='".$orderBy."'/>
									<button href='' onclick='submit()' style='border:none;background:none'>".$val."</button>
								</form>
							</th>";
						
					}
					
				}
				
				if($this->checkEdit==1){
					
					$baslik.="<th><button style='border:none;background:none;'>".$editButtonName."</button></th>";
					
				}
				
				if($this->checkRemove==1){
					
					$baslik.="<th><button style='border:none;background:none;'>".$removeButtonName."</button></th>";
				
				}
				
				$newquery = $this->limitQuery->result();
				if(count($newquery)<1){
					
					$alanlar.= "<tr><td colspan='".(count($this->columns)+2)."' style='text-align:center'>Bu kriterlerde içerik bulunamadı</td></tr>";
					
				}else{
					
					foreach($newquery as $row){
						
						$alanlar .="<tr>";
						
						$alanlar .= "<td><input type='checkbox' class='DataGridChecked' name='DataGridName' value='".$row->$identityColumn."'/></td>";
						foreach($this->columns as $val => $key){
							
							$alanlar .= "<td>".$row->$key."</td>";
						
						}
						
						if($this->checkEdit==1){
							
							$alanlar .=
								'<td>
									<form action="'.$this->goEdit.'" method="'.$DataGridMethod.'">
										<input type="hidden" name="dataGridType" value="dataGridTypeEdit">
										<input type="hidden" name="dataGridId" value="'.$row->$identityColumn.'" />
										<button type="submit" class="'.$editButtonClass.'">'.$editButtonName.'</button>
									</form>
								</td>';
								
						}
						
						if($this->checkRemove==1){
								
							$alanlar .=
								'<td>
									<form action="'.$this->goRemove.'" method="'.$DataGridMethod.'">
										<input type="hidden" name="dataGridType" value="dataGridTypeRemove">
										<input type="hidden" name="dataGridId" value="'.$row->$identityColumn.'" />
										<button type="submit"  class="'.$removeButtonClass.'">'.$removeButtonName.'</button>
									</form>
								</td>';
							
						}
						
						$alanlar .="</tr>";
						
					}
						
				}
				
				return '<table id="datagrid" border="'.$tableBorder.'" class="'.$tableClass.'" style="'.$tableStyle.'"><thead><tr>'.$baslik.'</tr></thead><tbody>'.$alanlar.'</tbody></table>'.$this->pagination();
				
			}
			
		}
		
		protected function search(){
			
			$config = Config::get('DataGrid');
			if(isset($settings["searchButtonName"])){ $searchButtonName = $settings["searchButtonName"]; }else{ $searchButtonName = $config["searchButtonName"]; }
			if(isset($settings["searchButtonClass"])){ $searchButtonClass = $settings["searchButtonClass"]; }else{ $searchButtonClass = $config["searchButtonClass"]; }
			
			if(isset($settings["searchInputPlaceholder"])){ $searchInputPlaceholder = $settings["searchInputPlaceholder"]; }else{ $searchInputPlaceholder = $config["searchInputPlaceholder"]; }
			if(isset($settings["searchInputClass"])){ $searchInputClass = $settings["searchInputClass"]; }else{ $searchInputClass = $config["searchInputClass"]; }
		
			return '<form action="" method="'.$this->dataGridMethod.'" style="float:right;margin:20px;50px;">
						<div class="input-group">
							<input type="hidden" name="dataGridType" value="dataGridSearch">
							<input type="text" name="query" class="'.$searchInputClass.'" placeholder="'.$searchInputPlaceholder.'"/>
							<div class="input-group-btn">
								<button type="submit"  class="'.$searchButtonClass.'">'.$searchButtonName.'</button>
							</div>
						</div>
						</form>';
			
		}
		
		public function columns($dizi = array()){
			
			$this->columns = $dizi;
			
			return  $this;
			
		}
		
		public function limit($lim){
			
			$this->limit = $lim;
			
			return $this;
			
		}
		
		protected function pagination(){
			
			$pg = $this->page;
			
			$sayfa_sayi = $this->pageCount;
			
			$pagination = "<style>.DataGridLeft{float:left}</style>";
			if($this->pageCount >1){
			
				if($this->page < 5){
					
					if($this->pageCount < 5){
						
						$start = 1;
						$finish = $this->pageCount;
						
					}else{
						
						$start = 1;
						$finish = 5;
						
					}
					
				}else{
					
					if($this->itemCount < $this->page+5){
						
						$start = $this->page -4;
						$finish = $this->itemCount;
						
					}else{
						
						$start = $this->page - 5;
						$finish = $this->page + 5;
						
					}				
					
				}
				
				for($x = $start ; $x<=$finish;$x++){
					
					$pagination .= 
						'<div class="DataGridLeft">
							<form action="" method="'.$this->dataGridMethod.'">
								<input type="hidden" name="query" value="'.$this->dataGridQuery.'"/>
								<input type="hidden" name="OrderByColumnType" value="'.$this->dataGridOrderByColumnType.'"/>
								<input type="hidden" name="OrderByColumn" value="'.$this->dataGridOrderByColumn.'"/>
								<input type="hidden" name="type" value="DataGridPage"/>
								<input type="hidden" name="DataGridPage" value="'.$x.'"/>
								<input type="submit" class="btn btn-primary" style="margin:5px;" value="'.$x.'"/>
							</form>
						</div>';
					
				}
				
			}
			
			return $pagination;
			
		}
		
		public function edit($value = true,$go = null){
			
			$this->checkEdit = $value;
			
			$this->goEdit = $go;
			
			return $this;
			
		}
		
		public function remove($value = true,$go = null){
			
			$this->checkRemove = $value;
			
			$this->goRemove = $go;
			
			return $this;
			
		}
		
		protected function doRemove(){
			
			$sql = $this->sql;
			$tableName = $sql->tableName();
			DB::where($this->identityColumn."=",Method::request("dataGridId"))->delete($tableName);
			redirect($_SERVER['HTTP_REFERER']);
		
		}
		
		public function doEdit($ayar=null){
			
			$config = Config::get('DataGrid'); 
			
			if(isset($settings["DataGridMethod"])){ $DataGridMethod = strtolower($settings["DataGridMethod"]); }else{ $DataGridMethod = strtolower($config["DataGridMethod"]); }
			$this->dataGridMethod = $DataGridMethod;
			if(isset($settings["tableBorder"])){ $tableBorder = $settings["tableBorder"]; }else{ $tableBorder = $config["tableBorder"]; }
			if(isset($settings["tableClass"])){ $tableClass = $settings["tableClass"]; }else{ $tableClass = $config["tableClass"]; }
			if(isset($settings["tableStyle"])){ $tableStyle = $settings["tableStyle"]; }else{ $tableStyle = $config["tableStyle"]; }
			if(isset($settings["editButtonName"])){ $editButtonName = $settings["editButtonName"]; }else{ $editButtonName = $config["editButtonName"]; }
			if(isset($settings["editButtonClass"])){ $editButtonClass = $settings["editButtonClass"]; }else{ $editButtonClass = $config["editButtonClass"]; }
			if(isset($settings["editFormInputClass"])){ $editFormInputClass = $settings["editFormInputClass"]; }else{ $editFormInputClass = $config["editFormInputClass"]; }
			
			$select = "";
			foreach($this->columns as $row){
				
				$select.= $row.",";
				
			}
			
			
			$tableName = $this->sql->tableName();
			
			$editQuery = "select * from $tableName  where ".$tableName.".".$this->identityColumn." = '".Method::request("dataGridId")."'";
						
			$sql = DB::query($editQuery);
			
			$edit = "";
			
			if($sql->totalRows()<1){
				
				echo Error::set("Bu ID de içerik bulunamadı");
				
			}else{
				
				$sqli = $sql->row();
				
				$edit.= form::open("dataGridForm",array("method"=>"post","action"=>"?dataGridType=dataGridTypeMakeEdit&dataGridId=".Method::request("dataGridId")));
				
				$edit.= "<table class='$tableClass'>";
				foreach($this->columns as $val=>$row){
					if(is_numeric($val)){
						
						$edit.= "<tr><th>".$row."</th><td>";
						
					}else{
						
						$edit.= "<tr><th>".$val."</th><td>";
						
					}
					if($this->identityColumn==$row){
						$edit.= form::text($row,$sqli->$row,array("disabled"=>"disabled","class"=>$editFormInputClass));
					}else{
						$edit.= form::text($row,$sqli->$row,array("class"=>$editFormInputClass));
					}
					$edit.= "</td></tr>";
				}
				$edit.= "<tr><td></td><td><button type='submit' class='$editButtonClass' >$editButtonName</button></td></tr>";
				$edit.= "</table>";
				$edit.= form::close();
				
				return $edit;
				
			}
			
		}
		
		protected function makeEdit(){
			
			$postlar = Method::request();
			unset($postlar['dataGridType']);
			unset($postlar['dataGridId']);
			
			$tableName = $this->sql->tableName();
			
			print_r($postlar);
			
			DB::where($this->identityColumn."=",Method::request("dataGridId"))->update($tableName,$postlar);
			
			redirect($_SERVER['HTTP_REFERER']);	
				
			
		}
		
		
	}

?>