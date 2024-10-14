<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlumniGallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'alumni_gallery';

    protected $guarded = ['id'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function images()
    {
        return $this->hasMany(ImageGalleriesAlumi::class, 'fk_idGallery');
    }
}
