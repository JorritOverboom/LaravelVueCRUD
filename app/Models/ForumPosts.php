<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forum_posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['postName', 'postContent', 'usersId'];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(ForumUser::class, 'usersId');
    }
}
