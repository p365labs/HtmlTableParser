<?php declare(strict_types=1);

namespace App\Tests\p365labs\Table2Csv\HtmlTableParsing;

use App\p365labs\Table2Csv\Exception\ParsingStrategyException;
use App\p365labs\Table2Csv\HtmlTableParsing\ParseHtmlMultipleTableStratetgy;
use App\p365labs\Table2Csv\HtmlTableParsing\ParseHtmlParsingContext;
use App\p365labs\Table2Csv\HtmlTableParsing\ParseHtmlSingleTableStratetgy;
use PHPUnit\Framework\TestCase;

class ParseHtmlParsingContextTest extends TestCase
{
    public function testSingleStrategy(): void
    {
        $context = new ParseHtmlParsingContext(ParseHtmlParsingContext::SINGLE_TABLE_STRATEGY);
        $this->assertInstanceOf(ParseHtmlSingleTableStratetgy::class, $context->getStrategy());
    }

    public function testMultipleStrategyInstance(): void
    {
        $context = new ParseHtmlParsingContext(ParseHtmlParsingContext::MULTIPLE_TABLE_STRATEGY);
        $this->assertInstanceOf(ParseHtmlMultipleTableStratetgy::class, $context->getStrategy());
    }

    public function testStrategyException(): void
    {
        $this->expectException(ParsingStrategyException::class);
        new ParseHtmlParsingContext(3);
    }
}
