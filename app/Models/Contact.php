<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property int|null $service_id
 * @property string|null $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Contact extends Model
{
	protected $table = 'contact';

	protected $casts = [
		'service_id' => 'int'
	];

	protected $fillable = [
		'name',
		'phone',
		'service_id',
		'message'
	];
}
