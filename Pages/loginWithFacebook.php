<?php
// added in v4.0.0
require_once 'SDK/Facebook/autoload.php';
//require 'functions.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret

FacebookSession::setDefaultApplication( '842292295857442','7742cd1092498057b889daf6c3224680' );
// login helper with redirect_uri

$helper = new FacebookRedirectLoginHelper('http://localhost:444/DWA/Seminar2/index.php?page=loginWithFacebook');

try 
{
     $session = $helper->getSessionFromRedirect();
} 
catch( FacebookRequestException $ex ) 
{
     echo '<p style="color: white;">'. $ex .'</p>';
} 
catch( Exception $ex ) 
{
     echo '<p style="color: white;">'. $ex .'</p>';
}

// see if we have a session
     if ( isset( $session ) ) 
     {    
          
          // graph api request for user data
          $request = new FacebookRequest( $session, 'GET', '/me' );
          $response = $request->execute();


          // get response
          $graphObject = $response->getGraphObject();
          $facebookId = $graphObject->getProperty('id');
          $facebookFirstName = $graphObject->getProperty('first_name');
          $facebookLastName = $graphObject->getProperty('last_name');
          $facebookEmail = $graphObject->getProperty('email');

          include_once('Classes/User.php');

          $user = new User();

          if($user->getSocialEmail($facebookEmail) && $user->getSocialFacebookId($facebookId))
          {
               $userArray = $user->getData($user->getUserId());
               $_SESSION['User'] = $userArray;
               header('Location: index.php');
          }

          else
          {    
               if($user->getSocialEmail($facebookEmail))
               {
                    $user->updateFacebookId($facebookId);
                    $tmpUserId = $user->getUserId();

                    $userArray = $user->getData($tmpUserId);
                    $_SESSION['User'] = $userArray;
                    header('Location: index.php'); 
               }

               else
               {
                    $tmpArray = array(
                         "ID" => $facebookId,
                         "firstName" => $facebookFirstName,
                         "lastName" => $facebookLastName,
                         "email" => $facebookEmail
                    );
                    $_SESSION['tmpSocialNetworks'] = $tmpArray;
                    header('Location: index.php?page=register');
               }
          }
     } 
     else 
     {
          $loginUrl = $helper->getLoginUrl(array('email'));
          header("Location: ".$loginUrl);
     }




?>