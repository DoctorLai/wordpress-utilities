<?php
  // https://helloacm.com/how-to-tell-browsers-re-update-cssjs-files-when-files-are-changed-in-wordpress/
  function justyy_remove_cssjs_ver( $src ) {
    $newsrc = $src;
    if( strpos( $newsrc, '?ver=' ) ) {
      $newsrc = remove_query_arg( 'ver', $newsrc );
    }
    $url = parse_url($newsrc, PHP_URL_PATH);
    $source = $rootdir .'/'. $url;
    if (is_file($source)) {
      $newsrc .= "?m=".filemtime($source);
      return $newsrc;
    }     
    return $src; // keep unchanged if file is not accessible.
  }
?>
