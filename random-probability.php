<?php
randomWithProbability([1, 60], [2, 20], [3, 10], [4, 10]);

function randomWithProbability(...$args) {
    $keys = [];
    $probs = [];
    $ltz = false;
    foreach($args as $item) {
        $keys[] = $item[0];
        $probs[] = $item[1];
        }
    while(hasLessThanOne($probs)) {
        $probs = array_map(function($x) { return $x * 10; }, $probs);
    }
    for($i = 10; $i>1; $i--) {
        $r = areDivisible($probs, $i);
        while($r) {
            $probs = array_map(function($x) use($i) { return $x / $i; }, $probs);
            $r = areDivisible($probs, $i);
        }
    }
    $fa = constructArray($probs, $keys);
    return $fa[array_rand($fa)];
}
function testRandom($a, $int) {
    $res = [];
    $sum = [];
    $perc = [];
    for($i=1;$i<=$int; $i++) {
        $res[] = $a[array_rand($a)];
    }
    foreach($res as $it) {
        if(!isset($sum[$it])) {
            $sum[$it] = 0;
        }
        $sum[$it]++;
    }
    foreach($sum as $key => $s) {
        $perc[$key] = ($s / $int) * 100;
    }
    var_dump($perc);
    
}
function constructArray($probs, $keys) {
    $a = [];
    foreach($probs as $key => $item) {
        $a = array_merge($a, array_fill(count($a), $item, $keys[$key]));
    }
    return $a;
}

function hasLessThanOne($items) {
    $r = false;
    foreach($items as $i) {
        if($i < 1) {
            $r = true;
        }
    }
    return $r;
}

function areDivisible($items, $div) {
    $c = 0;
    foreach($items as $i) {
        if($i % $div === 0 && $i >= 1 && ($i/$div) > 0) {
            $c++;
        }
    }
    return ($c === count($items));
}
