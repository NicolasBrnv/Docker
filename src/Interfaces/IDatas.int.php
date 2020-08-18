<?php

interface IDatas {

    public function select($opt, $id);
    public function add($data);
    public function update($data);
    public function delete();
}