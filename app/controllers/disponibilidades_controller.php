<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Controlador de las disponibilidades en la parte de administración.
 */

class DisponibilidadesController extends AppController {

	/**
	 * Nombre del Controlador
	 *
	 * @var string
	 */
	var $name = 'Disponibilidades';

	/**
	 * Despliega la lista de disponibilidades
	 * 
	 * @return void
	 */
	function index() {
		$this->Disponibilidad->recursive = 0;
		$this->set('disponibilidades', $this->paginate());
	}

	/**
	 * Despliega la vista de disponibilidades
	 *
	 * @param string $id
	 * @return void
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Disponibilidad inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('disponibilidad', $this->Disponibilidad->read(null, $id));
	}

	/**
	 * Despliega la vista de nuevo registro disponibilidades
	 *
	 * @return void
	 */
	function add() {
		if (!empty($this->data)) {
			$this->Disponibilidad->create();
			if ($this->Disponibilidad->save($this->data)) {
				$this->Session->setFlash(__('La disponibilidad se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La disponibilidad no se ha podido guardar, intentelo de nuevo.', true));
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
			$this->Session->setFlash(__('Disponibilidad inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Disponibilidad->save($this->data)) {
				$this->Session->setFlash(__('La disponibilidad se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La disponibilidad no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Disponibilidad->read(null, $id);
		}
	}
}
