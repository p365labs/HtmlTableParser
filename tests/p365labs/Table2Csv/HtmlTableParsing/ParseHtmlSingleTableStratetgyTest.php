<?php declare(strict_types=1);

namespace App\Tests\p365labs\Table2Csv\HtmlTableParsing;

use App\p365labs\Table2Csv\HtmlTableParsing\ParseHtmlParsingContext;
use PHPUnit\Framework\TestCase;

class ParseHtmlSingleTableStratetgyTest extends TestCase
{
    /**
     * @throws \App\p365labs\Table2Csv\Exception\ParsingStrategyException
     */
    public function testMultipleStrategy(): void
    {
        $context = new ParseHtmlParsingContext(ParseHtmlParsingContext::SINGLE_TABLE_STRATEGY);
        $strategy = $context->getStrategy();

        $table = <<<EOT
<table id="html1" cellspacing="1px" cellpadding="0">
    <tr>
        <th style="width:20%">Parameter</th>
        <th style="width:30%">Default value</th>
        <th style="width:50%">Description</th>
    </tr>
    <tr>
        <td>outputEncoding</td>
        <td>UTF-8</td>
        <td>encoding XML document</td>
    </tr>
    <tr>
        <td>outputEncoding</td>
        <td>UTF-8</td>
        <td>encoding XML document</td>
    </tr>
</table>
EOT;

        $table = $strategy->doTableParsing($table);

        $expectedTables = "Parameter,Default value,Description
outputEncoding,UTF-8,encoding XML document
outputEncoding,UTF-8,encoding XML document";

        $this->assertIsNotArray($table);
        $this->assertEquals($expectedTables, $table);
    }
}
