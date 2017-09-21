<?php

namespace MicroCMS\DAO;

use MicroCMS\Domain\Article;

class ArticleDAO extends DAO {

  /**
   * Return a list of all articles, sorted by date (most recent first)
   * @method findAll
   * @return array  A list of all articles.
   */
  public function findAll(){
    $sql = "SELECT * FROM t_article ORDER BY art_id DESC";
    $result = $this->getDb()->fetchAll($sql);

    // convert query results to an array of domain object
    $articles = array();
    foreach ($result as $row) {
      $articleId = $row['art_id'];
      $articles[$articleId] = $this->buildDomainObject($row);
    }
    return $articles;
  }

  public function find($id){
    $sql = "SELECT * FROM t_article WHERE art_id = ?";
    $row = $this->getDb()->fetchAssoc($sql, array($id));

    if ($row) return $this->buildDomainObject($row);

    else throw new \Exception("No article matching id " . $id);

  }

  /**
   * Create an Article object based on a DB row
   * @method buildArticle
   * @param  array $row The DB row containing Article data
   * @return Article
   */
  protected function buildDomainObject(array $row){
    $article = new Article();
    $article->setId($row['art_id']);
    $article->setTitle($row['art_title']);
    $article->setContent($row['art_content']);
    return $article;
  }
}
