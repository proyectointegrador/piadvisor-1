<?php
/**
 * Requisito Model
 *
 * @property Categoria $Categoria
 */
class Requisito extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	var $name = 'Requisito';

	var $displayField = 'clave';

	//Validaciones de datos

	var $validate = array(
	    'clave' => array(
	        'rule' => 'isUnique',
	        'message' => 'La clave de la consideración debe ser única.'
	    )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Categoria' => array(
			'className' => 'Categoria',
			'foreignKey' => 'categoria_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
