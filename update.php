<?php
    function print_title(){
      if(isset($_GET['id'])){
        echo $_GET['id'];
      }
      else{
        echo 'web';
      }
    }

    function print_list() {
      $list = scandir('./data');
      $i = 0;
      while($i<count($list)){
        if($list[$i] != '.'){
          if($list[$i] != '..'){
            echo "<list><a href=\"index.php?id=$list[$i]\">$list[$i]</list><br>";
          }
        }
        $i = $i+1;
      }
    }

    function print_description(){
      if(isset($_GET['id'])){
        echo file_get_contents("data/".$_GET['id']);
      }else{
        echo "Hello Web";
      }
    }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      <?php
        print_title();
       ?>
    </title>
    <style media="screen">
      a {
        text-decoration: none;
        color: gray;
      }
    </style>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?php
        print_list();
       ?>
    </ol>
    <a href="create.php">create</a>
    <form action="update_process.php" method="post">
      <input type="hidden" name="old_title" value="<?= $_GET['id'] ?>">
      <p>
        <input type="text" name="title" placeholder="TItle" value="<?php print_title(); ?>">
      </p>
      <p>
        <textarea name="description" placeholder="Description"><?= print_description()  ?></textarea>
        <input type="submit" value="submit">
      </p>
    </form>
    <h2><?php
      print_title();
     ?></h2>
    <?php
    print_description();
     ?>
  </body>
</html>
