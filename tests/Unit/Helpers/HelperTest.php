<?php
namespace Test\Unit\Helpers;
use Tests\TestCase;

class HelperTest extends TestCase
{
    public function test_strip_all_tags()
    {
        $text = '<h1>Hello</h1><script>alert(\'xss\')</script>';

        $this->assertEquals(strip_all_tags($text), 'Hello');
    }

    /**
     * @dataProvider conversionsProvider
     */
    public function test_excerpt_more($text, $result)
    {
        $this->assertEquals(excerpt_more($text), $result);
    }

    public function conversionsProvider()
    {
        return [
            ['Laravel is a web application framework with expressive<!--more-->, elegant syntax.', 'Laravel is a web application framework with expressive'],
        ];
    }
}