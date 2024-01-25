<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Testimonial
 * 
 * @property int $id
 * @property string|null $short_desc_ar
 * @property string|null $short_desc_en
 * @property string|null $desc_ar
 * @property string|null $desc_en
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property string|null $company_name_ar
 * @property string|null $company_name_en
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Testimonial extends Model
{
	protected $table = 'testimonials';

	protected $fillable = [
		'short_desc_ar',
		'short_desc_en',
		'desc_ar',
		'desc_en',
		'name_ar',
		'name_en',
		'company_name_ar',
		'company_name_en'
	];
}
