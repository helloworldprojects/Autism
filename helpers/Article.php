<?php

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	//
	public $timestamps = false;
	protected $table = 'articles';
	protected $fillable = ['name','author','content'];

}