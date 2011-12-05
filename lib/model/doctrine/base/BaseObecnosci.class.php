<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Obecnosci', 'doctrine');

/**
 * BaseObecnosci
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $pupil
 * @property integer $lekcja_id
 * @property string $rodzajobecnosci
 * @property Lekcje $Lekcje
 * @property Uzytkownik $Uzytkownik
 * @property Doctrine_Collection $Usprawiedliwienie
 * 
 * @method integer             getId()                Returns the current record's "id" value
 * @method integer             getPupil()             Returns the current record's "pupil" value
 * @method integer             getLekcjaId()          Returns the current record's "lekcja_id" value
 * @method string              getRodzajobecnosci()   Returns the current record's "rodzajobecnosci" value
 * @method Lekcje              getLekcje()            Returns the current record's "Lekcje" value
 * @method Uzytkownik          getUzytkownik()        Returns the current record's "Uzytkownik" value
 * @method Doctrine_Collection getUsprawiedliwienie() Returns the current record's "Usprawiedliwienie" collection
 * @method Obecnosci           setId()                Sets the current record's "id" value
 * @method Obecnosci           setPupil()             Sets the current record's "pupil" value
 * @method Obecnosci           setLekcjaId()          Sets the current record's "lekcja_id" value
 * @method Obecnosci           setRodzajobecnosci()   Sets the current record's "rodzajobecnosci" value
 * @method Obecnosci           setLekcje()            Sets the current record's "Lekcje" value
 * @method Obecnosci           setUzytkownik()        Sets the current record's "Uzytkownik" value
 * @method Obecnosci           setUsprawiedliwienie() Sets the current record's "Usprawiedliwienie" collection
 * 
 * @package    edziennik
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseObecnosci extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('obecnosci');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'obecnosci_id',
             'length' => 4,
             ));
        $this->hasColumn('pupil', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 4,
             ));
        $this->hasColumn('lekcja_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 4,
             ));
        $this->hasColumn('rodzajobecnosci', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Lekcje', array(
             'local' => 'lekcja_id',
             'foreign' => 'id'));

        $this->hasOne('Uzytkownik', array(
             'local' => 'pupil',
             'foreign' => 'id'));

        $this->hasMany('Usprawiedliwienie', array(
             'local' => 'id',
             'foreign' => 'obecnosci_id'));
    }
}