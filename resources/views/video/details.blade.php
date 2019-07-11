<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>详情</title>
</head>
<body>
    <h2>{{$info->title}}</h2>
    <video width="80%" height="80%" controls>
        <source src="{{env('HTTP_URL')}}{{$info->path}}" type="video/mp4">
        您的浏览器不支持 HTML5 video 标签。
    </video>
</body>
</html>