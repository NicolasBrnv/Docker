<?php

interface IDatas {

    public function select($opt, $id, $table);
    public function add($opt, $data);
    public function update($dataTitle, $dataBody, $dataId);
    public function delete($id);
}