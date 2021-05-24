<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PhotoMa</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/folderList.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body>
    <header>
        <h1>PhotoMa</h1>
        <p>お気に入りの美容師を見つけよう！</p>
    </header>
    <main>
        <h2>フォルダ一覧</h2>
        <div class="folder_list">
            @foreach($folders as $folder)
            <div class="folder">
              <p>{{ $folder->folder_name }}</p>
            </div>
            @endforeach
            <div class="folder box"></div>
        </div>
      </main>
        <div class="back">
            <a href="{{ route('welcome') }}" class="btn">戻る</a>
        </div>
</body>

</html>
