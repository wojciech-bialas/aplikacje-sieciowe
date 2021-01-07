{extends file="../templates/main.tpl"}

{block name=content}

<ul class="nav justify-content-end">
    <li class="nav-item">
        <a class="nav-link" href="{$appUrl}app/security/logout.php">Logout</a>
    </li>
</ul>


<div class="container">
    <div class="row">
        <div class="col-sm">
            <form action="{$appUrl}app/calc.php" method="POST">
                <legend>Credit Calculator</legend>
                <div class="form-group">
                    <label>Kwota kredytu: <br>
                        <input type="number" class="form-control" name="loanAmount" value="{if isset($loanAmount)} {$loanAmount} {/if}" /><br>
                    </label>
                </div>

                <div class="form-group">
                    <label>Ilosc lat: <br>
                        <input type="number" class="form-control" name="loanYears" value="{if isset($loanYears)} {$loanYears} {/if}" /><br>
                    </label>
                </div>

                <div class="form-group">
                    <label>Oprocentowanie: <br>
                        <input type="number" class="form-control" name="interest" value="{if isset($interest)} {$interest} {/if}" /><br><br>
                    </label>
                </div>
                <input type="submit" class="btn btn-primary" value="Oblicz" />
            </form>
        </div>
    </div>
</div>

{if isset($result)}
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="result">
                Miesięczna rata: {round($result, 2)}zł
            </div>
        </div>
    </div>
</div>
{/if}

{if isset($errors)}
    {if count($errors) > 0}
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <ul class="list-group">
                        {foreach $errors as $msg}
                        <li class="list-group-item">{$msg}</li>
                        {/foreach}
                    </ul>
                </div>
            </div>
        </div>
    {/if}
{/if}

{/block}