<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory, Sluggable;
    protected $guarded=['id'];
    protected $with=['user', 'category'];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }



    // public function scopeFilter($query) {
    //     if(request('search')) {
    //         $query->where('judul', 'like', '%' . request('search') . '%')
    //         ->orWhere('body', 'like', '%' . request('search') . '%');
    //       };
    // }
    public function scopeFilter($query, array $filters) {
        // if(isset($filters['search']) ? $filters['search'] : false) {
        //    return $query->where('judul', 'like', '%' . $filters['search'] . '%')
        //     ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        //   };

          $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' .$search  . '%')
            ->orWhere('body', 'like', '%' . $search . '%');
          });

          $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
          });
    }

    public function category () 
    {
        return $this->belongsTo(category::class);
    }

    public function user () 
    {
        return $this->belongsTo(user::class);
    }

    public function getRouteKeyName()
    {
      return 'slug';
    }
}
