<?php
class DemandasController extends AppController {

	var $name = 'Demandas';

	function index() {
		$this->Demanda->recursive = 0;
		$this->set('demandas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid demanda', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('demanda', $this->Demanda->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Demanda->create();
			if ($this->Demanda->save($this->data)) {
				$this->Session->setFlash(__('The demanda has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The demanda could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid demanda', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Demanda->save($this->data)) {
				$this->Session->setFlash(__('The demanda has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The demanda could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Demanda->read(null, $id);
		}
	}
/*
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for demanda', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Demanda->delete($id)) {
			$this->Session->setFlash(__('Demanda deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Demanda was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}*/
}
