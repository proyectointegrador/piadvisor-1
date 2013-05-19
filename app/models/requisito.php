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
 * Despliega los campos
 *
 * @var string
 */
	var $name = 'Requisito';

	var $displayField = 'clave';

/**
 * Validaciones de datos
 *
 */

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



/**
 * Asociaciones pertenece a
 *
 * @var arreglo
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
