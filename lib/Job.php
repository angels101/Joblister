<?php

class Job
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
//Get All Jobs

    public function getAllJobs()
    {
        $this->db->querry("SELECT job.*, categories.name AS cname
        FROM jobs
        INNER JOIN  categories
        ON jobs.categories_id = categories.id
        #WHERE jobs.categoryid = category.id
        ORDER BY post_date DESC
        ");

        // Assign Result Set

        $results = $this->db->resultSet();
        return $results;
    }
    //GEt Categories
    public function getCategories(){
        $this->db->querry("SELECT * FROM categories");
        //Assign Results Set
        $results =$this->db->resultSet();
    }
    //Get Jobs By Category

    public function getByCategory($category){
        $this->db->querry("SELECT job.*, categories.name AS cname
        FROM jobs
        INNER JOIN  categories
        ON jobs.categories_id = categories.id
        WHERE jobs.categoryid = category.id
        ORDER BY post_date DESC
        ");

        // Assign Result Set

        $results = $this->db->resultSet();
        return $results;
    }
      
    //GET Category 

    public function getCategory($category_id){
        $this->db->querry("SELECT * FROM categories WHERE id = :category_id");
        $this->db->bind(':category_id', $category_id);

        //ASSIGN ROW
        $row = $this->db->single();
        return $row;
    }
    //get Job

    public function getJob($id){
        $this->db->querry("SELECT * FROM jobs WHERE id = :id");
        $this->db->bind(':id', $id);

        //ASSIGN ROW
        $row = $this->db->single();
        return $row;
    
    } 
    public function create($data){
        //insert Querry
        $this->db->querry("INSERT INTO jobs  (category_id, job_title, company, description, location, salary, contact_user, contact_email)
        VALUES (:category_id, :job_title, :company,  :description, :location, :salary, :contact_user, :contact_email)");
    //Bind Data
$this->db->bind(':category_id, $data['category_id']);
$this->db->bind(':job_title, $data['job_title']);
$this->db->bind(':company, $data['company']);  
$this->db->bind(':description, $data['description']);
$this->db->bind(':location, $data['location']);
$this->db->bind(':salary, $data['salary']);
$this->db->bind(':contact_user, $data['contact_user']);
$this->db->bind(':contact_email, $data['contact_email']);
//EXECUTE
        if($this->db->execute()){
            return true;

        }
        else{
            return false;
        }
    }
}

