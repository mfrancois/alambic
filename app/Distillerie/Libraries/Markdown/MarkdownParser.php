<?php namespace Distillerie\Libraries\Markdown;

use dflydev\markdown\MarkdownExtraParser;

class MarkdownParser extends MarkdownExtraParser {


    function _doCodeBlocks_callback($matches) {

        $codeblock = $matches[1];

        $codeblock = $this->outdent($codeblock);
        $codeblock = htmlspecialchars($codeblock, ENT_NOQUOTES);

        # trim leading newlines and trailing newlines
        $codeblock = preg_replace('/\A\n+|\n+\z/', '', $codeblock);

        $codeblock = "<pre class=\"prettyprint linenums\"><code>$codeblock\n</code></pre>";
        return "\n\n".$this->hashBlock($codeblock)."\n\n";
    }


    function makeCodeSpan($code) {

        #
        # Create a code span markup for $code. Called from handleSpanToken.
        #
        $code = htmlspecialchars(trim($code), ENT_NOQUOTES);
        return $this->hashPart("<code class=\"prettyprint\">$code</code>");
    }

    function _doFencedCodeBlocks_callbacks($matches) {

        $codeblock = $matches[2];
        $codeblock = htmlspecialchars($codeblock, ENT_NOQUOTES);
        $codeblock = preg_replace_callback('/^\n+/',
            array(&$this, '_doFencedCodeBlocks_newlines'), $codeblock);
        $codeblock = "<pre class=\"prettyprint\"><code>$codeblock</code></pre>";
        return "\n\n".$this->hashBlock($codeblock)."\n\n";
    }

    function _doTable_callback($matches) {
        $head		= $matches[1];
        $underline	= $matches[2];
        $content	= $matches[3];

        # Remove any tailing pipes for each line.
        $head		= preg_replace('/[|] *$/m', '', $head);
        $underline	= preg_replace('/[|] *$/m', '', $underline);
        $content	= preg_replace('/[|] *$/m', '', $content);

        # Reading alignement from header underline.
        $separators	= preg_split('/ *[|] */', $underline);
        foreach ($separators as $n => $s) {
            if (preg_match('/^ *-+: *$/', $s))		$attr[$n] = ' align="right"';
            else if (preg_match('/^ *:-+: *$/', $s))$attr[$n] = ' align="center"';
            else if (preg_match('/^ *:-+ *$/', $s))	$attr[$n] = ' align="left"';
            else									$attr[$n] = '';
        }

        # Parsing span elements, including code spans, character escapes,
        # and inline HTML tags, so that pipes inside those gets ignored.
        $head		= $this->parseSpan($head);
        $headers	= preg_split('/ *[|] */', $head);
        $col_count	= count($headers);

        # Write column headers.
        $text = "<table class=\"table table-striped table-bordered table-hover\">\n";
        $text .= "<thead>\n";
        $text .= "<tr>\n";
        foreach ($headers as $n => $header)
            $text .= "  <th$attr[$n]>".$this->runSpanGamut(trim($header))."</th>\n";
        $text .= "</tr>\n";
        $text .= "</thead>\n";

        # Split content by row.
        $rows = explode("\n", trim($content, "\n"));

        $text .= "<tbody>\n";
        foreach ($rows as $row) {
            # Parsing span elements, including code spans, character escapes,
            # and inline HTML tags, so that pipes inside those gets ignored.
            $row = $this->parseSpan($row);

            # Split row by cell.
            $row_cells = preg_split('/ *[|] */', $row, $col_count);
            $row_cells = array_pad($row_cells, $col_count, '');

            $text .= "<tr>\n";
            foreach ($row_cells as $n => $cell)
                $text .= "  <td$attr[$n]>".$this->runSpanGamut(trim($cell))."</td>\n";
            $text .= "</tr>\n";
        }
        $text .= "</tbody>\n";
        $text .= "</table>";

        return $this->hashBlock($text) . "\n";
    }

    function _doHeaders_callback_atx($matches) {
        $level = strlen($matches[1]);
        if($level == 1){
            $block = "<div class=\"page-header\">";
            $block .= "<h$level>".$this->runSpanGamut($matches[2])."</h$level>";
            $block .= "</div>";

        }else{
            $block = "<h$level>".$this->runSpanGamut($matches[2])."</h$level>";
        }

        return "\n" . $this->hashBlock($block) . "\n\n";
    }
}