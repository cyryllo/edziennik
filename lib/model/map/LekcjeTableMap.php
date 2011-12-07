<?php


/**
 * This class defines the structure of the 'lekcje' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * śro, 7 gru 2011, 12:49:33
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class LekcjeTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.LekcjeTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('lekcje');
		$this->setPhpName('Lekcje');
		$this->setClassname('Lekcje');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PRZEDMIOT_ID', 'PrzedmiotId', 'INTEGER', 'przedmiot', 'ID', true, null, null);
		$this->addForeignKey('KLASA_ID', 'KlasaId', 'INTEGER', 'klasy', 'ID', true, null, null);
		$this->addForeignKey('SEMESTR_ID', 'SemestrId', 'INTEGER', 'semestr', 'ID', true, null, null);
		$this->addColumn('TEMAT', 'Temat', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATALEKCJI', 'Datalekcji', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('NAUCZYCIEL_ID', 'NauczycielId', 'INTEGER', 'uzytkownik', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Przedmiot', 'Przedmiot', RelationMap::MANY_TO_ONE, array('przedmiot_id' => 'id', ), null, null);
    $this->addRelation('Klasy', 'Klasy', RelationMap::MANY_TO_ONE, array('klasa_id' => 'id', ), null, null);
    $this->addRelation('Semestr', 'Semestr', RelationMap::MANY_TO_ONE, array('semestr_id' => 'id', ), null, null);
    $this->addRelation('Uzytkownik', 'Uzytkownik', RelationMap::MANY_TO_ONE, array('nauczyciel_id' => 'id', ), null, null);
    $this->addRelation('Obecnosci', 'Obecnosci', RelationMap::ONE_TO_MANY, array('id' => 'lekcja_id', ), null, null);
    $this->addRelation('Uwagi', 'Uwagi', RelationMap::ONE_TO_MANY, array('id' => 'lekcja_id', ), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // LekcjeTableMap