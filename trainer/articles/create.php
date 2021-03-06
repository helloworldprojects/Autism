<?php


require __DIR__.'/../../vendor/autoload.php';
require '../../config.php';
require_once '../../helpers/session.php';
require '../../helpers/boot.php';
require '../../helpers/functions.php';
require_once '../../helpers/User.php';
require_once '../../helpers/Article.php';

$session = new Session();
if(!$session->getLoggedin()){
  header("Location: ../../login.php");
}


if(isset($_POST['create']))
{
  $article = new Article;
  $article->name = $_POST['name'];
  $article->author = $_POST['author'];
  $article->content = $_POST['content'];
  $username = $_SESSION['username'];
  $article->user_id = $username;
  $article->level = $_POST['level'];
  $article->save();
  header("Location: ./index.php");
}
?>
<?php getTemplate(2,'header'); ?>

<div class="wrapper">

  <?php getTemplate(2,'trainer_nav',['page'=>'article','active'=>'article']); ?>


  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

        <form action="create.php" method="post" class="horizontal-form">
          <div class="form-group">
            <label>Author</label>
              <input class="form-control" type="text" name="author">
          </div>
          <div class="form-group" name="name">
            <label>Name of Article</label>
            <input class="form-control" name="name">
          </div>
          <div class="form-group">
            <label>Autism Level</label>
            <select class="form-control" name="level">
              <option value="1">NO AUTISM</option>
              <option value="2">MILD AUTISM</option>
              <option value="3">MODERATE AUTISM</option>
              <option value="4">SEVERE AUTISM</option>
            </select>
          </div>
          <div class="form-group">
            <label>Content</label>
            <textarea id="art" rows="15" class="form-control" name="content"></textarea>
          </div>
          <div class="form-group">
              <input class="form-control btn btn-primary" type="submit" value="submit" name="create">
          </div>
        </form>
      </div>
  </div>
</div>
</div>

<script type="text/javascript" src="../../static/js/markitup/jquery.markitup.js"></script>
<script type="text/javascript" src="../../static/js/markitup/settings.js"></script>
<script>
  $('#art').markItUp(mySettings);
</script>

  </body>
<r/html>
