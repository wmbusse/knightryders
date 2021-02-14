    <?php
    require_once("admin/includes/session.php"); 
    require_once("admin/includes/functions.php");
    require_once("admin/includes/new_config.php");
    require_once("admin/includes/database.php");
    require_once("admin/includes/db_object.php");
    require_once("admin/includes/user.php");
    require_once("admin/includes/photo.php");
    require_once("admin/includes/comment.php");
    require_once("admin/includes/event.php");
    defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT','C:' .DS .'wamp64'.DS.'www'.DS.'knightryders');
    defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH',SITE_ROOT.DS.'admin'.DS.'includes');
   ?>