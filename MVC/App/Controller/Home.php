<?php 
    namespace App\Controller;
    use Core\View;
    use \App\Model\CmsModel;
    class Home extends \Core\Controller{
        public function index()
        {
            $categories = CmsModel::selectHeader();
            View::renderTemplate('Home/index.html', ['header' => $categories]);
        }
    }
?>