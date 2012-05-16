<?php


/**
 * This class defines the structure of the 'dyplomy' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Wed May 16 21:30:53 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class DyplomyTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.DyplomyTableMap';

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
		$this->setName('dyplomy');
		$this->setPhpName('Dyplomy');
		$this->setClassname('Dyplomy');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PUPIL', 'Pupil', 'INTEGER', 'uzytkownik', 'ID', true, null, null);
		$this->addForeignKey('SEMESTR_ID', 'SemestrId', 'INTEGER', 'semestr', 'ID', true, null, null);
		$this->addForeignKey('PRZEDMIOT_ID', 'PrzedmiotId', 'INTEGER', 'przedmiot', 'ID', true, null, null);
		$this->addColumn('OCENADYPLOMU', 'Ocenadyplomu', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Uzytkownik', 'Uzytkownik', RelationMap::MANY_TO_ONE, array('pupil' => 'id', ), null, null);
    $this->addRelation('Semestr', 'Semestr', RelationMap::MANY_TO_ONE, array('semestr_id' => 'id', ), null, null);
    $this->addRelation('Przedmiot', 'Przedmiot', RelationMap::MANY_TO_ONE, array('przedmiot_id' => 'id', ), null, null);
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

} // DyplomyTableMap
