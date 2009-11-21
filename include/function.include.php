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

