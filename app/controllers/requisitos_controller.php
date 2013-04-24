<?php
class RequisitosController extends AppController {

	var $name = 'Requisitos';

	function index() {
		$this->Requisito->recursive = 0;
		$this->set('requisitos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid requisito', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('requisito', $this->Requisito->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Requisito->create();
			if ($this->Requisito->save($this->data)) {
				$this->Session->setFlash(__('The requisito has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The requisito could not be saved. Please, try again.', true));
			}
		}
		$categorias = $this->Requisito->Categoria->find('list');
		$this->set(compact('categorias'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid requisito', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Requisito->save($this->data)) {
				$this->Session->setFlash(__('The requisito has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The requisito could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Requisito->read(null, $id);
		}
		$categorias = $this->Requisito->Categoria->find('list');
		$this->set(compact('categorias'));
	}
/*
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for requisito', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Requisito->delete($id)) {
			$this->Session->setFlash(__('Requisito deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Requisito was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}*/
}
