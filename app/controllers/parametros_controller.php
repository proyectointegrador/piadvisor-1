<?php
class ParametrosController extends AppController {

	var $name = 'Parametros';

	function index() {
		$this->Parametro->recursive = 0;
		$this->set('parametros', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid parametro', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('parametro', $this->Parametro->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Parametro->create();
			if ($this->Parametro->save($this->data)) {
				$this->Session->setFlash(__('The parametro has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parametro could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid parametro', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Parametro->save($this->data)) {
				$this->Session->setFlash(__('The parametro has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parametro could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Parametro->read(null, $id);
		}
	}
/*
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for parametro', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Parametro->delete($id)) {
			$this->Session->setFlash(__('Parametro deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Parametro was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}*/
}
