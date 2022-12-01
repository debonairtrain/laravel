<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $guarded = [];
    protected $appends = [
        'fullName'
    ];

    public function saveProfile($data): bool
    {
        /** @var Admin $admin */
        $admin = auth('web_admins')->user();

        $admin->firstname = Str::title($data['firstname']);
        $admin->lastname = Str::title($data['lastname']);
        $admin->email = Str::lower($data['email']);
        $admin->phone = $data['phone'];

        if (! empty($data['password'])) {
            $admin->password = bcrypt($data['password']);
        }

        return $admin->save();
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::title($this->firstname.' '.$this->lastname)
        );
    }
}
