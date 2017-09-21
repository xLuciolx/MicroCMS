<?php

namespace MicroCMS\Domain;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface {
  /**
   * User id
   * @var int
   */
  private $id;

  /**
   * User name
   * @var string
   */
  private $userName;

  /**
   * User password
   * @var string
   */
  private $password;

  /**
   * Salt for encoding password
   * @var string
   */
  private $salt;

/**
 * Role
 * Values: ROLE_USER, ROLE_ADMIN
 * @var string
 */
  private $role;

  /*getters*/

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getUserName(): string
  {
    return $this->userName;
  }

  /**
   * @return string
   */
  public function getRole(): string
  {
    return $this->role;
  }

  /**
   * @return string
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * @return string
   */
  public function getSalt(): string
  {
    return $this->salt;
  }

  /*setters*/

  /**
   * @param int $id
   *
   * @return static
   */
  public function setId(int $id)
  {
    $this->id = $id;
    return $this;
  }

  /**
   * @param string $userName
   *
   * @return static
   */
  public function setUserName(string $userName)
  {
    $this->userName = $userName;
    return $this;
  }

  /**
   * @param string $password
   *
   * @return static
   */
  public function setPassword(string $password)
  {
    $this->password = $password;
    return $this;
  }

  /**
   * @param string $salt
   *
   * @return static
   */
  public function setSalt(string $salt)
  {
    $this->salt = $salt;
    return $this;
  }

  /**
   * @param string $role
   *
   * @return static
   */
  public function setRole(string $role)
  {
    $this->role = $role;
    return $this;
  }

  /**
   * @inheritDoc
   */
  public function eraseCredentials(){

  }


}
