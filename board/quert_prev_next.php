<?
	//�����Խ���
	if($tableList){
		$tableList = str_replace(",", "','", $tableList);
		$pnquery = "where (table_id='$table_id' or table_id in ('$tableList')) and notice_chk=''";

	//�⺻��������
	}else{
		$pnquery = "where table_id='$table_id'";
	}

	$pnquery .= " and site_id='$SITE_ID' ";

	if($word == 'title')					$pnquery .= "and title like '%$word%'";
	elseif($word == 'ment')			$pnquery .= "and ment like '%$word%'";
	elseif($word == 'name')			$pnquery .= "and name like '%$word%'";
	elseif($word == 'title_ment')	$pnquery .= "and (title like '%$word%' || ment like '%$word%')";


	$addquery = " and notice_chk='$notice_chk'";

	/********************** ������ ���� ***********************/
	$sql01 = "select * from ks_board_list $pnquery and reg_date > $reg_date $addquery order by notice_chk asc, reg_date asc limit 1";
	$res01 = mysqli_query($dbc,$sql01);
	$num01 = mysqli_num_rows($res01);

	//�������� ���� �Ϲݱ��� ��� �������� Ȯ���Ѵ�.
	if($notice_chk == '' && $num01 == 0){
		$sql01 = "select * from ks_board_list $pnquery and notice_chk='1' order by reg_date desc limit 1";
		$res01 = mysqli_query($dbc,$sql01);
		$num01 = mysqli_num_rows($res01);
	}


	/********************** ������ ���� ***********************/
	$sql02 = "select * from ks_board_list $pnquery and reg_date < $reg_date $addquery order by notice_chk desc, reg_date desc limit 1";
	$res02 = mysqli_query($dbc,$sql02);
	$num02 = mysqli_num_rows($res02);

	//�������� ���� �������� ��� �Ϲݱ��� Ȯ���Ѵ�.
	if($notice_chk == '1' && $num02 == 0){
		$sql02 = "select * from ks_board_list $pnquery and notice_chk='' order by reg_date desc limit 1";
		$res02 = mysqli_query($dbc,$sql02);
		$num02 = mysqli_num_rows($res02);
	}
?>