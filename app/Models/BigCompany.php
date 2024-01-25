<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;



class BigCompany extends Model
{
	protected $table = 'big_companies';
	public function buildIcon(){
		return $this->logo_link!="" ? asset('storage/big-companies/'.$this->logo_link):url('dist/assets/img/empty.png');
	 }
}
