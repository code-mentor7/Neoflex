<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Stripe Payment</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        * {
            font-family: 'Helvetica Neue', Helvetica, sans-serif;
            font-size: 19px;
            font-variant: normal;
            padding: 0;
            margin: 0;
          }
          
          html {
            height: 100%;
          }
          
          body {
            background: #424770;
            display: flex;
            align-items: center;
            min-height: 100%;
          }
          
          form {
            width: 480px;
            margin: 20px auto;
          }
          
          label {
            height: 35px;
            position: relative;
            color: #8798AB;
            display: block;
            margin-top: 30px;
            margin-bottom: 20px;
          }
          
          label > span {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            font-weight: 300;
            line-height: 32px;
            color: #8798AB;
            border-bottom: 1px solid #586A82;
            transition: border-bottom-color 200ms ease-in-out;
            cursor: text;
            pointer-events: none;
          }
          
          label > span span {
            position: absolute;
            top: 0;
            left: 0;
            transform-origin: 0% 50%;
            transition: transform 200ms ease-in-out;
            cursor: text;
          }
          
          label .field.is-focused + span span,
          label .field:not(.is-empty) + span span {
            transform: scale(0.68) translateY(-36px);
            cursor: default;
          }
          
          label .field.is-focused + span {
            border-bottom-color: #34D08C;
          }
          
          .field {
            background: transparent;
            font-weight: 300;
            border: 0;
            color: white;
            outline: none;
            cursor: text;
            display: block;
            width: 100%;
            line-height: 32px;
            padding-bottom: 3px;
            transition: opacity 200ms ease-in-out;
          }
          
          .field::-webkit-input-placeholder { color: #8898AA; }
          .field::-moz-placeholder { color: #8898AA; }
          
          /* IE doesn't show placeholders when empty+focused */
           .field:-ms-input-placeholder { color: #424770; }
          
          .field.is-empty:not(.is-focused) {
            opacity: 0;
          }
          
          button {
            float: left;
            display: block;
            background: #34D08C;
            color: white;
            border-radius: 2px;
            border: 0;
            margin-top: 20px;
            font-size: 19px;
            font-weight: 400;
            width: 100%;
            height: 47px;
            line-height: 45px;
            outline: none;
          }
          
          button:focus {
            background: #24B47E;
          }
          
          button:active {
            background: #159570;
          }
          
          .outcome {
            float: left;
            width: 100%;
            padding-top: 8px;
            min-height: 20px;
            text-align: center;
          }
          
          .success, .error {
            display: none;
            font-size: 15px;
          }
          
          .success.visible, .error.visible {
            display: inline;
          }
          
          .error {
            color: #E4584C;
          }
          
          .success {
            color: #34D08C;
          }
          
          .success .token {
            font-weight: 500;
            font-size: 15px;
          }
        </style>
    </head>
    <body>
        
        <form method="post" action="<?php echo base_url();?>index.php?payment/stripe_payment/<?php echo $plan_id;?>">
            
            <label>
                <div id="card-element" class="field is-empty"></div>
                <span><span>Credit / Debit card</span></span>
            </label>
            <button type="submit">
                pay 
            </button>
            <div class="outcome">
                <div class="error" role="alert"></div>
                <div class="success">
                Success! Your Stripe token is <span class="token"></span>
                </div>
            </div>
            <input type="hidden" name="stripeToken" value="">
        </form>

        <script src="https://js.stripe.com/v3/"></script>

        <script>
			// stripe public key (live/test)
            var stripe = Stripe('<?php echo $this->db->get_where('settings',array('type'=>'stripe_publishable_key'))->row()->description;?>'); 
            var elements = stripe.elements();

            var card = elements.create("card", {
                iconStyle: "solid",
                style: {
                    base: {
                        iconColor: "#8898AA",
                        color: "white",
                        lineHeight: "36px",
                        fontWeight: 300,
                        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                        fontSize: "19px",

                        "::placeholder": {
                            color: "#8898AA"
                        }
                    },
                    invalid: {
                        iconColor: "#e85746",
                        color: "#e85746"
                    }
                },
                classes: {
                    focus: "is-focused",
                    empty: "is-empty"
                }
            });
            card.mount("#card-element");

            var inputs = document.querySelectorAll("input.field");
            Array.prototype.forEach.call(inputs, function(input) {
                input.addEventListener("focus", function() {
                    input.classList.add("is-focused");
                });
                input.addEventListener("blur", function() {
                    input.classList.remove("is-focused");
                });
                input.addEventListener("keyup", function() {
                    if (input.value.length === 0) {
                        input.classList.add("is-empty");
                    } else {
                        input.classList.remove("is-empty");
                    }
                });
            });

            var form = document.querySelector("form");
            function setOutcome(result) {
                var successElement = document.querySelector(".success");
                var errorElement = document.querySelector(".error");
                successElement.classList.remove("visible");
                errorElement.classList.remove("visible");

                if (result.token) {
                    // Use the token to create a charge or a customer
                    // https://stripe.com/docs/charges
                    //successElement.querySelector(".token").textContent = result.token.id;
                    form.querySelector("input[name=stripeToken]").value = result.token.id;
                    form.submit();
                    //successElement.classList.add("visible");
                } else if (result.error) {
                    errorElement.textContent = result.error.message;
                    errorElement.classList.add("visible");
                }
            }

            card.on("change", function(event) {
                setOutcome(event);
            });

            document.querySelector("form").addEventListener("submit", function(e) {
                e.preventDefault();
                var extraDetails = {
                    //name: form.querySelector("input[name=cardholder-name]").value
                };
                stripe.createToken(card, extraDetails).then(setOutcome);
            });
        </script>

    </body>
</html>