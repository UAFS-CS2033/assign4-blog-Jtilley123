<?php
    include_once "controllers/ControllerAction.php";
    include_once "controllers/UserControllers.php";
    include_once "models/UserDAO.php";
    include_once "models/PostDAO.php";


    class FrontController { 
        private $controllers;
        

        public function __construct(){
            $this->showErrors(0);
            $this->controllers = $this->loadControllers();
        }

        public function run(){
            session_start();

            //***** 1. Get Request Method and Page Variable *****/
            $method = $_SERVER['REQUEST_METHOD'];
            $page = $_REQUEST['page'];
            if(!(isset($_REQUEST['page']))){
                $page="home";
            }
        
            //***** 2. Route the Request to the Controller Based on Method and Page *** */
            $controller = $this->controllers[$method.$page];
            
            //** 3. Check Security Access ***/
            $controller = $this->securityCheck($controller);

            //** 4. Execute the Controller */
            if($method=='GET'){
                $content=$controller->processGET();
            }
            if($method=='POST'){
                $controller->processPOST();
            }

            //**** 5. Render Page Template */
            include "template/template.php";
        }

        private function loadControllers(){
        /******************************************************
         * Register the Controllers with the Front Controller *
         ******************************************************/
            $controllers["GET"."list"] = new UserList();
            $controllers["GET"."author"] = new PostList();
            $controllers["GET"."add"] = new UserAdd();
            $controllers["POST"."add"] = new UserAdd();
            $controllers["GET"."addpost"] = new PostAdd();
            $controllers["POST"."addpost"] = new PostAdd();
            $controllers["GET"."update"] = new UserUpdate();
            $controllers["POST"."update"] = new UserUpdate();
            $controllers["GET"."updatepost"] = new PostUpdate();
            $controllers["POST"."updatepost"] = new PostUpdate();
            $controllers["GET"."delete"] = new UserDelete();
            $controllers["POST"."delete"] = new UserDelete();
            $controllers["GET"."deletepost"] = new PostDelete();
            $controllers["POST"."deletepost"] = new PostDelete();
            $controllers["GET"."login"] = new Login();
            $controllers["POST"."login"] = new Login();
            $controllers["GET"."home"] = new Home();
            $controllers["GET"."about"] = new About();
            $controllers["GET"."posttemplate"] = new PostTemplate();
            
            return $controllers;
        }

        private function securityCheck($controller){
        /******************************************************
         * Check Access restrictions for selected controller  *
         ******************************************************/
        if($controller->getAccess()=='PRIVATE'){
            if(!isset($_SESSION['isAdmin'])){
                $controller = $this->controllers["GET"."home"];  
            }
        }
            if($controller->getAccess()=='PROTECTED'){
                if(!isset($_SESSION['loggedin'])){
                    //*** Not Logged In ****/
                    $controller = $this->controllers["GET"."login"];
                }
            }
            return $controller;
        }

        private function showErrors($debug){
            if($debug==1){
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
            }
        }
    }

    $controller = new FrontController();
    $controller->run();
?>