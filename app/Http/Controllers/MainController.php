<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class MainController extends Controller
{
	public function index(Request $request): View
	{
		return view('welcome');
	}

	public function register(Request $request): \Illuminate\Http\RedirectResponse
	{
		//dd(Hash::make($request->get('password')));
		/** @var User $user */
//		dump($request->all());
		$user = User::create([
			// username - наше имя в базе данных
			'username' => $request->get('username'),
			'password' => Hash::make($request->get('password'))
		]);
//		dump($user);
//		dd($user->getAttributes()['id']);

		// Вариант добавления данных считается грубым:
//		UserInformation::create([
//			'user_id' => $user->id,
//			'name' => $request->get('name'),
//			'birthday' => $request->date('birthday')
//		]);

		// Рекомендуют вставлять данные так:
		$user->information()->create([
			'name' 			=> $request->get('name'),
			'ip_address' 	=> $_SERVER['REMOTE_ADDR'],
			'birthday' 		=> $request->date('birthday')
		]);

		return to_route('home');
	}

	//Получить пользователя по id-номеру:
	public function profile(int $id): View
	{
		// Найти пользователя в базе данных по айдишнику:
		//$user = User::find($id);
		//$user = User::where('id', $id);
		//$user = User::where('id', $id)->toSql();
		$user = User::where('id', $id)->first();
		// Информация о пользователе:
		// Неправильный сбор информации:
		//dd($user->information()->get());
		dd($user->information->birthday->format('d.m.Y'));
		//dd($user->information);	// Вызов метода information() из класса User
		// Показать сообщения пользователя, вызвав метод posts() из класса User:
		//dd($user->posts);
		return view('profile');
	}

	public function index_first(Request $request): View
	{
		//return view('welcome');
		$query = $request->all();
		$img_text = '<img src="https://dima.lh1.in/ocean.jpg" width="200"/>';
		return view('welcome', compact('query', 'img_text'));
	}
	public function php(Request $request) {
		dd($request);	// Вывести все входные данные
	}
}
