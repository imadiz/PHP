<style>
    form#write_comment p{
        margin: 5px 0px 5px 0px;
    }
    form#write_comment{
        margin-bottom: 5px;
    }
    iframe#comment_list{
        border: 0px;
    }
    div#one_comment{
        margin-top: 15px;
        margin-bottom: 15px;
    }
    p#Comment_Text{
        margin-left: 30px;
        margin-bottom: 10px;
    }
</style>

<form action='vendegkonyv_ir.php' method='post' id='write_comment' target='comment_list'>
    <p>Név:</p> <input type='text' id='nev' name='comment_name'>
    <br>
    <p>Szöveg</p> 
    <textarea id='comment' cols='40' rows='8' name='comment_text'></textarea>
    <br>
    <button type='submit'>Beküldés</button>
</form>

<iframe name='comment_list' id='comment_list'></iframe>