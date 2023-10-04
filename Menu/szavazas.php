<style>
    input[type="radio"]{
        margin: 5px 5px;
    }
    input[type="submit"]{
        margin-top: 5px;
    }
</style>
<h4>Szavazás</h4>
<form action="szavazas_ir.php" method="post" target="kisablak">
    <input type="radio" name="szavazas" value="1">1<br>
    <input type="radio" name="szavazas" value="2">2<br>
    <input type="radio" name="szavazas" value="3">3<br>
    <input type="radio" name="szavazas" value="4">4<br>
    <input type="submit" value="Szavazok">
</form>
<iframe name="kisablak"></iframe>