<?php

interface IDatas {

    public function select($opt, $id);
    public function add($data);
    public function update($dataTitle, $dataBody, $dataId);
    public function delete($id);
}