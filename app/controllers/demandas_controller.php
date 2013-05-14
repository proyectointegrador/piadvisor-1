<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Controlador de las demandas en la parte de administración.
 */

class DemandasController extends AppController {

	/**
	 * Nombre del Controlador
	 *
	 * @var string
	 */
	var $name = 'Demandas';

	/**
	 * Despliega la lista de demandas
	 * 
	 * @return void
	 */
	function index() {
		$this->Demanda->recursive = 0;
		$this->set('demandas', $this->paginate());
	}

	/**
	 * Despliega la vista de demandas
	 *
	 * @param string $id
	 * @return void
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Demanda inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('demanda', $this->Demanda->read(null, $id));
	}

	/**
	 * Despliega la vista de nuevo registro demandas
	 *
	 * @return void
	 */
	function add() {
		if (!empty($this->data)) {
			$this->Demanda->create();
			if ($this->Demanda->save($this->data)) {
				$this->Session->setFlash(__('La demanda se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La demanda no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
	}

	/**
	 * Despliega la vista de editar demandas
	 *
	 * @param string $id
	 * @return void
	 */
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Demanda inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Demanda->save($this->data)) {
				$this->Session->setFlash(__('La demanda se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La demanda no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Demanda->read(null, $id);
		}
	}
}
