<?
	include '../header.php';

	if(!$type)	$type = 'list';
?>

	<tr>
		<td width='200' valign='top' class='mCon'>
		<?
			$sNum01 = '2';
			$sNum02 = '2';

			include '../include/side_menu.php';
		?>
		</td>
		<td valign='top' class='aCon'>
			<table cellpadding='0' cellspacing='0' border='0' width='1200'>
				<tr>
					<td>
					<?

						if($type == 'list')			include 'list2.php';
						elseif($type == 'write')	include 'write2.php';
						elseif($type == 'edit')	include 'write2.php';
					?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>


<?
	include '../footer.php';
?>