<?php


/**
 * This class defines the structure of the 'usprawiedliwienie' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * śro, 7 gru 2011, 12:49:35
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class UsprawiedliwienieTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.UsprawiedliwienieTableMap';

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
		$this->setName('usprawiedliwienie');
		$this->setPhpName('Usprawiedliwienie');
		$this->setClassname('Usprawiedliwienie');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('usprawiedliwienie_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addForeignKey('OBECNOSCI_ID', 'ObecnosciId', 'INTEGER', 'obecnosci', 'ID', false, null, null);
		$this->addForeignKey('UZYTKOWNIK_ID', 'UzytkownikId', 'INTEGER', 'uzytkownik', 'ID', true, null, null);
		$this->addColumn('TRESC', 'Tresc', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Obecnosci', 'Obecnosci', RelationMap::MANY_TO_ONE, array('obecnosci_id' => 'id', ), null, null);
    $this->addRelation('Uzytkownik', 'Uzytkownik', RelationMap::MANY_TO_ONE, array('uzytkownik_id' => 'id', ), null, null);
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

} // UsprawiedliwienieTableMap