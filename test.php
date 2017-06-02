
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="zh-tw">
<head>
<meta name="Generator" content="EditPlus">
<meta name="Author" content="男丁格爾's 脫殼玩">
<meta name="Keywords" content="">
<meta name="Description" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">
<link type="text/css" rel="stylesheet" href="../../style.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<title>enabled/disabled</title>
<style type="text/css">

</style>
<script type="text/javascript">
	$(function() {
		// 按下停用鈕
		$('#disBtn').click(function(){
			// 方法 1：
			$('.form_ele').attr('disabled', true);

			// 方法 2：
			//$('.form_ele').attr('disabled', 'disabled');
		});

		// 按下啟用鈕
		$('#enBtn').click(function(){
			// 方法 1：
			$('.form_ele').attr('disabled', false);

			// 方法 2：
			//$('.form_ele').attr('disabled', '');

			// 方法 3：
			//$('.form_ele').removeAttr('disabled');
		});
	});
</script>
</head>

<body>
	<input type="submit" value="disabled" id="disBtn" />
	<input type="button" value="enabled" id="enBtn" />
	<hr />
	<input type="text" name="txt" class="form_ele" value="abgne.tw" />
	<br />
	<select name="sel" class="form_ele">
		<option value="01">01</option>
		<option value="02">02</option>
	</select>
</body>
</html>
