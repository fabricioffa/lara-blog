<x-master>

    <h1>My Blog</h1>

    @foreach ($posts as $post)
        <article>
            <h2>
                <a href="/posts/{{ $post->id }}">{!! $post->title !!}</a>
            </h2>

            <p>
                By
                <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
                in
                <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>

            <div>{{ $post->excerpt }}</div>
        </article>
    @endforeach

</x-master>
