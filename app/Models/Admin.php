<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Contracts\Auth\Authenticatable as Authenticable;
class Admin extends Model implements Authenticable
{
    use Authenticatable;
    use HasFactory; 
    protected $guarded =[];
    public $table='admins';
}