<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class Post extends Model
{

    use Sluggable;

    const IS_DRAFT = 0;
    const  IS_PUBLIC = 1;
    const IMG_SRC = '/images/';

    protected $fillable = ['title', 'content', 'date', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
//        теперь я смогу делать такую штуку
//        $post = Post::find(1);
//        $post->category()->title - связь с категорией по hasOne

    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'post_tags', // таблица
            'post_id', // id этой (пост) модели
            'tag_id' // id таблицы, с которой связываюсь - тэги $post->tags - все тэги
        );
    }

    // translit! автоматический
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = \Auth::user()->id;
        $post->save();

        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        // удалить сопутствующие связи
        $this->removeImage();
        $this->delete();
    }

    public function getImage()
    {
        if ($this->image == null) {
            return '/images/no-image.jpg';
        }

        return $this->image;

    }

    public function getResizeImage($resolution)
    {
        return Helpers::getResizeImage($resolution, $this);
    }

    /**
     * @return mixed
     */

    public function setCategory($id)
    {
        if ($id == null) { return; }

        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if ($ids == null) { return; }

        $this->tags()->sync($ids);
    }

    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value == null) {
            return $this->setDraft();
        }

        return $this->setPublic();
    }

    public function setFeatured()
    {
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        if ($value == null) {
            return $this->setStandart();
        }

        return $this->setFeatured();
    }

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;

    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
        return $date;

    }

    public function getCategoryTitle()
    {

        return ($this->category != null)
            ? $this->category->title
            : 'без категории';
    }
    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function getTagsTitles()
    {
        if (!$this->tags->isEmpty()) {
            return implode(', ', $this->tags->pluck('title')->all());
        }
        return 'нет тэгов';
    }

    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }

    public function hasPrevious()
    {
        return  self::where('id', '<', $this->id)->select('id')->max('id');
    }
    public function hasNext()
    {
        return  self::where('id', '>', $this->id)->select('id')->min('id');
    }

    public function getPrevious()
    {
        $postID = $this->hasPrevious();

//        return self::find($postID);
        $prevPost = self::find($postID)->select('id' ,'slug', 'image', 'title')->first();
        return $prevPost;

    }
    public function getNext()
    {
        $postID = $this->hasNext();
        $nextPost = self::find($postID)->select('id' ,'slug', 'image', 'title')->first();
        return $nextPost;

    }

    public function related()
    {
        return self::whereStatus(1)
            ->select('id', 'title', 'slug', 'image')->get()->except($this->id);
//        return self::all()->except($this->id);
    }

    public function hasCategory()
    {
        return $this->category != null ? true : false;
    }

    public static function getPopularPosts()
    {
        return self::where('status', 1)->orderBy('views', 'desc')->take(3)->get();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getComments()
    {
        return $this->comments()->where('status', 1)->get();
    }

}
