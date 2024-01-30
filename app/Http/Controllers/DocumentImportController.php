<?php

namespace App\Http\Controllers;

use App\Services\DocumentImportService;
use Illuminate\Http\Request;

class DocumentImportController extends Controller
{
    protected $documentImportService;

    public function __construct(DocumentImportService $documentImportService)
    {
        $this->documentImportService = $documentImportService;
    }

    public function importView()
    {
        return view('document_import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'jsonFile' => 'required|file|mimes:json|max:2048',
        ]);

        $file = $request->file('jsonFile');
        $this->documentImportService->importToQueue($file);

        return back()->with('success', 'Importação iniciada com sucesso.');
    }

    public function processQueueView()
    {
        return view('process_queue');
    }

    public function processQueue()
    {
        $this->documentImportService->processQueue();
        return back()->with('success', 'Processamento da fila iniciado.');
    }
}
