<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function is_new()
    {
        $created = new Carbon($this->created_at);
        $now = Carbon::now();
        $difference = ($created->diff($now)->days < 1) ? 'today' : $created->diffForHumans($now);
        return true ? $difference < 7 : false;
    }
    public function articleDate()
    {
        return $this->created_at->diffForHumans();
    }
    public function tag()
    {
        return $this->BelongsToMany(Tag::class, 'article_tag');
    }
    public function status()
    {
        return $this->is_published ? 'Active' : 'Inactive';
    }
}
