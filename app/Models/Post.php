<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category', 'author']; // substitui o with e o load

    // protected $fillable = ['title', 'excerpt', 'body'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search)  =>
            $query->where(fn ($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
        ));

        // $query->when($filters['category'] ?? false, fn ($query, $category)  =>
        //     $query
        //         ->where('title', 'like', '%' . $category . '%')
        //         ->orWhere('body', 'like', '%' . $category . '%')
        // );

        $query->when($filters['category'] ?? false, fn ($query, $category)  =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when($filters['author'] ?? false, fn ($query, $author)  =>
            $query->whereHas('author', fn($query) => $query->where('username', $author))
        );

        // $query->when($filters['category'] ?? false, fn ($query, $category)  =>
        //     $query
        //         ->whereExists(fn($query) =>
        //             $query->from('categories')
        //                 ->whereColumn('categories.id', 'posts.category_id')
        //                 ->where('categories.slug', $category)
        //     )
        // );

        // if ($filters['search'] ?? false) {
        //     $query
        //         ->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
