<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>文章详情</title>
  <link rel="stylesheet" href="./style/common.css">
  <link rel="stylesheet" href="./style/post_details.css">

  <script src="./js/jquery-3.6.0.min.js"></script>
  <script src="./js/common.js"></script>
</head>

<body>
  <?php
  require './config/database.php';

  require './common/top.php';

  $id = $_GET['id'];
  
  $sql = "SELECT post.*,user.header as user_header,user.uname as user_uname, user.sign as user_sign
  FROM post 
  JOIN user ON post.user_id = user.id
  WHERE post.id = '$id'";
  $post_details = mysqli_query($connID, $sql);
  $post_details = mysqli_fetch_array($post_details);

  //评论查询
  $sql = "SELECT discuss.*,user.uname,user.sign,user.header FROM discuss 
  JOIN user ON discuss.discuss_user_id = user.id
  WHERE post_id = '$id' ";
  $discuss_list = mysqli_query($connID,$sql);
  $discuss_list = mysqli_fetch_all($discuss_list,MYSQLI_ASSOC);//返回一个关联数组，数组下标由表的字段名组成

  // print_r(mysqli_error($connID));
  ?>

  <div class="content">
    <div class="left">
      <div class="post">
        <div class="post_title"><?php echo $post_details['title']?></div>
        <div class="user_box">
          <div class="user">
            <img src="./public/header/11.png" alt="" class="hander"><!-- 没改 -->
            <div class="user_info">
              <div class="user_name">
              <?php echo $post_details['user_uname']?>
              </div>
              <div class="data">
              <?php echo $post_details['create_time']?> · 阅读 804
              </div>
            </div>
          </div>
        </div>
        <div class="post_details">
        <?php echo $post_details['html']?>
        </div>
      </div>

      <?php if ($post_details['status'] != 0) {?>

      <div class="discuss" id="discuss">
        <a href="#discuss" id="_discuss"></a>
        <div class="discuss_title">评论</div>
        <div class="discuss_input">
          <textarea placeholder="输入评论"></textarea>
          <div class="btn_box">
            <button>发布评论</button>
          </div>
        </div>

        <div class="discuss_title">全部评论</div>
        <div class="discuss_list">
          <?php for ($i = 0; $i < count($discuss_list); $i++) {
            $item = $discuss_list[$i]
            ?>
            <div class="item">
              <img src="./public/header/11.png" class="hander" alt="">
              <div>
                <div class="user_info">
                  <div class="user">
                    <div class="name"><?php echo $item['uname']?></div>
                    <div class="sign"><?php echo $item['sign']?></div>
                  </div>
                  <div class="date"><?php echo $item['create_time']?></div>
                </div>
                <div class="discuss_details">
                  <?php echo $item['discuss']?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
    </div>
    <div class="right">
      <div class="user_box">
        <div class="user">
          <img src="./public/header/11.png" alt="" class="hander">
          <div class="user_info">
            <div class="user_name">
            <?php echo $post_details['user_uname']?>
            </div>
            <div class="data">
            <?php echo $post_details['user_sign']?>
            </div>
          </div>
        </div>
      </div>
      <div class="user_data">
        <p>获得点赞 3,625</p>
        <p>文章被阅读 64,974</p>
      </div>

      <div class="btn_box">
        <?php if ($post_details['status'] != 0) {?>
        <div class="btn btn_give" title="点赞">
          <img src="./img/give.png" alt="">
        </div>
        <div class="btn btn_valuate"title="评论">
          <img src="./img/valuate.png" alt="">
        </div>
        <div class="btn btn_report"title="举报">
          <img src="./img/report.png" alt="">
        </div>
        <?php } else{ ?>
          <h4>这是草稿，请尽快发布</h4>
        <?php } ?>

      </div>
    </div>
  </div>

</body>

<script>
  $(function() {
    //文章标题
    document.title = '<?php echo $post_details['title'] ?>'
    
    $('.btn_valuate').on('click',function() {
      document.getElementById('_discuss').click
    })
    //点赞
    $('.btn_give').on('click',function() {
      var param = {//使得PHP的数据转换成js
        post_id: '<?php echo $post_id ?>',
        post_user_id: '<?php echo $post_details['user_id'] ?>'
      }
    //举报 未写
    // $('.btn_report').on('click',function(){

    // })
      $.ajax({
        url:'./api/give.php',
        type:'POST',
        data:param,
        success:function(res){
          if(res.eode === 200){
            alert('点赞成功')
          }else if(res.eode === 250){
            alert('系统异常，请联系管理员')
          }else {
            alert(res.msg)
          }
        }
      })
    })
    
    //评论 
    $('.discuss_input button').on('click', function() {
      var val = $('.discuss_input textarea').val()
      if (val && val.length > 5) {
        $.ajax({
          url: './api/discuss_create.php',
          type: 'POST',
          data: {
            discuss: val,
            post_id: '<?php echo  $id ?>'
          },
          success: function(res) {
            if (res.code === 200) {
              location.reload()
              alert('评论成功')
            } else if (res.code === 250) {
              alert('系统异常，请联系管理员!')
            } else {
              alert(res.msg)
            }
          }
        })
      } else {
        alert('评论数必须大于5位！')
        $('.discuss_input textarea').focus()
      }
    })


  })
</script>

</html>