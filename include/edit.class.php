<?php 
/**
 * 
 * 编辑器使用说明：
 * 
 * 1.控件需要  editor/文件夹所有的东西
 * 
 * 2.调用方法
 *    加载控件
 * 	两参数 $ctrl->content  = '';//原理的文章内容
 * 		  $ctrl->from_name = '';//表单中textarea的name
 *  获得数据需调用 js: if(<?php $ctrl->getContent()?>) 提交
 * 
 * */
class editControl  {
	public $content;
	public $from_name;

	public function getContent(){
		echo 'checkEditor()';
	}
	
	public function display()
	{
		include_once('edit.php');
	
	}


}
	
