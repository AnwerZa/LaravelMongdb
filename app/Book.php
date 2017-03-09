<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Book extends Eloquent
{

/* to specify db connection and the collection name */
    protected $connection = 'mongodb';
    protected $collection = 'books';


    protected $fillable = [
        'isbn','titre', 'author', 'category'
    ];

}
