<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\VideoResource;

class VideoController extends Controller
{
    public function index(VideoResource $videoResource)
    {
        return view('admin.resources.videos.index')->with([
            'videos' => $videoResource->getAllVideos(),
        ]);
    }

    public function create()
    {
        return view('admin.resources.videos.create');
    }

    public function edit(VideoResource $video)
    {
        return view('admin.resources.videos.edit')->with([
            'video' => $video,
        ]);
    }

    public function store(VideoRequest $request, VideoResource $video)
    {
        if ($video->createVideo($request->validated())) {
            return redirect()->route('admin.manage-videos')->with([
                'alert_type' => 'success',
                'alert_message' => 'Video added successfully.',
            ]);
        } else {
            return redirect()->route('admin.manage-videos')->with([
                'alert_type' => 'danger',
                'alert_message' => 'An error occurred while adding the video.',
            ]);
        }
    }

    public function update(VideoResource $video, VideoRequest $request)
    {
        if ($video->updateVideo($video, $request->validated())) {
            return redirect()->route('admin.manage-videos')->with([
                'alert_type' => 'success',
                'alert_message' => 'Video edited successfully.',
            ]);
        } else {
            return redirect()->route('admin.manage-videos')->with([
                'alert_type' => 'danger',
                'alert_message' => 'An error occurred while editing the video.',
            ]);
        }
    }

    public function destroy(VideoResource $video)
    {
        if ($video->delete()) {
            return back()->with([
                'alert_type' => 'success',
                'alert_message' => 'Video removed successfully.',
            ]);
        } else {
            return back()->with([
                'alert_type' => 'danger',
                'alert_message' => 'An error occurred while removing the video.',
            ]);
        }
    }
}
