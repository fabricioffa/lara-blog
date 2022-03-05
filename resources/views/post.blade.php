<x-master>

    <h1>My Blog</h1>

    <article>
        <h2> {{ $post->title }} </h2>
        {!! $post->body !!}
    </article>

    <a href="/">Go back</a>

</x-master>
