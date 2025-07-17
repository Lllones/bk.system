<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>写文章</title>
  <link rel="stylesheet" href="./style/common.css">
  <link rel="stylesheet" href="./style/post_edit.css">

  <script src="./js/wangEditor.min.js"></script>
  <script src="./js/jquery-3.6.0.min.js"></script>
  <script src="./js/common.js"></script>
</head>

<body>
  <?php
  require './config/database.php';

  require './common/top.php';
  $id = $_GET['id'];

  $sql = "SELECT * FROM `post_type` WHERE `status` = 1";
  $post_type_list = mysqli_query($connID, $sql);
  $post_type_list = mysqli_fetch_all($post_type_list, MYSQLI_ASSOC);

  
  ?>
  <div class="content">
    <form class="post_form">
      <div class="type_select">
        <label for="">文章类型</label>
        <select name="post_type_id" id="">
          <?php for ($i = 0; $i < count($post_type_list); $i++) { ?>
            <?php if ($post_details['post_type_id'] == $post_type_list[$i]['id']) { ?>
              <option value="<?php echo $post_type_list[$i]['id'] ?>" selected>
                <?php echo  $post_type_list[$i]['name'] ?>
              </option>
            <?php } else { ?>
              <option value="<?php echo $post_type_list[$i]['id'] ?>">
                <?php echo  $post_type_list[$i]['name'] ?>
              </option>
            <?php } ?>
          <?php } ?>
        </select>
      </div>
      <input type="text" name="title" class="titl_input" placeholder="请输入文章标题">
    </form>
    <div id="editor"></div>

    <div class="btn_box">
      <button class="normal_btn post_save">保存草稿</button>
      <button class="post_sbmit">提交审核</button>
    </div>
  </div>

</body>

<script>
  const E = window.wangEditor
  const editor = new E("#editor")
  // editor.config.uploadImgServer = '/api/upload-img.php'//上传图片
  // editor.config.uploadVideoServer = '/api/upload-video.php'//上传视频
  editor.create()

  $(function() {
    $('.post_sbmit').on('click', function() {
     submit(1)

    })
    $('.post_save').on('click', function() {
     submit(0)

    })
    function submit(status){
      var formData = getFormData('.post_form')
      formData['html'] = editor.txt.html()
      formData['status'] = status
      
      $.ajax({
        url:'./api/create_post.php',
        type: 'POST',
        data:formData,
        success:function(res) {
          if (res.code === 200) {
            if(status === 1){
                alert('文章提交成功,正在审核中...') 
            }else{
                alert('文章保存成功')
            }
            location.href = './user.php'
          } else if (res.code === 250) {
            alert('系统发生了错误，请联系管理员！')
          } else {
            alert(res.msg)
          }
        }
      })
    } 

  })

</script>

</html>