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
	
	$this->setValidators(array(
      'poziom'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'znak'         => new sfValidatorString(array('required' => true)),
      'opis'         => new sfValidatorString(array('required' => false)),
      'wychowawca'   => new sfValidatorInteger(array('min' => 0, 'max' => 2147483647, 'required' => false)),
      'startsemestr' => new sfValidatorInteger(array('min' => 0, 'max' => 2147483647, 'required' => false)),
    ));
  }
}
