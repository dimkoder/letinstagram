<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

	protected $guarded = [];

	// Строим Отношения - связи:
	// указали, что: У комментария есть создатель
	public function author(): BelongsTo
	{
		// Пишем к чему относится:
		// Короткий вариант сборки, не указывая других аргументов:
		return $this->belongsTo(User::class);
		// Возможно, хотели написать так:
		//return $this->belongsTo(Post::class, 'post_id');
	}

	public function post(): BelongsTo
	{
		// Пишем к чему относится:
		// Короткий вариант сборки, не указывая других аргументов:
		return $this->belongsTo(Post::class);
		// Возможно, хотели написать так:
		//return $this->belongsTo(Post::class, 'post_id');
	}
}
