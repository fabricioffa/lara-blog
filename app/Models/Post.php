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
        return collect(File::files(resource_path("posts/")))
        ->map(fn($file) => YamlFrontMatter::parseFile($file))
        ->map(fn($document) => new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug,
        )
    );
    }

    public static function find($fileName): string
    {
        if (!file_exists( $path = resource_path("posts/{$fileName}.html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$fileName}", now() , fn() => file_get_contents($path));


    }
}
