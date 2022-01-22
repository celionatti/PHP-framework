<?php

/**User: Celio Natti** */

namespace nattiframework\controllers;

use nattiframework\models\User;
use nattiframework\core\Request;
use nattiframework\core\Response;
use nattiframework\core\Controller;
use nattiframework\core\Application;
use nattiframework\models\LoginForm;
use nattiframework\core\middlewares\AuthMiddleware;

/**
 * class AuthController
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\controllers
 */

 class AuthController extends Controller
 {
     /**
      * Class constructor.
      */
     public function __construct()
     {
         $this->registerMiddleware(new AuthMiddleware(['profile']));
     }
     public function login(Request $request, Response $response)
     {
         $loginForm = new LoginForm();
         if($request->isPost()){
             $loginForm->loadData($request->getBody());
             if($loginForm->validate() && $loginForm->login()){
                $response->redirect('/');
                return;
             }
         }
         $this->setLayout('auth');
         return $this->render('login', [
             'model' => $loginForm
         ]);
     }

     public function register(Request $request)
     {
        $this->setLayout('auth');

        $user = new User();
         if($request->isPost()){
             $user->loadData($request->getBody());
             if($user->validate() && $user->save()){
                 Application::$app->session->setFlash('success', 'Thanks for registering');
                 Application::$app->response->redirect('/');
                 exit;
             }
             return $this->render('register', [
                 'model' => $user
             ]);
         }
        return $this->render('register', [
            'model' => $user
        ]);
     }

     public function logout(Request $request, Response $response)
     {
        Application::$app->logout();
        $response->redirect('/');
     }

     public function profile()
     {
         return $this->render('profile');
     }
 }