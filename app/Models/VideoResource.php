<?php

namespace App\Models;

use App\Models\Fixtures\VideoStatusFixture;
use App\Models\Fixtures\VideoTypeFixture;
use DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;

class VideoResource extends Model
{
    use HasFactory;

    const PAGINATION_COUNT = 25;

    protected $guarded = [];

    protected $dates = [
        'uploaded_at',
    ];

    public function getLatestVideo(): ?Model
    {
        return $this->query()
            ->with(['department', 'videoStatus', 'videoType'])
            ->when(auth()->check(), fn (Builder $builder) => $builder
                ->where('department_id', auth()->user()->department_id)
            )
            ->latest()
            ->first();
    }

    public function getAllVideos(): LengthAwarePaginator
    {
        return $this->query()
            ->with(['department', 'videoStatus', 'videoType'])
            ->when(auth()->check(), fn (Builder $builder) => $builder
                ->where('department_id', auth()->user()->department_id)
            )
            ->latest()
            ->paginate(self::PAGINATION_COUNT);
    }

    public function createVideo($data): bool
    {
        try {
            DB::transaction(function () use ($data) {
                $video = $this->query()->create([
                    'video_title' => Str::title($data['title']),
                    'video_type' => $data['type'],
                    'video_url' => $data['url'],
                    'department_id' => $data['department'],
                    'uploaded_at' => now(),
                    'status' => $data['status'],
                ]);

                $video->resources()->create();
            });

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    public function updateVideo(self $video, $data): bool
    {
        try {
            DB::transaction(function () use ($video, $data) {
                $video->video_title = Str::title($data['title']);
                $video->video_type = $data['type'];
                $video->video_url = $data['url'];
                $video->department_id = Str::lower($data['department']);
                $video->status = $data['status'];

                $video->save();

                $video->resources()->touch();
            });

            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    public function videoUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str_replace(['http:', 'https:'], '', $value)
        );
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function videoStatus(): BelongsTo
    {
        return $this->belongsTo(VideoStatusFixture::class, 'status', 'id');
    }

    public function videoType(): BelongsTo
    {
        return $this->belongsTo(VideoTypeFixture::class, 'video_type', 'id');
    }

    public function resources(): MorphMany
    {
        return $this->morphMany(Resource::class, 'resourceable');
    }
}
