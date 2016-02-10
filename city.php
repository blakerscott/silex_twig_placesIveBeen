<?php
class City
{
    private $city;
    private $landmark;
    // private $city;


    function __construct($city, $landmark)
    {
        $this->city = $city;
        $this->landmark = $landmark;
    }

    function setCity($new_city)
    {
        $this->city = (string) $new_city;
    }

    function getCity()
    {
        return $this->city;
    }

    function setLandmark($new_landmark)
    {
        $this->landmark = (string) $new_landmark;
    }

    function getLandmark()
    {
        return $this->landmark;
    }

    function save()
    {
        array_push($_SESSION['list_of_cities'], $this);
    }

    static function getAll()
    {
        return $_SESSION['list_of_cities'];
    }
    static function deleteAll()
    {
        $_SESSION['list_of_cities'] = array();
    }


}
?>
