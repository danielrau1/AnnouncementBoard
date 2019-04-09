<?php
//(B4) Load config
require_once 'config/config.php';

// load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';



// (B5) autoload libraries - don't have to manually include them
spl_autoload_register(function($className){
    require_once 'libraries/'.$className.'.php';
});
