<?php
/**
 * Demanda Model
 *
 * @property Universidad $Universidad
 */
class Demanda extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	var $name = 'Demanda';
	var $displayField = 'name';

	//Validaciones de datos

	var $validate = array(
	    'name' => array(
	    	'rule' => 'alphaNumeric',
	        'message' => 'El nombre de la demanda es obligatorio y debe ser alfanúmerico.',
	        'allowEmpty' => false
	    ),
	    'descripcion' => array(
	    	'rule' => 'notEmpty',
	        'message' => 'La descripción de la demanda es obligatorio.',
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
		'Universidad' => array(
			'className' => 'Universidad',
			'foreignKey' => 'demanda_id',
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
