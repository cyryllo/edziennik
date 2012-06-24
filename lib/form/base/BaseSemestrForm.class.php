<?php

/**
 * Semestr form base class.
 *
 * @method Semestr getObject() Returns the current form's model object
 *
 * @package    dziennik
 * @subpackage form
 * @author     Cyryl Sochacki
 */
abstract class BaseSemestrForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'rok'    => new sfWidgetFormTextarea(),
      'polowa' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'rok'    => new sfValidatorString(array('required' => false)),
      'polowa' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('semestr[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Semestr';
  }


}
