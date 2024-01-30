<?php

namespace App\Repositories;

use App\Models\Document;

class DocumentRepository
{
    public function create(array $data)
    {
        return Document::create($data);
    }
}
