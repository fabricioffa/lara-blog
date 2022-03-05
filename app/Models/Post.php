<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    use HasFactory;

    public function __construct(
        public string $title,
        public string $excerpt,
        public int $date,
        public string $body,
        public string $slug)
    {
    }

    public static function getAll()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts/")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug,
            ))
            ->sortByDesc('date');
        });
    }

    public static function find($slug)
    {
        return self::getAll()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {

        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}
