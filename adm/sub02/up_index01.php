<?
	include '/home/crob/www/adm/header.php';

	$table_id = 'table_1657175018';	

	if(!$table_id){
		Msg::backMsg('���ٿ����Դϴ�.');
	}
	
	if(!$type)	$type = 'list';

	//�Խ��� ȯ�漳��
	include $boardRoot."config.php";

?>

	<tr>
		<td width='200' valign='top' class='mCon'>
		<?
			$sNum01 = '1';
			$sNum02 = '4';

			include '../include/side_menu.php';
		?>

		</td>
		<td valign='top' class='aCon'>
			<table cellpadding='0' cellspacing='0' border='0' width='1440'>
				<tr>
					<td>
						<!-- ���� -->
						<?
							if($_SERVER['REMOTE_ADDR'] == '106.246.92.237'){
							
							echo $type.'<br>';
							echo$write_file.'<br>';
							echo$list_file.'<br>';
							echo$view_file.'<br>';
							
						}
							switch($type){
								case 'write' :
								case 'edit' :
													include $boardRoot.$write_file;
													break;

								case 'list' :
													include $boardRoot.'query.php';	//�Խ��� ���� ����
													include $boardRoot.$list_file;	//�Խ��� ����Ʈ
													include $boardRoot.'pageNum.php';	//�Խ��� ��������ȣ
													break;

								case 'view' :
													include $boardRoot.$view_file;
													break;

								case 're_write' :
								case 're_edit' :
													include $boardRoot.'re_write.php';
													break;

								case 're_view' :
													include $boardRoot.'re_view.php';
													break;
							}
						?>		
						<!-- ���� -->

					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>


<?
	include "../footer.php";
?>
