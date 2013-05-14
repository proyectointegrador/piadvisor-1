<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Código del modelo de requisitos
 * 				
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
	        'message' => 'La clave de la consideración debe ser única.',
	        'allowEmpty' => false
	    ),
	    'descripcion' => array(
	    	'rule' => 'notEmpty',
	        'message' => 'El nombre del requisito es obligatorio.',
	        'allowEmpty' => false
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
