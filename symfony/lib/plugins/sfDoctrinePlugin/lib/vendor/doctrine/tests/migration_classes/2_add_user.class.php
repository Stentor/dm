<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AddUser extends Doctrine_Migration_Base
{
    public function migrate($direction)
    {
		$this->table($direction, 'migration_user', array('id' => array('type' => 'integer', 'length' => 20, 'autoincrement' => true, 'primary' => true), 'username' => array('type' => 'string', 'length' => 255), 'password' => array('type' => 'string', 'length' => 255)), array('indexes' => array(), 'primary' => array(0 => 'id')));
    }
}