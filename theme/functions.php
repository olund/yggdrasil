<?php

/**
 * Theme related functions.
 */

function get_title($title) {
  global $yggdrasil;
  return $title . (isset($yggdrasil['title_append']) ? $yggdrasil['title_append'] : null);
}