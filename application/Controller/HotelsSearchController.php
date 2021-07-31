<?php

namespace Controller;

use Hotel\OurHotelsService;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HotelsSearchController
 *
 * @author Abdullah
 */
class HotelsSearchController {
    /**
     * @var OurHotelsService
     */
    private $hotelsService;

    /**
     * HotelsSearchController constructor.
     *
     * @param OurHotelsService $hotelsService
     */
    public function __construct()
    {
        $this->hotelsService = new OurHotelsService();
    }
    /**
     * search for hotels
     */
    public function search() {
        
        $result  = $this->hotelsService->search(
            $_GET['from_date'],
            $_GET['to_date'],
            $_GET['city'],
            $_GET['adults_number']
        );
        
        $finalResult = [];
        foreach ($result as $value) {
            $finalResult[] = $this->toArray($value);
        }
        header('Content-Type: application/json');
        echo json_encode($finalResult);
        exit;
    }
    
    public function toArray($hotel)
    {
        return [
            'provider' => $hotel->getProvider(),
            'hotelName' => $hotel->getName(),
            'fare' => $hotel->getFare(),
            'amenities' => $hotel->getAmenities(),
        ];
    }
    
}
