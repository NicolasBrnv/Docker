<?php


class MDatas implements IDatas
{
    private IDb $db;

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
     * @param null $id
     * @param $table
     * @return mixed
     */
    public function select($opt, $id = null, $table)
    {

        switch ($opt) {
            case 'all':
                $conn = $this->db->getDb();
                $query = $conn->prepare("SELECT * FROM {$table}");
                $query->execute();
                return $query->fetchAll(PDO::FETCH_OBJ);

            case 'one':
                if (!$id){
                    $conn = $this->db->getDb();
                    $query = $conn->prepare("SELECT * FROM {$table} ORDER BY id DESC LIMIT 1");
                    $query->bindParam(':id', $id);
                    $query->execute();
                    return $query->fetch(PDO::FETCH_OBJ);
                }
                $conn = $this->db->getDb();
                $query = $conn->prepare("SELECT * FROM {$table} WHERE id = :id");
                $query->bindParam(':id', $id);
                $query->execute();
                return $query->fetch(PDO::FETCH_OBJ);
        }
    } //select($opt, $id = null)

    /**
     * @param $opt
     * @param $data
     * @return mixed
     */
    public function add($opt, $data)
    {
        switch ($opt){
            case 'datas':
                $title = $data['title'];
                $body = $data['body'];
                $conn = $this->db->getDb();
                $query = $conn->prepare("INSERT INTO datas (title, body) VALUES (:title, :body)");
                $query->bindParam(':title', $title);
                $query->bindParam(':body', $body);
                $query->execute();
        }
    } //add($data)

    /**
     * @param $dataTitle
     * @param $dataBody
     * @param $dataId
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
    } //update($dataTitle, $dataBody, $dataId)

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
    } //delete($id)
}