<?php


require __DIR__.'/../vendor/autoload.php';
require '../config.php';
require '../helpers/boot.php';
require_once '../helpers/Article.php';


if(isset($_POST['create']))
{
  $article = Article::find($_GET['id']);
  $article->name = $_POST['name'];
  $article->author = $_POST['author'];
  $article->content = $_POST['content'];
  $article->save();
  header("location:index.php");
}

else{
  $article = Article::find($_GET['id']);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Articles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../static/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../static/js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="container" style="padding-top:30px;">
    <div class="col-md-6 col-xs-offset-3">
    <form action="edit.php?id=<?= $article->id ?>" method="post" class="horizontal-form">
      <div class="form-group">
        <label>Author</label>
          <input class="form-control" type="text" name="author" value="<?= $article->author ?>">
      </div>
      <div class="form-group">
        <label>Name of Article</label>
        <input class="form-control" name="name" value="<?= $article->name ?>">
      </div>
      <div class="form-group">
        <label>Content</label>
        <textarea class="form-control" name="content"><?= $article->content ?></textarea>
      </div>
      <div class="form-group">
          <input class="form-control btn btn-primary" type="submit" value="submit" name="create">
      </div>
    </form>
  </div>
  <div>
    <a class="btn btn-link" href="index.php">Back</a>
  </div>
  </div>
</body>
</html>