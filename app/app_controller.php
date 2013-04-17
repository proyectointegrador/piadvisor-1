<?php

App::import('Vendor','Mobile_Detect'); 
App::import('Vendor', 'Mobile_Detect', array('file' => 'Mobile_Detect.php'));

class AppController extends Controller {
    //var $components = array('Acl', 'Auth', 'Session');
    var $components = array('Session');
    var $helpers = array('Html', 'Form', 'Session');

    function beforeFilter() {
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