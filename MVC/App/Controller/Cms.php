<?php 
    namespace App\Controller;
    use \App\Model\CmsModel;
    use \Core\View;

    class Cms extends \Core\Controller{
        public function cmsPage(){

                $q = $_SERVER['QUERY_STRING'];
                $url = substr($q, strripos($q, "/")+1);
                echo "<b>$url</b>";

                if($url == "cmspage"){
                    $url = "homepage";
                }
                //$this -> route_params['page'] = 'homepage';
                //$url = $this -> route_params['page'];

           //echo $url;
            $result = CmsModel::selectPage($url);
            $footer = CmsModel::selectFooter();
            $header = CmsModel::selectHeader();
            View::renderTemplate('cmsHeader.html', ['cmsHeader' => $header]);
            View::renderTemplate('Cms/index.html', ['cmsPage' => $result]);
            View::renderTemplate('cmsFooter.html', ['cmsFooter' => $footer]);
        }

        public function cmsFooter(){
            

        }
    }

?>