<?php

/**
 * Grupy form base class.
 *
 * @method Grupy getObject() Returns the current form's model object
 *
 * @package    dziennik
 * @subpackage form
 * @author     Cyryl Sochacki
 */
abstract class BaseGrupyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'pupil'      => new sfWidgetFormPropelChoice(array('model' => 'Uzytkownik', 'add_empty' => false)),
      'semestr_id' => new sfWidgetFormPropelChoice(array('model' => 'Semestr', 'add_empty' => false)),
      'grupa'      => new sfWidgetFormInputText(),
      'info'       => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'pupil'      => new sfValidatorPropelChoice(array('model' => 'Uzytkownik', 'column' => 'id')),
      'semestr_id' => new sfValidatorPropelChoice(array('model' => 'Semestr', 'column' => 'id')),
      'grupa'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'info'       => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('grupy[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Grupy';
  }


}
