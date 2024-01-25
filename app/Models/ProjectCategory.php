<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * Class ProjectCategory
 * 
 * @property int $id
 * @property string|null $name_ar
 * @property string|null $name_en
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ProjectCategory extends Model
{
	protected $table = 'project_categories';

	protected $fillable = [
		'name_ar',
		'name_en'
	];

}
