<?php
/**
 * CAuthItem class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2011 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CAuthItem represents an authorization item.
 * An authorization item can be an operation, a task or a role.
 * They form an authorization hierarchy. Items on higher levels of the hierarchy
 * inherit the permissions represented by items on lower levels.
 * A user may be assigned one or several authorization items (called {@link CAuthAssignment assignments}.
 * He can perform an operation only when it is among his assigned items.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: CAuthItem.php 3001 2011-02-24 16:42:44Z alexander.makarow $
 * @package system.web.auth
 * @since 1.0
 */
class CAuthItem extends CComponent
{
	const TYPE_OPERATION=0;
	const TYPE_TASK=1;
	const TYPE_ROLE=2;

	private $_auth;
	private $_type;
	private $_name;
	private $_description;
	private $_bizRule;
	private $_data;

	/**
	 * Constructor.
	 * @param IAuthManager $auth authorization manager
	 * @param string $name authorization item name
	 * @param integer $type authorization item type. This can be 0 (operation), 1 (task) or 2 (role).
	 * @param description $description the description
	 * @param string $bizRule the business rule associated with this item
	 * @param mixed $data additional data for this item
	 */
	public function __construct($auth,$name,$type,$description='',$bizRule=null,$data=null)
	{
		$this->_type=$type;
		$this->_auth=$auth;
		$this->_name=$name;
		$this->_description=$description;
		$this->_bizRule=$bizRule;
		$this->_data=$data;
	}

	/**
	 * Checks to see if the specified item is within the hierarchy starting from this item.
	 * This method is internally used by {@link IAuthManager::checkAccess}.
	 * @param string $itemName the name of the item to be checked
	 * @param array $params the parameters to be passed to business rule evaluation
	 * @return boolean whether the specified item is within the hierarchy starting from this item.
	 */
	public function checkAccess($itemName,$params=array())
	{   
		Yii::trace('Checking permission "'.$this->_name.'"','system.web.auth.CAuthItem');
		if($this->_auth->executeBizRule($this->_bizRule,$params,$this->_data))
		{
			if($this->_name==$itemName)
				return true;
			foreach($this->_auth->getItemChildren($this->_name) as $item)
			{
				if($item->checkAccess($itemName,$params))
					return true;
			}
		}
		return false;
	}

	/**
	 * @return IAuthManager the authorization manager
	 */
	public function getAuthManager()
	{
		return $this->_auth;
	}

	/**
	 * @return integer the authorization item type. This could be 0 (operation), 1 (task) or 2 (role).
	 */
	public function getType()
	{
		return $this->_type;
	}

	/**
	 * @return string the item name
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * @param string $value the item name
	 */
	public function setName($value)
	{
		if($this->_name!==$value)
		{
			$oldName=$this->_name;
			$this->_name=$value;
			$this->_auth->saveAuthItem($this,$oldName);
		}
	}

	/**
	 * @return string the item description
	 */
	public function getDescription()
	{
		return $this->_description;
	}

	/**
	 * @param string $value the item description
	 */
	public function setDescription($value)
	{
		if($this->_description!==$value)
		{
			$this->_description=$value;
			$this->_auth->saveAuthItem($this);
		}
	}

	/**
	 * @return string the business rule associated with this item
	 */
	public function getBizRule()
	{
		return $this->_bizRule;
	}

	/**
	 * @param string $value the business rule associated with this item
	 */
	public function setBizRule($value)
	{
		if($this->_bizRule!==$value)
		{
			$this->_bizRule=$value;
			$this->_auth->saveAuthItem($this);
		}
	}

	/**
	 * @return string the additional data associated with this item
	 */
	public function getData()
	{
		return $this->_data;
	}

	/**
	 * @param string $value the business rule associated with this item
	 */
	public function setData($value)
	{
		if($this->_data!==$value)
		{
			$this->_data=$value;
			$this->_auth->saveAuthItem($this);
		}
	}

	/**
	 * Adds a child item.
	 * @param string $name the name of the child item
	 * @return boolean whether the item is added successfully
	 * @throws CException if either parent or child doesn't exist or if a loop has been detected.
	 * @see IAuthManager::addItemChild
	 */
	public function addChild($name)
	{
		return $this->_auth->addItemChild($this->_name,$name);
	}

	/**
	 * Removes a child item.
	 * Note, the child item is not deleted. Only the parent-child relationship is removed.
	 * @param string $name the child item name
	 * @return boolean whether the removal is successful
	 * @see IAuthManager::removeItemChild
	 */
	public function removeChild($name)
	{
		return $this->_auth->removeItemChild($this->_name,$name);
	}

	/**
	 * Returns a value indicating whether a child exists
	 * @param string $name the child item name
	 * @return boolean whether the child exists
	 * @see IAuthManager::hasItemChild
	 */
	public function hasChild($name)
	{
		return $this->_auth->hasItemChild($this->_name,$name);
	}

	/**
	 * Returns the children of this item.
	 * @return array all child items of this item.
	 * @see IAuthManager::getItemChildren
	 */
	public function getChildren()
	{
		return $this->_auth->getItemChildren($this->_name);
	}

	/**
	 * Assigns this item to a user.
	 * @param mixed $userId the user ID (see {@link IWebUser::getId})
	 * @param string $bizRule the business rule to be executed when {@link checkAccess} is called
	 * for this particular authorization item.
	 * @param mixed $data additional data associated with this assignment
	 * @return CAuthAssignment the authorization assignment information.
	 * @throws CException if the item has already been assigned to the user
	 * @see IAuthManager::assign
	 */
	public function assign($userId,$bizRule=null,$data=null)
	{
		return $this->_auth->assign($this->_name,$userId,$bizRule,$data);
	}

	/**
	 * Revokes an authorization assignment from a user.
	 * @param mixed $userId the user ID (see {@link IWebUser::getId})
	 * @return boolean whether removal is successful
	 * @see IAuthManager::revoke
	 */
	public function revoke($userId)
	{
		$this->_auth->revoke($this->_name,$userId);
	}

	/**
	 * Returns a value indicating whether this item has been assigned to the user.
	 * @param mixed $userId the user ID (see {@link IWebUser::getId})
	 * @return boolean whether the item has been assigned to the user.
	 * @see IAuthManager::isAssigned
	 */
	public function isAssigned($userId)
	{
		return $this->_auth->isAssigned($this->_name,$userId);
	}

	/**
	 * Returns the item assignment information.
	 * @param mixed $userId the user ID (see {@link IWebUser::getId})
	 * @return CAuthAssignment the item assignment information. Null is returned if
	 * this item is not assigned to the user.
	 * @see IAuthManager::getAuthAssignment
	 */
	public function getAssignment($userId)
	{
		return $this->_auth->getAuthAssignment($this->_name,$userId);
	}
}
