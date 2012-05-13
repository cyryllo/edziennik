<?php


/**
 * This class defines the structure of the 'obecnosci' table.
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
class ObecnosciTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ObecnosciTableMap';

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
		$this->setName('obecnosci');
		$this->setPhpName('Obecnosci');
		$this->setClassname('Obecnosci');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('PUPIL', 'Pupil', 'INTEGER', 'uzytkownik', 'ID', true, null, null);
		$this->addForeignKey('LEKCJA_ID', 'LekcjaId', 'INTEGER', 'lekcje', 'ID', true, null, null);
		$this->addColumn('RODZAJOBECNOSCI', 'Rodzajobecnosci', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Uzytkownik', 'Uzytkownik', RelationMap::MANY_TO_ONE, array('pupil' => 'id', ), null, null);
    $this->addRelation('Lekcje', 'Lekcje', RelationMap::MANY_TO_ONE, array('lekcja_id' => 'id', ), null, null);
    $this->addRelation('Usprawiedliwienie', 'Usprawiedliwienie', RelationMap::ONE_TO_MANY, array('id' => 'obecnosci_id', ), null, null);
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

} // ObecnosciTableMap
