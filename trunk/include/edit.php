<script src="<?php echo APP_ROOT?>/admin/editor/all.js"></script>
<script src="<?php echo APP_ROOT?>/admin/editor/editor.js"></script>
<script src="<?php echo APP_ROOT?>/admin/editor/editor_toolbar.js"></script>
<style type="text/css" media="screen">@import "<?php echo APP_ROOT?>/admin/editor/comm.css";</style>
<textarea id="<?php echo $this->from_name?>" name="<?php echo $this->from_name?>" style="display:none;"><?php echo $this->content ?></textarea>
<script language="javascript">
	gFrame = 1;
	gContentId = "<?php echo $this->from_name?>";
	/*editor路径*/
	OutputEditorLoading('win','1','<?php echo APP_ROOT?>/admin/');	
	function checkEditor(){
		return  DoProcess();
	}
</script>
<iframe id="HtmlEditor" class="editor_frame" frameborder="0" marginheight="0" style="width:100%;height:100%;overflow:visible;" hideFocus > </iframe>
