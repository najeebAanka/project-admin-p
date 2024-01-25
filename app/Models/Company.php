<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * 
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $icon_img
 * @property string|null $url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $table = 'companies';

	protected $fillable = [
		'name_en',
		'name_ar',
		'icon_img',
		'url',
		'order_index'
	];



	public function buildIcon(){
		return $this->icon_img!="" ? asset('storage/companies/'.$this->icon_img):url('dist/assets/img/empty.png');
	 }
}
