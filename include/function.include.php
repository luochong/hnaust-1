<?php
/**
 *
 * 系统公用函数
 */

function getItemState($state_id){
	switch($state_id){
		case '0': return '未审核';
		case '1': return '院审核通过';
		case '2': return '校审核通过';
		case '3': return '未通过院审核';
		case '4': return '未通过校审核';
	}
}

function getNowDate(){
	date_default_timezone_set('Asia/Shanghai');
	return date("Y-m-d H:i:s");
}
function getYear(){
	date_default_timezone_set('Asia/Shanghai');
	return date("Y");
}
function getNowTate(){
	date_default_timezone_set('Asia/Shanghai');
	return date("Y-m-d 星期w");
}
function getPermittime(){
   date_default_timezone_set('Asia/Shanghai');
	return date("Ym");
    
}

function getItemType($itype)
{
           switch ($itype)
               {
                 	case '1':return "求真";break;
                  	case '2':return "求善";break;
             	    case '3':return "求美";break;
       	            case '6':return "求强";break;
               }
}
function getRank($irank)
{
        switch ($irank)
               {
                 	case '1':return "国家级奖";break;
                  	case '2':return "省级奖励";break;
             	    case '3':return "校级奖励";break;
             	    case '4':return "无";break;
       	           
               }
}


function fiterString($str){
	
	return htmlspecialchars_decode($str);
	
}
function getNewsState($id){
	  switch ($id)
               {
                 	case '1':return "已发布";break;
                  	case '0':return "未发布";break;
               }
}

function getetype($itype){
 switch($itype){
		case 'a': return "1";
		case 'b': return "2";
		case 'c': return "3";
		case 'd': return "4";
		case 'e':return "5";
		case 'f': return "6";
	}
}