<?php

class Helper
{
    /**
     * Tarih karşılaştırma
     * @param $date1
     * @param $date2
     * @return bool
     */
    public static function dateDifference($date1, $date2)
    {
        if ($date1 > $date2) {
            return false;
        } else {
            return true;
        }
    }

    public static function Now()
    {
        return date("Y-m-d H:i:s");
    }
}