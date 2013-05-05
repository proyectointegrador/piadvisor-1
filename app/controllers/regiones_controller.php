<?php
class RegionesController extends AppController {

	var $name = 'Regiones';

	function index() {
		$this->Region->recursive = 0;
		$this->set('regiones', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Región inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('region', $this->Region->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Region->create();
			if ($this->Region->save($this->data)) {
				$this->Session->setFlash(__('La región se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La región no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Región inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Region->save($this->data)) {
				$this->Session->setFlash(__('La región se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La región no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Region->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for region', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Region->delete($id)) {
			$this->Session->setFlash(__('Region deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Region was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
