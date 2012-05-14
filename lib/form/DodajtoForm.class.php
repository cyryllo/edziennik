<?php

/**
 * Tablicaocen form.
 *
 * @package    edziennik
 * @subpackage form
 * @author     Your name here
 */
class DodajtoForm extends BaseTablicaocenForm
{
  public function configure()
  {
  	$this->setWidgets(array(
  	'nazwa'    => new sfWidgetFormInputText(array('label' => 'Nazwa'),array('size' => 14)),
  	'wartosc'	=> new sfWidgetFormInputText(array('label' => 'Wartość'),array('size' => 3)),
	));
  }
}
