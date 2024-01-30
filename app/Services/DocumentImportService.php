<?php

namespace App\Services;

use App\Jobs\ProcessDocumentImport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class DocumentImportService
{
    public function importToQueue(UploadedFile $file)
    {   
        $content = file_get_contents($file->getRealPath());
        $data = json_decode($content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Erro ao decodificar o JSON: ' . json_last_error_msg());
        }

        foreach ($data['documentos'] as $documento) {
            ProcessDocumentImport::dispatch($documento);
        }
    }

    public function processQueue()
    {
        return 'Processamento da fila iniciado (Sync driver).';
    }
}
