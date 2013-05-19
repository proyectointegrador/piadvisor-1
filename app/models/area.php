<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Código del modelo de areas
 * 				
 */
 
class Area extends AppModel {

/**
 * Despliega los campos
 *
 * @var string
 */
	var $name = 'Area';
	var $displayField = 'name';

/**
 * Validaciones de datos
 *
 */
	var $validate = array(
	    'name' => array(
		'rule' => 'alphaNumeric',
		'message' => 'El nombre del area es obligatorio.',
		'allowEmpty' => false
	    )
	);

/**
 * Asociaciones hasMany
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
