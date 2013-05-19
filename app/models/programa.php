<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Código del modelo de programas
 * 				
 */
 
class Programa extends AppModel {

/**
 * Despliega los campos
 *
 * @var string
 */
 
	var $name = 'Programa';
	var $displayField = 'name';

/**
 * Validaciones de datos
 *
 */	
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

/**
 * Asociaciones hasMany
 *
 * @var arreglo
 */
		
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
