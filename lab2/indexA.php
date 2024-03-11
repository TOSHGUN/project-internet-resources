<?php
$scorepoint = 0;
$person = (isset($_POST['n0'])) ? ((string)$_POST['n0']) : "NoName";
if (strlen($person) < 2) {
	$person = 'NoName';
};
$report["Name"] = $person;
$a = (isset($_POST['n1'])) ? (int)$_POST['n1'] : 0;
if ($a == '13') {
	++$scorepoint;
	$report['n1']='1';
} else {
	$report['n1']='0';
};
// echo'1)'.$scorepoint.' '.$a.'<br>';
$a = (isset($_POST['n2-1'])) && (isset($_POST['n2-2'])) && !(isset($_POST['n2-3'])) && (isset($_POST['n2-4']));
if ($a) {
	++$scorepoint;
	$report['n2']='1';
} else {
	$report['n2']='0';
};
// echo'2)'.$scorepoint.' '.$a.'<br>';
$a = (isset($_POST['n3-1'])) && (isset($_POST['n3-2'])) && !(isset($_POST['n3-3'])) && !(isset($_POST['n3-4']));
if ($a) {
	++$scorepoint;
	$report['n3']='1';
} else {
	$report['n3']='0';
};
// echo'3)'.$scorepoint.' '.$a.'<br>';
$a = (isset($_POST['n4'])) ? (string)$_POST['n4'] : '0';
if ($a == 'n4-2') {
	++$scorepoint;
	$report['n4']='1';
} else {
	$report['n4']='0';
};
// echo'4)'.$scorepoint.' '.$a.'<br>';
$a = (isset($_POST['n5'])) ? (string)$_POST['n5'] : '0';
if ($a == 'n5-3') {
	++$scorepoint;
	$report['n5']='1';
} else {
	$report['n5']='0';
};
// echo'5)'.$scorepoint.' '.$a.'<br>';
$a = (isset($_POST['n6'])) ? (string)$_POST['n6'] : '0';
if ($a == 'n6-3') {
	++$scorepoint;
	$report['n6']='1';
} else {
	$report['n6']='0';
};
// echo'6)'.$scorepoint.' '.$a.'<br>';
$a = (isset($_POST['n7'])) ? (string)$_POST['n7'] : '0';
if (strcasecmp($a, 'spike') == 0 || strcasecmp($a, 'спайк') == 0) {
	++$scorepoint;
	$report['n7']='1';
} else {
	$report['n7']='0';
};
// echo'7)'.$scorepoint.' '.$a.'<br>';
$a = (isset($_POST['n8-1'])) && (isset($_POST['n8-2'])) && !(isset($_POST['n8-3'])) && (isset($_POST['n8-4'])) && !(isset($_POST['n8-5'])) && (isset($_POST['n8-6']));
if ($a) {
	++$scorepoint;
	$report['n8']='1';
} else {
	$report['n8']='0';
};
// echo'8)'.$scorepoint.' '.$a.'<br>';
echo '<fieldset id="fs2" name="fs2" style="display:block;"><legend>Результат</legend>';
echo '<p style = "font: 12px Arial;">Вы дали ' . $scorepoint . ' правильных ответа/ов</p><br>';
switch ($scorepoint) {
	case 0:
	case 1:
	case 2: {
			echo '<textarea id="vv" name="vv" rows="8" cols="40" contenteditable="false">Очень плохо. Вам надо учить теорию.</textarea>';
			break;
		}
	case 3:
	case 4:
	case 5: {
			echo '<textarea id="vv" name="vv" rows="8" cols="40" contenteditable="false">Удовл. Вы могли бы ответить лучше.</textarea>';
			break;
		}
	case 6:
	case 7: {
			echo '<textarea id="vv" name="vv" rows="8" cols="40" contenteditable="false">Хорошо. Видно, что вы старались понять игру.</textarea>';
			break;
		}
	case 8: {
			echo '<textarea id="vv" name="vv" rows="8" cols="40" contenteditable="false">Или вы отлично знаете игру или вы сжульничали.</textarea>';
			break;
		}
	default: {
			echo '<textarea id="vv" name="vv" rows="8" cols="40" contenteditable="false">Ваши ответы находятся за гранью нашего понимания.</textarea>';
			break;
		}
}
echo '</fieldset>';

$file = "Fl.txt";
$fh = fopen($file, "a") or die("File ($file) does not exist!");
foreach ($report as $value) {
	$success = fwrite($fh, $value);
	$success = fwrite($fh, '|');
};
$success = fwrite($fh, "\r\n");
fclose($fh);