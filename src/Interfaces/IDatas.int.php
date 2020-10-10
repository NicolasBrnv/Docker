<?php

interface IDatas {

    public function select($opt, $id, $table);
    public function add($opt, $data);
    public function update($dataTitle, $dataId);
    public function delete($id);
}