<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjectImage
 * 
 * @property int $id
 * @property int $project_id
 * @property string $image
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Project $project
 *
 * @package App\Models
 */
class ProjectImage extends Model
{
	protected $table = 'project_images';

	protected $casts = [
		'project_id' => 'int'
	];

	protected $fillable = [
		'project_id',
		'image'
	];

	public function project()
	{
		return $this->belongsTo(Project::class, 'project_id');
	}

	public function buildIcon(){
		return $this->image!="" ? asset('storage/projects/'.$this->image):url('dist/assets/img/empty.png');
	 }
}
