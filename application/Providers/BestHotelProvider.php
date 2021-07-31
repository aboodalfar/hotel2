<?php

namespace Providers;

use Hotel\HotelClass;
use Apis\BestHotelApi;
use Providers\HotelProvider;

class BestHotelProvider implements HotelProvider
{
    const PROVIDER_NAME = 'BestHotel';

    /**
     * @var BestHotelApi
     */
    private $api;

    /**
     * BestHotelProvider constructor.
     * @param BestHotelApi $api
     */
    public function __construct()
    {
        $this->api = new BestHotelApi();
    }

    /**
     * @param string $from
     * @param string $to
     * @param string $cityIataCode
     * @param int $numberOfAdults
     * @return array
     */
    public function findMany($from=null,$to=null,$cityIataCode=null, $numberOfAdults=null)
    {
        $hotelsApiResult = $this->api->getHotels($from, $to, $cityIataCode, $numberOfAdults);

        foreach ($hotelsApiResult as $hotelAttributes) {
            $hotels[] = $this->createHotelInstance($hotelAttributes);
        }
        return $hotels ?? [];
    }

    /**
     * Create an object from Hotel and Hydrate it.
     *
     * @param $hotelAttributes
     * @return Hotel
     */
    public function createHotelInstance($hotelAttributes): HotelClass
    {
        return  (new HotelClass)
            ->setName($hotelAttributes['hotel'])
            ->setProvider(static::PROVIDER_NAME)
            ->setFare($hotelAttributes['hotelFare'])
            ->setRate($hotelAttributes['hotelRate'])
            ->setAmenities(explode(',', $hotelAttributes['roomAmenities']));
    }
}
