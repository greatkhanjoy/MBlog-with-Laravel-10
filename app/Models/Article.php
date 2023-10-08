<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'excerpt',
        'description',
        'user_id',
        'category_id',
        'status',
        'views',
        'is_featured',
        'is_trending',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function category():BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => $this->makeDescriptionContent($value),
        );
    }



    /**
     * Write code on Method
     *
     * @return response()
     */

    protected function setDescriptionAttribute($value)
    {
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($value, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_use_internal_errors(false);
        $imageFile = $dom->getElementsByTagName('img');
        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            $dataParts = explode(';', $data);
            if (isset($dataParts[1])) {
                $imageDataParts = explode(',', $dataParts[1]);
                if (isset($imageDataParts[1])) {
                    $imageData = base64_decode($imageDataParts[1]);
                    $imageName = "/uploads/articles/" . time() . $item . '.png';
                    $path = public_path() . $imageName;
                    file_put_contents($path, $imageData);
                    $image->removeAttribute('src');
                    $image->setAttribute('src', $imageName);
                }
            }
        }
        $this->attributes['description'] = $dom->saveHTML();
    }
}
