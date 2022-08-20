<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ROLE = array(
        "admin"     => "ADMIN",
        "productowner"     => "PRODUCT_OWNER",
        "teammember"     => "TEAM_MEMBER",
    );
}
