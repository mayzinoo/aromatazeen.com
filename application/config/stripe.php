<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers >> API keys page 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/ 
$config['stripe_api_key']         = 'sk_test_51JDSIsJAuZIEQai7zAbMLPrWPhI41zeW1AFgF337ZbXFommHw3MLRt4UmqjNUvFQOPRoggpICZuqAVjh2Brb4DQD00UdAmruWe'; 
$config['stripe_publishable_key'] = 'pk_test_51JDSIsJAuZIEQai7szaHd0XZPPdX8FtBFKPWaJXHe6OLLrUdCddcNXZq8QhXlxyFyBzAcj3ikAoKiVwnU8I5rfop00Woxtz10u'; 
$config['stripe_currency']        = 'GBP';