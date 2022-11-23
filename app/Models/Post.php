<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

	// Строим Отношения - связи:
	// указали, что: У сообщения есть создатель
	public function owner(): BelongsTo
	{
		// Пишем к чему относится:
		//return $this->belongsTo(User::class, 'owner_id', 'id');
		// Можно написать короче: потому что всё это уже есть у User
		return $this->belongsTo(User::class, 'owner_id');
	}

	// Чтобы из поста получиить все фотографии:
	public function photos(): HasMany
	{
		// В одном посте может быть много фотографий:
		//return $this->hasMany(Photo::class, 'post_id');
		// 2-й параметр можно опустить, так как мы всё правильно назвали: Это избыточно
		return $this->hasMany(Photo::class);
	}

	public function hashtags(): BelongsToMany
	{
		return $this->belongsToMany(
			Hashtag::class,
			'hashtag_post',
			'post_id',
			'hashtag_id');
	}

	// Перевязать эти комментарии внутри поста и внутри юзера

	// У нас много комментарияев у одного поста:
	public function comments(): HasMany
	{
		// Короткий вариант сборки, не указывая других аргументов. Потому что мы всё написали по правилам:
		return $this->hasMany(Comment::class);
	}

}
