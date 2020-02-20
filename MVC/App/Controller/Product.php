<?php 

namespace App\Controller;
use Core\View;
use \App\Model\CmsModel;
use \App\Model\ProductsModel;

class Product extends \Core\Controller{
    public function view(Type $var = null)
    {
        $key = $this->route_params['key'];
        echo $key;
        $footer = CmsModel::selectFooter();
        $header = CmsModel::selectHeader();
        $quey = "SELECT * FROM products WHERE urlKey = '$key'";
        $product = ProductsModel::selectRow($quey);
        View::renderTemplate('cmsHeader.html', ['cmsHeader' => $header]);
        View::renderTemplate('FrontEnd/FrontProducts/index.html', ['product' => $product]);
        View::renderTemplate('cmsFooter.html', ['cmsFooter' => $footer]);
    }
}

?>