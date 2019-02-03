<?php declare(strict_types=1);

namespace App\p365labs\Table2Csv\HtmlTableParsing;

class ParseHtmlMultipleTableStratetgy implements HtmlTableParsingStratetgyInterface
{
    /**
     * @inheritdoc
     */
    public function doTableParsing(string $html): array
    {
        $csv_return = [];
        preg_match_all('/<table(>| [^>]*>)(.*?)<\/table( |>)/is', $html, $b);
        $table = $b[2];

        for ($i = 0; $i < count($table); $i++) {
            $csv = [];
            preg_match_all('/<tr(>| [^>]*>)(.*?)<\/tr( |>)/is', $table[$i], $x);
            $rows = $x[2];

            foreach ($rows as $row) {
                //cycle through each row
                if (preg_match('/<th(>| [^>]*>)(.*?)<\/th( |>)/is', $row)) {
                    //match for table headers
                    preg_match_all('/<th(>| [^>]*>)(.*?)<\/th( |>)/is', $row, $x);
                    $csv[] = strip_tags(implode(',', $x[2]));
                } elseif (preg_match('/<td(>| [^>]*>)(.*?)<\/td( |>)/is', $row)) {
                    //match for table cells
                    preg_match_all('/<td(>| [^>]*>)(.*?)<\/td( |>)/is', $row, $x);
                    $csv[] = strip_tags(implode(',', $x[2]));
                }
            }

            $csv_return[] = implode("\n", $csv);
        }

        return $csv_return;
    }
}
