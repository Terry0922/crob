<?
//--------------------------------------------------------------------
//  PREVIL Calendar
//
//  - calendar.php / lun2sil.php(open source)
//
//  - Programmed by previl(previl@hanmail.net, http://dev.previl.net)
//
//--------------------------------------------------------------------
?>

<style>
.all { border-width:1; border-color:#cccccc; border-style:solid; }
font {font-size: 12px; color:#505050;}
font.title {font-size: 30px; font-weight: bold; color:#111111;}


.week {color:#ffffff;font-size:15px;height:40px;}
.week:nth-child(1) {background-color:#46748c;}
.week:nth-child(2) {background-color:#314e5c;}
.week:nth-child(3) {background-color:#46748c;}
.week:nth-child(4) {background-color:#314e5c;}
.week:nth-child(5) {background-color:#46748c;}
.week:nth-child(6) {background-color:#314e5c;}
.week:nth-child(7) {background-color:#46748c;}


.sholy{font-family:tahoma; font-size:16px; color:#F47C46;text-decoration: none;}
.sholy:link{font-family:tahoma; font-size:16px; color:#F47C46;text-decoration: none;}
.sholy:hover{font-family:tahoma; font-size:16px; color:#F47C46;text-decoration: none;font-weight:bold;}
.sholy:visited{font-family:tahoma; font-size:16px; color:#F47C46;text-decoration: none;}
.sholy:active{font-family:tahoma; font-size:16px; color:#F47C46;text-decoration: none;}

.ssat{font-family:tahoma; font-size:16px; color:#1464B0;text-decoration: none;}
.ssat:link{font-family:tahoma; font-size:16px; color:#1464B0;text-decoration: none;}
.ssat:hover{font-family:tahoma; font-size:16px; color:#1464B0;text-decoration: none;font-weight:bold;}
.ssat:visited{font-family:tahoma; font-size:16px; color:#1464B0;text-decoration: none;}
.ssat:active{font-family:tahoma; font-size:16px; color:#1464B0;text-decoration: none;}

.snum{font-family:tahoma; font-size:16px;color:#505050;text-decoration: none;}
.snum:link{font-family:tahoma; font-size:16px;color:#505050;text-decoration: none;}
.snum:hover{font-family:tahoma; font-size:16px;color:#505050;text-decoration: none;font-weight:bold;}
.snum:visited{font-family:tahoma; font-size:16px;color:#505050;text-decoration: none;}
.snum:active{font-family:tahoma; font-size:16px;color:#505050;text-decoration: none;}

.snum2{font-family:tahoma; font-size:16px; color:#bbbbbb;text-decoration: none;}
.snum2:link{font-family:tahoma; font-size:16px; color:#bbbbbb;text-decoration: none;}
.snum2:hover{font-family:tahoma; font-size:16px; color:#bbbbbb;text-decoration: none;font-weight:bold;}
.snum2:visited{font-family:tahoma; font-size:16px; color:#bbbbbb;text-decoration: none;}
.snum2:active{font-family:tahoma; font-size:16px; color:#bbbbbb;text-decoration: none;}

.sover{font-family:tahoma; font-size:16px; color:#0000ff;text-decoration: none;font-weight:bold;}

.scBox{
	word-break:break-all;
	line-height:18px;
	font-size:13px;
	width:100%;
	padding:3px;
	border:1px solid transparent;
}

.scBox:hover{
	border:1px solid #1464B0;
	color:#1464B0;
	cursor:pointer;
	background:#f7f7f7;
}

.scBox:hover .scBoxTitle {
	text-decoration:underline;
}
</style>

<?
//--------------------------------------------------------------------
//  FUNCTION
//--------------------------------------------------------------------
include "lun2sol.php";   //???????????? ????????????

function ErrorMsg($msg)
{
  echo " <script>                ";
  echo "   window.alert('$msg'); ";
  echo "   history.go(-1);       ";
  echo " </script>               ";
  exit;
}

function SkipOffset($no,$sdate='',$edate='')
{
  for($i=1;$i<=$no;$i++) {
    $ck = $no-$i+1;
    if($sdate) $num = date('d',$sdate-((3600*24)*$ck));
	if($edate) $num=$i;
    echo "  <TD align=center><a href='/' class=snum2>$num</a></TD> \n";
  }
}

//---- ?????? ??????
$thisyear  = date('Y');  // 2000
$thismonth = date('n');  // 1, 2, 3, ..., 12
$today     = date('j');  // 1, 2, 3, ..., 31


//------ $year, $month ?????? ????????? ?????? ??????
if (!$year)		$year = $thisyear;
if (!$month)		$month = $thismonth;
if (!$day)		$day = $today;

//------ ????????? ?????? ??????
if (($year > 2038) or ($year < 1900)) ErrorMsg("????????? 1900~2038?????? ???????????????.");
if (($month > 12) or ($month < 0)) ErrorMsg("?????? 1~12??? ???????????????.");
/*
while (checkdate($month,$day,$year)):
    $date++;
endwhile;
$maxdate = date-1;
*/
$maxdate = date(t, mktime(0, 0, 0, $month, 1, $year));   // the final date of $month

if ($day>$maxdate) ErrorMsg("$month ??? ?????? $lastday ?????? ????????? ????????????.");

$prevmonth = $month - 1;
$nextmonth = $month + 1;
$prevyear = $nextyear=$year;
if ($month == 1) {
  $prevmonth = 12;
  $prevyear = $year - 1;
} elseif ($month == 12) {
  $nextmonth = 1;
  $nextyear = $year + 1;
}

/****************** ?????? ?????? ************************/
$HOLIDAY = Array();
$HOLIDAY[] = array(0=>'1-1',1=>'??????');
$HOLIDAY[] = array(0=>'3-1',1=>'?????????');
//$HOLIDAY[] = array(0=>'4-5',1=>'?????????');
$HOLIDAY[] = array(0=>'5-5',1=>'????????????');
$HOLIDAY[] = array(0=>'6-6',1=>'?????????');
$HOLIDAY[] = array(0=>'7-17',1=>'?????????');
$HOLIDAY[] = array(0=>'8-15',1=>'?????????');
$HOLIDAY[] = array(0=>'10-3',1=>'?????????');
$HOLIDAY[] = array(0=>'12-25',1=>'?????????');

$tmp = lun2sol($year."0101");   //??????
$HOLIDAY[] = array(0=>date("n-j",($tmp-(3600*24))),1=>'?????????');
$HOLIDAY[] = array(0=>date("n-j",$tmp),1=>'??????');
$HOLIDAY[] = array(0=>date("n-j",($tmp+(3600*24))),1=>'?????????');;

$tmp = lun2sol($year."0408");   //?????????
$HOLIDAY[] = array(0=>date("n-j",$tmp),1=>'?????????');

$tmp = lun2sol($year."0815");   //??????
$HOLIDAY[] = array(0=>date("n-j",($tmp-(3600*24))),1=>'????????????');;
$HOLIDAY[] = array(0=>date("n-j",$tmp),1=>'??????');;
$HOLIDAY[] = array(0=>date("n-j",($tmp+(3600*24))),1=>'????????????');;

unset($tmp);

/****************** ?????? ?????? ************************/

?>

<table cellSpacing='0' cellPadding='0' width='<?=$tablew?>' border='0'>
	<tr>
		<td align='center' style='padding-top:10px;padding-bottom:20px;' height='35'>
			<table cellSpacing='0' cellPadding='0' border='0'>
				<tr>
					<td><a href="javascript:setCalendar('<?=$prevyear?>','<?=$prevmonth?>');" onfocus='this.blur()'><img src='<?=$boardRoot?>img/prev.jpg' border='0' onfocus='this.blur();' align='absmiddle' style='margin-bottom:2px;'></a></td>
					<td style='padding:0 30 0 30;' align='center'><font class='title'><?=$year?>??? <?=$month?>???</font></td>
					<td><a href="javascript:setCalendar('<?=$nextyear?>','<?=$nextmonth?>');" onfocus='this.blur()'><img src='<?=$boardRoot?>/img/next.jpg' border='0' onfocus='this.blur();' align='absmiddle' style='margin-bottom:2px;'></a></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height='5'></td>
	</tr>
	<tr>
		<td align='center'>
			<table width="100%" border="1" cellspacing="0" cellpadding="5" style="border-collapse:collapse;" bordercolor="dbdbdb"  frame="hsides" class='s'>
				<tr align='center'>
					<td width='14%' class='week'>Sun</td>
					<td width='14%' class='week'>Mon</td>
					<td width='14%' class='week'>Tue</td>
					<td width='14%' class='week'>Wed</td>
					<td width='14%' class='week'>Thu</td>
					<td width='14%' class='week'>Fri</td>
					<td width='14%' class='week'>Sat</td>
				</tr>

				<tr height=<?=$cellh?>>


        <!-- ?????? ????????? -->


<?

$date   = 1;
$offset = 0;
$ck_row=0; //????????? ????????? ????????? ?????? ????????????

while ($date <= $maxdate) {
   if ($date < 10) $date2 = "&nbsp;".$date;
   else $date2 = $date;
   if($date == '1') {
    $offset = date('w', mktime(0, 0, 0, $month, $date, $year));  // 0: sunday, 1: monday, ..., 6: saturday
//	SkipOffset($offset,mktime(0, 0, 0, $month, $date, $year));
	$no = $offset;
	$sdate = mktime(0, 0, 0, $month, $date, $year);
	$edate = '';
	include $c_path.'/SkipOffset.php';

   }
   if($offset == 0) $style ="sholy";
   elseif($offset == 6) $style ="ssat";
   else $style = "snum";

   $date_title = '';

   for($i=0;$i<count($HOLIDAY);$i++){
       if($HOLIDAY[$i][0] =="$month-$date") {
		   $style="sholy";
		   $date_title = "title='{$month}??? {$date}?????? ".$HOLIDAY[$i][1]." ?????????'";
		   break;
       }
   }


   if($date == $today  &&  $year == $thisyear &&  $month == $thismonth){
	   $style = 'snum';
	   $tdgcolor = "bgcolor='#f5f5f5'";

   }else{
	   $tdgcolor = '';
   }
?>



		<td <?=$tdgcolor?> valign='top' style='height:120px;'>
			<table cellpadding='0' cellspacing='0' border='0' width='100%'>
				<tr>
					<td style='font-size:13px;padding:5px;'>
					<?
						if($chk_type == 'ok'){
					?>
						<a href="javascript:reg_register('<?=$year?>','<?=$month?>','<?=$date?>');" class=<?=$style?> <?=$date_title?>><?=$date2?></a>
					<?
						}else{
					?>
						<span class=<?=$style?> <?=$date_title?>><?=$date2?></span>
					<?
						}
					?>
					</td>
				</tr>


<?
	//????????????????????? ????????????
	$monthTxt = sprintf('%02d',$month);
	$sql = "select * from tb_board_list where table_id='$table_id' and data01='$year' and data02='$month' and data03='$date' order by uid";

	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	for($i=0; $i<$num; $i++){
		$row = mysql_fetch_array($result);
		$uid = $row['uid'];
		$title = $row['title'];
		$data04 = $row['data04'];
		$data05 = $row['data05'];	//???????????? uid???
		$userid = $row['userid'];
		$site = $row['site'];
		$pwd_chk = $row['pwd_chk'];
		$sData06 = $row['sData06'];

		//????????? ?????? ??????
		include $boardRoot.'chk_view.php';

		//???????????? ??????????????? ??????
		if($data05 && $GBL_MTYPE != 'A'){
			$btn_link = "onclick=show_view('$data05');";
		}

		if($site)	$siteTxt = "<span class='".$siteClass[$site]."'>".$site."</span>";
		else		$siteTxt = '';


		echo ("<tr><td class='scBox' $btn_link>");
		echo ("$siteTxt<br><span class='scBoxTitle'>$title</span>");
		echo ("</td></tr>");
	}

	echo ("
			</table>
		</td>");




  $date++;
  $offset++;

  if($offset == 7){
	  echo ("</tr>");
	  if($date <= $maxdate){
		  echo ("<tr height=$cellh>");
		  $ck_row++;
	  }
	  $offset = 0;
  }
} // end of while

if($offset != 0){
//  SkipOffset((7-$offset),'',mktime(0, 0, 0, $month, $date, $year));
  $no = 7-$offset;
  $sdate = '';
  $edate = mktime(0, 0, 0, $month, $date, $year);
  include $c_path.'/SkipOffset.php';
  echo ("</tr>");
}

?>
<!-- ?????? ????????? ??? -->


				</td>
			</tr>
		</table>
	<tr>
		<td height=3></td>
	</tr>
</table>
