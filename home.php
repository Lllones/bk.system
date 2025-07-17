<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>分享圈</title>
  <link rel="stylesheet" href="./style/common.css">
  <link rel="stylesheet" href="./style/home.css">

  <script src="./js/jquery-3.6.0.min.js"></script>
  <script src="./js/common.js"></script>
</head>

<body class="home">
  <?php
  require './config/database.php';

  require './common/top.php';

  
  $user_id = $_SESSION['user_id'];

  $sql = "SELECT * FROM `post`
  WHERE `user_id` = $user_id AND `status` = '2'";
  
  $post_list = mysqli_query($connID,$sql);
  $post_list = mysqli_fetch_all($post_list,MYSQLI_ASSOC);

  //排行榜
  $sql = "SELECT user.*,(SELECT count(*) FROM post_give WHERE user.id = post_give.post_user_id) AS gives
  FROM user ORDER BY gives DESC LIMIT 5";//前五名 倒序
  $users = mysqli_query($connID, $sql);
  $users = mysqli_fetch_all($users, MYSQLI_ASSOC);

  // print_r($users);
  ?>

  <div class="content">
    <div class="content-list">
      <?php for ($i = 0; $i < count($post_list); $i++) {
          $item = $post_list[$i];

          ?>
          <a href="./post_details.php?id=<?php echo $item['id'] ?>">
            <div class="item">
              <div class="left">
                <div class="item-tag">
                  <span>123</span>
                  <span><?php echo $item['create_time'] ?></span>
                  <!-- <span><?php echo $item['post_type_name'] ?></span> -->
                </div>
                <div class="title"><?php echo $item['title'] ?></div>
                <div class="item-inco"><?php echo $item['create_time'] ?></div>
                <div class="data-number">
                  <div class="look">预览</div>
                  <div class="give">点赞</div>
                  <div class="valuate">评论</div>
                </div>
              </div>
              
            </div>
          </a>
        <?php } ?>
    </div>
    <div class="content-right">
      <div class="rank">
        <div class="rank-title">作者排行榜</div>
        <div class="ranl-list">
          <?php for ($i = 0; $i < count($users); $i++) {
            $item = $users[$i]
            ?>
            <div class="item">
              <img src="./public/header/11.png" alt="" class="hander">
              <div class="info">
                <div class="name"><?php echo $item['uname']?></div>
                <div class="sign"><?php echo $item['sign']?></div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

</body>

</html>