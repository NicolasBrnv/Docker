<?php


/**
 * Class DBase
 */
class DBase implements IDb
{
    private $user;
    private $db;

    /**
     * DBase constructor.
     * @param $name
     * @param $pass
     * @param $dbName
     */
    public function __construct($name, $pass, $dbName)
    {
        $this->setUser($name, $pass);
        $this->setDb($dbName);
    }

    public function __destruct()
    {
    }

    /**
     * @param $name
     * @param $pass
     */
    public function setUser($name, $pass): void
    {
        $this->user =
            [
                'name' => $name,
                'pass' => $pass,
            ];
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param $dbName
     */
    public function setDb($dbName): void
    {
        $this->db['name'] = $dbName;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        $host = 'db';

        $this->db['connection'] = new PDO("mysql:host=$host;dbname={$this->db['name']}", $this->user['name'], $this->user['pass'], array(
            PDO::ATTR_PERSISTENT => true
        ));

        if (!$this->db['connection']){
            echo "Echec de connection !";
        }

        return $this->db['connection'];
    }

} //DBase