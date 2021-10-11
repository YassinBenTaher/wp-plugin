<?php
/*
Plugin Name: Spare for woocommerce
Plugin URI: https://wordpress.org/plugins/health-check/
Description: Create spare plugin woocommerce
Version: 1.0.0
Author: Spare team
Author URI: http://health-check-team.example.com
*/

require_once __DIR__ . '/../../../vendor/autoload.php';
add_filter('woocommerce_payment_gateways', 'spare_add_gateway_class');
function spare_add_gateway_class($gateways)
{
    $gateways[] = 'WC_Spare_Gateway'; // your class name is here
    return $gateways;
}

add_action('plugins_loaded', 'spare_init_gateway_class');

function spare_init_gateway_class()
{

    class WC_Spare_Gateway extends WC_Payment_Gateway
    {
        public function __construct()
        {

            $this->id = 'misha'; // payment gateway plugin ID
            $this->icon = '/wp-content/plugins/woocommerce-payment/assets/appstore.png'; // URL of the icon that will be displayed on checkout page near your gateway name
            $this->has_fields = true; // in case you need a custom credit card form
            $this->method_title = 'Spare Gateway';
            $this->method_description = 'Description of Spare payment gateway'; // will be displayed on the options page


            // gateways can support subscriptions, refunds, saved payment methods,
            // but in this tutorial we begin with simple payments
            $this->supports = array(
                'products'
            );

            // Method with all the options fields
            $this->init_form_fields();

            // Load the settings.
            $this->init_settings();
            $this->title = $this->get_option('title');
            $this->description = $this->get_option('description');
            $this->enabled = $this->get_option('enabled');
            $this->private_key = $this->get_option('private_key');
            $this->publishable_key = $this->get_option('publishable_key');
            $this->x_api_key = $this->get_option('x_api_key');
            $this->app_id = $this->get_option('app_id');

            // This action hook saves the settings
            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));

            // We need custom JavaScript to obtain a token
            add_action('wp_enqueue_scripts', array($this, 'payment_scripts'));

            // You can also register a webhook here
            // add_action( 'woocommerce_api_{webhook name}', array( $this, 'webhook' ) );
        }

        public function init_form_fields()
        {

            $this->form_fields = array(
                'enabled' => array(
                    'title' => 'Enable/Disable',
                    'label' => 'Enable Spare Gateway',
                    'type' => 'checkbox',
                    'description' => '',
                    'default' => 'no'
                ),
                'title' => array(
                    'title' => 'Title',
                    'type' => 'text',
                    'description' => 'This controls the title which the user sees during checkout.',
                    'default' => 'Credit Card',
                    'desc_tip' => true,
                ),
                'description' => array(
                    'title' => 'Description',
                    'type' => 'textarea',
                    'description' => 'This controls the description which the user sees during checkout.',
                    'default' => 'Pay with your credit card via our super-cool payment gateway.',
                ),
                'publishable_key' => array(
                    'title' => 'Public Key',
                    'type' => 'text'
                ),
                'private_key' => array(
                    'title' => 'Private Key',
                    'type' => 'password'
                ),
                'x_api_key' => array(
                    'title' => 'x_api_key',
                    'type' => 'text'
                ),
                'app_id' => array(
                    'title' => 'app_id',
                    'type' => 'text'
                )

            );
        }

        public function payment_scripts()
        {

            // we need JavaScript to process a token only on cart/checkout pages, right?
            if (!is_cart() && !is_checkout() && !isset($_GET['pay_for_order'])) {
                return;
            }

            // if our payment gateway is disabled, we do not have to enqueue JS too
            if ('no' === $this->enabled) {
                return;
            }

            // no reason to enqueue JavaScript if API keys are not set
            if (empty($this->private_key) || empty($this->publishable_key)) {
                return;
            }

            // in most payment processors you have to use PUBLIC KEY to obtain a token
            wp_localize_script('woocommerce_spare', 'spare_params', array(
                'publishableKey' => $this->publishable_key
            ));

            wp_enqueue_script('woocommerce_spare');

        }

        public function process_payment($order_id)
        {
            global $woocommerce;
            $order = new WC_Order($order_id);
            $client = new \Payment\Client\SpPaymentClient(
                new \Payment\Client\SpPaymentClientOptions('https://dev.tryspare.com',
                    $this->app_id,
                    $this->x_api_key)
            );

            $rep = $client->CreateDomesticPayment(new \Payment\Models\Payment\Domestic\SpDomesticPayment(
                $order->get_total(), 'Test payment'
            ));

            $woocommerce->cart->empty_cart();

            return array(
                'result' => 'success',
                'redirect' => $rep['link']
            );
        }
    }
}   
