<?php

namespace MicroCMS\DAO;

use MicroCMS\Domain\Comment;

class CommentDAO extends DAO {

  /**
   * @var ArticleDAO
   */
  private $articleDAO;

  public function setArticleDAO(ArticleDAO $articleDAO) {
    $this->articleDAO = $articleDAO;
  }
  /**
   * Return a list of all comments for an article, sorted by date (most recent first)
   * @method findAllByArticle
   * @param  array $articleId The article id
   * @return array array A list of all comment for the article
   */
  public function findAllByArticle($articleId){
    //the associated article is retrieved only once
    $article = $this->articleDAO->find($articleId);

    //art_id is not selected by the SQL query
    //The article won't be retrieved during domain object construction
    $sql = "SELECT com_id, com_content, com_author FROM t_comment WHERE art_id = ? ORDER BY com_id";
    $result = $this->getDb()->fetchAll($sql, array($articleId));

    //convert query result to an array of domain object
    $comments = array();
    foreach ($result as $row) {
      $comId = $row['com_id'];
      $comment = $this->buildDomainObject($row);
      //The associated article is defined for the constructed comment
      $comment->setArticle($article);
      $comments[$comId] = $comment;
    }
    return $comments;
  }

  /**
   * Creates a Comment object based on a DB row.
   * @method buildComment
   * @param  array $row The DB row containing Comment data
   * @return \MicroCMS\Domain\Comment
   */
  protected function buildDomainObject(array $row){
    $comment = new Comment();
    $comment->setId($row['com_id']);
    $comment->setContent($row['com_content']);
    $comment->setAuthor($row['com_author']);

    if (array_key_exists('art_id', $row)) {
      //find and set the associated article
      $articleId = $row['art_id'];
      $article = $this->articleDAO->find($articleId);
      $comment->setArticle($article);
    }
    return $comment;
  }
}
