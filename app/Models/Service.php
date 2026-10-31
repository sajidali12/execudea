<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'icon',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Question/answer pairs from the "Frequently Asked Questions" section of the content.
     * Each FAQ is an <h3> question followed by a <p> answer.
     */
    public function faqItems(): array
    {
        if (!$this->content || !str_contains($this->content, 'Frequently Asked Questions')) {
            return [];
        }

        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML('<?xml encoding="UTF-8"><body>' . $this->content . '</body>');
        libxml_clear_errors();

        $xpath = new \DOMXPath($doc);
        $faqSection = $xpath->query('//section[.//h2[contains(., "Frequently Asked Questions")]]')->item(0);
        if (!$faqSection) {
            return [];
        }

        $items = [];
        foreach ($xpath->query('.//h3', $faqSection) as $h3) {
            $answer = $xpath->query('following-sibling::p[1]', $h3)->item(0);
            $question = trim(preg_replace('/\s+/', ' ', $h3->textContent));
            if ($answer && $question !== '') {
                $items[] = [
                    'question' => $question,
                    'answer' => trim(preg_replace('/\s+/', ' ', $answer->textContent)),
                ];
            }
        }

        return $items;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
