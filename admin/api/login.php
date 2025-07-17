<?php
session_start();

require '../config/database.php';
require '../config/result.php';

$account = $_POST['account'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM `admin` WHERE account = '$account' AND `password` = '$password'";
$result = mysqli_query($connID, $sql);//生成的为mysql对象
$result = mysqli_fetch_array($result);//mysqli_fetch_array转换php键值对

if (!$result) {
  resCode('账号或者密码出错', 201);//给前端返回信息
}

$_SESSION['admin_id'] = $result['id'];
$_SESSION['admin_info'] = $result;


resCode('登录成功');
