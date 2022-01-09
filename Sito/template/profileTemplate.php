<div class="row">
    <div class="col">
        <section>
            <div class="row d-flex justify-content-center welcomingMessage p-3">
                <h1>Welcome <?php echo $templateParams["userInfo"]["Nome"]; ?></h1>

            </div>
            <div class="row justify-content-center">
                <?php if ($templateParams['isAdmin']) {
                    echo "<a href='../admin.php'>Admin Page</a>";
                } ?>
            </div>
            <div class="row d-flex justify-content-start p-2 rowForOrderHistoryBtn">
                <button class="btn btn-dark" id="orderHistoryBtn">Show Order History</button>
            </div>
            <div class="row">

                <div class="col border ml-5 mr-5 mb-3 mt-3 p-3 orderHistory">
                    <section>
                        <h2>Order history</h2>
                        <div class="col border text-center">
                            <?php for ($i = 0; $i < count($templateParams["ordersHistory"]); $i++): ?>
                                <?php $totaleOrdine = 0; ?>
                                <div class="row d-flex justify-content-center pt-3 border-top">
                                    <section>
                                    <h3>Ordine N°<?php echo $i + 1 ?></h3>
                                        </section></div>
                                <div class="row">
                                    <?php for ($j = 0; $j < count($templateParams["ordersHistory"][$i]); $j++): ?>
                                        <div class="col pl-5 pr-5 pt-1 m-0">
                                            <div class="col border-left border-right border-top mt-0"><p>Product
                                                    N°<?php echo $j + 1 ?></p></div>
                                            <div class="col border">
                                                <p>
                                                    Title: <?php echo $templateParams["ordersHistory"][$i][$j]["Titolo"] ?></p>
                                                <div class="row d-flex justify-content-center">
                                                    <div class="row d-flex justify-content-center ml-2 mb-3 colorShower">
                                                        <label>Frame color: </label>
                                                        <input type="color" name="colorFrame"
                                                               value="<?php echo $templateParams["ordersHistory"][$i][$j]["Colore_frame"] ?>"
                                                               disabled title="frame color">
                                                    </div>
                                                </div>
                                                <p>
                                                    Language: <?php echo $templateParams["ordersHistory"][$i][$j]["NomeLinguaggio"] ?></p>
                                                <p>
                                                    Quantity: <?php echo $templateParams["ordersHistory"][$i][$j]["Quantità"] ?></p>
                                                <?php
                                                $costoProdotto = getPrice($templateParams["ordersHistory"][$i][$j]["Larghezza"], $templateParams["ordersHistory"][$i][$j]["Altezza"], ($templateParams["ordersHistory"][$i][$j])['Quantità']);

                                                $totaleOrdine += $costoProdotto;
                                                ?>
                                                <div class="row d-flex justify-content-start pl-4"><p>
                                                        Price: <?php echo $costoProdotto ?>€</p></div>
                                                <div class="row d-flex justify-content-start pl-4"><p>
                                                        Shipping: <?php echo $SHIPPING_COST ?>€</p></div>
                                            </div>

                                        </div>
                                    <?php endfor; ?>
                                </div>
                                <div class="row d-flex justify-content-end pr-4 pt-2 pb-4"><h4>
                                        Total: <?php echo $totaleOrdine + $SHIPPING_COST ?>€</h4></div>
                            <?php endfor; ?>
                        </div>
                    </section>
                </div>

                <div class="col editableInfo m-1">
                    <div class="col border p-2 m-3 editYourProfileContainer">
                        <section>
                            <h2>Edit your profile information</h2>
                            <div class="col d-flex justify-content-center m-3">

                                <form autocomplete="off" action="#" id="user_profile" method="POST">
                                    <label for="first_name">First name</label>
                                    <input type="text" required autocomplete="off" id="first_name"
                                           name="first_name" placeholder="First name"
                                           value="<?php echo $templateParams["userInfo"]["Nome"]; ?>"
                                           title="first name">
                                    <label for="last_name">Last name</label>
                                    <input type="text" required autocomplete="off" id="last_name"
                                           name="last_name" placeholder="Last name"
                                           value="<?php echo $templateParams["userInfo"]["Cognome"]; ?>"
                                           title="last name">
                                    <label>Username</label>
                                    <input type="text" required autocomplete="off"
                                           name="username" placeholder="Username"
                                           value="<?php echo $templateParams["userInfo"]["Username"]; ?>"
                                           title="username">
                                    <label for="email">Email address</label>
                                    <input type="email" required autocomplete="off" id="email"
                                           name="email" placeholder="Enter email"
                                           value="<?php echo $templateParams["userInfo"]["Email"]; ?>" title="email">
                                    <div class="row m-3">
                                        <div class="col pr-4">
                                            <button class="btn btn-dark m-2">Confirm profile edit</button>
                                            <button class="btn btn-dark discardChanges m-2">Discard changes</button>
                                        </div>
                                        <div class="col">
                                            <label>Insert current password to confirm edit</label>
                                            <input type="password" class="oldPass" autocomplete="new-password"
                                                   name="oldPass" placeholder="Password"
                                                   title="Insert current password to confirm edit">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </section>
                    </div>
                    <div class="col border m-3 p-2 editYourPasswordContainer">
                        <section>
                            <h2>Edit password</h2>
                            <div class="row d-flex justify-content-center m-3">
                                <form autocomplete="off" action="#" id="user_profile2" method="POST">
                                    <label for="pass1">Insert new password</label>
                                    <input type="password" autocomplete="new-password" id="pass1"
                                           name="pass1" placeholder="New password" title="Insert new password">
                                    <label for="pass2">Confirm new Password</label>
                                    <input type="password" autocomplete="new-password" id="pass2"
                                           name="pass2" placeholder="Repeat new password" title="Confirm new Password">
                                    <div class="row m-3">
                                        <div class="col pr-4">
                                            <button class="btn btn-dark m-2">Confirm profile edit</button>
                                            <button class="btn btn-dark discardChanges m-2">Discard changes</button>
                                        </div>
                                        <div class="col">
                                            <label>Insert current password to confirm edit</label>
                                            <input type="password" class="oldPass1" autocomplete="new-password"
                                                   name="oldPass1" placeholder="Password"
                                                   title="Insert current password to confirm edit"
                                                   title="Insert current password to confirm edit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>

                <div class="col notEditableInfo m-1">
                    <div class="col border p-2 m-3 editableInfoCont">
                        <section>
                            <h2>Profile information</h2>
                            <p>NAME: <?php echo $templateParams["userInfo"]["Nome"]; ?></p>
                            <p>SURNAME: <?php echo $templateParams["userInfo"]["Cognome"]; ?></p>
                            <p>USERNAME: <?php echo $templateParams["userInfo"]["Username"]; ?></p>
                            <p>EMAIL: <?php echo $templateParams["userInfo"]["Email"]; ?></p>
                            <button class="btn btn-dark" id="EditProfileBtn">Edit profile information</button>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>