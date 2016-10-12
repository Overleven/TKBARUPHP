<?php
/**
 * Created by PhpStorm.
 * User: GitzJoey
 * Date: 9/7/2016
 * Time: 12:25 AM
 */

namespace App;

use Vinkla\Hashids\Facades\Hashids;
use \Illuminate\Database\Eloquent\Model;

/**
 * App\Bank
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name
 * @property string $short_name
 * @property string $branch
 * @property string $branch_code
 * @property string $status
 * @property string $remarks
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereShortName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereBranch($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereBranchCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereRemarks($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereUpdatedAt($value)
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereDeletedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bank whereDeletedAt($value)
 */
class Bank extends Model
{
    protected $table = 'bank';

    protected $fillable = [
        'name', 'short_name', 'branch', 'branch_code', 'status', 'remarks'
    ];

    public function hId() {
        return HashIds::encode($this->attributes['id']);
    }

    public function getBankFullNameAttribute() {
        return $this->attributes['name'] . ' ' . '(' .$this->attributes['short_name']. ')';
    }

    public function getBankAccount()
    {
        return $this->hasMany('App\BankAccount');
    }
}