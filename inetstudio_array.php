<?php 

$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
];

//1. выделить уникальные записи (убрать дубли) в отдельный массив. в конечном массиве не должно быть элементов с одинаковым id.
$unique = array_column($array, null, 'id');


// 2. отсортировать многомерный массив по ключу (любому)
usort($array, static function($a, $b) {
    return $a['id'] <=> $b['id'];
});


// 3. вернуть из массива только элементы, удовлетворяющие внешним условиям (например элементы с определенным id)
$getById = 2;
$ids = array_filter($array, static function ($ar) use ($getById) {
    if ($ar['id'] == $getById) {
        return $ar['id'];
    }
});


// 4. изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)
$unique = array_column($array, 'id', 'name');