<?php
#连接数据库
$conn=mysqli_connect('localhost','root','123456','php_db');
#设置编码
mysqli_query($conn,'set names utf8');


#接收前台传过来的id值，查询出相应的内容
$id=$_GET['id'];

#设置一个数组，里面放置接口常用的字段
$port=array('status'=>'0','msg'=>'failed','data'=>'');

//把数据库里面查询出来的内容放置到一个空数组中，后面备用
$data=array();
$sql="select * from cat where cat_id=".$id;
$result=mysqli_query($conn,$sql);
$r=mysqli_fetch_assoc($result);


$port['data']=$r;
$port['status']='2';
$port['msg']='success';

//把最后的结果转换成一个json数据
print_r(json_encode($port));

#然后直接把url访问地址给前端就行
//http://127.0.0.1/port.php?id=2

#当然后端还得编写一份接口文档给前端，介绍每个字段作用，接口实例，取值范围等等。这里就不做深究，因为是入门级的内容。
