<?php

/**
 * Tablicaocen form base class.
 *
 * @method Tablicaocen getObject() Returns the current form's model object
 *
 * @package    dziennik
 * @subpackage form
 * @author     Cyryl Sochacki
 */
abstract class BaseTablicaocenForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'nazwa'   => new sfWidgetFormTextarea(),
      'wartosc' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nazwa'   => new sfValidatorString(array('required' => false)),
      'wartosc' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tablicaocen[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tablicaocen';
  }


}
