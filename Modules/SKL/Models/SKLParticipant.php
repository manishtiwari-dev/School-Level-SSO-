<?php

namespace Modules\SKL\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKLParticipant extends Model
{
    use HasFactory;
    
    protected $table = 'skl_participants';
    protected $guarded = [
        'id',
    ];

    public function user(){

        return $this->belongsTo(User::class, 'id', 'user_id');
 
    }
}