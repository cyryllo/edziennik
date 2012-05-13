<?php

/**
 * Przedmiot form base class.
 *
 * @method Przedmiot getObject() Returns the current form's model object
 *
 * @package    edziennik
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePrzedmiotForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'    => new sfWidgetFormInputHidden(),
      'nazwa' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'    => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nazwa' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('przedmiot[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Przedmiot';
  }


}
