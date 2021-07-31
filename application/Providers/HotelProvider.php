<?php

namespace Providers;

interface HotelProvider
{
    /**
     * @param string $from
     * @param string $to
     * @param string $cityIataCode
     * @param int $numberOfAdults
     * @return array
     */
    public function findMany(string $from, string $to, string $cityIataCode, int $numberOfAdults);
}
