<?php

namespace App\Models\Fixtures;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class VideoTypeFixture extends Model
{
    use Sushi;

    protected array $rows = [
        ['id' => 1, 'name' => 'Tutorial'],
        ['id' => 2, 'name' => 'Course'],
        ['id' => 3, 'name' => 'Other'],
    ];
}
