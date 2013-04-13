<?php
/* Carreras Test cases generated on: 2013-04-11 17:10:18 : 1365693018*/
App::import('Controller', 'Carreras');

class TestCarrerasController extends CarrerasController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CarrerasControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.carrera', 'app.area');

	function startTest() {
		$this->Carreras =& new TestCarrerasController();
		$this->Carreras->constructClasses();
	}

	function endTest() {
		unset($this->Carreras);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
