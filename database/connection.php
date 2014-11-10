<?php

class connection {
  
  var $linkDatabase="";
  
  // Connection with MySql database
  function newConnection() {
    
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $database = "son_project_sample";

    $this->linkDatabase = mysql_connect($host, $user, $pass);
    $selectDatabase = mysql_select_db($database, $this->linkDatabase);

    // If there's no connection with the server, using usr and pass
    if (!$this->linkDatabase) {
        die ("Connection failed: Couldn't connect to the server");
    } elseif (!$selectDatabase) {
        die ("Connection failed: Couldn't connect to the database");	
    }
    
  }
  
  // Execute the query and return the result
  function execSql($query) {
    if ($result = mysql_query($query, $this->linkDatabase)) {
      return $result;
    } else {
      return 0;
    }
  }
  
  // Execute the query and return the new record Id
  function execSqlId($query) {
    if ($result = mysql_query($query, $this->linkDatabase)) {
        $result=mysql_insert_id();
        return $result;
    } else {
      return 0;
    }
  }
  
  // função para desconectar do banco de dados.
  function closeConnection(){
    mysql_close($this->linkDatabase);
  }
  
  // função para adicionar e alterar o registro
  function inputData($opInput,$data) {
      // Receive the field's name
      $sql1='';
      // Receive the field's value
      $sql2='';
    
    // Retrieve the table name from a hidden field, inside the page's form
    if($opInput=='add'){
       $sql="INSERT INTO ".$data['table']." (";
    }elseif($opInput=='edt'){
       $sql="UPDATE ".$data['table']."  set ";
    }
  
    while(list($fieldName,$value) = each($data)){
        // Fields that won't be included in the query
        if(($fieldName <> 'table') and  ($fieldName <> 'keyLabel') and ($fieldName <> 'keyValue') and ($fieldName <> 'noSave') and (strpos($fieldName,'edt') === false) and
            (strpos($fieldName, 'new') === false) and ($fieldName <> 'harvestInputs') and ($fieldName <> 'numEfforts')) {

            if($opInput=='add'){
              $sql1.="$fieldName,";
              $sql2.="'$value',";
            }elseif($opInput=='edt'){
              if($fieldName <> 'EffortNumber')
                $sql1.="$fieldName='$value',";
            }
        }
    }
   
    if($opInput=='add'){
      //Remove last comma
      $sql1=substr($sql1,0,strlen($sql1)-1);
      
      //Remove last comma
      $sql2=substr($sql2,0,strlen($sql2)-1); 
      
      // Build the query
      $sql.=$sql1.") values (".$sql2.")";
      
    }elseif($opInput=='edt'){
       
        // Remove last comma
        $sql1=substr($sql1,0,strlen($sql1)-1);
        
        $sql2=" where ".$data['keyLabel']."='".$data['keyValue']."'";
        
        // if($chv2 and $chvin2)
        //   $sql2.=" and ".$data['chv2']."='".$data['chvin2']."'";  
         $sql.=$sql1.$sql2;
    }
    
    //echo $sql.'<br/>';
    
    if($opInput=='add'){
      $resultExec=$this->execSqlId($sql);
    }elseif($opInput=='edt'){
      $resultExec=$this->execSql($sql);
    }
   
    
    if($resultExec){
      return $resultExec;
    }else{
      return 0;
    }
  }
  
}
?>