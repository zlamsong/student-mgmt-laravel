<?php
/**
 * Created by PhpStorm.
 * User: neerajan
 * Date: 16/01/2019
 * Time: 18:52
 */
namespace App\General;
use Illuminate\Support\Facades\Config;

trait General{

    public $data = [];

    /**
     * @param $key
     * @param null $value
     * @return bool|null
     */
    public function data($key, $value = null){
        if(empty($key)) return false;
        return $this->data[$key] = $value;
    }

    public function makeTitle($backend, $separator = ' : ', $frontend = null){
        if(!isset($frontend)){
//            $frontend = \config('title.name');
            $frontend .= Config::get('title.name');
        }
        return $frontend.$separator.$backend;
    }
}