<?php
class PaisesController extends AppController {

	var $name = 'Paises';

	function index() {
		$this->Pais->recursive = 0;
		$this->set('paises', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid pais', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('pais', $this->Pais->read(null, $id));
	}

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
					$this->Session->setFlash(__('The pais has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The pais could not be saved. Please, try again.', true));
				}
			}else{
				$this->Session->setFlash(__('La Bandera del país es obligatoria.', true));
			}
		}

		$regiones = $this->Pais->Region->find('list');
		$this->set(compact('regiones'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid pais', true));
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
				$this->Session->setFlash(__('The pais has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pais could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Pais->read(null, $id);
		}
		$regiones = $this->Pais->Region->find('list');
		$this->set(compact('regiones'));
	}
/*
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for pais', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Pais->delete($id)) {
			$this->Session->setFlash(__('Pais deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Pais was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}*/

/*

Funciones de soporte
*/	

	/**
	 * uploads files to the server
	 * @params:
	 *		$folder 	= the folder to upload the files e.g. 'img/files'
	 *		$formdata 	= the array containing the form files
	 *		$itemId 	= id of the item (optional) will create a new sub folder
	 * @return:
	 *		will return an array with the success of each file upload
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
							$result['errors'][] = "Error uploaded $filename. Please try again.";
						}
						break;
					case 3:
						// an error occured
						$result['errors'][] = "Error uploading $filename. Please try again.";
						break;
					default:
						// an error occured
						$result['errors'][] = "System error uploading $filename. Contact webmaster.";
						break;
				}
			} elseif($file['error'] == 4) {
				// no file was selected for upload
				$result['nofiles'][] = "No file Selected";
			} else {
				// unacceptable file type
				$result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
			}
		}
		return $result;
	}
}
