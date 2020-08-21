<?php


class VForm
{
    public function __construct()
    {
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    public function showForm($arg)
    {
        $type = false;
        $placeholder = false;
        $label = false;
        $title = false;
        $body = false;
        $listData = false;
        $hidden = false;

        $option = isset($_GET['option']) ? $_GET['option'] : 'insert';

        switch ($option) {
            case 'update':
                $arg['option'] = $option;
                $type = $arg['option'];
                $label = ucfirst($type);
                $id = $arg['data_selected']->id;
                $title = $arg['data_selected']->title;
                $body = $arg['data_selected']->body;
                $listData = $arg['datas'];
                $placeholder = 'Mettez à jour des données';
                $hidden = "<input type='hidden' name='datas_id' value='$id'/>";
                break;

            case 'insert':
                $arg['option'] = $option;
                $type = $arg['option'];
                $label = ucfirst($type);
                $listData = null;
                $value = null;
                $placeholder = 'Ajouter des données';
                break;

            default: $arg['option'] = 'insert';
                break;
        }

        echo <<<HERE
<section>
    <form action='index.php?ex=modify&amp;option=$type' method="post">
        <div>
            <label for='$type'>$label titre:</label>
            <input id='$type' name='datas_title' value='$title' placeholder='$placeholder' required/>
        </div>
        
        <div>
            <label for='$type'>$label body:</label>
            <textarea id='$type' name='datas_body' value='' type='text' maxlength='50' maxsize='50' placeholder='$placeholder' required>$body</textarea>
        </div>
        $hidden
        <button type='submit'>submit</button>    
    </form>
    <a href='index.php?ex=formulaire&amp;option=insert'>Ajouter des données</a>
    <a href='index.php?ex=formulaire&amp;option=update'>Mettre à jour des données</a>
</section>
HERE;

        if ($listData) {
            echo "<section>";
            foreach ($listData as $v) {
                echo "<a href='index.php?ex=formulaire&amp;option=update&amp;data_id=$v->id'><h4>$v->title</h4><p>$v->body</p></a>";
                echo "<a href='index.php?ex=modify&amp;option=delete&amp;data_id=$v->id'>Delete</a>";
            }
            echo "</section>";
        }

    } //showForm($arg)
} //VForm