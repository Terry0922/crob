		
	<div class="section footerSection">		
		<div id="footer" class="footer">
			<div class="f_center dp_f dp_sb">
				<div class="f_left dp_f">
					<div class="f_logo">
						<img src="/images/logo_c.png" alt="logo">
					</div>
					<div class="adrWrap">
						<div class="adrTop">
							<span>주식회사 크로브</span>
							<span>대표자: 이근호</span>
							<span>사업자등록번호: 168-88-01623</span>
						</div>
						<p class="adrBot">서울시 강남구 봉은사로112길 23, 삼성빌딩 1층</p>
					</div>
				</div>
				<div class="f_right">
					<p class="copyright poppin">Copyright ⓒ CROB Co., LTD. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</div>
</div>


<?
	include'fullScript.php';
?>

<script>


</script>


<!-- 알림 메세지 -->
<a id="GblNotice_open" class="GblNotice_open"></a>

<div id="GblNotice" class="popup_background" style="min-width:250px;display:none;">
	<div class="cls_buttonali" id="alertCloseBtn"><button class="GblNotice_close close_button_pop"></button></div>
	<div class="popup_notice">
		<div class="clearfix"><div class="img_clear"><img src="/module/popupoverlay/ico_notice.gif" alt="알림"></div><div class="pop_ttl0">알림</div></div>
		<div class="pop_div_dotted"></div>
		<div class="write_it"><span id="alertTxt" ></span></div>
		<div class="btn_ali_pop2" id="alertBtn"><input type ="button" class="btn_notice_reg GblNotice_close" value="확인" /></div>
	</div>
</div>

<!-- confirm창 -->
<a id="conFirm_open" class="conFirm_open"></a>
<div id="conFirm" class="popup_background" style="min-width:250px;display:none;">
	<div class="cls_buttonali"><button class="conFirm_close close_button_pop"></button></div>
	<div class="popup_notice">
		<div class="clearfix"><div class="img_clear"><img src="/module/popupoverlay/ico_notice.gif" alt="확인"></div><div class="pop_ttl0">확인</div></div>
		<div class="pop_div_dotted"></div>
		<div class="write_it"><span id="confirmTxt" ></span></div>
		<a class="conFirm_close" href="#">
			<div class="btn2_wrap">
				<div class="btn_ali_pop3" id="confirmCancelBtn"><input type="button" class="btn_notice_reg_cancel" value="취소" /></div>
				<div class="btn_ali_pop3" id="confirmBtn"><input type="button" class="btn_notice_reg_add" value="확인"></div>
			</div>
		</a>
	</div>
</div>


<a id="multiBox_open" class="multiBox_open"></a>
<div id="multiBox" class="popup_background" style="min-width:250px;display:none;">
	<div class="cls_buttonali"><button class="multiBox_close close_button_pop"></button></div>
	<div class="popup_notice">
		<div class="write_it">
			<div id='multiFrame' style="margin:30px 0 0 0;background:#fff;overflow:hidden;position:relative;"></div>
		</div>
	</div>
</div>


<!-- 팝업 스크립트 -->
<script>
$(document).ready(function () {
	$('#GblNotice,#conFirm,#multiBox').popup({
		transition: 'all 0.3s',
		blur: false,
		escape:false,
		scrolllock: false
	});

	//숫자만 입력받기
	$('.numberOnly').keydown(function(e){
		fn_Number($(this),e);
	}).keyup(function(e){
		fn_Number($(this),e);
	}).css('imeMode','disabled');


	//input필드 자동완성기능
	jQuery('input').attr("autocomplete","off");
});
</script>
<!-- 팝업 스크립트 -->

<!-- <form name='frm_down' method='post' action='/module/download2.php'>다운로드 폼
<input type='hidden' name='file_name' value="">
<input type='hidden' name='file_rename' value="">
<input type='hidden' name='downfiledir' value="/home/ansanyouth/www/upfile/">
</form> -->

<iframe name='ifra_gbl' src='about:blank' width='0' height='0' frameborder='0' scrolling='no' style='display:none;'></iframe>

</body>
</html>