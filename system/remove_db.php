<?php
/* delete database */
require_once 'functions.php';

$id = _G('id');

if( $id && contains('.db', $id))
{

    $file = $id;

    # replace odd chars
    $file = str_replace('%','', $file);
    $file = str_replace("'",'', $file);
    $file = str_replace('<','', $file);
    $file = str_replace('&','', $file);
    $file = str_replace(';','', $file);

    # set src
    require_once 'conf.php';
    $result_dir = '../' . $conf->dirs->results;
    $db_src = $result_dir . $file;

    # not allowed to delete dirs
    if( is_dir( $db_src) ) exit;

    # remove
    unlink($db_src);

}

else {
    http_response_code(403);
    die();
}
