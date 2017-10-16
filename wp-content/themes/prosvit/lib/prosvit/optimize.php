<?php


// 20. STOP WORDPRESS FROM GUESSING URLS
// https://www.labnol.org/internet/wordpress-optimization-guide/3931/

add_filter('redirect_canonical', 'stop_guessing');
function stop_guessing($url) {
 if (is_404()) {
   return false;
 }
 return $url;
}

// disable all widget areas
function disable_all_widgets($sidebars_widgets) {
  //if (is_home())
    $sidebars_widgets = array(false);
  return $sidebars_widgets;
}
add_filter('sidebars_widgets', 'disable_all_widgets');

