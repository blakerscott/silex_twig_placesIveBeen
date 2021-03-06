<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../City.php";

    session_start();

    if (empty($_SESSION['list_of_cities'])) {
        $_SESSION['list_of_cities'] = array();
    }

    $app = new Silex\Application();


    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {


        return $app['twig']->render('cities.html.twig', array('cities' => City::getAll()));

    });

    $app->post("/cities", function() use ($app) {
        $city = new City($_POST['description'], $_POST['landmark']); ///connects to label id on cities.html.twig
        $city->save();
        return $app['twig']->render('create_city.html.twig', array('newcity' => $city));
    });

    $app->post("/delete_cities", function() use ($app) {
        City::deleteAll();
        return $app['twig']->render('delete_cities.html.twig');
    });

    return $app;
?>
