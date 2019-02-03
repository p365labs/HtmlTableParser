<?php declare(strict_types=1);

namespace App\Tests\p365labs\Table2Csv\HtmlTableParsing;

use App\p365labs\Table2Csv\HtmlTableParsing\ParseHtmlParsingContext;
use PHPUnit\Framework\TestCase;

class ParseHtmlMultipleTableStratetgyTest extends TestCase
{
    /**
     * @throws \App\p365labs\Table2Csv\Exception\ParsingStrategyException
     */
    public function testMultipleStrategy(): void
    {
        $context = new ParseHtmlParsingContext(ParseHtmlParsingContext::MULTIPLE_TABLE_STRATEGY);
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
<table id="html2" cellspacing="1px" cellpadding="0">
    <tr>
        <td>rino</td>
        <td>pino</td>
        <td>lino</td>
    </tr>
    <tr>
        <td>rino4</td>
        <td>pino4</td>
        <td>lino4</td>
    </tr>
    <tr>
        <td>rino3</td>
        <td>pino3</td>
        <td>lino3</td>
    </tr>
    <tr>
        <td>rino3</td>
        <td>pino3</td>
        <td>lino3</td>
    </tr>
</table>
EOT;

        $table = $strategy->doTableParsing($table);

        $expectedTables[0] = "Parameter,Default value,Description
outputEncoding,UTF-8,encoding XML document
outputEncoding,UTF-8,encoding XML document";
        $expectedTables[1] = "rino,pino,lino
rino4,pino4,lino4
rino3,pino3,lino3
rino3,pino3,lino3";

        $this->assertIsArray($table);
        $this->assertArrayHasKey(0, $table);
        $this->assertArrayHasKey(1, $table);

        $this->assertEquals($expectedTables, $table);
    }

    /**
     * @throws \App\p365labs\Table2Csv\Exception\ParsingStrategyException
     */
    public function testErrorMultipleStrategy(): void
    {
        $context = new ParseHtmlParsingContext(ParseHtmlParsingContext::MULTIPLE_TABLE_STRATEGY);
        $strategy = $context->getStrategy();

        $table = <<<EOT
<table id="html1" cellspacing="1px" cellpadding="0">
    <tr>
        <td>outputEncoding</td>
        <td>UTF-8</td>
        <td>encoding XML document</td>
    </tr>
</table>
<!--table id="html2" cellspacing="1px" cellpadding="0"-->
    <!--tr-->
        <td>rino</td>
        <td>pino</td>
        <td>lino</td>
    </tr>
</table>
EOT;

        $table = $strategy->doTableParsing($table);

        $expectedTables[0] = "outputEncoding,UTF-8,encoding XML document
outputEncoding,UTF-8,encoding XML document";
        $expectedTables[1] = "rino,pino,lino
rino4,pino4,lino4
rino3,pino3,lino3
rino3,pino3,lino3";

        $this->assertIsArray($table);
        $this->assertArrayHasKey(0, $table);
        $this->assertArrayNotHasKey(1, $table);
    }
}
