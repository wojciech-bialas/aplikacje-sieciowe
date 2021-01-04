<?php
include _ROOT_PATH.'/templates/top.html';
?>
<ul class="nav justify-content-end">
    <li class="nav-item">
        <a class="nav-link" href="<?php print(_APP_URL);?>app/security/logout.php">Logout</a>
    </li>
</ul>


<div class="container">
    <div class="row">
        <div class="col-sm">
            <form action="<?php print(_APP_URL);?>app/calc.php" method="POST">
                <legend>Credit Calculator</legend>
                <div class="form-group">
                    <label>Kwota kredytu: <br>
                        <input type="number" class="form-control" name="loanAmount" value="<?php if(isset($loanAmount)) print($loanAmount); ?>" /><br>
                    </label>
                </div>

                <div class="form-group">
                    <label>Ilosc lat: <br>
                        <input type="number" class="form-control" name="loanYears" value="<?php if(isset($loanYears)) print($loanYears); ?>" /><br>
                    </label>
                </div>

                <div class="form-group">
                    <label>Oprocentowanie: <br>
                        <input type="number" class="form-control" name="interest" value="<?php if(isset($interest)) print($interest); ?>" /><br><br>
                    </label>
                </div>
                <input type="submit" class="btn btn-primary" value="Oblicz" />
            </form>
        </div>
    </div>
</div>

<?php
if (isset($result)) {
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-sm">';
    echo '<div class="result">';
    echo 'Miesięczna rata: '.round($result, 2).'zł';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
if (isset($errors)) {
    if (count($errors) > 0) {
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-sm">';
        echo '<ul class="list-group">';
        foreach ($errors as $key => $msg) {
            echo '<li class="list-group-item">' . $msg . '</li>';
        }
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

include _ROOT_PATH.'/templates/bottom.html';
?>