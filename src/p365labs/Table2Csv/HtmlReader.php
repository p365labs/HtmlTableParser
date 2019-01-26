<?php declare(strict_types=1);

namespace App\p365labs\Table2Csv;

use App\p365labs\Table2Csv\HtmlTableParsing\ParseHtmlParsingContext;
use App\p365labs\Table2Csv\Readers\HtmlReaderInterface;
use App\p365labs\Table2Csv\Writers\CsvWriterInterface;

/**
 * Class HtmlReader
 * @package App\p365labs\Table2Csv
 */
class HtmlReader implements HtmlReaderInterface, CsvWriterInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(string $table): string
    {
        return $this->parseTable($table);
    }

    private function parseTable(string $table): string
    {
        $parsingContext = new ParseHtmlParsingContext(ParseHtmlParsingContext::SINGLE_TABLE_STRATEGY);
        return $parsingContext->getStrategy()->doTableParsing($table);
    }

    /**
     * {@inheritdoc}
     */
    public function save(string $path): void
    {
        // TODO: Implement save() method.
    }
}
