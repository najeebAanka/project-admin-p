<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * 
 * @property int $id
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $desc_en
 * @property string|null $desc_ar
 * @property string|null $cover_img
 * @property string|null $icon_img
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'services';

	protected $fillable = [
		'name_en',
		'name_ar',
		'desc_en',
		'desc_ar',
		'cover_img',
		'icon_img',
		'service_file'
	];

	public function buildImage(){
		return $this->cover_img!="" ? asset('storage/services/'.$this->cover_img):url('dist/assets/img/empty.png');
	 }

	 public function buildIcon(){
		return $this->icon_img!="" ? asset('storage/services/'.$this->icon_img):url('dist/assets/img/empty.png');
	 }
	 
	 public function buildFile(){
		return $this->service_file!="" ? asset('storage/services/files/'.$this->service_file):url('dist/assets/img/empty.png');
	 }
}
