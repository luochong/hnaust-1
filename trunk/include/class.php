<?php
class mysql_db{	
	var $hostname;
	var $dbusername;
	var $dbpassword;
	var $dbname;	
	var $hwnd;
	
	function mysql_db($host,$dbuser,$dbpwd,$db){	//���캯��
		$this->hostname=$host;
		$this->dbusername=$dbuser;
		$this->dbpassword=$dbpwd;
		$this->dbname=$db;		
	}
	
	function db_connect(){          //�������ݿ�
		  $this->hwnd=mysql_connect("$this->hostname","$this->dbusername","$this->dbpassword");
  		  mysql_select_db("$this->dbname");  		
	}						
	
	function db_insert($table,$array){						//�������� ����array�Ǵ��ݹ����ģ�Ҫ���ַ����±���������ݿ����ֶ�������ͬ
		  $head=mysql_list_fields("$this->dbname","$table",$this->hwnd);
		  $count=mysql_num_fields($head);		
		  
		  $field=mysql_field_name($head,1);
		  $value="\"".$array[mysql_field_name($head,1)]."\"";
		
		  for($i=2;$i<$count;$i++){
		  	$field=$field.",".mysql_field_name($head,$i);
			$value=$value.","."\"".$array[mysql_field_name($head,$i)]."\"";
		  }
		  		 
		  $chaxun="insert into $table($field) values($value)";			  
		  $resu=mysql_query($chaxun,$this->hwnd);
		  return($resu);		  		  		  		  
	}
	
	function db_show($table,$field,$value){									//��ʾ������¼
		  $chaxun="select * from $table where $field='$value'";
		  $resu=mysql_query($chaxun,$this->hwnd);
		  $array=mysql_fetch_array($resu);
		  return($array);
	}
	
	function db_edit($table,$field,$value1,$array,$array1,$number){            //�滻������¼
		  $value=$array1[0]."="."\"".$array[0]."\"";
		  for($i=1;$i<$number;$i++){
		  		$value=$value.",".$array1[$i]."="."\"".$array[$i]."\"";
		  }
		  
		  $chaxun="update $table set $value where $field='$value1' ";
		  $resu=mysql_query($chaxun,$this->hwnd);
		  return($resu);
	}
	
	function db_del($table,$field,$value){									//ɾ��������¼
	
		  $chaxun="delete from $table where $field='$value'";
		  $resu=mysql_query($chaxun,$this->hwnd);
		  return($resu);
	}
	
}
?>
