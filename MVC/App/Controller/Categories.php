<?php 
    namespace App\Controller;
    use \Core\View;
    use \App\Model\CategoryModel;
    use \App\Model\CmsModel;
    class Categories extends \Core\Controller{
      public function index(){
        View::renderTemplate('FrontEnd/FrontCategories/index.html');
      }

      public function view()
      {
        $urlKey = $this -> route_params['key'];
        $products = CategoryModel::selectProducts($urlKey);
        $header = CmsModel::selectHeader();
        $footer = CmsModel::selectFooter();
        View::renderTemplate('FrontEnd/FrontCategories/index.html', ['products' => $products, 'cmsHeader'=>$header]);
        View::renderTemplate('cmsFooter.html', ['cmsFooter' => $footer]);
      }
    }
?>