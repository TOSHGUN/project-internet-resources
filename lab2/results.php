<?php
$fh = fopen("Fl.txt", "r");
// $let = "NoName";
$count = 0;
$user_points = 0;
while (!feof($fh)) {
    $line = fgets($fh, 4096);
    // if (strpos($line, $let) === false) {
        $sep_line = explode('|', $line);
        ++$count;
        for ($i = 0; $i <= 8; ++$i) {
            if ($i > 0) {
                $sum[$count] += (int)$sep_line[$i];    
            };
            $list[$i][$count] = $sep_line[$i];
        }
    // };
};
for ($i = 0; $i <= $count - 1; ++$i) {
    for ($j = 1; $j <= 8; ++$j) {
        $user_points += $list[$j][$i];
    };
    if ($user_points == max($sum)) { // сравниваем баллы текущего с максимумом по всем
        $best_person = ($list[0][$i]!="NoName") ? $list[0][$i] : "Анонимный пользователь";
    };
    if ($user_points == min($sum)) { // сравниваем баллы текущего с минимумом по всем
        $worst_person = ($list[0][$i]!="NoName") ? $list[0][$i] : "Анонимный пользователь";
    };
    $user_points = 0;
};
print "В тестировании приняли участие " . $count . " человек<br>";
print "Лучший результат (" . max($sum) . " правильных ответов) показал " . $best_person . " .<br>";
print "Худший результат (" . min($sum) . " правильных ответов) показал " . $worst_person . " .<br>";
fclose($fh);
