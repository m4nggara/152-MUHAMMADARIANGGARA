<?php

namespace App\Helpers;

class Helper
{
    /**
     * Fungi untuk mencari node menu item
     * 
     * true : jika item termasuk dalam node
     * false : jika item tidak termasuk dalam node
     *
     * @param string $menu
     * @param array $menus
     * @return boolean
     */
    static function isNodeMenu(string $menu, array $menus) : bool
    {
        if(in_array($menu, $menus)) return true;
        return false;
    }

    /**
     * Cek Prima Number
     *
     * @param [type] $number
     * @return boolean
     */
    static function isPrima($number) : bool
    {
        if ($number == 1) return false;
        for ($i = 2; $i <= $number/2; $i++){
            if ($number % $i == 0)
                return false;
        }
        return true;
    }
}