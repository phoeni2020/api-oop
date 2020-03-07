<?php
class Post
{
    //DB stuff
    private $con;
    private $table ='posts';

    //post class probrty
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    // construct with db (make con when object creat)
    public function __construct($DB)
    {
         $this->con = $DB;
    }

    public function getposts()
    {
         $query = 'select
         c.name as category_name,
         p.title,
         p.body,
         p.author,
         p.created_at
         FROM '
         .$this->table. ' p
          LEFT JOIN
          categories c ON p.category_id = c.id order by p.created_at';

         $stmt = $this->con->prepare($query);

         $stmt->execute();

         return $stmt;
    }
}