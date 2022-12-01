<?php

namespace App\Models\Fixtures;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class LevelFixture extends Model
{
    use Sushi;

    protected array $rows = [
        ['id' => 1, 'name' => '100 Level'],
        ['id' => 2, 'name' => '200 Level'],
        ['id' => 3, 'name' => '300 Level'],
        ['id' => 4, 'name' => '400 Level'],
        ['id' => 5, 'name' => '500 Level'],
    ];
}
