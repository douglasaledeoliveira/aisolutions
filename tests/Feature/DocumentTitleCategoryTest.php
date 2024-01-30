<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Document;
use Tests\TestCase;

class DocumentTitleCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testTitleForRemessaCategory()
    {
        $document = new Document([
            'category_title' => 'Remessa',
            'title' => 'Título sem semestre',
            'contents' => 'Conteúdo'
        ]);

        $this->assertFalse($document->save());
    }

    public function testTitleForRemessaParcialCategory()
    {
        $document = new Document([
            'category_title' => 'Remessa Parcial',
            'title' => 'Título sem mês',
            'contents' => 'Conteúdo'
        ]);

        $this->assertFalse($document->save());
    }
}
