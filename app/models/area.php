<?php
/**
 * Area Model
 *
 * @property Carrera $Carrera
 */
class Area extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	var $name = 'Area';
	var $displayField = 'name';

	//Validaciones de datos

	var $validate = array(
	    'name' => array(
	    	'rule' => 'alphaNumeric',
	        'message' => 'El nombre del area es obligatorio.',
	        'allowEmpty' => false
	    )
	);


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Carrera' => array(
			'className' => 'Carrera',
			'foreignKey' => 'area_id',
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
