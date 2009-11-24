<?php
/**
 *
 * 系统公用函数
 */

function getItemState($state_id){
	switch($state_id){
		case '0': return '未审核';
		case '1': return '院审核';
		case '2': return '校审核';
		case '3': return '未通过院审核';
		case '4': return '未通过校审核';
	}
}

function getNowDate(){
	date_default_timezone_set('Asia/Shanghai');
	return date("Y-m-d H:i:s");
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
                 	case '1':return "国家奖";break;
                  	case '2':return "省级奖";break;
             	    case '3':return "市级奖";break;
       	           
               }
}
