<?php


class VDatas implements IDatas
{
    public function __construct()
    {
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function showDatas($_dataId){

        echo $_dataId;

        var_dump($_dataId);
    }

    /**
     * @return mixed
     */
    public function select()
    {

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