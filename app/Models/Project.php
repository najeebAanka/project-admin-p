<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 * 
 * @property int $id
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property string|null $short_desc_ar
 * @property string|null $short_desc_en
 * @property string|null $desc_ar
 * @property string|null $desc_en
 * @property string|null $img
 * @property string|null $client_ar
 * @property string|null $client_en
 * @property string|null $status_ar
 * @property string|null $status_en
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property int|null $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ProjectCategory|null $project_category
 *
 * @package App\Models
 */
class Project extends Model
{
	protected $table = 'projects';

	protected $casts = [
		'category_id' => 'int'
	];

	// protected $dates = [
	// 	'start_date',
	// 	'end_date'
	// ];

	protected $fillable = [
		'name_ar',
		'name_en',
		'short_desc_ar',
		'short_desc_en',
		'desc_ar',
		'desc_en',
		'img',
		'client_ar',
		'client_en',
		'status_ar',
		'status_en',
		'start_date',
		'end_date',
		'category_id'
	];
	public function buildImage(){
		return $this->img!="" ? asset('storage/projects/'.$this->img):url('dist/assets/img/empty.png');
	 }

	public function project_category()
	{
		return $this->belongsTo(ProjectCategory::class, 'category_id');
	}
	
}
