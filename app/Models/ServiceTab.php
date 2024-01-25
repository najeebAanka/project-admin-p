<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceTab
 * 
 * @property int $id
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property string|null $desc_ar
 * @property string|null $desc_en
 * @property int|null $service_id
 * 
 * @property Service|null $service
 *
 * @package App\Models
 */
class ServiceTab extends Model
{
	protected $table = 'service_tabs';
	public $timestamps = false;

	protected $casts = [
		'service_id' => 'int'
	];

	protected $fillable = [
		'name_ar',
		'name_en',
		'desc_ar',
		'desc_en',
		'service_id'
	];

	public function service()
	{
		return $this->belongsTo(Service::class);
	}
}
