﻿<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres
 *
 * Descripción: Controlador de las paises en la parte de administración.
 */

class PaisesController extends AppController {

	/**
	 * Nombre del Controlador
	 *
	 * @var string
	 */
	var $name = 'Paises';

	/**
	 * Despliega la lista de paises
	 *
	 * @return void
	 */
	function index() {
		$this->Pais->recursive = 0;
		$this->set('paises', $this->paginate());
	}

	/**
	 * Despliega la vista de pais
	 * @param string $id
	 * @return void
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('País inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pais', $this->Pais->read(null, $id));
	}

	/**
	 * Despliega la vista de nuevo registro de pais
	 * 
	 * @return void
	 */
	function add() {
		if (!empty($this->data)) {

			//Hacer upload de la foto si es que viene foto
			if($this->data['File']['image']['name'] != null){
				$fileOK = $this->_uploadFiles('img/paises', $this->data['File']);
				if(array_key_exists('urls', $fileOK)) {
					// guardar el url de la foto en el this data
					$this->data['Pais']['bandera'] = $fileOK['urls'][0];
				}
			

				$this->Pais->create();
				if ($this->Pais->save($this->data)) {
					$this->Session->setFlash(__('El país se ha guardado', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('El país no se ha podido guardar, intentelo de nuevo.', true));
				}
			}else{
				$this->Session->setFlash(__('La Bandera del país es obligatoria.', true));
			}
		}

		$regiones = $this->Pais->Region->find('list');
		$this->set(compact('regiones'));
	}

	/**
	 * Despliega la vista de editar area
	 * @param string $id
	 * @return void
	 */
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('País inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			debug($this->data);
			
			//Hacer upload de la foto si es que viene foto
			if($this->data['File']['image']['name'] != null){
				$fileOK = $this->_uploadFiles('img/paises', $this->data['File']);
				if(array_key_exists('urls', $fileOK)) {

					//Eliminar arhcivo anterior
					$pais = $this->Pais->read(null,$this->data['Pais']['id']);
					$folder_url = WWW_ROOT.'img/paises/'.$pais['Pais']['bandera'];
					unlink($folder_url);
					// guardar el url de la foto en el this data
					$this->data['Pais']['bandera'] = $fileOK['urls'][0];
				}
			}

			if ($this->Pais->save($this->data)) {
				$this->Session->setFlash(__('El país se ha guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El país no se ha podido guardar, intentelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Pais->read(null, $id);
		}
		$regiones = $this->Pais->Region->find('list');
		$this->set(compact('regiones'));
	}

	/*
	Funciones de soporte
	*/	

	/**
	 * alta de archivos
	 * @params:
	 *		$folder 	= the folder to upload the files e.g. 'img/files'
	 *		$formdata 	= the array containing the form files
	 *		$itemId 	= id of the item (optional) will create a new sub folder
	 * @return:
	 *		regresa un array de resultados exitosos
	 */
	function _uploadFiles($folder, $formdata, $itemId = null) {
		// setup dir names absolute and relative
		$folder_url = WWW_ROOT.$folder;
		$rel_url = $folder;
		

		
		// list of permitted file types, this is only images but documents can be added
		$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
		
		// loop through and deal with the files
		foreach($formdata as $file) {
			// replace spaces with underscores
			$filename = str_replace(' ', '_', $file['name']);
			// assume filetype is false
			$typeOK = false;
			// check filetype is ok
			foreach($permitted as $type) {
				if($type == $file['type']) {
					$typeOK = true;
					break;
				}
			}
			
			// if file type ok upload the file
			if($typeOK) {
				// switch based on error code
				switch($file['error']) {
					case 0:
						// check filename already exists
						if(!file_exists($folder_url.'/'.$filename)) {
							// create full filename
							$full_url = $folder_url.'/'.$filename;
							$url = $filename;
							// upload the file
							$success = move_uploaded_file($file['tmp_name'], $full_url);
						} else {
							// create unique filename and upload file
							ini_set('date.timezone', 'Europe/London');
							$now = date('Y-m-d-His');
							$full_url = $folder_url.'/'.$now.$filename;
							$url = $now.$filename;
							$success = move_uploaded_file($file['tmp_name'], $full_url);
						}
						// if upload was successful
						if($success) {
							// save the url of the file
							$result['urls'][] = $url;
						} else {
							$result['errors'][] = "Error al subir $filename. intentelo de nuevo.";
						}
						break;
					case 3:
						// an error occured
						$result['errors'][] = "Error al subir $filename. intentelo de nuevo.";
						break;
					default:
						// an error occured
						$result['errors'][] = "System error al subir $filename. Contacte al administrador.";
						break;
				}
			} elseif($file['error'] == 4) {
				// no file was selected for upload
				$result['nofiles'][] = "No selecciono un archivo";
			} else {
				// unacceptable file type
				$result['errors'][] = "$filename no puede ser cargado. Solo archivos de tipo: gif, jpg, png.";
			}
		}
		return $result;
	}
}
