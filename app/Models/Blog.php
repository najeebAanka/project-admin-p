<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Blog
 * 
 * @property int $id
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property string|null $desc_ar
 * @property string|null $desc_en
 * @property string|null $img
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Blog extends Model
{
	protected $table = 'blogs';

	protected $fillable = [
		'name_ar',
		'name_en',
		'desc_ar',
		'desc_en',
		'img'
	];

	public function buildIcon(){
		return $this->img!="" ? asset('storage/blogs/'.$this->img):url('dist/assets/img/empty.png');
	 }

}
