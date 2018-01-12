<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Kategori extends Model {

	//

    protected $table ='kategori';

    public $fillable = ['namaKategori'];

}
