<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>个人中心</title>

  <link rel="stylesheet" href="./style/common.css">
  <link rel="stylesheet" href="./style/user.css">

  <script src="./js/jquery-3.6.0.min.js"></script>
  <script src="./js/common.js"></script>
</head>

<body>
  <?php
  require './config/database.php';

  require './common/top.php';

//个人中心显示提交的文章
  $user_id = $_SESSION['user_id'];
  $user_info = $_SESSION['user_info'];

  $sql = "SELECT * FROM `post`
  WHERE `user_id` = $user_id ";
  
  $post_list = mysqli_query($connID,$sql);
  $post_list = mysqli_fetch_all($post_list,MYSQLI_ASSOC);
  // print_r($post_list);
  
  ?>

  <div class="content">
    <div class="user">
      <div class="left">
        <img src="./public/header/11.png" alt="" class="hander">
        <div class="user_info">
          <div class="name"><?php echo $user_info['uname']?></div>
          <div class="sign"><?php echo $user_info['sign']?></div>
        </div>
      </div>
      <div class="right">
        <div class="give">
          获赞数量 20
        </div>
        <button class="edit_user_info">编辑个人资料</button>
      </div>
    </div>
    <div class="post_box">
      <div class="nav">
        <div class="item active">全部文章</div>
        <div class="item">已发布</div>
        <div class="item">审核中</div>
        <div class="item">草稿</div>
        <div class="item">赞</div>
      </div>

      <div class="content-list">
        <?php for ($i = 0; $i < count($post_list); $i++) {
          $item = $post_list[$i];

          ?>
          <a href="./post_details.php?id=<?php echo $item['id'] ?>">
            <div class="item">
              <div class="left">
                <div class="item-tag">
                  <span>木木</span>
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
    </div>
  </div>

  <div class="edit_user_box">
    <div class="edit_user">
      <div class="edit_title">
        <div class="title">编辑个人资料</div>
        <div class="close">关闭</div>
      </div>
      <form action="#" class="edit_form">
        <img src="<?php echo $_SESSION['user_info']['header'] ?>" alt="" class="hander">
        <input type="file" class="header_file"> 
        <div class="item">
          <label for="uname">用户名称：</label>
          <input id="uname" type="text" name="uname" placeholder="请输入用户名称" value="<?php echo $_SESSION['user_info']['uname'] ?>">
        </div>
        <div class="item">
          <label for="sign">个性签名：</label>
          <input id="sign" type="text" name="sign" placeholder="请输入个性签名" value="<?php echo $_SESSION['user_info']['sign'] ?>">
        </div>
        <div class="item">
          <label for="phone">手机号：</label>
          <input id="phone" type="text" name="phone" placeholder="请输入手机号" value="<?php echo $_SESSION['user_info']['phone'] ?>">
        </div>
        <button type="submit">保 存</button>
      </form>
    </div>
  </div>

</body>

<script>
  $(function() {
    $('.edit_user_info').on('click', function() {
      $('.edit_user_box').fadeIn()
    })
    $('.edit_title .close').on('click', function() {
      $('.edit_user_box').fadeOut()
    })

    var file = null
    $('.edit_form .hander').on('click', function() {
      $('.header_file').click()
    })
    $('.header_file').on('change', function() {// 图片变化
      file = this.files[0]
      $('.edit_form .hander').attr('src', URL.createObjectURL(file))
    })

    $('.edit_form').on('submit', function(e) {
      e.preventDefault()

      var formData = getFormData(this)

      var formObj = new FormData()//上传修改文件到后端

      if (file) {
        formObj.append('file', file)
      }
      formObj.append('uname', formData.uname)
      formObj.append('phone', formData.phone)
      formObj.append('sign', formData.sign)


      $.ajax({
        url: './api/user_edit.php',
        type: 'POST',
        // 关闭默认设置
        processData: false,
        contentType: false,
        data: formObj,
        success: function(res) {
          if (res.code === 200) {
            location.reload()
          } else if (res.code === 250) {
            alert('系统发生了错误，请联系管理员！')
          } else {
            alert(res.msg)//关闭弹窗
          }
        }
      })
    })
  })
</script>

</html>