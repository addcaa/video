<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页</title>
</head>
<body>
 @foreach($arr as $v)
     <p><a href="/video/details?vid={{$v->vid}}">{{$v->title}} </a>
     <video width="320" height="240" controls>
         <source src="/storage/{{$v->path}}" type="video/mp4">
         您的浏览器不支持 HTML5 video 标签。
     </video>
     </p>
 @endforeach
</body>
</html>