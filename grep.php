<form action="<?=$PHP_SELF;?>" method="POST" style="font-family: Verdana">
	<br><input type="text" name="grep" placeholder="Поиск текста в коде" pattern="[a-zA-Z0-9 ]+"><br>
	<input type="text" name="ext" placeholder="Расширение файла" value=".php" pattern="[a-zA-Z0-9.]+"><br><br>
	<input type="text" name="find" placeholder="Поиск по названию файла" pattern="[a-zA-Z0-9 _-.]+"><br><br>
	<input type="submit" value="Найти">
</form><hr>

<?
if (!empty($_POST)) {
$str_grep=preg_filter('/[^a-zA-Z0-9 ]*/', '', $_POST["grep"]);
$str_find=preg_filter('/[^a-zA-Z0-9 _-.]*/', '', $_POST["find"]);
$ext=preg_filter('/[^a-zA-Z0-9.]*/', '', $_POST["ext"]);

echo '<pre>';
if ($str_grep && ($str_grep != "")) {
	$grep=shell_exec("grep -rn --include=\*$ext '$str_grep' .");
	echo 'Найденный код:<br><br>';
	print_r(str_replace(array("<", ">"), array("&lt;", "&gt;"), $grep));
	echo '<br><hr><br>';
}
if ($str_find && ($str_find != "")) {
	$find=shell_exec("find . -name $str_find");
	echo 'Найденные файлы:<br><br>';
	print_r(str_replace(array("<", ">"), array("&lt;", "&gt;"), $find));
}
echo '</pre>';
}
?>
