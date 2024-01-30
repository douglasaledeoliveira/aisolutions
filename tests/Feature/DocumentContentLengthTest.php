<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Document;
use Tests\TestCase;

class DocumentContentLengthTest extends TestCase
{

    use RefreshDatabase;

    public function testContentLength()
    {
        $longContent = str_repeat('a', 1001); // 1001 characters, tamanho de exemplo

        $document = new Document([
            'contents' => $longContent,
        ]);

        $this->assertFalse($document->save());
    }
}
