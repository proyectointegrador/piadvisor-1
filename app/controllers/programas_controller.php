<?php
class ProgramasController extends AppController {

	var $name = 'Programas';

	function index() {
		$this->Programa->recursive = 0;
		$this->set('programas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__(Programa inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('programa', $this->Programa->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Programa->create();
			if ($this->Programa->save($this->data)) {
				$this->Session->setFlash(__('El programa se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El programa no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Programa inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Programa->save($this->data)) {
				$this->Session->setFlash(__('El programa se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El programa no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Programa->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for programa', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Programa->delete($id)) {
			$this->Session->setFlash(__('Programa deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Programa was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
