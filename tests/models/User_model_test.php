<?php

/**
 * @group Model
 */

class User_model_test extends CIUnit_TestCase
{
    protected $db_tables = array(
        'user' => array(
            'user'        => 'user'
        ),
        'default' => array(
            'article' => 'article'
        )
    );
    
    public function __construct($name = NULL, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }
    
    public function setUp()
    {
        parent::setUp();
        $this->CI->load->model('user_model');
        $this->user_model = $this->CI->user_model;
    }

    public function tearDown(){
        parent::tearDown();
    }

    public function testIns()
    {
        $this->connect('user');

        $this->user_model->ins(array('name' => 'test', 'email' => 'email@email.com'));
        $ret = $this->user_model->all();
        $this->assertSame(count($ret), 4);

        $this->assertSame($ret[3]->name, 'test');
    }

    public function testGet(){
        $this->connect('user');

        // should return correct id mysql data
        $ret = $this->user_model->get(1);
        $this->assertSame($ret->name, "name1");
    }

    //データベースを切り変えて複数のデータベースのモデルにアクセス可能であること
    public function testMultiDatabaseAccess(){
        $this->connect('user');

        // should return correct id mysql data
        $ret = $this->user_model->get(1);
        $this->assertSame($ret->name, "name1");
        
        // should get fixtured article
        $this->connect('default');
        $this->CI->load->model('article_model');
        $this->article_model = $this->CI->article_model;
        $ret = $this->article_model->all();
        $this->assertSame($ret[0]->title, "test1");
        $this->assertSame($ret[2]->title, "test3");
    }
}