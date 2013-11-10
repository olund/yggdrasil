<?php

/**
 * Theme related functions.
 */

function get_title($title) {
  global $yggdrasil;
  return $title . (isset($yggdrasil['title_append']) ? $yggdrasil['title_append'] : null);
}


function get_navbar($menu) {
    $html = "<nav>";
      foreach($menu['items'] as $item) {
          $selected = $menu['callback_selected']($item['url']) ? " class='selected' " : null;
        $html .= "<a href='{$item['url']}' {$selected}>{$item['text']}</a>";
    }
    $html .= "</nav>";
    return $html;
}
