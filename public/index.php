<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

require_once ('../Loader/load.php');
require '../vendor/autoload.php';

// ini_set('memory_limit', '1024M');

$app = AppFactory::create();
$app->setBasePath("/ProiectOOP/public");

$app->addBodyParsingMiddleware();

$userObject = new View();
$userObject2 = new Controller();


$app->get('/', function($request, $response, $args){
    
    $renderer = new PhpRenderer('../templates');
    return $renderer->render($response, "register.php", $args);
});

$app->get('/about', function($request, $response, $args){
    $renderer = new PhpRenderer('../templates');
    return $renderer->render($response, "about.php", $args);
});

$app->get('/contact', function($request, $response, $args){
    $renderer = new PhpRenderer('../templates');
    return $renderer->render($response, "contact.php", $args);
});

$app->post('/register', function($request, $response, $args) use($userObject2){
    if(isset($_POST['username'], $_POST['password'], $_POST['password-confirm'])&&
        $_POST['password'] === $_POST['password-confirm']){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $role = 'user';

            $userObject2->register($username, $password, $role);

            $newResponse = $response->withHeader('Location', 'http://localhost/ProiectOOP/public/login');
            return $newResponse;
        
        }else{
            $response->getBody()->write('403 - Bad Request');
            
            return $response;
        }
});


$app->get('/login', function($request, $response, $args){
    $renderer = new PhpRenderer('../templates');
    return $renderer->render($response, "login.php", $args);
});



// evaluates user login data
$app->post('/auth', function($request, $response, $args) use($userObject2){
   if(isset($_POST['username'], $_POST['password'], $_POST['password-confirm'])&&
        $_POST['password'] === $_POST['password-confirm']){
        
        $username = $_POST['username'];
        $foundUser = $userObject2->login($username);

        // if user is found -> access granted
            if($foundUser === true){
            $newResponse = $response->withHeader('Location', 'http://localhost/ProiectOOP/public/home');
            return $newResponse;
        
        }
        else{
        
            $newResponse = $response->withHeader('Location', 'http://localhost/ProiectOOP/public/login');
            return $newResponse;
        }
   
    }else{        
    $newResponse = $response->withHeader('Location', 'http://localhost/ProiectOOP/public/login');
    return $newResponse;
}
});


$app->get('/home', function($request, $response, $args){
    session_start();
    if(isset($_SESSION['username'])){
       
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "homepage.php", $args);
    }else{
        $newResponse = $response->withHeader('Location', 'http://localhost/ProiectOOP/public/login');
        return $newResponse; 
    }
});

$app->get('/offers', function($request, $response, $args) use($userObject){

    $offers = $userObject->showOffers();
    
    $response->getBody()->write(json_encode($offers));

    return $response;
});

$app->get('/cars', function($request, $response){
    session_start();
    if(isset($_SESSION['username'])){
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "cars.php");
    }else{
        $newResponse = $response->withHeader('Location', 'http://localhost/ProiectOOP/public/login');
        return $newResponse; 
    }
});

$app->get('/boats', function($request, $response, $args) use($userObject){
    session_start();
    if(isset($_SESSION['username'])){
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "boats.php", $args);
    }else{
        $newResponse = $response->withHeader('Location', 'http://localhost/ProiectOOP/public/login');
        return $newResponse;
    }
});

$app->post('/rent', function($request, $response, $args) use($userObject2){
     session_start();
    if(isset($_SESSION['username'])){
        $receivedParam = $request->getParsedBody();
        $id_offer = explode(",", $receivedParam['offerParams'])[0];
        $boat_price = explode(",", $receivedParam['offerParams'])[1];
        $username = $_SESSION['username'];
        


        //$id_offer = $_POST['id'];
        $userObject2->renting($id_offer, $username, $boat_price);
        // update PPD and total rents number
        // $userObject2->TODO();

       $response->getBody()->write('200 - New Rent ' . ($_SESSION['username']));
    }
    else{
        $response->getBody()->write("403 - Forbiden! " . ($_SESSION['username']));
    }

    return $response;
});

$app->delete('/rent', function($request, $response, $args) use($userObject2){
    $params = $request->getParsedBody();
    $id_rent = explode(",", $params['params'])[0];
    $id_user = explode(",", $params['params'])[1];
    $rent_ppd = explode(",", $params['params'])[2];
    $user_ppd = explode(",", $params['params'])[3];

    $newUserPPD = $user_ppd - $rent_ppd;

    $message = [
        'rent ID: ' => $id_rent,
        'user ID: ' => $id_user,
        'rent PPD: ' => $rent_ppd,
        'user PPD: ' => $user_ppd
    ];

    
    
    // delete assigned rent for an user
     $userObject2->cancelUserRent($id_rent, $id_user);

    // update user's PPD
    $userObject2->updateUserPPD($newUserPPD, $id_user);

    $response->getBody()->write('200 - Delete');
    return $response;

});

$app->get('/rentals', function($request, $response, $args){
    session_start();
    if(isset($_SESSION['username'])){
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "myrentals.php", $args);

    }else{
        $newResponse = $response->withHeader('Location', 'http://localhost/ProiectOOP/public/login');
        return $newResponse;
    }
});

$app->addErrorMiddleware(TRUE, TRUE, TRUE);


$app->run();
?>