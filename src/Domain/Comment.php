<?php
namespace MicroCMS\Domain;

class Comment {
  /**
   * Comment id
   * @var int
   */
  private $id;

  /**
   * Comment author
   * @var string
   */
  private $author;

  /**
   * Comment content
   * @var string
   */
  private $content;

  /**
   * Associated article
   * @var Article
   */
  private $article;

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
  public function getAuthor(): string
  {
    return $this->author;
  }

  /**
   * @return string
   */
  public function getContent(): string
  {
    return $this->content;
  }

  /**
   * @return Article
   */
  public function getArticle(): Article
  {
    return $this->article;
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
   * @param string $author
   *
   * @return static
   */
  public function setAuthor(string $author)
  {
    $this->author = $author;
    return $this;
  }

  /**
   * @param string $content
   *
   * @return static
   */
  public function setContent(string $content)
  {
    $this->content = $content;
    return $this;
  }

  /**
   * @param Article $article
   *
   * @return static
   */
  public function setArticle(Article $article)
  {
    $this->article = $article;
    return $this;
  }
}
