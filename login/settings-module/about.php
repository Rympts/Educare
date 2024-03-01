<div id="content">
    <?php
      switch($subpage){
                case 'users':
                    require_once 'users-module/index.php';
                break; 
                case 'module_two':
                    require_once 'module-folder/';
                break; 
                case 'module_xxx':
                    require_once 'module-folder/';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>