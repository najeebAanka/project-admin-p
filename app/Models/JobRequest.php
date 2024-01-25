<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JobRequest
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $cv
 * @property string|null $message
 * @property int|null $job_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class JobRequest extends Model
{
	protected $table = 'job_request';

	protected $casts = [
		'job_id' => 'int'
	];

	protected $fillable = [
		'name',
		'email',
		'phone',
		'cv',
		'message',
		'job_id'
	];
}
