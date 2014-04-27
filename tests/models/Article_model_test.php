<?php

/**
 * @group Model
 */

class Article_model_test extends CIUnit_TestCase
{
    protected $tables = array(
        'article'        => 'article'
    );
    
    public function __construct($name = NULL, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }
    
    public function setUp()
    {
        parent::tearDown();
        parent::setUp();
        $this->CI->load->model('article_model');
        $this->article_model=$this->CI->article_model;
    }

    public function tearDown(){
        parent::tearDown();
    }

    public function testIns()
    {
        $this->article_model->ins(array('title' => 'test', 'content' => 'content'));
        $ret = $this->article_model->all();
        $this->assertSame(count($ret), 4);

        $this->assertSame($ret[3]->title, 'test');
    }


    public function testGet(){
        // should return correct id mysql data
        $ret = $this->article_model->get(1);
        $this->assertSame($ret->title, "test1");
    }
}