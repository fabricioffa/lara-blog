<x-master>

    <h1>My Blog</h1>

    @foreach ($posts as $post)
        <article>
            <h2>
                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
            </h2>

            <p>{{ $post->excerpt }}</h2>
        </article>
    @endforeach

</x-master>
