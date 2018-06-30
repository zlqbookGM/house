<?php
namespace common\utils\parse;


//解析

    $basePath = $data;

    for ($i = 0; $i < 1; $i++) {
        $path = $basePath . "/$i";
        walk($path);
    }

function walk($path){
    $list = scandir($path);
    foreach($list as $file){
        if($file=='.' || $file=='..') continue;
        $data = file_get_contents($path.'/'.$file);
        if(!$data){
            echo $path.'/'.$file."\n";
            die;
        }
        parseDetail($data);
    }
}


function parseDetail($data){
    if(!preg_match('#<table class="olt">(.*?)</table>#s', $data, $match)){
        var_dump($data);
    }

    preg_match_all('#<tr class="">(.*?)</tr>#s', $match[1], $resources);
    $res = [];
    foreach($resources[1] as $item){
        if(!preg_match('#<a href="(.*?)" title="(.*?)" class="">#s', $item, $tmp)){
            die($item);
        }

        $title = preg_replace('#\s+#',' ',trim($tmp[2]));
        $href = $tmp[1];

        preg_match('#"time">(.*?)</td>#', $item, $tmp);
        $time = $tmp[1];
        // if(!isFind($title)) continue;

        echo mb_convert_encoding("{$title},{$href},{$time}\n", 'GBK', 'UTF-8');
    }
}


function isFind($data){
    $keyWords = [
        '牡丹园','知春','中关村','北土城','健德门','西土城','北航','双榆树','静淑苑',
    ];
    foreach($keyWords as $key){
        if(strpos($data, $key) && false===strpos($data, '求租')&& false===strpos($data, '已租')){
            return true;
        }
    }
    return false;
}