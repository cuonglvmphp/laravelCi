<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="position-ref full-height">
    <div class="content">
        <div class="span12" style="width: 100%">
            <h3>Time: {{$time}} s</h3>
            <div id="resultPanel" class="span8 borderspan">
                <div id="exTab1" class="panel-body">
                    <div class="resultarea">
                        <h3>Image</h3>
                    </div>
                    <br>
                    <div class="tab-content clearfix">
                        <div class="tab-pane fade in" id="Text">
                            <img src="{{$path}}" width="100%"/>
                        </div>
                    </div>
                </div>
            </div>
            <div id="resultPanel" class="span8 borderspan">
                <div id="exTab1" class="panel-body">
                    <div class="resultarea">
                        <h3>OCR Result</h3>
                    </div>
                    <br>
                    <div class="tab-content clearfix">
                        <div class="tab-pane fade in" id="Text">
                            {!! nl2br($text) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
