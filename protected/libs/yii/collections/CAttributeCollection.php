<?php
/**
 * This file contains classes implementing attribute collection feature.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2011 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */


/**
 * CAttributeCollection implements a collection for storing attribute names and values.
 *
 * Besides all functionalities provided by {@link CMap}, CAttributeCollection
 * allows you to get and set attribute values like getting and setting
 * properties. For example, the following usages are all valid for a
 * CAttributeCollection object:
 * <pre>
 * $collection->text='text'; // same as:  $collection->add('text','text');
 * echo $collection->text;   // same as:  echo $collection->itemAt('text');
 * </pre>
 *
 * The case sensitivity of attribute names can be toggled by setting the
 * {@link caseSensitive} property of the collection.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: CAttributeCollection.php 3001 2011-02-24 16:42:44Z alexander.makarow $
 * @package system.collections
 * @since 1.0
 */
class CAttributeCollection extends CMap
{
	/**
	 * @var boolean whether the keys are case-sensitive. Defaults to false.
	 */
	public $caseSensitive=false;

	/**
	 * Returns a property value or an event handler list by property or event name.
	 * This method overrides the parent implementation by returning
	 * a key value if the key exists in the collection.
	 * @param string $name the property name or the event name
	 * @return mixed the property value or the event handler list
	 * @throws CException if the property/event is not defined.
	 */
	public function __get($name)
	{
		if($this->contains($name))
			return $this->itemAt($name);
		else
			return parent::__get($name);
	}

	/**
	 * Sets value of a component property.
	 * This method overrides the parent implementation by adding a new key value
	 * to the collection.
	 * @param string $name the property name or event name
	 * @param mixed $value the property value or event handler
	 * @throws CException If the property is not defined or read-only.
	 */
	public function __set($name,$value)
	{
		$this->add($name,$value);
	}

	/**
	 * Checks if a property value is null.
	 * This method overrides the parent implementation by checking
	 * if the key exists in the collection and contains a non-null value.
	 * @param string $name the property name or the event name
	 * @return boolean whether the property value is null
	 * @since 1.0.1
	 */
	public function __isset($name)
	{
		if($this->contains($name))
			return $this->itemAt($name)!==null;
		else
			return parent::__isset($name);
	}

	/**
	 * Sets a component property to be null.
	 * This method overrides the parent implementation by clearing
	 * the specified key value.
	 * @param string $name the property name or the event name
	 * @since 1.0.1
	 */
	public function __unset($name)
	{
		$this->remove($name);
	}

	/**
	 * Returns the item with the specified key.
	 * This overrides the parent implementation by converting the key to lower case first if {@link caseSensitive} is false.
	 * @param mixed $key the key
	 * @return mixed the element at the offset, null if no element is found at the offset
	 */
	public function itemAt($key)
	{
		if($this->caseSensitive)
			return parent::itemAt($key);
		else
			return parent::itemAt(strtolower($key));
	}

	/**
	 * Adds an item into the map.
	 * This overrides the parent implementation by converting the key to lower case first if {@link caseSensitive} is false.
	 * @param mixed $key key
	 * @param mixed $value value
	 */
	public function add($key,$value)
	{
		if($this->caseSensitive)
			parent::add($key,$value);
		else
			parent::add(strtolower($key),$value);
	}

	/**
	 * Removes an item from the map by its key.
	 * This overrides the parent implementation by converting the key to lower case first if {@link caseSensitive} is false.
	 * @param mixed $key the key of the item to be removed
	 * @return mixed the removed value, null if no such key exists.
	 */
	public function remove($key)
	{
		if($this->caseSensitive)
			return parent::remove($key);
		else
			return parent::remove(strtolower($key));
	}

	/**
	 * Returns whether the specified is in the map.
	 * This overrides the parent implementation by converting the key to lower case first if {@link caseSensitive} is false.
	 * @param mixed $key the key
	 * @return boolean whether the map contains an item with the specified key
	 */
	public function contains($key)
	{
		if($this->caseSensitive)
			return parent::contains($key);
		else
			return parent::contains(strtolower($key));
	}

	/**
	 * Determines whether a property is defined.
	 * This method overrides parent implementation by returning true
	 * if the collection contains the named key.
	 * @param string $name the property name
	 * @return boolean whether the property is defined
	 */
	public function hasProperty($name)
	{
		return $this->contains($name) || parent::hasProperty($name);
	}

	/**
	 * Determines whether a property can be read.
	 * This method overrides parent implementation by returning true
	 * if the collection contains the named key.
	 * @param string $name the property name
	 * @return boolean whether the property can be read
	 */
	public function canGetProperty($name)
	{
		return $this->contains($name) || parent::canGetProperty($name);
	}

	/**
	 * Determines whether a property can be set.
	 * This method overrides parent implementation by always returning true
	 * because you can always add a new value to the collection.
	 * @param string $name the property name
	 * @return boolean true
	 */
	public function canSetProperty($name)
	{
		return true;
	}
}
