<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8"/>
    <title>Page not found</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <style>
        a {
            color: #2a62bf;
            text-decoration: none
        }

        .page-404 {
            background: #000 !important
        }

        .page-404 .page-inner img {
            right: 0;
            bottom: 0;
            z-index: -1;
            position: absolute
        }

        .page-404 .error-404 {
            color: #fff;
            text-align: left;
            padding: 70px 20px 0
        }

        .page-404 h1 {
            color: #fff;
            font-size: 130px;
            line-height: 160px
        }

        .page-404 h2 {
            color: #fff;
            font-size: 30px;
            margin-bottom: 30px
        }

        .page-404 p {
            color: #fff;
            font-size: 16px
        }

        @media (max-width: 480px) {
            .page-404 .error-404 {
                text-align: left;
                padding-top: 10px
            }

            .page-404 .page-inner img {
                right: 0;
                bottom: 0;
                z-index: -1;
                position: fixed
            }
        }

        .img-responsive {
            display: block;
            max-width: 100%;
            height: auto
        }
    </style>
</head>
<body class="page-404">
<div class="page-inner">
    <img src="{{ asset('/images/error/earth.jpg') }}" class="img-responsive"></div>
<div class="container error-404">
    <h1>404</h1>
    <h2>Houston, we have a problem.</h2>
    <p>找不到您要访问的页面。</p>
    <p>
        <a href="javascript:void(0)" onclick="window.history.back()">返回上一页</a>
        <a href="/"> 回到首页 </a>
        <br>
    </p>
</div>
</body>
</html>
