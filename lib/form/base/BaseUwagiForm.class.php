<?php

/**
 * Uwagi form base class.
 *
 * @method Uwagi getObject() Returns the current form's model object
 *
 * @package    edziennik
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseUwagiForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'pupil'     => new sfWidgetFormPropelChoice(array('model' => 'Uzytkownik', 'add_empty' => false)),
      'lekcja_id' => new sfWidgetFormPropelChoice(array('model' => 'Lekcje', 'add_empty' => false)),
      'info'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'pupil'     => new sfValidatorPropelChoice(array('model' => 'Uzytkownik', 'column' => 'id')),
      'lekcja_id' => new sfValidatorPropelChoice(array('model' => 'Lekcje', 'column' => 'id')),
      'info'      => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('uwagi[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Uwagi';
  }


}
