<?
    if(!isset($_POST['comment_name']))
        die("<script>alert('Nem írtál be nevet!')</script>");

    if(!isset($_POST['comment_text']))
    die("<script>alert('Nem írtál szöveget!')</script>");
    
    $clearname = str_replace("\r\n", "", nl2br(str_replace(";", ",", $_POST['comment_name'])));

    $clearcomment = str_replace("\r\n", "", nl2br(str_replace(";", ",", $_POST['comment_text'])));

    file_put_contents("all_comments.txt",
                        date("Y.m.d H:i:s").";$clearname;$clearcomment",
                        FILE_APPEND);

    $file_comments = explode("\r\n", file_get_contents("all_comments.txt", false));

    foreach($file_comments as $oneline)
    {
        $one_comment = explode(";", $oneline);
        print("<div id='one_comment'>
                   <h4 id='Comment_Header'>".$one_comment[1]." | ".$one_comment[0]."</h4>
                   <p id='Comment_Text'>".$one_comment[2]."</p>
                   <hr>
               </div>");
    }
?>