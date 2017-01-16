<?php
/**
 * 获取已过时间占总时间比例，用于时间进度条
 * @input yyyy-mm-dd
 */
function getRateOfTime($beginDate, $endDate) {
    $beginTime = $beginDate ." 00:00:00";
    $endTime = $endDate ." 00:00:00";

    $time = strtotime($endTime) - strtotime($beginTime);
    if($time <= 0) {
        return $rateString = '100%';
    }

    $timePassed = time() - strtotime($beginTime);
    if($timePassed < 0) {
        return $rateString = '0%';
    }

    $rate = round($timePassed / $time, 2);
    if($rate > 1) {
        $rate = 1;
    }
    $rateString = 100 * $rate .'%';

    return $rateString;
}

function getActivityRefundCode($hourGap) {
    if($hourGap > 48) {
        $code = "ACTIVITY_LEAVE_BEFORE_48_HOURS";
    } else if($hourGap <= 48 && $hourGap > 24) {
        $code = "ACTIVITY_LEAVE_BEFORE_24_HOURS";
    } else {
        $code = "ACTIVITY_LEAVE_IN_24_HOURS";
    }
    return $code;
}

function getEventRefundCode($hourGap) {
    if($hourGap > 48) {
        $code = "EVENT_LEAVE_BEFORE_48_HOURS";
    } else if($hourGap <= 48 && $hourGap > 24) {
        $code = "EVENT_LEAVE_BEFORE_24_HOURS";
    } else {
        $code = "EVENT_LEAVE_IN_24_HOURS";
    }
    return $code;
}

