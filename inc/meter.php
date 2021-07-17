<h2>Z&auml;hler ablesen</h2>
<p>Insbesondere um absch&auml;tzen zu k&ouml;nnen, wieviel Kosten das Haus au&szlig;erhalb der Vermietung erzeugt,
    w&auml;re es nett, wenn ihr den Z&auml;hlerstand vor und nach dem Aufenthalt aufschreiben k&ouml;nntet.</p>
<p>Die Z&auml;hler befinden sich alle hinter der T&uuml;r gegen&uuml;ber vom Bad. Wasserz&auml;hler
    kurz &uuml;ber dem Boden, Gasz&auml;hler darüber und Stromz&auml;hler noch weiter oben(digitale Anzeige,
    mit der Taste B zwischen E1 und E2 hin und her schalten.)</p>
<p>Es reicht, auf ganze m3/kWh zu runden.</p>


<div class="well">
    <?php
    if(isset($_GET['msg']) && $_GET['msg']=="success"){
        echo "<div class='alert alert-success' role=alert>
                Z&auml;hlerstand gespeichert, vielen Dank!</div>";
    }

    //get old values
    // Create (connect to) SQLite database in file

    include('db/connect.php');
    $last_state = $dbh->query('SELECT * from meter ORDER BY time_read DESC LIMIT 1');

    $row = $last_state->fetch(PDO::FETCH_ASSOC);

    ?>
    <form action="db/measure.php" method="post">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="Wasser">Wasser [m3]</label>
                    <input type="number" class="form-control" id="wasser" name="wasser" value="<?php echo $row['wasser']; ?>">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="Gas">Gas [m3]</label>
                    <input type="number" class="form-control" id="gas" name="gas" value="<?php echo $row['gas']; ?>">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="E1">Strom E1 [kWh]</label>
                    <input type="number" class="form-control" id="e1" name="e1" value="<?php echo $row['e1']; ?>">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="E2">Strom E2 [kWh]</label>
                    <input type="number" class="form-control" id="e2" name="e2" value="<?php echo $row['e2']; ?>">
                </div>
            </div>
            <div class="col-md-1    ">
                <div class="form-group">
                    <label for="submit">&nbsp;</label>
                    <button id="submit" type="submit" class="btn btn-primary">Speichern</button>
                </div>

            </div>

        </div>



        <input type="hidden" name="checkin" value="<?php echo $checkin;?>"/>
    </form>
</div>