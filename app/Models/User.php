<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

	//protected $fillable = ['username', 'password'];
	// Альтернатива указания доступных входящих переменных:
	protected $guarded = [];

	protected $hidden = ['password'];

	// Строим Отношения - связи:

	public function information(): HasOne
	{
		# возвращаем Отношения - Один к одному: Имеет одно
		# указываем Модель, к которой относится:	UserInformation
		//return $this->hasOne(UserInformation::class, 'user_id', 'id');
		// Аргументы можно даже не писать, если там создано как 'user_id': создаётся автоматически
		return $this->hasOne(UserInformation::class);
	}

	// У пользователя может быть множество сообщений-постов:
	// Рекомендуется создавать к таким отношениям имя с окончанием на "s"
	public function posts(): HasMany
	{
		//return $this->hasMany(Post::class, 'owner_id', 'id');
		// 3-й параметр можно опустить, если всё правильно назвали:
		return $this->hasMany(Post::class, 'owner_id');
	}

	// У нас много комментарияев у одного пользователя:
	public function comments(): HasMany
	{
		// Короткий вариант сборки, не указывая других аргументов. Потому что мы всё написали по правилам:
		return $this->hasMany(Comment::class);
	}
}
