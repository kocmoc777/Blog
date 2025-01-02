<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; // specify the table name if it's not the plural form
    protected $fillable = ['title', 'content', 'category_id', 'user_id'];


    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags','post_id', '');
    }
}





//
//namespace App\Models;
//
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
//
//class Post extends Model
//{
//
//    use HasFactory;
//    protected $table = 'post';
//    protected $guarded = false;
//}
