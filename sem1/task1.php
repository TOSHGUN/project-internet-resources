<?php
$dates = [ // исходный массив дат
    "2020-11-22","17-10-1999","13.05.2003","08-28.2000","30/01/1985","01.03.2013","06-20.1990","02/10/1876"
];

$monthes = array( // массив названий месяцев по номерам
    1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
    5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
    9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
);

function format_date(&$dates, $monthes){ // функция приведения дат к одному формату
    for($i = 0; $i < count($dates); $i++)
    {
        if($dates[$i][2]=='/' or $dates[$i][5]=='/'){ // меняем разделители, чтобы можно было преобразовать
            $dates[$i][2] = '.';
            $dates[$i][5] = '.';
        }
        if($dates[$i][2]=='-' and $dates[$i][5]=='.'){ // меняем разделители, чтобы можно было преобразовать
            $dates[$i][2] = '.';
            // меняем местами месяц и дату
            $a = $dates[$i][0]; 
            $dates[$i][0] = $dates[$i][3];
            $dates[$i][3] = $a;
            $a = $dates[$i][1];
            $dates[$i][1] = $dates[$i][4];
            $dates[$i][4] = $a;
        }
        // $dates[$i] = date("j F Y", strtotime($dates[$i])); // 10 October 1980
    }

    usort($dates, function ($a, $b){ // сортировка дат по возрастанию
        return strtotime($a) - strtotime($b);
    }); 
    foreach($dates as $date){ // вывод на экран дат построчно
        echo date("j", strtotime($date))." ". $monthes[(date('n', strtotime($date)))]." ".date("Y", strtotime($date))."<br>";
    }

    // вывод текущей даты в заданном формате
    $timezone = date_default_timezone_get();
    echo "<br>".date("j", strtotime($timezone))." ". $monthes[(date('n', strtotime($timezone)))]." ".date("Y", strtotime($timezone))."<br>";
}
    

format_date($dates, $monthes);
?>