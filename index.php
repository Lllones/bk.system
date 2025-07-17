<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>学习资源分享网站</title>
  <link rel="stylesheet" href="./style/index.css">
  <link rel="stylesheet" href="./style/jQuery1.8.js">

  <script type="text/javascript" src="style\jQuery1.8.js"></script>
    
</head>

<body>
  <?php
  require './config/database.php';

  require './common/top.php';

  ?>
	
  <!--网页的第一张背景-->
  <div id="first-bk" class="position-ab"></div>
   
   <!--网页重要内容-->
   <div id="content" class="main position-re">
       <div class="bg-carousel position-ab">
           <div id='list' class="pic position-re" style="left: -1200px;">
               <img src="img\uiz21.jpg">
               <img src="img\uiz21.jpg">
           </div>
       </div>

       <!--轮播图左侧的切换菜单 -->
       <div class="menuwrap">
           <ul>
               <li class="menuwrap-option">
                   <a href="#">前端开发<span class="menu-arrow">></span></a>
                   <!--
                       隐藏的div，鼠标移至菜单div显示
                   -->
                   <div class="inner-box img-backg15">
                       <!--分类目录-->
                       <div class="sort-list">
                           <h4 class="title">分类目录</h4>
                           <ul>
                               <li>
                                   <span class="fl">基础 :</span>
                                   <div class="tag-box">
                                       <a href="#">HTML/CSS</a>/
                                       <a href="#">JavaScript</a>/
                                       <a href="#">jQuery</a>
                                   </div>
                               </li>
                               <li>
                                   <span class="fl">进阶 :</span>
                                   <div class="tag-box">
                                       <a href="#">Html5</a>/
                                       <a href="#">CSS3</a>/
                                       <a href="#">Node.js</a>/
                                       <a href="#">AngularJS</a>/
                                       <a href="#">Bootstrap</a>/
                                       <a href="#">React</a>/
                                       <a href="#">Sass/Less</a>/
                                       <a href="#">Vue.js</a>/
                                       <a href="#">WebApp</a>
                                   </div>
                               </li>
                               <li>
                                   <span>其他 :</span><a href="#">前端工具</a>
                               </li>
                           </ul>
                       </div>
                       <!--课程的推荐-->
                       <div class="course-recommend">
                           <h4 class="title">分类目录</h4>
                           <p class="path-recom">
                               <a href="#"><span class="cate-tag">职业路径</span> 前端小白手册</a>
                           </p>
                           <p class="path-recom">
                               <a href="#"><span class="cate-tag">职业路径</span> HTML5与CSS3实现动态网页</a>
                           </p>
                           <p>
                               <a href="#"><span class="cate-tag">实战</span> Vue2.0高级实战-开发移动端音乐App</a>
                           </p>
                           <p>
                               <a href="#"><span class="cate-tag">实战</span> Web前后端漏洞分析与防御</a>
                           </p>
                           <p>
                               <a href="#"><span class="cate-tag">课程</span> 技术分享</a>
                           </p>

                       </div>
                   </div>
               </li>
               <li class="menuwrap-option">
                   <a href="#">后端开发<span class="menu-arrow">></span></a>
                   <!--
                       隐藏的div，鼠标移至菜单div显示
                       内容暂时为空，减少代码量
                   -->
                   <div class="inner-box img-backg16"></div>
               </li>
               <li class="menuwrap-option">
                   <a href="#">移动开发<span class="menu-arrow">></span></a>
                   <div class="inner-box img-backg17"></div>
               </li>
               <li class="menuwrap-option">
                   <a href="#">数据库<span class="menu-arrow">></span></a>
                   <div class="inner-box img-backg18"></div>
               </li>
               <li class="menuwrap-option">
                   <a href="#">云计算&大数据<span class="menu-arrow">></span></a>
                   <div class="inner-box img-backg19"></div>
               </li>
               <li class="menuwrap-option">
                   <a href="#">运维和测试<span class="menu-arrow">></span></a>
                   <div class="inner-box img-backg20"></div>
               </li>
               <li class="menuwrap-option">
                   <a href="#">UI设计<span class="menu-arrow">></span></a>
                   <div class="inner-box img-backg21"></div>
               </li>
           </ul>
       </div>
   </div>
   <!--轮播图下方的图片-->
   <div id="pathBanner" class="path-banner">
       <a href="#"><img src="img\path_1.png"></a>
       <a href="#"><img src="img\path_2.png"></a>
       <a href="#"><img src="img\path_3.png"></a>
       <a href="#"><img src="img\path_4.png"></a>
       <a href="#"><img src="img\path_5.png"></a>
   </div>

</body>

</html>