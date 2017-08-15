<?php

namespace MicroCMS\Domain;

class Article {
  /**
   * Article id
   * @var int
   */
  private $id;

  /**
   * Article title
   * @var string
   */
  private $title;

  /**
   * Aticle content
   * @var string
   */
  private $content;

  /*getters*/

  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
  }

  /*setters*/

  /**
   * @param int $id
   *
   * @return static
   */
  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  /**
   * @param string $title
   *
   * @return static
   */
  public function setTitle($title)
  {
    $this->title = $title;
    return $this;
  }

  /**
   * @param string $content
   *
   * @return static
   */
  public function setContent($content)
  {
    $this->content = $content;
    return $this;
  }

}
