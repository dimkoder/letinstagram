<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInformation extends Model
{
    use HasFactory;

	//protected $fillable = ['bio', 'ip_address', 'name', 'birthday'];
	// Альтернатива указания доступных входящих переменных:
	protected $guarded = [];
	protected $casts = [
		'birthday' => 'datetime:d.m.Y'
	];

	// Строим Отношения - связи:
	public function user(): BelongsTo
	{
		//return $this->belongsTo(User::class, 'user_id');
		// Пишем к чему относится:
		return $this->belongsTo(User::class);
	}
}
