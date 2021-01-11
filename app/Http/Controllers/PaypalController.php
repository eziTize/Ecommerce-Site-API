<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
   	public $apiContext;

   	public function __construct(){
   		$this->apiContext = new \PayPal\Rest\ApiContext(
	        new \PayPal\Auth\OAuthTokenCredential(
	            'AXKmeVwg-TgoEOgT8KP52ApcjoMhMtcNq7nRI0ec987wJ2Fis8fb0lAO0zVSMKsM3ADIVG66nt_pG1FB',     // ClientID
	            'EF9tihGwwUaTdLce9zt24Sz0E1_Xtm3bQfR04J_qY_nkhIZZ7QIFglpr7MpwoiS5C5ZEYgSGnVmFPg2n'      // ClientSecret
	        )
		);
   	}

    public function paypal(){
    	$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		$item1 = new Item();
		$item1->setName('Ground Coffee 40 oz')
	    	  ->setCurrency('USD')
		      ->setQuantity(1)
		      ->setSku("123123") // Similar to `item_number` in Classic API
		      ->setPrice(7.5);
		$item2 = new Item();
		$item2->setName('Granola bars')
		      ->setCurrency('USD')
		      ->setQuantity(5)
		      ->setSku("321321") // Similar to `item_number` in Classic API
		      ->setPrice(2);

		$itemList = new ItemList();
		$itemList->setItems(array($item1, $item2));

		$details = new Details();
		$details->setShipping(1.2)
		    	->setTax(1.3)
		    	->setSubtotal(17.50);

		$amount = new Amount();
		$amount->setCurrency("USD")
	    	   ->setTotal(20)
		       ->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
		    		->setItemList($itemList)
		    		->setDescription("Payment description")
		    		->setInvoiceNumber(uniqid());

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl(url("/paypal_success"))
		    		 ->setCancelUrl(url("/paypal_cancel"));

		$payment = new Payment();
		$payment->setIntent("sale")
		    	->setPayer($payer)
		    	->setRedirectUrls($redirectUrls)
		    	->setTransactions(array($transaction));

		try {
		    $payment->create($this->apiContext);
		} catch (Exception $ex) {
			ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
    		exit(1);
		}

		$approvalUrl = $payment->getApprovalLink();

		return redirect($approvalUrl);
    }

    public function paypal_success(Request $request){

    }
	
	public function paypal_cancel(Request $request){

	}
}
