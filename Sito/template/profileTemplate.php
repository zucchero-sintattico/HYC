<div class="row">
    <div class="col border ml-5">
        <h2>Welcome <?php echo $templateParams["userInfo"]["Nome"]; ?></h2>
        <h3>Order history</h3>
        <div class="col border text-center">
                    <?php for($i=1;$i<=count($templateParams["ordersHistory"]);$i++): ?>
                    <?php $totaleOrdine=0; ?>
                        <div class="row d-flex justify-content-center"><h4>Ordine N°<?php echo $i ?></h4></div>
                        <div class="row">
                            <?php for($j=0;$j<count($templateParams["ordersHistory"][$i]);$j++): ?>
                                <div class="col border">
                                    <div class="col border-bottom"><p>Prodotto N°<?php echo $j+1 ?></p></div>
                                    <div class="col">
                                        <p>Titolo: <?php echo $templateParams["ordersHistory"][$i][$j]["Titolo"] ?></p>
                                        <p>Colore Frame: <?php echo $templateParams["ordersHistory"][$i][$j]["Colore_frame"] ?></p>
                                        <p>Linguaggio: <?php echo $templateParams["ordersHistory"][$i][$j]["NomeLinguaggio"] ?></p>
                                        <?php
                                            $costoProdotto = getPrice($templateParams["ordersHistory"][$i][$j]["Larghezza"],$templateParams["ordersHistory"][$i][$j]["Altezza"]);
                                            $totaleOrdine += $costoProdotto;
                                        ?>
                                        <div class="row d-flex justify-content-start pl-4"><p>Prezzo: <?php echo $costoProdotto ?>€</p></div>
                                    </div>

                                </div>
                            <?php endfor; ?>
                        </div>
                        <div class="row d-flex justify-content-end pr-4"><h4>Totale ordine: <?php echo $totaleOrdine ?>€</h4></div>
                    <?php endfor; ?>
        </div>
    </div>
    <div class="col">

        <div class="col border p-2">
            <h2>Edit your profile information</h2>
            <form role="form" autocomplete="off" action="#" id="user_profile" method="POST">
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" autocomplete="off" id="first_name" name="first_name" placeholder="First name" value="<?php echo $templateParams["userInfo"]["Nome"]; ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control" autocomplete="off" id="last_name" name="last_name" placeholder="Last name" value="<?php echo $templateParams["userInfo"]["Cognome"]; ?>">
                </div>
                <div class="form-group">
                    <label for="twitter_name">Username</label>
                    <input type="text" class="form-control" autocomplete="off" id="username" name="username" placeholder="Username" value="<?php echo $templateParams["userInfo"]["Username"]; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" autocomplete="off" id="email" name="email" placeholder="Enter email" value="<?php echo $templateParams["userInfo"]["Email"]; ?>">
                </div>
                <div class="row m-3">
                    <div class="col pr-4">
                        <button type="submit" class="btn btn-dark">Confirm profile edit</button>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="oldPass">Insert old password to confirm edit</label>
                            <input type="password" class="form-control" autocomplete="new-password" id="oldPass" name="oldPass" placeholder="Old password">
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="col border mt-3 p-2">
            <h2>Edit password</h2>
            <form role="form" autocomplete="off" action="#" id="user_profile" method="POST">
                <div class="form-group">
                    <label for="pass1">Insert new password</label>
                    <input type="password" class="form-control" autocomplete="new-password" id="pass1" name="pass1" placeholder="New password">
                </div>
                <div class="form-group">
                    <label for="pass2">Confirm new Password</label>
                    <input type="password" class="form-control" autocomplete="new-password" id="pass2" name="pass2" placeholder="Repeat new password">
                </div>
                <div class="row m-3">
                    <div class="col pr-4">
                        <button type="submit" class="btn btn-dark">Confirm profile edit</button>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="oldPass">Insert old password to confirm edit</label>
                            <input type="password" class="form-control" autocomplete="new-password" id="oldPass" name="oldPass" placeholder="Old password">
                        </div>
                    </div>
                </div>
            </form>
        </div>

</div>