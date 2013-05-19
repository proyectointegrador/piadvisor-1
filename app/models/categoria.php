<?php
/**
 *Autores:
 *  Edgar García Camarillo
 *  Eugenio Rafael García García
 *  Luis Galeana Peralta
 *  Luis Eduardo Torres 
 *
 * Descripción: Código del modelo de categorias
 * 				
 */
 
class Categoria extends AppModel {

/**
 * Despliega los campos
 *
 * @var string
 */
	var $name = 'Categoria';
	var $displayField = 'name';

/**
 * Validaciones de datos
 *
 */

	var $validate = array(
	    'name' => array(
		'rule' => 'alphaNumeric',
		'message' => 'El nombre de la categoría es obligatorio.',
		'allowEmpty' => false
	    )
	);


/**
 * Asociaciones hasMany
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
