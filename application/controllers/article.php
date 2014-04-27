<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
    }

    public function index()
    {
        $this->output->append_output(__METHOD__);

        $articles = $this->article_model->all();
        //var_dump($articles);
        foreach ($articles as $key => $article) {
            $this->output->append_output("<br>");
            $this->output->append_output($article->title."<br>");
            $this->output->append_output($article->content."<br>");
            $this->output->append_output("<br>");
        }
    }


    public function create()
    {
        $this->output->append_output(__METHOD__);

        $title = $this->input->post('title');
        $content = $this->input->post('content');

        if( ! $title || ! $content){
            throw new Exception("Input Error title:".$title." content: ".$content." :".__METHOD__);
            
        }

        $article = array("title" => $title,
                         "content" => $content);
        $ret = $this->article_model->ins($article);
        if($ret) $this->output->append_output("Success");
        else $this->output->append_output("Failure");
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */