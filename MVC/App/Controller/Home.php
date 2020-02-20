<?php 
    namespace App\Controller;
    use Core\View;
    use \App\Model\CmsModel;
    class Home extends \Core\Controller{
        public function index()
        {
            $categories = CmsModel::selectHeader();
            View::renderTemplate('cmsHeader.html',  ['cmsHeader' => $categories]);
            $home = CmsModel::selectPage('homepage');
            View::renderTemplate('Home/index.html', ['homepage' => $home]);
            $footer = CmsModel::selectFooter();
            
            View::renderTemplate('cmsFooter.html', ['cmsFooter' => $footer]);
        }
    }
?>