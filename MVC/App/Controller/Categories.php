<?php 
    namespace App\Controller;
    use \Core\View;
    use \App\Model\CategoryModel;
    class Categories extends \Core\Controller{
      public function index(){
        View::renderTemplate('FrontEnd/FrontCategories/index.html');
      }

      public function view()
      {
        $urlKey = $this -> route_params['key'];
        $products = CategoryModel::selectProducts($urlKey);
        View::renderTemplate('FrontEnd/FrontCategories/index.html', ['products' => $products]);
      }
    }
?>