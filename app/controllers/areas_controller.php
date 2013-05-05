<?php
class AreasController extends AppController {

	var $name = 'Areas';

	function index() {
		$this->Area->recursive = 0;
		$areas = $this->paginate();
		
		$this->set(compact('areas'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Área inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('area', $this->Area->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Area->create();
			if ($this->Area->save($this->data)) {
				$this->Session->setFlash(__('El área se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El área no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Área inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Area->save($this->data)) {
				$this->Session->setFlash(__('El área se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El área no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Area->read(null, $id);
		}
	}
	/*
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for area', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Area->delete($id)) {
			$this->Session->setFlash(__('Area deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Area was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}*/
}
