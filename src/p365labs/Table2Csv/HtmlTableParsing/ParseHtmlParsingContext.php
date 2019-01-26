<?php declare(strict_types=1);

namespace App\p365labs\Table2Csv\HtmlTableParsing;

use App\p365labs\Table2Csv\Exception\ParsingStrategyException;

class ParseHtmlParsingContext
{
    public const SINGLE_TABLE_STRATEGY = 1;
    public const MULTIPLE_TABLE_STRATEGY = 2;

    private $context;

    /**
     * ParseHtmlParsingContext constructor.
     * @param int $strategy
     * @throws ParsingStrategyException
     */
    public function __construct(int $strategy)
    {
        switch ($strategy) {
            case self::SINGLE_TABLE_STRATEGY:
                $this->context = new ParseHtmlSingleTableStratetgy();
                break;
            case self::MULTIPLE_TABLE_STRATEGY:
                $this->context = new ParseHtmlMultipleTableStratetgy();
                break;
            default:
                throw new ParsingStrategyException('You Selected a wrong parsing strategy');
                break;
        }
    }

    /**
     * @return HtmlTableParsingStratetgyInterface
     */
    public function getStrategy(): HtmlTableParsingStratetgyInterface
    {
        return $this->context;
    }
}
