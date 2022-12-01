<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\DocumentResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DocumentController extends Controller
{
    public function index(DocumentResource $documentResource)
    {
        return view('admin.resources.documents.index')->with([
            'documents' => $documentResource->getAllDocuments(),
        ]);
    }

    public function create()
    {
        return view('admin.resources.documents.create');
    }

    public function show(DocumentResource $document)
    {
        return view('admin.resources.documents.show')->with([
            'document' => $document->load(['documentType', 'documentStatus', 'media']),
        ]);
    }

    public function edit(DocumentResource $document)
    {
        return view('admin.resources.documents.edit')->with([
            'document' => $document,
        ]);
    }

    public function store(DocumentRequest $request, DocumentResource $document)
    {
        if ($document->createDocument($request->validated())) {
            return redirect()->route('admin.manage-documents')->with([
                'alert_type' => 'success',
                'alert_message' => 'Document added successfully.',
            ]);
        } else {
            return redirect()->route('admin.manage-documents')->with([
                'alert_type' => 'danger',
                'alert_message' => 'An error occurred while adding the document.',
            ]);
        }
    }

    public function update(DocumentResource $document, DocumentRequest $request)
    {
        if ($document->updateDocument($document, $request->validated())) {
            return redirect()->route('admin.manage-documents')->with([
                'alert_type' => 'success',
                'alert_message' => 'Document edited successfully.',
            ]);
        } else {
            return redirect()->route('admin.manage-documents')->with([
                'alert_type' => 'danger',
                'alert_message' => 'An error occurred while editing the document.',
            ]);
        }
    }

    public function destroy(DocumentResource $document)
    {
        if ($document->delete()) {
            return back()->with([
                'alert_type' => 'success',
                'alert_message' => 'Document removed successfully.',
            ]);
        } else {
            return back()->with([
                'alert_type' => 'danger',
                'alert_message' => 'An error occurred while removing the document.',
            ]);
        }
    }

    public function downloadMedia(Media $media)
    {
        return $media;
    }

    public function destroyMedia(Media $media)
    {
        if ($media->delete()) {
            return back()->with([
                'alert_type' => 'success',
                'alert_message' => 'File removed successfully.',
            ]);
        } else {
            return back()->with([
                'alert_type' => 'danger',
                'alert_message' => 'An error occurred while removing the file.',
            ]);
        }
    }

}
