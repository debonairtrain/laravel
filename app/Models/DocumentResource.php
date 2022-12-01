<?php

namespace App\Models;

use App\Models\Fixtures\DocumentStatusFixture;
use App\Models\Fixtures\DocumentTypeFixture;
use DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class DocumentResource extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    const PAGINATION_COUNT = 25;

    protected $guarded = [];

    protected $dates = [
        'uploaded_at',
    ];

    public function getAllDocuments(): LengthAwarePaginator
    {
        return $this->query()
            ->with(['department', 'documentStatus', 'documentType'])
            ->when(auth()->check(), fn (Builder $builder) => $builder
                ->where('department_id', auth()->user()->department_id)
            )
            ->latest()
            ->paginate(self::PAGINATION_COUNT);
    }

    public function createDocument($data): bool
    {
        try {
            DB::transaction(function () use ($data) {
                $document = $this->query()->create([
                    'document_title' => Str::title($data['title']),
                    'document_type' => $data['type'],
                    'description' => Str::title($data['description']),
                    'department_id' => $data['department'],
                    'uploaded_at' => now(),
                    'status' => $data['status'],
                ]);

                if (! empty($data['document_file'])) {
                    foreach ($data['document_file'] as $media) {
                        $document->addMedia($media)
                            ->toMediaCollection('documents');
                    }
                }

                $document->resources()->create();
            });

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    public function updateDocument(self $document, $data): bool
    {
        try {
            DB::transaction(function () use ($document, $data) {
                $document->document_title = Str::title($data['title']);
                $document->document_type = $data['type'];
                $document->description = Str::title($data['description']);
                $document->department_id = $data['department'];
                $document->status = $data['status'];

                $document->save();

                if (! empty($data['document_file'])) {
                    foreach ($data['document_file'] as $media) {
                        $document->addMedia($media)
                            ->toMediaCollection('documents');
                    }
                }

                $document->resources()->touch();
            });

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    public function resources(): MorphMany
    {
        return $this->morphMany(Resource::class, 'resourceable');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function documentStatus(): BelongsTo
    {
        return $this->belongsTo(DocumentStatusFixture::class, 'status', 'id');
    }

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentTypeFixture::class, 'document_type', 'id');
    }

    // MEDIA
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('documents');
    }
}
