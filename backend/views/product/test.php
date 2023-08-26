<?php
/**
 * Created by IntelliJ IDEA.
 * User: cilis
 * Date: 11-Sep-17
 * Time: 12:21 AM
 */
$order = '{ 
"intent": "sale",
 "experience_profile_id":"XP-KT3T-EASA-DU4B-PAS2", 
 "redirect_urls": { 
 "return_url": "/lazada2/site/excutepaypal.html", "cancel_url": "https://tpcnuk.com/" },
  "payer": { "payment_method": "paypal" }, 
  "transactions": 
  [ { "amount": { "total": "704.2", "currency": "USD", "details":
   { "subtotal": "566", "shipping": "25", "tax": "113.2", "shipping_discount": "0" } }, 
   "item_list": { "items": [ { "quantity": "1", "name": "Biocare Elder Berry Complex 150ml ", "price": "566", "currency": "USD", "description": "KD0019", "tax": "1" }, ] }, "description": "The payment transaction description.", "invoice_number": "merchant invoice", "custom": "merchant custom data" }]}';