<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSubmissions extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    protected $table = 'images'; // テーブル名を 'images' に設定

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

// 新しいImageSubmissionsインスタンスを作成
$imageSubmission = new ImageSubmissions();

// プロパティに値を設定
$imageSubmission->title = 'New ImageSubmission Title';
$imageSubmission->content = 'This is the content of the new ImageSubmission';

// 作成した画像の投稿をデータベースに保存
$imageSubmission->save();
    