<?php

App::import('Vendor','Mobile_Detect'); 
App::import('Vendor', 'Mobile_Detect', array('file' => 'Mobile_Detect.php'));

class AppController extends Controller {
    var $components = array('Acl', 'Auth', 'Session');
    //var $components = array('Session');
    var $helpers = array('Html', 'Form', 'Session');

    function beforeFilter() {
	 $this->Auth->actionPath = 'controllers/';
	
  //  $this->Auth->allowedActions = array('*');
	 
	
	//Autentificacion de usuarios
	  $this->Auth->authorize = 'actions';
      $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
      $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
      $this->Auth->loginRedirect = array('controller' => 'universidades', 'action' => 'index');
    
	
	//Detectar movil
     $detect = new Mobile_Detect;
    
     if ($detect->isMobile()){// && !$detect->isTablet()) {
        	$path = APP.'views/' . strtolower($this->name) . DS . 'movil/' . $this->action . '.ctp';
        	if (file_exists($path)) {
        		$this->layout = 'movil';
        		$vistapath= strtolower($this->name) . '/movil';
        		$this->viewPath = $vistapath;
        	}
     }else if($this->name == 'Pages'){
        $this->layout = 'publico';
     }
	}

	
	function afterFilter() {
    
     }
	 
	 

    }
?>