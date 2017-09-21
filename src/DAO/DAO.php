<?php

namespace MicroCMS\DAO;
use Doctrine\DBAL\Connection;

abstract class DAO {

  /**
   * Database connection
   * @var Connection
   */
  private $db;


  /**
   * constructor
   * @method __construct
   * @param  Connection $db The database connection object
   */
  public function __construct(Connection $db)
  {
    $this->db = $db;
  }

  /**
   * grants acces to the database connection object
   * @method getDb
   * @return Connection The database connection object
   */
  protected function getDb(){
    return $this->db;
  }

  /**
   * Builds a domain object from DB row.
   * Must be overwritten by child classes
   * @param  array $row The DB row
   */
  protected abstract function buildDomainObject(array $row);
}
