<?php

/**
 * Klasy form.
 *
 * @package    edziennik
 * @subpackage form
 * @author     Cyryl Sochacki
 */
class DodajkForm extends BaseTablicaocenForm
{
  public function configure()
  {
  	$this->setWidgets(array(
  	'poziom'    => new sfWidgetFormInputText(array('label' => 'Poziom'),array('size' => 3)),
  	'znak'	=> new sfWidgetFormInputText(array('label' => 'Znak'),array('size' => 1)),
  	'opis'	=>	new sfWidgetFormTextarea(array('label' => 'Opis')),
  	'wychowawca'	=> new sfWidgetFormInputText(array('label' => 'Wychowawca'),array('size' => 14)),
  	'rocznik'	=> new sfWidgetFormInputText(array('label' => 'Rocznik'),array('size' => 1))
	));
  }
}
