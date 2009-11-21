<?php
include_once('include/mysqldao.class.php');
require_once('control/tongji.include.php');
$tongji = new Tongji();
echo '总学分：',$tongji->countAllCreditByStudId('200741903108');
echo '总项目数：',$tongji->countItemByStudId('200741903108');
echo '有限学分：',$tongji->countValidCreditByStudId('200741903108');
echo '已获得有效学分：',$tongji->countVerifyValidCreditByStudId('200741903108');




?>