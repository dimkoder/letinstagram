<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;
	protected $guarded = [];
	public $timestamps = false;

	// Строим Отношения - связи:
	public function post(): BelongsTo
	{
		// Пишем к чему относится:
		//return $this->belongsTo(Post::class, 'post_id');
		// 2-й параметр можно опустить, если всё правильно назвали:
		return $this->belongsTo(Post::class);
	}

}
