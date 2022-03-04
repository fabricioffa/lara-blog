<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>
    <h1>My Blog</h1>

    @foreach ($posts as $post)
        <article>
            <h2>
                <a href="/posts/<?= $post->slug ?>"><?= $post->title ?></a>

            </h2>
            <p><?= $post->excerpt ?></h2>
        </article>
    @endforeach

</body>

</html>
