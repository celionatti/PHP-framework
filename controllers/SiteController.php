<?php

/**User: Celio Natti** */

namespace nattiframework\controllers;

use nattiframework\core\Application;
use nattiframework\core\Controller;
use nattiframework\core\Request;
use nattiframework\core\Response;
use nattiframework\models\ContactForm;

/**
 * class SiteController
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package nattiframework\controllers
 */

 class SiteController extends Controller
 {
    public function home()
    {
        $params = [
            'name' => 'NattiFramework',
        ];
        return $this->render('home', $params);
    }

     public function contact(Request $request, Response $response)
     {
         $contact = new ContactForm();
         if($request->isPost()){
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for Contacting Us');
                return $response->redirect('/contact');
            }
         }
         return $this->render('contact', [
             'model' => $contact
         ]);
     }
 }