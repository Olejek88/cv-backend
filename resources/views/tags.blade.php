<?php
use App\Tag;
use Collective\Html\FormBuilder;
?>
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Теги</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Теги
        </div>

        <div class="links">
            <?php
            /** @var Tag $tags */
            foreach ($tags as $tag) {
                echo $tag->title;
            }
            ?>
        </div>
        <div class="links">
            <?php
            $tag = new Tag();
            //echo Form::model($tag, ['route' => ['tags/add','request' => $tag]]);
            //echo Form::model($tag, array('route' => array('tags/add', $tag)));
            //echo Form::submit('Добавить');
            echo Form::open(array('url' => 'tags/add'));
            echo Form::text('title', 'тег');
            echo Form::submit('Добавить');
            echo Form::close();
            ?>
        </div>
    </div>
</div>
</body>
</html>
