<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 * 
 * @property int $id
 * @property string|null $title_ar
 * @property string|null $title_en
 * @property string|null $domain_ar
 * @property string|null $domain_en
 * @property Carbon|null $date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Job extends Model
{
	protected $table = 'jobs';

	// protected $dates = [
	// 	'date'
	// ];

	protected $fillable = [
		'title_ar',
		'title_en',
		'domain_ar',
		'domain_en',
		'date'
	];
}
