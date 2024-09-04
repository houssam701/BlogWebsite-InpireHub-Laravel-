<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory,SoftDeletes;//we add softdelete
    use Searchable;
    protected $fillable=[
    'title',
    'content',
    'user_id'];
    protected $dates=['deleted_at']; //for softdelete
    public function user(){
        return $this->belongsTo(User::class);
        }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function toSearchableArray(){
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
    public function isReadLater($userId)
    {
    return $this->readLater()->where('user_id', $userId)->exists();
    }

    public function readLater()
    {
        return $this->hasMany(ReadLater::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function isLikedByUser(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}