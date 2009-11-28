

信息院 => 信科院 
      外语学院 =>外语院 
      科技师院 =>师范院 
      经济学院 =>经济院 
      成教院 dele
      东科院  =>东方院 
      国际学院 =>国际院 
      add 国际东 
      
      
      update group_dept  set dept_name ='信科院' where dept_name='信息院';
       update group_dept  set dept_name ='外语院' where dept_name='外语学院';
        update group_dept  set dept_name ='师范院' where dept_name='科技师院';
         update group_dept  set dept_name ='经济院' where dept_name='经济学院';
          update group_dept  set dept_name ='东方院' where dept_name='东科院';
           update group_dept  set dept_name ='国际院' where dept_name='国际学院';
      
      
      
      
      
      
      update group_dept set dept_tree_name  = dept_name