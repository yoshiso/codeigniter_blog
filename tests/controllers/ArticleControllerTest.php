<?php

/**
 * @group Controller
 */

class ArticleControllerTest extends CIUnit_TestCase
{
    protected $tables = array(
        'article'        => 'article'
    );


    public function setUp()
    {
        parent::setUp();
        // Set the tested controller
        $this->CI = set_controller('article');
    }
    
    public function testIndex()
    {
        // Call the controllers method
        $this->CI->index();
        
        // Fetch the buffered output
        $out = output();
        
        // Check if the content is OK
        $this->assertSame(0, preg_match('/(error|notice)/i', $out));

        // Check 3 articles exists
        $this->assertContains('test3', $out);
        $this->assertContains('test2', $out);
        $this->assertContains('test1', $out);
    }

    // POSTのテストを行なう
    public function testCreate()
    {
        $_POST['title'] = "posted";
        $_POST['content'] = "posted_content";

        // Call the controllers method
        $this->CI->create();
        
        // Fetch the buffered output
        $out = output();
        
        // Check if the content is OK
        $this->assertSame(0, preg_match('/(error|notice)/i', $out));

        // Check returns correct response
        $this->assertContains('Success', $out);

        // Check collectly saved to database
        $this->CI->load->model('article_model');
        $created = $this->CI->article_model->get(4);
        $this->assertSame('posted', $created->title);
    }
}
