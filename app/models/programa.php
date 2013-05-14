<?php
/**
 *Autores:
 *  Edgar Garc�a Camarillo
 *  Eugenio Rafael Garc�a Garc�a
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripci�n: C�digo del modelo de programas
 * 				
 */
 
class Programa extends AppModel {
	var $name = 'Programa';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $validate = array(
	    'name' => array(
	    	'rule' => 'notEmpty',
	        'message' => 'El nombre de la universidad es obligatorio.',
	        'allowEmpty' => false
	    ),
		'name2' => array(
	    	'rule' => 'notEmpty',
	        'message' => 'El nombre de la universidad es obligatorio.',
	        'allowEmpty' => false
	    ),
		);
		
	var $hasMany = array(
		'Universidad' => array(
			'className' => 'Universidad',
			'foreignKey' => 'programa_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
