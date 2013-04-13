<?php
class CarrerasController extends AppController {

	var $name = 'Carreras';

	function index() {
		$this->Carrera->recursive = 0;
		$this->set('carreras', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid carrera', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('carrera', $this->Carrera->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Carrera->create();
			if ($this->Carrera->save($this->data)) {
				$this->Session->setFlash(__('The carrera has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The carrera could not be saved. Please, try again.', true));
			}
		}
		$areas = $this->Carrera->Area->find('list');
		$this->set(compact('areas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid carrera', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Carrera->save($this->data)) {
				$this->Session->setFlash(__('The carrera has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The carrera could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Carrera->read(null, $id);
		}
		$areas = $this->Carrera->Area->find('list');
		$this->set(compact('areas'));
	}
/*
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for carrera', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Carrera->delete($id)) {
			$this->Session->setFlash(__('Carrera deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Carrera was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}*/
}
