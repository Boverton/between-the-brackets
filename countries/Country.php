<?php


class Country
{

    public $country_name = null;
    public $capital = null;
    public $region = null;
    public $population = null;
    public $languages = null;

    public function __construct($country_name, $capital, $region, $population, $languages)
    {
        $this->country_name = $country_name;
        $this->capital = $capital;
        $this->region = $region;
        $this->population = $population;
        $this->languages = $languages;

    }

}


?>