<?php
 namespace Duplicatepost\DuplicatePost;

use Duplicatepost\DuplicatePost\Controller\AdminController;

 class DuplicatePostPlugin{
         const TRANSIENT_DUPLICATE_POST_ACTIVATED = 'DuplicatePost_duplicate_post_activated';
        public function __construct(string $file){
                register_activation_hook($file, [$this, 'plugin_activation']);
                add_action('admin_notices', [$this, 'notice_activation']);

                if(is_admin()){
                        $adminController = new AdminController();
                }
        }

        public function plugin_activation():void{
                set_transient(self::TRANSIENT_DUPLICATE_POST_ACTIVATED, true);
        }

        public function notice_activation():void{
                if(get_transient(self::TRANSIENT_DUPLICATE_POST_ACTIVATED)){
                        self::render('notices', ['message' => 'Merci d\'avoir active <strong>Duplicate Post</strong>!']);
                        delete_transient(self::TRANSIENT_DUPLICATE_POST_ACTIVATED);
                }
        }
        public static function render(string $name, array $args = []):void{
                extract($args); 
                $file = DuplicatePost_PLUGIN_DIR . "views/$name.php";

                ob_start();

                include_once($file);

                echo ob_get_clean();
        }

}