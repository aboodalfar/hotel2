<?php

namespace Hotel;

use Exception;
use Providers\HotelProvider;
use Providers\BestHotelProvider;

class OurHotelsService
{


    /**
     * @param string $fromDate
     * @param string $toDate
     * @param string $city
     * @param int $adultsNumber
     * @return Collection
     */
    public function search($fromDate=null,$toDate=null,$city=null,$adultsNumber=null)
    {
     
        
        /** @var \Illuminate\Support\Collection $providersHotelsResult */
        $providersHotelsResult = [];
        foreach ($this->getProviders() as $provider) {
            if (! $provider instanceof HotelProvider) {
                throw new Exception(sprintf(
                    'The configured provider %s must implement %s interface.',
                    get_class($provider),
                    HotelProvider::class
                ));
            }

            $providersHotelsResult = array_merge($provider->findMany($fromDate, $toDate, $city, $adultsNumber),$providersHotelsResult);
        }
        
        return $providersHotelsResult;
        
        
        
        $x= usort($providersHotelsResult, function($a, $b) {
         
            return bccomp($a->getRate(), $b->getRate(), 2);
        }); 
        
        return $x;
        
        foreach ($providersHotelsResult as $key => $value) {
          //  var_dump($value);die;
        }
        
        var_dump($providersHotelsResult);die;

        return $providersHotelsResult->sortByDesc(function ($hotel) {
            /** @var Hotel $hotel */
            return $hotel->getRate();
        })->values();
    }

    /**
     * @return []
     */
    private function getProviders(): array
    {
        return  [
            new BestHotelProvider(),
            new \Providers\CrazyHotelsProvider(),
        ];
    }
}
