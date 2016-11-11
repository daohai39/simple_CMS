<?php
namespace App\Traits;

use App\Document;

trait HasDocuments
{
    public function documents()
    {
        return $this->morphToMany(Document::class, 'mediable', 'mediables', 'mediable_id', 'media_id')
            ->where('tag', 'document')
            ->withPivot('tag', 'order')
            ->orderBy('order');
    }

    public function syncDocuments($documents_id)
    {
        return $this->syncMedia($documents_id, 'document');
    }
}
