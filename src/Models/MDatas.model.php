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

        switch ($opt) {
            case 'all':
                $conn = $this->db->getDb();
                $query = $conn->prepare("SELECT * FROM datas");
                $query->execute();
                return $query->fetchAll(PDO::FETCH_OBJ);

            case 'one':
                if (!$id){
                    $conn = $this->db->getDb();
                    $query = $conn->prepare("SELECT * FROM datas ORDER BY id DESC LIMIT 1");
                    $query->bindParam(':id', $id);
                    $query->execute();
                    return $query->fetch(PDO::FETCH_OBJ);
                }
                $conn = $this->db->getDb();
                $query = $conn->prepare("SELECT * FROM datas WHERE id = :id");
                $query->bindParam(':id', $id);
                $query->execute();
                return $query->fetch(PDO::FETCH_OBJ);
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
     * @param $dataTitle
     * @param $dataBody
     * @return mixed
     */
    public function update($dataTitle, $dataBody, $dataId)
    {
        $id = $dataId;
        $title = $dataTitle;
        $body = $dataBody;
        $conn = $this->db->getDb();
        $query = $conn->prepare("UPDATE datas SET title = :title, body = :body WHERE datas.id = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':title', $title);
        $query->bindParam(':body', $body);
        $query->execute();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $conn = $this->db->getDb();
        $query = $conn->prepare("DELETE FROM datas WHERE id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
    }
}