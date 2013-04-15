<?php
class DisponibilidadesController extends AppController {

	var $name = 'Disponibilidades';

	function index() {
		$this->Disponibilidad->recursive = 0;
		$this->set('disponibilidades', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid disponibilidad', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('disponibilidad', $this->Disponibilidad->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Disponibilidad->create();
			if ($this->Disponibilidad->save($this->data)) {
				$this->Session->setFlash(__('The disponibilidad has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disponibilidad could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid disponibilidad', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Disponibilidad->save($this->data)) {
				$this->Session->setFlash(__('The disponibilidad has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disponibilidad could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Disponibilidad->read(null, $id);
		}
	}
/*
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for disponibilidad', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Disponibilidad->delete($id)) {
			$this->Session->setFlash(__('Disponibilidad deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Disponibilidad was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}*/
}
