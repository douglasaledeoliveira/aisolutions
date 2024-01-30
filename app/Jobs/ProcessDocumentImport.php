<?php

namespace App\Jobs;

use App\Models\Document;
use App\Repositories\DocumentRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessDocumentImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $documentData;

    public function __construct(array $documentData)
    {
        $this->documentData = $documentData;
    }

    public function handle(DocumentRepository $documentRepository)
    {
        $documentRepository->create($this->documentData);
    }
}
