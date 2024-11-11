<?php

namespace App\Helpers;

use PhpOption\Option;

class CategoryHelper
{
    public static function Menu ($menus,$parent_id = null,$char="-- ") {
        $html='';
        
        foreach ($menus as $key => $menu)  {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <option value='. $menu->id . '>' . $char  .  $menu->title . '</option>
                ';
                unset($menus[$key]);
                $html.= self::Menu($menus,$menu->id,$char .'-- ');
            }   
        }

        return $html;
    }

    public static function MenuEdit($menus, $parent_id123, $parent_id = null, $char = "-- ") {
        $html = '';     
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <option ' . ($menu->id == $parent_id123 ? 'selected' : '') . ' value="' . $menu->id . '">' . $char . $menu->title . '</option>
                ';
                unset($menus[$key]); // Loại bỏ phần tử đã xử lý để tránh lặp lại
                $html .= self::MenuEdit($menus, $parent_id123, $menu->id, $char . '-- ');
            }   
        }
        return $html;
    }
}