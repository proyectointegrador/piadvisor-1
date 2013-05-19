<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Código del modelo de grupos
 * 				
 */
 
class Group extends AppModel {

/**
 * Despliega los campos
 *
 * @var string
 */
	var $name = 'Group';
	var $displayField = 'name';


/**
 * Validaciones de datos
 *
 */
	var $validate = array(
	    'name' => array(
		'rule' => 'alphaNumeric',
		'message' => 'El nombre del grupo es obligatorio y debe ser alfanúmerico.',
		'allowEmpty' => false
	    )
	);

/**
 * Asociaciones hasMany
 *
 * @var arreglo
 */
	var $hasMany = array(
		'User' => array(
		'className' => 'User',
		'foreignKey' => 'group_id',
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

	var $actsAs = array('Acl' => array('type' => 'requester'));

	function parentNode() {
    return null;
	}

}
