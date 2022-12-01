<?php

namespace App\Models\Fixtures;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class VideoStatusFixture extends Model
{
    use Sushi;

    protected array $rows = [
        ['id' => 1, 'name' => 'Draft'],
        ['id' => 2, 'name' => 'Uploaded'],
    ];
}
