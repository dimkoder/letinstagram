<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hashtag extends Model
{
    use HasFactory;
	public $timestamps = false;

	// Строим Отношения - связи:

	// У хештегов есть посты:
	public function posts(): BelongsToMany
	{
		return $this->belongsToMany(
			Post::class,
			'hashtag_post',
			'hashtag_id',
			'post_id');
	}

}
