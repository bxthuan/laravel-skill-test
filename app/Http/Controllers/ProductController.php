<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    var $json_path;

    public function __construct() {
        $this->json_path = public_path() . '/data-product/';
    }

    public function index() {
        return view('home');
    }

    public function products() {

        $product_data_path = $this->json_path . 'products_data.json';
        $products_data = file_get_contents($product_data_path);
        return $products_data;
    }

    public function add() {

        //Check existed folder 'data-product
        $path = $this->json_path;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        //Save Product to Json data.
        $product_data_path = $this->json_path . 'products_data.json';

        //Get Current data
        $cur_data = file_get_contents($product_data_path);
        $data = json_decode($cur_data);

        unset($_POST['_token']);
        $_POST['time'] = date('Y-m-d H:i:s');
        $data[] = $_POST;

        //Save data to Json
        $jsonData = json_encode($data);
        file_put_contents($product_data_path, $jsonData);

        //return $tempArray;
        return json_encode($data);
    }
}
