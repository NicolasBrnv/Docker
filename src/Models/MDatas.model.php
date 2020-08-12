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
     * @return mixed
     */
    public function select()
    {
        $conn = $this->db->getDb();
        $query = $conn->prepare("SELECT * FROM datas_test");
        $query->execute();
        return $query->fetch();
    }

    /**
     * @return mixed
     */
    public function add()
    {
        // TODO: Implement add() method.
    }

    /**
     * @return mixed
     */
    public function edit()
    {
        // TODO: Implement edit() method.
    }

    /**
     * @return mixed
     */
    public function delete()
    {
        // TODO: Implement delete() method.
    }
}