<?php
$listAnswer = [
    [0,'A'],
    [1,'A'],
    [2,'A'],
    [3,'A'],
    [4,'A'],
    [5,'A'],
    [6,'A'],
    [7,'A'],
    [8,'A'],
    [9,'A'],
];


function myfunction($v)
{
  return[
    'macau'=>$v[0],
    'luaChon'=>$v[1],
  ];
}
$listAnswer =  array_map(fn ($obj)=>[
  'macau' => $obj[0],
  'dapAn' => $obj[1],
], $listAnswer);
$listAnswer = json_encode($listAnswer);

