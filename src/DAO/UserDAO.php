<?php

namespace MicroCMS\DAO;
use MicroCMS\Domain\User;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class UserDAO extends DAO implements UserProviderInterface {

  /**
   * Return an user matching the supplied id
   * @method find
   * @param  int $id user id
   * @return User| throws an exception if no matching user is found
   */
  public function find($id){
    $sql = 'SELECT * FROM t_user
            WHERE usr_id = ?';
    $row = $this->getDb()->fetchAssoc($sql, [$id]);

    if ($row) {
      return $this->buildDomainObject($row);
    }
    else {
      throw new \Exception("No user matching id" . $id);
    }
  }

  /**
   * @inheritDoc
   */
  public function loadUserByUsername($username){
    $sql = 'SELECT * FROM t_user
            WHERE user_name = ?';
    $row = $this->getDb()->fetchAssoc($sql, [$username]);

    if ($row) {
      return $this->buildDomainObject($row);
    }
    else {
      throw new UsernameNotFoundException(sprintf('User "%" not found', $username));
    }
  }

  /**
   * @inheritDoc
   */
  public function refreshUser(UserInterface $user){
    $class = get_class($user);
    if (!$this->supportsClass($class)) {
      throw new UnsupportedUserException(sprintf('Instance of "%" are not supported.', $class));
    }
    return $this->loadUserByUsername($user->getUsername());
  }

  /**
   * @inheritDoc
   */
  public function supportsClass($class){
    return 'MicroCMS\Domain\User' === $class;
  }

  /**
   * Create an User object based on a DB row
   * @method buildDomainObject
   * @param  array $row The DB row containing the User data
   * @return User
   */
  protected function buildDomainObject(array $row){
    $user = new User();
    $user->setId($row['usr_id']);
    $user->setUserName($row['usr_name']);
    $user->setPassword($row['usr_password']);
    $user->setSalt($row['usr_salt']);
    $user->setRole($row['usr_role']);
    return $user;
  }
}
