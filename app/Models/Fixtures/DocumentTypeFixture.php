<?php

namespace App\Models\Fixtures;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class DocumentTypeFixture extends Model
{
    use Sushi;

    protected array $rows = [
        ['id' => 1, 'name' => 'Article'],
        ['id' => 2, 'name' => 'E-Book'],
        ['id' => 3, 'name' => 'Documentation'],
        ['id' => 4, 'name' => 'Code Repository'],
        ['id' => 5, 'name' => 'Other'],
    ];
}
