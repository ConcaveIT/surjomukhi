<?php

namespace Shurjomukhi\ShurjopayLaravelPlugin\Http\Controllers\TransactionClasses;

use Shurjomukhi\ShurjopayLaravelPlugin\Http\Traits\ValidationService;

/**
 * Payment request object model to make payment through shurjoPay payment gateway.
 * A trait is used for validating incoming request's data named "ValidationService"
 * "validateInput()" is used from this trait
 *
 * @author Rayhan Khan Ridoy
 * @since 2022-11-13
 */
class PaymentRequest extends PayingConsumer
{
    use ValidationService;

    // Constructor function of class
    public function __construct($object) {
        # Validating the $request object
        $validation_status = $this->validateInput($object);

        if (!$validation_status["isValidationPass"])
        {
            foreach($validation_status["errors"][0] as $attribute=>$value){
                echo "problem no.".$attribute."=>".$value."<br>";
            }
            exit;
        }else
        {
            $this->currency = $object[0]['currency'];
            $this->amount = $object[0]['amount'];
            $this->order_id = $object[0]['order_id'];
            $this->discount_amount = $object[0]['discount_amount'];
            $this->disc_percent = $object[0]['disc_percent'];
            $this->customer_name = $object[0]['customer_name'];
            $this->customer_phone =$object[0]['customer_phone'];
            $this->customer_email= $object[0]['customer_email'];
            $this->customer_address= $object[0]['customer_address'];
            $this->customer_city = $object[0]['customer_city'];
            $this->customer_state = $object[0]['customer_state'];
            $this->customer_postcode= $object[0]['customer_postcode'];
            $this->customer_country= $object[0]['customer_country'];
            $this->shipping_address=$object[0]['shipping_address'];
            $this->shipping_city=$object[0]['shipping_city'];
            $this->shipping_country=$object[0]['shipping_country'];
            $this->received_person_name=$object[0]['received_person_name'];
            $this->shipping_phone_number=$object[0]['shipping_phone_number'];
        }
    }
    /** Payment currency; e.g. BDT, USD etc */
    public string $currency;
    /** Payment amount to be debited from consumer */
    public string $amount;
    /** shurjoPay order or invoice id */
    public string $order_id;
    /** shurjoPay discount_amount */
    public string $discount_amount;
    /** shurjoPay disc_percent */
    public string $disc_percent;
    /** client_ip will generate from client-side from system automatically */
    public string $client_ip ;

    /** Optional values if needed*/
    public string $value1;
    public string $value2 ;
    public string $value3;
    public string $value4 ;
}


