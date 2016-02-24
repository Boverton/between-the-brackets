<?php
include('Country.php');


$country = $_POST['country_name'];

$country_url = str_replace(' ','+',$country);
$country_url = trim($country_url);



if(!empty($country)) {//run only if country is not empty


    if ($json = @file_get_contents('http://restcountries.eu/rest/v1/name/' . $country_url)) {//check if results are found
        //decode results
        $data = json_decode($json);

        //assign variables
        $country_name = $data[0]->name;
        $capital = $data[0]->capital;
        $region = $data[0]->region;
        $population = number_format($data[0]->population);
        $languages = implode('-', $data[0]->languages);

        //consolidate data to be returned
        $return_data = new Country($country_name, $capital, $region, $population, $languages);

        //encode that
        $json_return = json_encode($return_data);

        //echo json so ajax can gobble it up
        echo $json_return;

    } else {//results were not found

        $error = array('errors' => 'No Results Were Found For your entry: ' . $country);

        //encode error to json
        $json_return = json_encode($error);

        //echo json error
        echo $json_return;

    }

} else { //return an error that it cannot be blank}

    $error = array('errors' => 'Country is required and cannot be blank');

    //encode error to json
    $json_return = json_encode($error);

    //echo json error
    echo $json_return;

}



?>