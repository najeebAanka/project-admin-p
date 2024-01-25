<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SiteSetting
 * 
 * @property int $id
 * @property string|null $key
 * @property string|null $value_ar
 * @property string|null $value_en
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class SiteSetting extends Model
{
	protected $table = 'site_settings';

	protected $fillable = [
		'key',
		'value_ar',
		'value_en'
	];
}
