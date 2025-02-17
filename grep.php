<form action="<?=$PHP_SELF;?>" method="POST" style="font-family: Verdana">
	<br><input type="text" name="grep" placeholder="Поиск текста в коде"><br>
	<input type="text" name="ext" placeholder="Расширение файла" value=".php"><br><br>
	<input type="text" name="find" placeholder="Поиск по названию файла"><br><br>
	<input type="submit" value="Найти">
</form><hr>

<?
if (!empty($_POST)) {
$str_grep=$_POST["grep"];
$str_find=$_POST["find"];
$ext=$_POST["ext"];

echo '<pre>';
if ($str_grep && ($str_grep != "")) {
	$grep=shell_exec("grep -rn --include=\*$ext '$str_grep' .");
	echo 'grep:<br><br>';
	print_r(str_replace(array("<", ">"), array("&lt;", "&gt;"), $grep));
	echo '<br><hr><br>';
}
if ($str_find && ($str_find != "")) {
	$find=shell_exec("find . -name $str_find");
	echo 'find:<br><br>';
	print_r(str_replace(array("<", ">"), array("&lt;", "&gt;"), $find));
}
echo '</pre>';
}
?>
