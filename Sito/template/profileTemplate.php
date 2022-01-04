<div class="row">
    <div class="col">

        <div class="row d-flex justify-content-center welcomingMessage p-3">
            <h2>Welcome <?php echo $templateParams["userInfo"]["Nome"]; ?></h2>
            <?php if($templateParams['isAdmin']){
                echo  "<a href='../admin.php'>Admin Page</a>";
            }?>
        </div>
        <div class="row d-flex justify-content-start p-2 rowForOrderHistoryBtn">
            <button class="btn btn-dark" id="orderHistoryBtn">Show Order History</button>
        </div>
    <div class="row">

        <div class="col border ml-5 mr-5 p-3 orderHistory">
            <h3>Order history</h3>
            <div class="col border text-center">
                        <?php for($i=0;$i<count($templateParams["ordersHistory"]);$i++): ?>
                        <?php $totaleOrdine=0; ?>
                            <div class="row d-flex justify-content-center pt-3 border-top">
                                <h4>Ordine N°<?php echo $i+1 ?></h4></div>
                            <div class="row">
                                <?php for($j=0;$j<count($templateParams["ordersHistory"][$i]);$j++): ?>
                                    <div class="col pl-5 pr-5 pt-1 m-0">
                                        <div class="col border-left border-right border-top mt-0"><p>Product N°<?php echo $j+1 ?></p></div>
                                        <div class="col border">
                                            <p>Title: <?php echo $templateParams["ordersHistory"][$i][$j]["Titolo"] ?></p>
                                            <div class="row d-flex justify-content-center">
                                                <p class="frameColor">Frame color: </p>
                                                <div class="row ml-2 mb-3 colorShower" style="background-color: <?php echo $templateParams["ordersHistory"][$i][$j]["Colore_frame"] ?>">
                                                    &nbsp;
                                                </div>
                                            </div>
                                            <p>Language: <?php echo $templateParams["ordersHistory"][$i][$j]["NomeLinguaggio"] ?></p>
                                            <p>Quantity: <?php echo $templateParams["ordersHistory"][$i][$j]["Quantità"] ?></p>
                                            <?php
                                                $costoProdotto = getPrice($templateParams["ordersHistory"][$i][$j]["Larghezza"],$templateParams["ordersHistory"][$i][$j]["Altezza"], ($templateParams["ordersHistory"][$i][$j])['Quantità']);

                                                $totaleOrdine += $costoProdotto;
                                            ?>
                                            <div class="row d-flex justify-content-start pl-4"><p>Price: <?php echo $costoProdotto ?>€</p></div>
                                            <div class="row d-flex justify-content-start pl-4"><p>Shipping: <?php echo $SHIPPING_COST ?>€</p></div>
                                        </div>

                                    </div>
                                <?php endfor; ?>
                            </div>
                            <div class="row d-flex justify-content-end pr-4 pt-2 pb-4"><h4>Total: <?php echo $totaleOrdine + $SHIPPING_COST?>€</h4></div>
                        <?php endfor; ?>
            </div>
        </div>

        <div class="col editableInfo m-1">
            <div class="col border p-2 m-3 editYourProfileContainer">
                <h2>Edit your profile information</h2>
                <div class="row d-flex justify-content-center m-3">

                    <form role="form" autocomplete="off" action="#" id="user_profile" method="POST">
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" class="form-control" required autocomplete="off" id="first_name" name="first_name" placeholder="First name" value="<?php echo $templateParams["userInfo"]["Nome"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" class="form-control" required autocomplete="off" id="last_name" name="last_name" placeholder="Last name" value="<?php echo $templateParams["userInfo"]["Cognome"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="twitter_name">Username</label>
                            <input type="text" class="form-control" required autocomplete="off" id="username" name="username" placeholder="Username" value="<?php echo $templateParams["userInfo"]["Username"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" required autocomplete="off" id="email" name="email" placeholder="Enter email" value="<?php echo $templateParams["userInfo"]["Email"]; ?>">
                        </div>
                        <div class="row m-3">
                            <div class="col pr-4">
                                <button class="btn btn-dark m-2">Confirm profile edit</button>
                                <button class="btn btn-dark discardChanges m-2">Discard changes</button>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="oldPass">Insert current password to confirm edit</label>
                                    <input type="password" class="form-control oldPass" autocomplete="new-password" name="oldPass" placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
            <div class="col border m-3 p-2 editYourPasswordContainer">
                <h2>Edit password</h2>
                <div class="row d-flex justify-content-center m-3">
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
                            <button class="btn btn-dark m-2">Confirm profile edit</button>
                            <button class="btn btn-dark discardChanges m-2">Discard changes</button>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="oldPass">Insert current password to confirm edit</label>
                                <input type="password" class="form-control oldPass" autocomplete="new-password" name="oldPass" placeholder="Password">
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <div class="col notEditableInfo m-1">
            <div class="col border p-2 m-3 editableInfoCont">
                <h2>Profile information</h2>
                <p>NAME: <?php echo $templateParams["userInfo"]["Nome"]; ?></p>
                <p>SURNAME: <?php echo $templateParams["userInfo"]["Cognome"]; ?></p>
                <p>USERNAME: <?php echo $templateParams["userInfo"]["Username"]; ?></p>
                <p>EMAIL: <?php echo $templateParams["userInfo"]["Email"]; ?></p>
                <button class="btn btn-dark" id="EditProfileBtn">Edit profile information</button>
            </div>
        </div>
    </div>
    </div>
</div>