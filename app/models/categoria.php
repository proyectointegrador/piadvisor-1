<?php
/**
 * Categoria Model
 *
 * @property Requisito $Requisito
 */
class Categoria extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	var $name = 'Categoria';
	var $displayField = 'name';

	//Validaciones de datos

	var $validate = array(
	    'name' => array(
	    	'rule' => 'alphaNumeric',
	        'message' => 'El nombre de la categoría es obligatorio.',
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
		'Requisito' => array(
			'className' => 'Requisito',
			'foreignKey' => 'categoria_id',
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
