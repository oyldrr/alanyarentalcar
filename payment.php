<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Screen</title>
        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/payment.css">
        <link href="assets/images/favicon.ico" rel="icon">

    </head>
    <body>

        <div class="container">
            <div class="card-container">
                <div class="front">
                    <div class="image">
                        <img src="assets/images/chip.png" alt="">
                        <img src="assets/images/visa.png" alt="">
                    </div>
                    <div class="card-number-box">#### #### #### ####</div>
                    <div class="flexbox">
                        <div class="box">
                            <span>card holder</span>
                            <div class="card-holder-name">name surname</div>
                        </div>
                        <div class="box">
                            <span>valid expiration date</span>
                            <div class="expiration">
                                <span class="exp-month">mm</span>
                                <span class="exp-year">yy</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="back">
                    <div class="stripe"></div>
                    <div class="box">
                        <span>cvv</span>
                        <div class="cvv-box"></div>
                        <img src="assets/images/visa.png" alt="">
                    </div>
                </div>

            </div>

            <form action="process.php" method="post">
                <div class="inputBox">
                    <span>card number</span>
                    <input required id="cc" name="cardNo" type="text" pattern="[0-9\s]{19,19}" onkeypress="return checkDigit(event)" class="card-number-input">
                </div>
                <div class="inputBox">
                    <span>card holder</span>
                    <input required name="cardHolder" type="text" inputmode="none" maxlength="25" class="card-holder-input">
                </div>
                <div class="flexbox">
                    <div class="inputBox">
                        <span>valid exp. month</span>
                        <select required name="month" id="" class="month-input">
                            <option value="month" selected disabled>month</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>valid exp. year</span>
                        <select required name="year" id="" class="year-input">
                            <option value="year" selected disabled>year</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>cvv</span>
                        <input required name="cvv" type="text" maxlength="3" minlength="3" class="cvv-input">
                    </div>
                </div>
                <input name="odemegonder" type="submit" value="complete payment" class="submit-btn">
            </form>
        </div>        
        <script src="js/payment.js"></script>
    </body>
</html>