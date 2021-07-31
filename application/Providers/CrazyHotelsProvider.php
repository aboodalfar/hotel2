<?php

namespace Providers;


use Hotel\HotelClass;
use Apis\CrazyHotelsApi;
use Providers\HotelProvider;

class CrazyHotelsProvider implements HotelProvider
{
    const PROVIDER_NAME = 'CrazyHotels';

    /**
     * @var TopHotelsApi
     */
    private $api;

    /**
     * BestHotelProvider constructor.
     * @param CrazyHotelsApi $api
     */
    public function __construct()
    {
        $this->api = new CrazyHotelsApi();
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
        $hotelsApiResult = $this->api->findHotels(
            $from,
            $to,
            $cityIataCode,
            $numberOfAdults
        );

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
        $hotel = (new HotelClass())
            ->setProvider(static::PROVIDER_NAME)
            ->setName($hotelAttributes['hotelName'])
            ->setFare($hotelAttributes['price'])
            ->setRate(strlen($hotelAttributes['rate']))
            ->setAmenities($hotelAttributes['amenities']);
        return $hotel;
    }
}
