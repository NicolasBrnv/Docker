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

    public function showFormCv($arg)
    {

        $option = isset($_GET['option']) ? $_GET['option'] : 'insert';

        switch ($option) {
            case 'update':
                $arg['option'] = $option;
                $type = $arg['option'];
                $label = ucfirst($type);
                $id = $arg['cv_selected']->id;
                $pt_ft = $arg['cv_selected']->point_fort;
                $comp_fonct = $arg['cv_selected']->competence_fonct;
                $comp_tech = $arg['cv_selected']->competence_tech;
                $langue = $arg['cv_selected']->langue;
                $formation = $arg['cv_selected']->formation;
                $listData = $arg['cv'];
                $placeholder = 'Mettez à jour des données';
                $hidden = "<input type='hidden' name='cv_id' value='$id'/>";
                break;

            case 'insert':
                $arg['option'] = $option;
                $type = $option;
                $pt_ft = "";
                $comp_fonct = "";
                $comp_tech = "";
                $langue = "";
                $formation = "";
                $hidden = "";
                $label = ucfirst($type);
                $listData = null;
                $placeholder = 'Ajouter des données';
                break;

            default: $type = 'insert';
                break;
        }

        echo <<<HERE
<section>
    <form action="index.php?ex=modify&amp;option=$type&amp;form_type=1" method="post">
    
        <div>
        <label for="point_fort" >Points Forts</label>
        <textarea id="point_fort" name="point_fort" maxlength='50' maxsize='50' placeholder='$placeholder'>$pt_ft</textarea>
        </div>
        
        <div>
        <label for="comp_funct" >Compétences Fonctionnelles</label>
        <textarea id="comp_funct" name="comp_funct" maxlength='50' maxsize='50' placeholder='$placeholder'>$comp_fonct</textarea>
        </div>
        
        <div>
        <label for="comp_tech" >Compétences Techniques</label>
        <textarea id="comp_tech" name="comp_tech" maxlength='50' maxsize='50' placeholder='$placeholder'>$comp_tech</textarea>
        </div>
        
        <div>
        <label for="lang" >Langues</label>
        <textarea id="lang" name="lang" maxlength='50' maxsize='50' placeholder='$placeholder'>$langue</textarea>
        </div>
        
        <div>
        <label for="formation" >Langues</label>
        <textarea id="formation" name="formation" maxlength='50' maxsize='50' placeholder='$placeholder'>$formation</textarea>
        </div>
        $hidden
        <button type='submit'>submit</button>
    </form>
</section>
HERE;
        echo "<section>";

        if (isset($listData)){
            foreach ($listData as $cv) {
                echo "<p><a href='index.php?ex=formulaire&amp;option=update&amp;form_type=1&amp;cv_id=$cv->id'>$cv->point_fort</a></p>";
                echo "<p><a href='index.php?ex=formulaire&amp;option=update&amp;form_type=1&amp;cv_id=$cv->id'>$cv->competence_fonct</a></p>";
                echo "<p><a href='index.php?ex=formulaire&amp;option=update&amp;form_type=1&amp;cv_id=$cv->id'>$cv->competence_tech</a></p>";
                echo "<p><a href='index.php?ex=formulaire&amp;option=update&amp;form_type=1&amp;cv_id=$cv->id'>$cv->langue</a></p>";
                echo "<p><a href='index.php?ex=formulaire&amp;option=update&amp;form_type=1&amp;cv_id=$cv->id'>$cv->formation</a></p>";
            }
        }

        echo "<p><a href='index.php?ex=formulaire&amp;option=update&amp;form_type=1'>Mettre à jour des données</a></p>";
        echo "<p><a href='index.php?ex=formulaire&amp;option=insert&amp;form_type=1'>Ajouter des données</a></p>";

        echo "</section>";
    } //showFormCv()
} //VForm