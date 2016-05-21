<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable {
	use \Illuminate\Auth\Authenticatable;

	protected $table = "users";

	protected $fillable = [
		'username',
		'email',
		'password',
		'full_name',
		'birth_date',
		'site',
		'bio',
	];

	public function posts() {
		return $this->hasMany('App\Post');
	}

	public function likes() {
		return $this->belongsToMany(Post::class, 'likes');
	}

	public function comment() {
		return $this->hasMany('App\Comment');
	}
}
