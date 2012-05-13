<?php

/**
 * Dyplomy form base class.
 *
 * @method Dyplomy getObject() Returns the current form's model object
 *
 * @package    edziennik
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDyplomyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'pupil'        => new sfWidgetFormPropelChoice(array('model' => 'Uzytkownik', 'add_empty' => false)),
      'semestr_id'   => new sfWidgetFormPropelChoice(array('model' => 'Semestr', 'add_empty' => false)),
      'przedmiot_id' => new sfWidgetFormPropelChoice(array('model' => 'Przedmiot', 'add_empty' => false)),
      'ocenadyplomu' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'pupil'        => new sfValidatorPropelChoice(array('model' => 'Uzytkownik', 'column' => 'id')),
      'semestr_id'   => new sfValidatorPropelChoice(array('model' => 'Semestr', 'column' => 'id')),
      'przedmiot_id' => new sfValidatorPropelChoice(array('model' => 'Przedmiot', 'column' => 'id')),
      'ocenadyplomu' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('dyplomy[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dyplomy';
  }


}
