<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Event extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['name', 'slug'];

    protected $keyType = 'string';

    public $incrementing = false;

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = $this->uniqueSlug($name);
    }

    private function uniqueSlug($name)
    {
        $slug = Str::slug($name, '-');
        $count = Event::where('slug', 'LIKE', "{$slug}%")->count();
        $newCount = $count > 0 ? ++$count : '';
        return $newCount > 0 ? "$slug-$newCount" : $slug;
    }

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::created(function ($event) {
    //         $event->slug = $event->createSlug($event->name);
    //         $event->save();
    //     });
    // }

    // private function createSlug($name)
    // {
    //     if (static::whereSlug($slug = Str::slug($name))->exists()) {
    //         $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
    //         if (isset($max[-1]) && is_numeric($max[-1])) {
    //             return preg_replace_callback('/(\d+)$/', function ($mathces) {
    //                 return $mathces [1] + 1;
    //             }, $max);
    //         }
    //         return "{$slug}-2";
    //     }
    //     return $slug;
    // }
}
