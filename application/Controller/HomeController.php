<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

/**
 * Description of HomeController
 *
 * @author Breaker
 */
class HomeController {
    
    public function index() {
        
//        $response = file_get_contents('http://localhost:8001/search');
//        
//        var_dump($response);die;
//        
//        $url = 'http://localhost:8001/search';
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_HTTPGET, true);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        if ($_SERVER['HTTP_HOST'] == 'localhost:8001') {
//            // Proxy for Docker
//            curl_setopt($ch, CURLOPT_PROXY, $_SERVER['SERVER_ADDR'] . ':' .  $_SERVER['SERVER_PORT']);
//        }
//  //      var_dump($_SERVER['HTTP_HOST']);die;
//        
//        $response_json = curl_exec($ch);
//        curl_close($ch);
//        $response=json_decode($response_json, true);
//        var_dump($response);die;
        
        $view = new \Core\View('home.php');
        $view->render();
    }
}
