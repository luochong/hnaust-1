<?php
  //个人基本信息
	if(isset($_POST['info_p1_1'])){				//审核数据并锁定数据
		$array[0]  =trim($_POST['name']);        //姓名
		$array[1]  =trim($_POST['name_r']);      //是否复姓
		$array[2]  =$_POST['sex'];
		$array[3]  =trim($_POST['city']);
		$array[4]  =trim($_POST['country']);
		$array[5]  =trim($_POST['nation']);
		$array[6]  =trim($_POST['birthy']);
		$array[7]  =trim($_POST['birthm']);
		$array[8]  =trim($_POST['birthd']);
		$array[9]  =trim($_POST['polity']);
		$array[10] =trim($_POST['mtele']);      //私人手机
		$array[11] =trim($_POST['idcard']);
		$array[12] =trim($_POST['htele']);
		$array[13] =trim($_POST['haddress']);
		$array[14] =trim($_POST['remark']);
		$array[15] ="1";		
		
		$array1[0]  ="basic_name";
		$array1[1]  ="basic_name_r";
		$array1[2]  ="basic_sex";
		$array1[3]  ="basic_regionp";
		$array1[4]  ="basic_regionc";
		$array1[5]  ="basic_nation";
		$array1[6]  ="basic_birthy";
		$array1[7]  ="basic_birthm";
		$array1[8]  ="basic_birthd";
		$array1[9]  ="basic_polity";
		$array1[10] ="basic_mtelephone_personal";
		$array1[11] ="basic_idcard";
		$array1[12] ="basic_telephone_home";
		$array1[13] ="basic_address_home";
		$array1[14]  ="basic_remark";
		$array1[15]  ="basic_lock";
		
		$db=new mysql_db($hostname,$dbusername,$dbpassword,$dbname_p);
  		$db->db_connect();
		$table="sns_pdc_basic";
  		$field="basic_user";
  		$value1=$_POST['basic_user'];		
		$nums=16;
        $resu=$db->db_edit($table,$field,$value1,$array,$array1,$nums);
		if($resu){
			echo "<script language=javascript>\n";	
			echo "alert('数据成功审核')\n";			
			echo "location.assign('$page?basicuser=$value1')\n";
			echo "</script>\n";
			exit;
		}
		else{
			echo "fail";
		}
	}
	if(isset($_POST['info_p1_2'])){  //解锁数据		
		mysql_select_db("$dbname_p");
		$basic_user=$_POST['basic_user'];
		$sql="update sns_pdc_basic set basic_lock='0' where basic_user='$basic_user'";
		$query=mysql_query($sql,$hwnd);
		if($query){
			echo "<script language=javascript>\n";	
			echo "alert('数据成功解除锁定')\n";			
			echo "location.assign('$page?basicuser=$basic_user')\n";
			echo "</script>\n";
			exit;
		}
		else{
			echo "fail";
		}
	}
	
//职务职称
		if(isset($_POST['info_g5_1'])){		
			$array[0]  =trim($_POST['duty1']);
			$array[1]  =trim($_POST['duty2']);
			$array[2]  =trim($_POST['duty3']);				
			$array[3]  =trim($_POST['cert_n']);	
			$array[4]  =trim($_POST['post_n']);			
			$array[5]  =trim($_POST['pers_kind1']);	
			$array[6]  =trim($_POST['pers_kind2']);	  //前台页面下拉菜单已经删除
			$array[7]  =trim($_POST['pt1_name']);
			$array[8]  =trim($_POST['pt1_duty']);
			$array[9]  =trim($_POST['pt1_dept']);
			$array[10]  =trim($_POST['pt2_name']);
			$array[11]  =trim($_POST['pt2_duty']);
			$array[12]  =trim($_POST['pt2_dept']);
			$array[13]  =trim($_POST['stime_y']);
			$array[14]  =trim($_POST['stime_m']);
			$array[15]  =trim($_POST['1time_y']);
			$array[16]  =trim($_POST['1time_m']);
			$array[17]  =trim($_POST['2time_y']);
			$array[18]  =trim($_POST['2time_m']);
			$array[19]  =trim($_POST['3time_y']);
			$array[20]  =trim($_POST['3time_m']);
			$array[21]  =trim($_POST['4time_y']);
			$array[22]  =trim($_POST['4time_m']);
			$array[23]  =trim($_POST['5time_y']);
			$array[24]  =trim($_POST['5time_m']);
			$array[25]  =trim($_POST['1title_1']);
			$array[26]  =trim($_POST['1title_2']);
			$array[27]  =trim($_POST['2title_1']);
			$array[28]  =trim($_POST['2title_2']);
			$array[29]  =trim($_POST['3title_1']);
			$array[30]  =trim($_POST['3title_2']);
			$array[31]  =trim($_POST['4title_1']);
			$array[32]  =trim($_POST['4title_2']);
			$array[33]  =trim($_POST['5title_1']);
			$array[34]  =trim($_POST['5title_2']);
			$array[35]  =trim($_POST['remark']);
			$array[36]  ="1";
						
			$array1[0]  ="posn_duty1";
			$array1[1]  ="posn_duty2";
			$array1[2]  ="posn_duty3";
			$array1[3]  ="posn_cert_n";
			$array1[4]  ="posn_post_n";
			$array1[5]  ="posn_pers_kind1";
			$array1[6]  ="posn_pers_kind2";   //前台页面下拉菜单已经删除
			$array1[7]  ="posn_pt1_name";
			$array1[8]  ="posn_pt1_duty";
			$array1[9]  ="posn_pt1_dept";
			$array1[10]  ="posn_pt2_name";
			$array1[11]  ="posn_pt2_duty";
			$array1[12]  ="posn_pt2_dept";
			$array1[13]  ="posn_stime_y";
			$array1[14]  ="posn_stime_m";
			$array1[15]  ="posn_1time_y";
			$array1[16]  ="posn_1time_m";
			$array1[17]  ="posn_2time_y";
			$array1[18]  ="posn_2time_m";
			$array1[19]  ="posn_3time_y";
			$array1[20]  ="posn_3time_m";
			$array1[21]  ="posn_4time_y";
			$array1[22]  ="posn_4time_m";
			$array1[23]  ="posn_5time_y";
			$array1[24]  ="posn_5time_m";
			$array1[25]  ="posn_1title_1";
			$array1[26]  ="posn_1title_2";
			$array1[27]  ="posn_2title_1";
			$array1[28]  ="posn_2title_2";
			$array1[29]  ="posn_3title_1";
			$array1[30]  ="posn_3title_2";
			$array1[31]  ="posn_4title_1";
			$array1[32]  ="posn_4title_2";
			$array1[33]  ="posn_5title_1";
			$array1[34]  ="posn_5title_2";
			$array1[35]  ="posn_remark";
			$array1[36]  ="posn_lock";

			$db=new mysql_db($hostname,$dbusername,$dbpassword,$dbname);
	  		$db->db_connect();
			$table="sns_group_posn";
	  		$field="posn_user";
	  		$value1=$_POST['basic_user'];
			$nums=37;
	        $resu=$db->db_edit($table,$field,$value1,$array,$array1,$nums);
			if($resu){
				echo "<script language=javascript>\n";		
				echo "alert('数据成功审核')\n";	
				echo "location.assign('$page?basicuser=$value1')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}
		if(isset($_POST['info_g5_2'])){  //解锁数据		
			mysql_select_db("$dbname");
			$basic_user=$_POST['basic_user'];
			$sql="update sns_group_posn set posn_lock='0' where posn_user='$basic_user'";
			$query=mysql_query($sql,$hwnd);
			if($query){
				echo "<script language=javascript>\n";	
				echo "alert('数据成功解除锁定')\n";			
				echo "location.assign('$page?basicuser=$basic_user')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}
		
//教学工作
		if(isset($_POST['info_g6_1'])){			
			$array[0]  =trim($_POST['time_y']);
			$array[1]  =trim($_POST['term']);
			$array[2]  =trim($_POST['cour_name']);
			$array[3]  =trim($_POST['cour_kind']);		
			$array[4]  =trim($_POST['spec']);
			$array[5]  =trim($_POST['stud_n']);
			$array[6]  =trim($_POST['hour']);
			$array[7]  =trim($_POST['stud_l']);			
			$array[8]  =trim($_POST['remark']);
			$array[9]  =trim($_POST['cour_num']);
			$array[10]  =trim($_POST['cour_snum']);
			$array[11]  ="1";
			
			$array1[0]  ="teac_time_y";
			$array1[1]  ="teac_term";
			$array1[2]  ="teac_cour_name";
			$array1[3]  ="teac_cour_kind";	
			$array1[4]  ="teac_spec";
			$array1[5]  ="teac_stud_n";
			$array1[6]  ="teac_hour";
			$array1[7]  ="teac_stud_l";
			$array1[8]  ="teac_remark";
			$array1[9]  ="teac_cour_num";
			$array1[10]  ="teac_cour_snum";
			$array1[11]  ="teac_lock";
			
			$db=new mysql_db($hostname,$dbusername,$dbpassword,$dbname);
	  		$db->db_connect();
			$table="sns_group_teac";
	  		$field="id";
	  		$value1=$_POST['tid'];
			$view=$_POST['view'];
			$nums=12;
	        $resu=$db->db_edit($table,$field,$value1,$array,$array1,$nums);
			if($resu){
				$basic_user=$_POST['basic_user'];
				echo "<script language=javascript>\n";				
				echo "alert('数据成功审核')\n";	
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}
		if(isset($_POST['info_g6_2'])){  //解锁数据		
			mysql_select_db("$dbname");
			$basic_user=$_POST['basic_user'];
			$tid=$_POST['tid'];
			$view=$_POST['view'];
			$sql="update sns_group_teac set teac_lock='0' where id='$tid'";
			$query=mysql_query($sql,$hwnd);
			if($query){
				echo "<script language=javascript>\n";	
				echo "alert('数据成功解除锁定')\n";			
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}
		
//学位教育
	if(isset($_POST['info_p2_1'])){
		$array[0]  =trim($_POST['fschoolage']);
		$array[1]  =trim($_POST['fschoolage_y']);
		$array[2]  =trim($_POST['fdegree']);
		$array[3]  =trim($_POST['fdegree_y']);		
		$array[4]  =trim($_POST['school_c']);
		$array[5]  =trim($_POST['specialty_c']);
		$array[6]  =trim($_POST['btimey_c']);
		$array[7]  =trim($_POST['btimem_c']);
		$array[8]  =trim($_POST['etimey_c']);
		$array[9]  =trim($_POST['etimem_c']);
		
		$array[10]  =trim($_POST['school_u']);
		$array[11]  =trim($_POST['specialty_u']);
		$array[12]  =trim($_POST['btimey_u']);
		$array[13]  =trim($_POST['btimem_u']);
		$array[14]  =trim($_POST['etimey_u']);
		$array[15]  =trim($_POST['etimem_u']);
		
		$array[16]  =trim($_POST['school_m']);
		$array[17]  =trim($_POST['specialty_m']);
		$array[18]  =trim($_POST['btimey_m']);
		$array[19]  =trim($_POST['btimem_m']);
		$array[20]  =trim($_POST['etimey_m']);
		$array[21]  =trim($_POST['etimem_m']);
		
		$array[22]  =trim($_POST['school_d']);
		$array[23]  =trim($_POST['specialty_d']);
		$array[24]  =trim($_POST['btimey_d']);
		$array[25]  =trim($_POST['btimem_d']);
		$array[26]  =trim($_POST['etimey_d']);
		$array[27]  =trim($_POST['etimem_d']);		
		$array[28]  =trim($_POST['reading_u']);
		$array[29]  =trim($_POST['reading_m']);
		$array[30]  =trim($_POST['reading_d']);
		$array[31]  =trim($_POST['school_cnum']);
		$array[32]  =trim($_POST['degree_cnum']);
		$array[33]  =trim($_POST['school_unum']);
		$array[34]  =trim($_POST['degree_unum']);
		$array[35]  =trim($_POST['school_mnum']);		
		$array[36]  =trim($_POST['degree_mnum']);
		$array[37]  =trim($_POST['school_dnum']);
		$array[38]  =trim($_POST['degree_dnum']);
		$array[39]  =$_POST['remark'];		
		$array[40]  ="1";
		
		$array1[0]  ="degree_fschoolage";
		$array1[1]  ="degree_fschoolage_y";
		$array1[2]  ="degree_fdegree";
		$array1[3]  ="degree_fdegree_y";		
		$array1[4]  ="degree_school_c";
		$array1[5]  ="degree_specialty_c";
		$array1[6]  ="degree_btimey_c";
		$array1[7]  ="degree_btimem_c";
		$array1[8]  ="degree_etimey_c";
		$array1[9]  ="degree_etimem_c";
		
		$array1[10]  ="degree_school_u";
		$array1[11]  ="degree_specialty_u";
		$array1[12]  ="degree_btimey_u";
		$array1[13]  ="degree_btimem_u";
		$array1[14]  ="degree_etimey_u";
		$array1[15]  ="degree_etimem_u";
		
		$array1[16]  ="degree_school_m";
		$array1[17]  ="degree_specialty_m";
		$array1[18]  ="degree_btimey_m";
		$array1[19]  ="degree_btimem_m";
		$array1[20]  ="degree_etimey_m";
		$array1[21]  ="degree_etimem_m";
		
		$array1[22]  ="degree_school_d";
		$array1[23]  ="degree_specialty_d";
		$array1[24]  ="degree_btimey_d";
		$array1[25]  ="degree_btimem_d";
		$array1[26]  ="degree_etimey_d";
		$array1[27]  ="degree_etimem_d";		
		$array1[28]  ="degree_reading_u";
		$array1[29]  ="degree_reading_m";
		$array1[30]  ="degree_reading_d";
		$array1[31]  ="degree_school_cnum";
		$array1[32]  ="degree_degree_cnum";
		$array1[33]  ="degree_school_unum";
		$array1[34]  ="degree_degree_unum";
		$array1[35]  ="degree_school_mnum";		
		$array1[36]  ="degree_degree_mnum";
		$array1[37]  ="degree_school_dnum";
		$array1[38]  ="degree_degree_dnum";
		$array1[39]  ="degree_remark";
		$array1[40]  ="degree_lock";
		
		$db=new mysql_db($hostname,$dbusername,$dbpassword,$dbname_p);
  		$db->db_connect();
		$table="sns_pdc_degree";
  		$field="degree_user";
  		$value1=$_POST['basic_user'];
		$nums=41;
        $resu=$db->db_edit($table,$field,$value1,$array,$array1,$nums);
		if($resu){
			echo "<script language=javascript>\n";				
			echo "alert('数据成功审核')\n";			
			echo "location.assign('$page?basicuser=$value1')\n";
			echo "</script>\n";
			exit;
		}
		else{
			echo "fail";
		}
	}
		if(isset($_POST['info_p2_2'])){  //解锁数据		
			mysql_select_db("$dbname_p");
			$basic_user=$_POST['basic_user'];			
			$sql="update sns_pdc_degree set degree_lock='0' where degree_user='$basic_user'";
			$query=mysql_query($sql,$hwnd);
			if($query){
				echo "<script language=javascript>\n";
				echo "alert('数据成功解除锁定')\n";
				echo "location.assign('$page?basicuser=$basic_user')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}
		
//职业培训
		if(isset($_POST['info_p3_1'])){
			$array[0]  =trim($_POST['specialty']);
			$array[1]  =trim($_POST['content']);
			$array[2]  =trim($_POST['btime_y']);
			$array[3]  =trim($_POST['btime_m']);		
			$array[4]  =trim($_POST['etime_y']);
			$array[5]  =trim($_POST['etime_m']);
			$array[6]  =trim($_POST['address']);
			$array[7]  =trim($_POST['modality']);
			$array[8]  =trim($_POST['remark']);
			$array[9]  ="1";
			
			$array1[0]  ="train_specialty";
			$array1[1]  ="train_content";
			$array1[2]  ="train_btime_y";
			$array1[3]  ="train_btime_m";	
			$array1[4]  ="train_etime_y";
			$array1[5]  ="train_etime_m";
			$array1[6]  ="train_address";
			$array1[7]  ="train_modality";
			$array1[8]  ="train_remark";
			$array1[9]  ="train_lock";
			
			$db=new mysql_db($hostname,$dbusername,$dbpassword,$dbname);
	  		$db->db_connect();
			$table="sns_group_train";
	  		$field="id";
	  		$value1=$_POST['tid'];
			$basic_user=$_POST['basic_user'];	
			$view=$_POST['view'];	
			$nums=10;
	        $resu=$db->db_edit($table,$field,$value1,$array,$array1,$nums);
			if($resu){
				echo "<script language=javascript>\n";	
				echo "alert('数据成功审核')\n";		
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}
		if(isset($_POST['info_p3_2'])){  //解锁数据		
			mysql_select_db("$dbname");
			$basic_user=$_POST['basic_user'];
			$view=$_POST['view'];			
			$tid=$_POST['tid'];
			$sql="update sns_group_train set train_lock='0' where id='$tid'";
			$query=mysql_query($sql,$hwnd);
			if($query){
				echo "<script language=javascript>\n";
				echo "alert('数据成功解除锁定')\n";
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}

//工作经历
		if(isset($_POST['info_p4_1'])){		
			$array[0]  =trim($_POST['btime_y']);
			$array[1]  =trim($_POST['btime_m']);
			$array[2]  =trim($_POST['etime_y']);				
			$array[3]  =trim($_POST['etime_m']);	
			$array[4]  =trim($_POST['comp']);			
			$array[5]  =trim($_POST['post']);	
			$array[6]  =trim($_POST['comp_kind']);	
			$array[7]  =trim($_POST['remark']);
			$array[8]  ="1";
									
			$array1[0]  ="work_btime_y";
			$array1[1]  ="work_btime_m";
			$array1[2]  ="work_etime_y";
			$array1[3]  ="work_etime_m";
			$array1[4]  ="work_comp";
			$array1[5]  ="work_post";
			$array1[6]  ="work_comp_kind";
			$array1[7]  ="work_remark";			
			$array1[8]  ="work_lock";	
			
			$db=new mysql_db($hostname,$dbusername,$dbpassword,$dbname_p);
	  		$db->db_connect();
			$table="sns_pdc_work";
	  		$field="id";
	  		$value1=$_POST['tid'];
			$basic_user=$_POST['basic_user'];
			$view=$_POST['view'];
			$nums=9;
	        $resu=$db->db_edit($table,$field,$value1,$array,$array1,$nums);
			if($resu){
				echo "<script language=javascript>\n";				
				echo "alert('数据成功审核')\n";		
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}
		if(isset($_POST['info_p4_2'])){  //解锁数据		
			mysql_select_db("$dbname_p");
			$basic_user=$_POST['basic_user'];
			$view=$_POST['view'];			
			$tid=$_POST['tid'];
			$sql="update sns_pdc_work set work_lock='0' where id='$tid'";
			$query=mysql_query($sql,$hwnd);
			if($query){
				echo "<script language=javascript>\n";
				echo "alert('数据成功解除锁定')\n";
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}

//课题项目
		if(isset($_POST['info_g4_1'])){		
			$array[0]  =trim($_POST['title']);
			$array[1]  =trim($_POST['btime_y']);
			$array[2]  =trim($_POST['btime_m']);
			$array[3]  =trim($_POST['etime_y']);	
			$array[4]  =trim($_POST['etime_m']);			
			$array[5]  =trim($_POST['kind']);	
			$array[6]  =trim($_POST['number']);
			$array[7]  =trim($_POST['outlay']);
			$array[8]  =trim($_POST['pdept']);			
			$array[9]  =trim($_POST['part']);
			$array[10]  =trim($_POST['remark']);
			$array[11]  =trim($_POST['teac']);
			$array[12]  =trim($_POST['kind_lay']);
			$array[13]  =trim($_POST['outlay_p']);
			$array[14]  ="1";
			$array[15]  =trim($_POST['aw01']);
			$array[16]  =trim($_POST['aw02']);
			$array[17]  =trim($_POST['aw03']);
			$array[18]  =trim($_POST['aw04']);
			$array[19]  =trim($_POST['aw05']);
			$array[20]  =trim($_POST['aw06']);
			
			$array1[0]  ="item_title";
			$array1[1]  ="item_btime_y";
			$array1[2]  ="item_btime_m";
			$array1[3]  ="item_etime_y";
			$array1[4]  ="item_etime_m";		
			$array1[5]  ="item_kind";
			$array1[6]  ="item_number";
			$array1[7]  ="item_outlay";
			$array1[8]  ="item_pdept";			
			$array1[9]  ="item_part";
			$array1[10]  ="item_remark";
			$array1[11]  ="item_teac";
			$array1[12]  ="item_kind_lay";
			$array1[13]  ="item_outlay_p";
			$array1[14]  ="item_lock";
			$array1[15]  ="item_aw01";
			$array1[16]  ="item_aw02";
			$array1[17]  ="item_aw03";
			$array1[18]  ="item_aw04";
			$array1[19]  ="item_aw05";
			$array1[20]  ="item_aw06";
			
			$db=new mysql_db($hostname,$dbusername,$dbpassword,$dbname);
	  		$db->db_connect();
			$table="sns_group_item";
	  		$field="id";
	  		$value1=$_POST['tid'];
			$basic_user=$_POST['basic_user'];
			$view=$_POST['view'];
			$nums=21;
	        $resu=$db->db_edit($table,$field,$value1,$array,$array1,$nums);
			if($resu){
				echo "<script language=javascript>\n";
				echo "alert('数据成功审核')\n";				
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}
		if(isset($_POST['info_g4_2'])){  //解锁数据		
			mysql_select_db("$dbname");
			$basic_user=$_POST['basic_user'];
			$view=$_POST['view'];			
			$tid=$_POST['tid'];
			$sql="update sns_group_item set item_lock='0' where id='$tid'";
			$query=mysql_query($sql,$hwnd);
			if($query){
				echo "<script language=javascript>\n";
				echo "alert('数据成功解除锁定')\n";
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}

//成果奖励
		if(isset($_POST['info_g3_1'])){		
			$array[0]  =trim($_POST['name']);
			$array[1]  =trim($_POST['title']);
			$array[2]  =trim($_POST['time_y']);
			$array[3]  =trim($_POST['asort']);	
			$array[4]  =trim($_POST['patent']);			
			$array[5]  =trim($_POST['remark']);		
			$array[6]  =trim($_POST['time_m']);	
			$array[7]  =trim($_POST['kind']);	
			$array[8]  =trim($_POST['kind_award']);
			$array[9]  =trim($_POST['teac']);
			$array[10]  =trim($_POST['awdept']);
			$array[11]  ="1";
			
			$array1[0]  ="suc_name";
			$array1[1]  ="suc_title";
			$array1[2]  ="suc_time_y";
			$array1[3]  ="suc_asort";
			$array1[4]  ="suc_patent";			
			$array1[5]  ="suc_remark";
			$array1[6]  ="suc_time_m";			
			$array1[7]  ="suc_kind";			
			$array1[8]  ="suc_kind_award";			
			$array1[9]  ="suc_teac";						
			$array1[10]  ="suc_awdept";
			$array1[11]  ="suc_lock";
			
			$db=new mysql_db($hostname,$dbusername,$dbpassword,$dataname);
	  		$db->db_connect();
			$table="sns_group_suc";
	  		$field="id";
	  		$value1=$_POST['tid'];
			$basic_user=$_POST['basic_user'];
			$view=$_POST['view'];
			$nums=12;
	        $resu=$db->db_edit($table,$field,$value1,$array,$array1,$nums);
			if($resu){
				echo "<script language=javascript>\n";				
				echo "alert('数据成功审核')\n";	
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}
		if(isset($_POST['info_g3_2'])){  //解锁数据		
			mysql_select_db("$dbname");
			$basic_user=$_POST['basic_user'];
			$view=$_POST['view'];			
			$tid=$_POST['tid'];
			$sql="update sns_group_suc set suc_lock='0' where id='$tid'";
			$query=mysql_query($sql,$hwnd);
			if($query){
				echo "<script language=javascript>\n";
				echo "alert('数据成功解除锁定')\n";
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}

//发表论文
		if(isset($_POST['info_g2_1'])){		
			$array[0]  =trim($_POST['title']);
			$array[1]  =trim($_POST['magzine']);
			$array[2]  =trim($_POST['ptime_y']);
			$array[3]  =trim($_POST['asort']);		
			$array[4]  =trim($_POST['remark']);		
			$array[5]  =trim($_POST['ptime_m']);		
			$array[6]  =trim($_POST['teac']);		
			$array[7]  =trim($_POST['kind']);		  //已删除
			$array[8]  =trim($_POST['magzine_n']);
			$array[9]  =trim($_POST['sear_num']);
			$array[10]  =trim($_POST['publ_num']);
			$array[11]  =trim($_POST['publint_num']);
			$array[12]  =trim($_POST['kind1']);
			$array[13]  =trim($_POST['embo01']);
			$array[14]  =trim($_POST['embo02']);
			$array[15]  =trim($_POST['embo03']);
			$array[16]  =trim($_POST['embo04']);
			$array[17]  =trim($_POST['embo05']);
			$array[18]  =trim($_POST['embo06']);
			$array[19]  =trim($_POST['embo07']);
			$array[20]  =trim($_POST['embo08']);
			$array[21]  =trim($_POST['embo09']);
			$array[22]  =trim($_POST['embo10']);
			$array[23]  =trim($_POST['embo11']);
			$array[24]  ="1";
			
			$array1[0]  ="dis_title";
			$array1[1]  ="dis_magzine";
			$array1[2]  ="dis_ptime_y";
			$array1[3]  ="dis_asort";	
			$array1[4]  ="dis_remark";
			$array1[5]  ="dis_ptime_m";
			$array1[6]  ="dis_teac";
			$array1[7]  ="dis_kind";
			$array1[8]  ="dis_magzine_n";
			$array1[9]  ="dis_sear_num";
			$array1[10]  ="dis_publ_num";
			$array1[11]  ="dis_publint_num";			
			$array1[12]  ="dis_kind1";
			$array1[13]  ="dis_embo01";
			$array1[14]  ="dis_embo02";
			$array1[15]  ="dis_embo03";
			$array1[16]  ="dis_embo04";
			$array1[17]  ="dis_embo05";
			$array1[18]  ="dis_embo06";
			$array1[19]  ="dis_embo07";
			$array1[20]  ="dis_embo08";
			$array1[21]  ="dis_embo09";
			$array1[22]  ="dis_embo10";
			$array1[23]  ="dis_embo11";
			$array1[24]  ="dis_lock";
			
			$db=new mysql_db($hostname,$dbusername,$dbpassword,$dataname);
	  		$db->db_connect();
			$table="sns_group_dis";
	  		$field="id";
	  		$value1=$_POST['tid'];
			$basic_user=$_POST['basic_user'];
			$view=$_POST['view'];
			$nums=25;
	        $resu=$db->db_edit($table,$field,$value1,$array,$array1,$nums);
			if($resu){
				echo "<script language=javascript>\n";				
				echo "alert('数据成功审核')\n";	
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}
		if(isset($_POST['info_g2_2'])){  //解锁数据		
			mysql_select_db("$dbname");
			$basic_user=$_POST['basic_user'];
			$view=$_POST['view'];			
			$tid=$_POST['tid'];
			$sql="update sns_group_dis set dis_lock='0' where id='$tid'";
			$query=mysql_query($sql,$hwnd);
			if($query){
				echo "<script language=javascript>\n";
				echo "alert('数据成功解除锁定')\n";
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}

//出版著作
		if(isset($_POST['info_g1_1'])){		
			$array[0]  =trim($_POST['name']);
			$array[1]  =trim($_POST['asort']);
			$array[2]  =trim($_POST['word_c']);
			$array[3]  =trim($_POST['write_c']);		
			$array[4]  =trim($_POST['kind']);
			$array[5]  =trim($_POST['punit']);
			$array[6]  =trim($_POST['parea']);
			$array[7]  =trim($_POST['isbn']);
			$array[8]  =trim($_POST['ptime_y']);
			$array[9]  =trim($_POST['ptime_m']);
			$array[10]  =trim($_POST['remark']);
			$array[11]  =trim($_POST['book21']);			
			$array[12]  =trim($_POST['book115']);
			$array[13]  =trim($_POST['book15']);			
			$array[14]  ="1";
			
			$array1[0]  ="treatise_name";
			$array1[1]  ="treatise_asort";
			$array1[2]  ="treatise_word_c";
			$array1[3]  ="treatise_write_c";	
			$array1[4]  ="treatise_kind";
			$array1[5]  ="treatise_punit";
			$array1[6]  ="treatise_parea";
			$array1[7]  ="treatise_isbn";			
			$array1[8]  ="treatise_ptime_y";
			$array1[9]  ="treatise_ptime_m";
			$array1[10]  ="treatise_remark";
			$array1[11]  ="treatise_book21";			
			$array1[12]  ="treatise_book115";
			$array1[13]  ="treatise_book15";
			$array1[14]  ="treatise_lock";
			
			$db=new mysql_db($hostname,$dbusername,$dbpassword,$dataname);
	  		$db->db_connect();
			$table="sns_group_treatise";
	  		$field="id";
	  		$value1=$_POST['tid'];
			$basic_user=$_POST['basic_user'];
			$view=$_POST['view'];
			$nums=15;
	        $resu=$db->db_edit($table,$field,$value1,$array,$array1,$nums);
			if($resu){
				echo "<script language=javascript>\n";				
				echo "alert('数据成功审核')\n";	
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}
		if(isset($_POST['info_g1_2'])){  //解锁数据		
			mysql_select_db("$dbname");
			$basic_user=$_POST['basic_user'];
			$view=$_POST['view'];			
			$tid=$_POST['tid'];
			$sql="update sns_group_treatise set treatise_lock='0' where id='$tid'";
			$query=mysql_query($sql,$hwnd);
			if($query){
				echo "<script language=javascript>\n";
				echo "alert('数据成功解除锁定')\n";
				echo "location.assign('$page?basicuser=$basic_user&view=$view')\n";
				echo "</script>\n";
				exit;
			}
			else{
				echo "fail";
			}
		}
?>