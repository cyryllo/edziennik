<?php

/**
 * Klasy form base class.
 *
 * @method Klasy getObject() Returns the current form's model object
 *
 * @package    edziennik
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseKlasyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'poziom'       => new sfWidgetFormInputText(),
      'znak'         => new sfWidgetFormTextarea(),
      'opis'         => new sfWidgetFormTextarea(),
      'wychowawca'   => new sfWidgetFormInputText(),
      'startsemestr' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'poziom'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'znak'         => new sfValidatorString(array('required' => false)),
      'opis'         => new sfValidatorString(array('required' => false)),
      'wychowawca'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'startsemestr' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('klasy[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Klasy';
  }


}
