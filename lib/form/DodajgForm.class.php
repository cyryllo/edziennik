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
	
	$this->setValidators(array(
	  'uczen'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'pupil'      => new sfValidatorPropelChoice(array('model' => 'Uzytkownik', 'column' => 'id')),
      'semestr' => new sfValidatorPropelChoice(array('model' => 'Semestr', 'column' => 'id')),
      'grupa'      => new sfValidatorInteger(array('min' => 0, 'max' => 10, 'required' => false)),
      'info'       => new sfValidatorString(array('required' => false)),
      ));
  }
}
