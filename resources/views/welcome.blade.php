<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PhotoMa</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/welcome.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="title">
            <h1>PhotoMa</h1>
            <p>お気に入りの美容師を見つけよう！</p>
        </div>
        <div class="main">
            <h2>美容師一覧</h2>
            <div class="user_list">
                @foreach($users as $user)
                <div>
                    <img src="{{ $user -> profile_image_path }}" alt="" width="160">
                    <h3>{{ $user -> name }}</h3>
                    <p>{{ $user -> salon }}</p>
                </div>
                @endforeach
                <a href="{{ route('userList') }}">
                    <div>
                        <img src="image/arrow.png" alt="" width="160">
                        <p class="text">全ての美容師を見る</p>
                    </div>
                </a>
            </div>
            <h2>公開フォルダ一覧</h2>
            <div class="folder_list">
                @foreach($folders as $folder)
                <a href="">
                    <div class="folder">
                        <p>{{ $folder -> folder_name }}</p>
                    </div>
                </a>
                @endforeach
                <a href="{{ route('folderList') }}">
                    <img src="image/arrow.png" alt="" width="160">
                    <p class="text">全てのスタイルを見る</p>
                </a>
            </div>
        </div>
        </body>
        </html>
        