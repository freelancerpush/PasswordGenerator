<!DOCTYPE html>
<html>
<head>
	<title>Passsword Generator</title>

	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="http://www.steamdev.com/zclip/js/jquery.zclip.min.js"></script>
  
	<script type="text/javascript">
	$(document).ready(function () {
	    $("#copy-button").zclip({
	        path: "http://www.steamdev.com/zclip/js/ZeroClipboard.swf",
	        copy: function(){return $('#password').val();},
	        beforeCopy: function () { },
	        afterCopy: function () { }
	    });
	});
	</script>
</head>
<body>
<h1>Passsword Generator</h1>
<h3>Default Password  "Type=AlphaNumeric" & "Length=8"</h3>
<form method="get">
	Type
	<select name="type">
		<option value="1">Alpha</option>
		<option value="2">AlphaNumeric</option>
		<option value="3">AlphaNumeric + Symbol</option>
	</select>
	
	Length
	<select name="length">
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="10">10</option>
	</select>
	<input type="submit" value="Submit">
</form>
</body>
</html>

<?php 


function randomPassword() 
{
    
	if(isset($_REQUEST['type']) && $_REQUEST['type']!='' )
		{
			if($_REQUEST['type']=='1' )
				{
					$alphabet="abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ";
				}
			if($_REQUEST['type']=='2' )
				{
					$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
				}
			if($_REQUEST['type']=='3' )
				{
					$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789!@#$%^&*()[]{}";
				}
		}
	else
		{
			$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		}

	if(isset($_REQUEST['length']) && $_REQUEST['length']!='' )
		{
			$length=$_REQUEST['length'];
		} 
	else
		{
			$length="8";
		}

    //$alphabet = $type;
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $length; $i++) 
    {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


//echo randomPassword();
//echo $pass;
?>
<br>
<input value="<?=randomPassword()?>" id="password" name="url" type="text" />
<a id="copy-button" href=""> Copy To ClipBoard </a>
