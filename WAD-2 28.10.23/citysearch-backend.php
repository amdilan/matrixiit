<?php
    $city_SL = [
        "Ampara",
        "Anuradhapura",
        "Badulla",
        "Batticaloa",
        "Colombo",
        "Galle",
        "Gampaha",
        "Hambantota",
        "Jaffna",
        "Kalutara",
        "Kandy",
        "Kegalle",
        "Kilinochchi",
        "Kurunegala",
        "Mannar",
        "Matale",
        "Matara",
        "Monaragala",
        "Mullaitivu",
        "Nuwara Eliya",
        "Polonnaruwa",
        "Puttalam",
        "Ratnapura",
        "Trincomalee",
        "Vavuniya"
    ];
    $prefix = isset($_GET["prefix"]) ? strtolower($_GET["prefix"]) : "";
    $matchingCities = [];

    foreach ($city_SL as $city) {
        if (strpos(strtolower($city), $prefix) === 0) {
            $matchingCities[] = $city;
        }
    }

    if (count($matchingCities) > 0) {
        echo "<ul>";
        foreach ($matchingCities as $city) {
            echo "<li>$city</li>";
        }
        echo "</ul>";
    } else {
        echo "No suggestions found";
    }
?>