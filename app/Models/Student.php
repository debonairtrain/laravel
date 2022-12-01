<?php

namespace App\Models;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Student extends Authenticatable
{
    const PAGINATION_COUNT = 25;

    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'fullName',
    ];

    public function saveProfile($data): bool
    {
        /** @var Student $student */
        $student = auth()->user();

        $student->lastname = Str::title($data['lastname']);
        $student->firstname = Str::title($data['firstname']);
        $student->email = Str::lower($data['email']);
        $student->phone = $data['phone'];

        if (! empty($data['password'])) {
            $student->password = bcrypt($data['password']);
        }

        return $student->save();
    }

    public function createStudent($data): bool
    {
        return $this->query()->create([
            'student_number' => Str::upper($data['student_number']),
            'firstname' => Str::title($data['firstname']),
            'lastname' => Str::title($data['lastname']),
            'email' => Str::lower($data['email']),
            'phone' => $data['phone'],
            'level_id' => $data['level'],
            'department_id' => $data['department'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function updateStudent(self $student, $data): bool
    {
        $student->firstname = Str::title($data['firstname']);
        $student->lastname = Str::title($data['lastname']);
        $student->email = Str::lower($data['email']);
        $student->phone = $data['phone'];
        $student->level_id = $data['level'];
        $student->department_id = $data['department'];

        if (! empty($data['password'])) {
            $student->password = bcrypt($data['password']);
        }

        return $student->save();
    }

    public function getAllStudents(): LengthAwarePaginator
    {
        return $this->query()
            ->with(['department'])
            ->latest()
            ->paginate(self::PAGINATION_COUNT);
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => Str::title($this->firstname.' '.$this->lastname)
        );
    }

    public function assessments(): HasMany
    {
        return $this->hasMany(Assessment::class);
    }

    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
