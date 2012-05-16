<?php

/**
 * Base class that represents a row from the 'dyplomy' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Wed May 16 21:30:53 2012
 *
 * @package    lib.model.om
 */
abstract class BaseDyplomy extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        DyplomyPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the pupil field.
	 * @var        int
	 */
	protected $pupil;

	/**
	 * The value for the semestr_id field.
	 * @var        int
	 */
	protected $semestr_id;

	/**
	 * The value for the przedmiot_id field.
	 * @var        int
	 */
	protected $przedmiot_id;

	/**
	 * The value for the ocenadyplomu field.
	 * @var        int
	 */
	protected $ocenadyplomu;

	/**
	 * @var        Uzytkownik
	 */
	protected $aUzytkownik;

	/**
	 * @var        Semestr
	 */
	protected $aSemestr;

	/**
	 * @var        Przedmiot
	 */
	protected $aPrzedmiot;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	// symfony behavior
	
	const PEER = 'DyplomyPeer';

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [pupil] column value.
	 * 
	 * @return     int
	 */
	public function getPupil()
	{
		return $this->pupil;
	}

	/**
	 * Get the [semestr_id] column value.
	 * 
	 * @return     int
	 */
	public function getSemestrId()
	{
		return $this->semestr_id;
	}

	/**
	 * Get the [przedmiot_id] column value.
	 * 
	 * @return     int
	 */
	public function getPrzedmiotId()
	{
		return $this->przedmiot_id;
	}

	/**
	 * Get the [ocenadyplomu] column value.
	 * 
	 * @return     int
	 */
	public function getOcenadyplomu()
	{
		return $this->ocenadyplomu;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Dyplomy The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DyplomyPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [pupil] column.
	 * 
	 * @param      int $v new value
	 * @return     Dyplomy The current object (for fluent API support)
	 */
	public function setPupil($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->pupil !== $v) {
			$this->pupil = $v;
			$this->modifiedColumns[] = DyplomyPeer::PUPIL;
		}

		if ($this->aUzytkownik !== null && $this->aUzytkownik->getId() !== $v) {
			$this->aUzytkownik = null;
		}

		return $this;
	} // setPupil()

	/**
	 * Set the value of [semestr_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Dyplomy The current object (for fluent API support)
	 */
	public function setSemestrId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->semestr_id !== $v) {
			$this->semestr_id = $v;
			$this->modifiedColumns[] = DyplomyPeer::SEMESTR_ID;
		}

		if ($this->aSemestr !== null && $this->aSemestr->getId() !== $v) {
			$this->aSemestr = null;
		}

		return $this;
	} // setSemestrId()

	/**
	 * Set the value of [przedmiot_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Dyplomy The current object (for fluent API support)
	 */
	public function setPrzedmiotId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->przedmiot_id !== $v) {
			$this->przedmiot_id = $v;
			$this->modifiedColumns[] = DyplomyPeer::PRZEDMIOT_ID;
		}

		if ($this->aPrzedmiot !== null && $this->aPrzedmiot->getId() !== $v) {
			$this->aPrzedmiot = null;
		}

		return $this;
	} // setPrzedmiotId()

	/**
	 * Set the value of [ocenadyplomu] column.
	 * 
	 * @param      int $v new value
	 * @return     Dyplomy The current object (for fluent API support)
	 */
	public function setOcenadyplomu($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->ocenadyplomu !== $v) {
			$this->ocenadyplomu = $v;
			$this->modifiedColumns[] = DyplomyPeer::OCENADYPLOMU;
		}

		return $this;
	} // setOcenadyplomu()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->pupil = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->semestr_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->przedmiot_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->ocenadyplomu = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 5; // 5 = DyplomyPeer::NUM_COLUMNS - DyplomyPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Dyplomy object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aUzytkownik !== null && $this->pupil !== $this->aUzytkownik->getId()) {
			$this->aUzytkownik = null;
		}
		if ($this->aSemestr !== null && $this->semestr_id !== $this->aSemestr->getId()) {
			$this->aSemestr = null;
		}
		if ($this->aPrzedmiot !== null && $this->przedmiot_id !== $this->aPrzedmiot->getId()) {
			$this->aPrzedmiot = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DyplomyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = DyplomyPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUzytkownik = null;
			$this->aSemestr = null;
			$this->aPrzedmiot = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DyplomyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseDyplomy:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			
			    return;
			  }
			}

			if ($ret) {
				DyplomyPeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseDyplomy:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$this->setDeleted(true);
				$con->commit();
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DyplomyPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseDyplomy:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			    $con->commit();
			
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseDyplomy:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				DyplomyPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUzytkownik !== null) {
				if ($this->aUzytkownik->isModified() || $this->aUzytkownik->isNew()) {
					$affectedRows += $this->aUzytkownik->save($con);
				}
				$this->setUzytkownik($this->aUzytkownik);
			}

			if ($this->aSemestr !== null) {
				if ($this->aSemestr->isModified() || $this->aSemestr->isNew()) {
					$affectedRows += $this->aSemestr->save($con);
				}
				$this->setSemestr($this->aSemestr);
			}

			if ($this->aPrzedmiot !== null) {
				if ($this->aPrzedmiot->isModified() || $this->aPrzedmiot->isNew()) {
					$affectedRows += $this->aPrzedmiot->save($con);
				}
				$this->setPrzedmiot($this->aPrzedmiot);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DyplomyPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setNew(false);
				} else {
					$affectedRows += DyplomyPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUzytkownik !== null) {
				if (!$this->aUzytkownik->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUzytkownik->getValidationFailures());
				}
			}

			if ($this->aSemestr !== null) {
				if (!$this->aSemestr->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSemestr->getValidationFailures());
				}
			}

			if ($this->aPrzedmiot !== null) {
				if (!$this->aPrzedmiot->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPrzedmiot->getValidationFailures());
				}
			}


			if (($retval = DyplomyPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DyplomyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPupil();
				break;
			case 2:
				return $this->getSemestrId();
				break;
			case 3:
				return $this->getPrzedmiotId();
				break;
			case 4:
				return $this->getOcenadyplomu();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DyplomyPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPupil(),
			$keys[2] => $this->getSemestrId(),
			$keys[3] => $this->getPrzedmiotId(),
			$keys[4] => $this->getOcenadyplomu(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DyplomyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPupil($value);
				break;
			case 2:
				$this->setSemestrId($value);
				break;
			case 3:
				$this->setPrzedmiotId($value);
				break;
			case 4:
				$this->setOcenadyplomu($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DyplomyPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPupil($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSemestrId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPrzedmiotId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOcenadyplomu($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(DyplomyPeer::DATABASE_NAME);

		if ($this->isColumnModified(DyplomyPeer::ID)) $criteria->add(DyplomyPeer::ID, $this->id);
		if ($this->isColumnModified(DyplomyPeer::PUPIL)) $criteria->add(DyplomyPeer::PUPIL, $this->pupil);
		if ($this->isColumnModified(DyplomyPeer::SEMESTR_ID)) $criteria->add(DyplomyPeer::SEMESTR_ID, $this->semestr_id);
		if ($this->isColumnModified(DyplomyPeer::PRZEDMIOT_ID)) $criteria->add(DyplomyPeer::PRZEDMIOT_ID, $this->przedmiot_id);
		if ($this->isColumnModified(DyplomyPeer::OCENADYPLOMU)) $criteria->add(DyplomyPeer::OCENADYPLOMU, $this->ocenadyplomu);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DyplomyPeer::DATABASE_NAME);

		$criteria->add(DyplomyPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Dyplomy (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setId($this->id);

		$copyObj->setPupil($this->pupil);

		$copyObj->setSemestrId($this->semestr_id);

		$copyObj->setPrzedmiotId($this->przedmiot_id);

		$copyObj->setOcenadyplomu($this->ocenadyplomu);


		$copyObj->setNew(true);

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Dyplomy Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     DyplomyPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DyplomyPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Uzytkownik object.
	 *
	 * @param      Uzytkownik $v
	 * @return     Dyplomy The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUzytkownik(Uzytkownik $v = null)
	{
		if ($v === null) {
			$this->setPupil(NULL);
		} else {
			$this->setPupil($v->getId());
		}

		$this->aUzytkownik = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Uzytkownik object, it will not be re-added.
		if ($v !== null) {
			$v->addDyplomy($this);
		}

		return $this;
	}


	/**
	 * Get the associated Uzytkownik object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Uzytkownik The associated Uzytkownik object.
	 * @throws     PropelException
	 */
	public function getUzytkownik(PropelPDO $con = null)
	{
		if ($this->aUzytkownik === null && ($this->pupil !== null)) {
			$this->aUzytkownik = UzytkownikPeer::retrieveByPk($this->pupil);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUzytkownik->addDyplomys($this);
			 */
		}
		return $this->aUzytkownik;
	}

	/**
	 * Declares an association between this object and a Semestr object.
	 *
	 * @param      Semestr $v
	 * @return     Dyplomy The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSemestr(Semestr $v = null)
	{
		if ($v === null) {
			$this->setSemestrId(NULL);
		} else {
			$this->setSemestrId($v->getId());
		}

		$this->aSemestr = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Semestr object, it will not be re-added.
		if ($v !== null) {
			$v->addDyplomy($this);
		}

		return $this;
	}


	/**
	 * Get the associated Semestr object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Semestr The associated Semestr object.
	 * @throws     PropelException
	 */
	public function getSemestr(PropelPDO $con = null)
	{
		if ($this->aSemestr === null && ($this->semestr_id !== null)) {
			$this->aSemestr = SemestrPeer::retrieveByPk($this->semestr_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSemestr->addDyplomys($this);
			 */
		}
		return $this->aSemestr;
	}

	/**
	 * Declares an association between this object and a Przedmiot object.
	 *
	 * @param      Przedmiot $v
	 * @return     Dyplomy The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPrzedmiot(Przedmiot $v = null)
	{
		if ($v === null) {
			$this->setPrzedmiotId(NULL);
		} else {
			$this->setPrzedmiotId($v->getId());
		}

		$this->aPrzedmiot = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Przedmiot object, it will not be re-added.
		if ($v !== null) {
			$v->addDyplomy($this);
		}

		return $this;
	}


	/**
	 * Get the associated Przedmiot object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Przedmiot The associated Przedmiot object.
	 * @throws     PropelException
	 */
	public function getPrzedmiot(PropelPDO $con = null)
	{
		if ($this->aPrzedmiot === null && ($this->przedmiot_id !== null)) {
			$this->aPrzedmiot = PrzedmiotPeer::retrieveByPk($this->przedmiot_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aPrzedmiot->addDyplomys($this);
			 */
		}
		return $this->aPrzedmiot;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

			$this->aUzytkownik = null;
			$this->aSemestr = null;
			$this->aPrzedmiot = null;
	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseDyplomy:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseDyplomy::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

} // BaseDyplomy
