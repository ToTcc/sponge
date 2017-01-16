<?php

function getWeekByDate($time) {
    $time = date('Y-m-d', strtotime($time));
    $weekArray=array("日","一","二","三","四","五","六");
    return " 周".$weekArray[date("w",strtotime($time))];
}

function convertDateToChinese($time) {
    return date('Y年m月d日', strtotime($time));
}

function calculateDateGap($from, $to) {
    $days=round((strtotime($to)-strtotime($from))/86400);
    return $days;
}

function calculateHourGapByDate($from, $to) {
    $hours=round((strtotime($to)-strtotime($from))/3600)+1;
    return $hours;
}