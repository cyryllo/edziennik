<?php
class DodajplForm extends BaseForm
{
  protected static $semestry = array('1' => 'I/2011/2012', '2' => 'II/2011/2012');
  protected static $przedmioty = array('Język Polski' => 'Język Polski', 'Matematyka' => 'Matematyka');
  protected static $dnityg = array('Poniedziałek','Wtorek', 'Środa', 'Czwartek', 'Piątek');
   protected static $grupy = array('brak','I grupa', 'II grupa');
   protected static $obowiazek = array('1' => 'Tak','0' =>'Nie');
  public function configure()
  {
    $this->setWidgets(array(
      'semestr' => new sfWidgetFormSelect(array('choices' => self::$semestry), array('label' => 'Semestr')),
      'klasa'    => new sfWidgetFormInputText(array('label' => 'Klasa'),array('size' => 14)),
      'nauczyciel'    => new sfWidgetFormInputText(array('label' => 'Nauczyciel'),array('size' => 14)),
      'przedmiot' => new sfWidgetFormSelect(array('choices' => self::$przedmioty), array('label' => 'Przedmiot')),
      'czas_start'	=> new sfWidgetFormTime(array( 'format' => '%hour%:%minute%', 'label' => 'Od godziny')),
      'czas_stop'	=> new sfWidgetFormTime(array( 'format' => '%hour%:%minute%', 'label' => 'Do godziny')),
      'dzien_tygodnia'	=> new sfWidgetFormSelect(array('choices' => self::$dnityg), array('label' => 'Dzień tyg.')),
      'godzina_lekcyjna'    => new sfWidgetFormInputText(array('label' => 'Godzina lekcyjna'),array('size' => 1)),
      'grupa' => new sfWidgetFormSelect(array('choices' => self::$grupy), array('label' => 'Grupa')),
      'obowiazkowa' => new sfWidgetFormSelect(array('choices' => self::$obowiazek), array('label' => 'Lekcja obowiązkowa')),
      ));

  }
  
  
}