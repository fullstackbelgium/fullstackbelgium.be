<?php

namespace Tests;

class HelpersTest extends TestCase
{
    /** @test */
    public function it_can_convert_markdown_to_html()
    {
        $html = markdownToHtml('**test**');

        $this->assertEquals('<p><strong>test</strong></p>', $html);
    }

}