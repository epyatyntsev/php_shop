<?php



class CatalogController
{
    public function actionIndex(){


        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(3);

        require_once (ROOT . '/views/catalog/index.php');

        return true;
    }

    public function actionCategory($categoryId , $page = 1)
    {

       // echo 'CAT: '.$categoryId;
       // echo '<br> PAGE: '.$page;

        $categories = array();
        $categories = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId , $page);

        $total = Product::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total+1, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }
}
