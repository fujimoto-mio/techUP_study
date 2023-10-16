<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image_path', 'comment', 'user_id'];

    // 1つの投稿は1つのユーザーに関連付けられている関係を表現
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 画像のURLを取得するメソッド
    public function getImageUrl()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }

        return null;
    }

    // 複数のレビューに関連する関係を表現
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // ユーザーとの多対多の関係（いいね）を表現
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }

    // いいねの数を返すメソッド
    public function likeCount()
    {
        return $this->likes()->count();
    }
}
