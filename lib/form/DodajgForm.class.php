<?php

/**
 * Grupy form.
 *
 * @package    edziennik
 * @subpackage form
 * @author     Cyryl Sochacki
 */
class DodajgForm extends BaseTablicaocenForm
{
  public function configure()
  {
  	$this->setWidgets(array(
  	'uczen'    => new sfWidgetFormInputText(array('label' => 'Uczeń'),array('size' => 14)),
  	'semestr'	=> new sfWidgetFormInputText(array('label' => 'Semestr'),array('size' => 3)),
  	'grupa'	=> new sfWidgetFormInputText(array('label' => 'Grupa'),array('size' => 3)),
  	'info'	=>	new sfWidgetFormTextarea(array('label' => 'Opis'))
	));
  }
}
