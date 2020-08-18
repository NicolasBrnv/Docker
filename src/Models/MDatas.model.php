<?php


class MDatas implements IDatas
{
    private $db;

    public function __construct(IDb $db)
    {
        $this->db = $db;
    }

    public function __destruct()
    {
    }

    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param $opt
     * @param $id
     * @return mixed
     */
    public function select($opt, $id = null)
    {
        if ($opt = 'all'){
            $conn = $this->db->getDb();
            $query = $conn->prepare("SELECT * FROM datas");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }else{
            $conn = $this->db->getDb();
            $query = $conn->prepare("SELECT * FROM datas WHERE datas.id = :id");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        switch ($opt){
            case 'all':
                $conn = $this->db->getDb();
                $query = $conn->prepare("SELECT * FROM datas");
                $query->execute();
                return $query->fetchAll(PDO::FETCH_OBJ);
                break;
            case 
        }

    }

    /**
     * @param $data
     * @return mixed
     */
    public function add($data)
    {
        $title = $data['title'];
        $body = $data['body'];
        $conn = $this->db->getDb();
        $query = $conn->prepare("INSERT INTO datas (title, body) VALUES (:title, :body)");
        $query->bindParam(':title', $title);
        $query->bindParam(':body', $body);
        $query->execute();
    }

    /**
     * @return mixed
     */
    public function update($data)
    {
        $title = $data['title'];
        $body = $data['body'];
        $conn = $this->db->getDb();
        $query = $conn->prepare("UPDATE datas SET title = :title, body = :body WHERE datas.id = :id");
        $query->bindParam(':title', $title);
        $query->bindParam(':body', $body);
        $query->execute();
    }

    /**
     * @return mixed
     */
    public function delete()
    {
        // TODO: Implement delete() method.
    }
}