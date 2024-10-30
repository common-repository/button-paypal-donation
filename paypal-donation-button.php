<?php
/*
  Plugin Name: Stick Donation with PayPal 
  Plugin URI: http://excellentdynamics.biz/
  Description: A simple PayPal donation button WordPress plugin.
  Version: 2.0.0
  Author: excellentdynamics
  Author URI: http://excellentdynamics.biz/
  License: GPLv2 or later
  License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

// Activation Hook. Check if settings exists, if not register defaults.
function paypal_donation_button_activation() {
    $options_array = array(
        'paypal_user_id' => get_option('admin_email'),
        'paypal_purpose' => 'Enter You Purpose Here',
        'paypal_button' => 'large',
        'width-button' => '100px',
        'currency' => 'USD',
        'target' => '_blank',
    );
    if (get_option('paypal_donation_button_options') !== false) {
        update_option('paypal_donation_button_options', $options_array);
    } else {
        add_option('paypal_donation_button_options', $options_array);
    }
}

register_activation_hook(__FILE__, 'paypal_donation_button_activation');

function paypal_donation_button_shortcode() {

    $options = get_option('paypal_donation_button_options');

    switch ($options['paypal_button']) {

        case 'small':
            $url = 'https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif';
            break;
        case 'donate-paypal-nocards-one':
            $url = plugin_dir_url( __FILE__ ) . 'images/donate-paypal-nocards-one.png';
            break;
        case 'donate-paypal-nocards-two':
            $url = plugin_dir_url( __FILE__ ) . 'images/donate-paypal-nocards-two.jpg';
            break;    
        case 'blue-button-one':
            $url = plugin_dir_url( __FILE__ ) . 'images/blue-button-one.png';
            break;
        case 'blue-button-two':
            $url = plugin_dir_url( __FILE__ ) . 'images/blue-button-two.png';
            break;
        case 'blue-button-three':
            $url = plugin_dir_url( __FILE__ ) . 'images/blue-button-three.png';
            break;
        case 'blue-button-four':
            $url = plugin_dir_url( __FILE__ ) . 'images/blue-button-four.png';
            break;
        case 'yellow-button-one':
            $url = plugin_dir_url( __FILE__ ) . 'images/yellow-button-one.png';
            break;
        case 'yellow-button-two':
            $url = plugin_dir_url( __FILE__ ) . 'images/yellow-button-two.png';
            break;
        case 'blue-button-big-one':
            $url = plugin_dir_url( __FILE__ ) . 'images/blue-button-big-one.png';
            break;
        case 'blue-button-big-two':
            $url = plugin_dir_url( __FILE__ ) . 'images/blue-button-big-two.png';
            break;
        case 'blue-button-big-three':
            $url = plugin_dir_url( __FILE__ ) . 'images/blue-button-big-three.png';
            break;
        case 'blue-button-big-four':
            $url = plugin_dir_url( __FILE__ ) . 'images/blue-button-big-four.png';
            break;
        case 'yellow-button-big-one':
            $url = plugin_dir_url( __FILE__ ) . 'images/yellow-button-big-one.png';
            break;
        case 'light-button-big-one':
            $url = plugin_dir_url( __FILE__ ) . 'images/light-button-big-one.png';
            break;
        case 'light-button-one':
            $url = plugin_dir_url( __FILE__ ) . 'images/light-button-one.png';
            break;
        case 'light-button-two':
            $url = plugin_dir_url( __FILE__ ) . 'images/light-button-two.png';
            break;
        case 'light-button-three':
            $url = plugin_dir_url( __FILE__ ) . 'images/light-button-three.png';
            break;
        case 'light-button-four':
            $url = plugin_dir_url( __FILE__ ) . 'images/light-button-four.png';
            break;
        case 'light-button-five':
            $url = plugin_dir_url( __FILE__ ) . 'images/light-button-five.png';
            break;
        case 'light-button-six':
            $url = plugin_dir_url( __FILE__ ) . 'images/light-button-six.png';
            break;
        case 'donate-with-paypal-one-card':
            $url = plugin_dir_url( __FILE__ ) . 'images/donate-with-paypal-one-card.png';
            break;
        case 'donate-with-paypal-two':
            $url = plugin_dir_url( __FILE__ ) . 'images/donate-with-paypal-two.png';
            break;
        case 'donate-with-paypal-three':
            $url = plugin_dir_url( __FILE__ ) . 'images/donate-with-paypal-three.jpg';
            break;
        case 'donate-with-paypal-four':
            $url = plugin_dir_url( __FILE__ ) . 'images/donate-with-paypal-four.png';
            break;
        case 'yellow-with-cards':
            $url = plugin_dir_url( __FILE__ ) . 'images/paypal-donate-button.png';
            break;
        case 'medium':
            $url = 'https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif';
            break;
        case 'large':
            $url = 'https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif';
            break;
        default:
            $url = 'https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif';
    }

    return '<form  target="' . $options['target'] . '" action="https://www.paypal.com/cgi-bin/webscr" method="post"><div class="paypal_donation_button"><input type="hidden" name="cmd" value="_donations"><input type="hidden" name="item_name" value="'.$options['paypal_purpose'].'"><input type="hidden" name="bn" value="mbjtechnolabs_SP"><input type="hidden" name="business" value="' . $options['paypal_user_id'] . '"><input type="hidden" name="rm" value="0"><input type="hidden" name="currency_code" value="' . $options['currency'] . '"><input type="image" src="' . $url . '" name="submit" alt="PayPal - The safer, easier way to pay online."><img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"></div></form>';
}

add_shortcode('paypal_donation_button', 'paypal_donation_button_shortcode');

add_filter('widget_text', 'do_shortcode');

function paypal_donation_button_custom_style() {
	 $options = get_option('paypal_donation_button_options');
    ?>
    <style type="text/css">
        .paypal_donation_button:before,
        .paypal_donation_button:after {
            content: " ";
            display: table;
        }
        .paypal_donation_button:after {
            clear: both;
        }
        .paypal_donation_button {
            max-width: <?php echo $options['width-button'];?>;
            margin: 0 auto;
            padding: 0;
            display: block;
        }
    </style>
    <?php
}

add_action('wp_head', 'paypal_donation_button_custom_style');

function paypal_donation_button_callback() {
    
}

function paypal_donation_button_user_id_callback() {
    $options = get_option('paypal_donation_button_options');
    echo "<input class='regular-text ltr' name='paypal_donation_button_options[paypal_user_id]' id='paypal_user_id' type='email' value='{$options['paypal_user_id']}'/>";
}

function paypal_donation_purpose_callback() {
    $options = get_option('paypal_donation_button_options');
    echo "<input class='regular-text ltr' name='paypal_donation_button_options[paypal_purpose]' id='paypal_purpose' type='text' value='{$options['paypal_purpose']}'/>";
}


function paypal_donation_button_button_callback() {
    $options = get_option('paypal_donation_button_options');
    ?>
    <p class="description" style="font-weight: bold;margin: 13px 49px;font-size: 18px;font-style: normal;">
        	<?php _e('Classic PayPal Buttons', 'paypal-donation-button') ?>
    </p>
    <p>

        <label>
            <input type='radio' name='paypal_donation_button_options[paypal_button]' value='small' <?php
            if ($options['paypal_button'] == 'small') {
                echo 'checked';
            }
            ?>>
            <img src='https://www.paypal.com/en_US/i/btn/btn_donate_SM.gif' alt='small' style='vertical-align: middle;margin-left: 25px;'>
        </label>
    </p>
    <p>
        <label>
            <input type='radio' name='paypal_donation_button_options[paypal_button]' value='medium' <?php
            if ($options['paypal_button'] == 'medium') {
                echo 'checked';
            }
            ?>>
            <img src='https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif' alt='medium' style='vertical-align: middle;margin-left: 25px;'>
        </label>
    </p>
    <p>
        <label>
            <input type='radio' name='paypal_donation_button_options[paypal_button]' value='large' <?php
            if ($options['paypal_button'] == 'large') {
                echo 'checked';
            }
            ?>>
            <img src='https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif' alt='large' style='vertical-align: middle;margin-left: 25px;'></br>
        </label>
    </p>
    <p class="description" style="font-weight: bold;margin: 13px 49px;font-size: 18px;font-style: normal;">
        	<?php _e('Colors PayPal Buttons', 'paypal-donation-button') ?>
    </p>
    <p>
        <label>
            <input type='radio' name='paypal_donation_button_options[paypal_button]' value='blue-button-one' <?php
            if ($options['paypal_button'] == 'blue-button-one') {
                echo 'checked';
            }
            ?>>
            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/blue-button-one.png'; ?>" alt='blue-button-one' style='vertical-align: middle;margin:1px 23px 1px;max-width: 250px;'>
        </label>
    </p>
    <p class="description" style="font-weight: bold;margin: 2px 48px;font-size: 12px;font-style: normal;">
        	<?php _e('We are recommendation width for button 200px', 'paypal-donation-button') ?>
    </p>
    <p>
        <label>
            <input type='radio' name='paypal_donation_button_options[paypal_button]' value='blue-button-two' <?php
            if ($options['paypal_button'] == 'blue-button-two') {
                echo 'checked';
            }
            ?>>
            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/blue-button-two.png'; ?>" alt='blue-button-two' style='vertical-align: middle;margin:1px 15px 1px;max-width: 285px;'>
        </label>
    </p>
    <p class="description" style="font-weight: bold;margin: 2px 48px;font-size: 12px;font-style: normal;">
        	<?php _e('We are recommendation width for button 285px', 'paypal-donation-button') ?>
    </p>
    <p>
        <label>
            <input type='radio' name='paypal_donation_button_options[paypal_button]' value='blue-button-three' <?php
            if ($options['paypal_button'] == 'blue-button-three') {
                echo 'checked';
            }
            ?>>
            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/blue-button-three.png'; ?>" alt='blue-button-three' style='vertical-align: middle;margin:1px 15px 1px;max-width: 285px;'>
        </label>
    </p>
    <p class="description" style="font-weight: bold;margin: 2px 48px;font-size: 12px;font-style: normal;">
        	<?php _e('We are recommendation width for button 285px', 'paypal-donation-button') ?>
    </p>
    <p>
        <label>
            <input type='radio' name='paypal_donation_button_options[paypal_button]' value='blue-button-four' <?php
            if ($options['paypal_button'] == 'blue-button-four') {
                echo 'checked';
            }
            ?>>
            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/blue-button-four.png'; ?>" alt='blue-button-four' style='vertical-align: middle;margin:1px 7px 1px;max-width: 300px;'>
        </label>
    </p>
    <p class="description" style="font-weight: bold;margin: 2px 48px;font-size: 12px;font-style: normal;">
        	<?php _e('We are recommendation width for button 300px', 'paypal-donation-button') ?>
    </p>
    <p>
        <label>
            <input type='radio' name='paypal_donation_button_options[paypal_button]' value='yellow-button-one' <?php
            if ($options['paypal_button'] == 'yellow-button-one') {
                echo 'checked';
            }
            ?>>
            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/yellow-button-one.png'; ?>" alt='yellow-button-one' style='vertical-align: middle;margin:1px 25px 1px;max-width: 250px;'>
        </label>
    </p>
    <p class="description" style="font-weight: bold;margin: 2px 48px;font-size: 12px;font-style: normal;">
        	<?php _e('We are recommendation width for button 200px', 'paypal-donation-button') ?>
    </p>
    <p>
        <label>
            <input type='radio' name='paypal_donation_button_options[paypal_button]' value='yellow-button-two' <?php
            if ($options['paypal_button'] == 'yellow-button-two') {
                echo 'checked';
            }
            ?>>
            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/yellow-button-two.png'; ?>" alt='yellow-button-two' style='vertical-align: middle;margin:1px 15px 1px;max-width: 285px;'>
        </label>
    </p>
    <p class="description" style="font-weight: bold;margin: 2px 48px;font-size: 12px;font-style: normal;">
        	<?php _e('We are recommendation width for button 285px', 'paypal-donation-button') ?>
    </p>
    <p>
        <label>
            <input type='radio' name='paypal_donation_button_options[paypal_button]' value='light-button-one' <?php
            if ($options['paypal_button'] == 'light-button-one') {
                echo 'checked';
            }
            ?>>
            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/light-button-one.png'; ?>" alt='light-button-one' style='vertical-align: middle;margin:1px 9px 1px;max-width: 300px;'>
        </label>
    </p>
    <p class="description" style="font-weight: bold;margin: 2px 48px;font-size: 12px;font-style: normal;">
        	<?php _e('We are recommendation width for button 300px', 'paypal-donation-button') ?>
    </p>
    <p>
        <label>
            <input type='radio' name='paypal_donation_button_options[paypal_button]' value='light-button-two' <?php
            if ($options['paypal_button'] == 'light-button-two') {
                echo 'checked';
            }
            ?>>
            <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/light-button-two.png'; ?>" alt='light-button-two' style='vertical-align: middle;margin:1px 16px 1px;max-width: 285px;'>
        </label>
    </p>
   
		
    <?php
}

function paypal_donation_button_currency_callback() {
    $options = get_option('paypal_donation_button_options');

    $currency = array(
        'AUD' => 'Australian Dollars (A $)',
        'BRL' => 'Brazilian Real',
        'CAD' => 'Canadian Dollars (C $)',
        'CZK' => 'Czech Koruna',
        'DKK' => 'Danish Krone',
        'EUR' => 'Euros (€)',
        'HKD' => 'Hong Kong Dollar ($)',
        'HUF' => 'Hungarian Forint',
        'ILS' => 'Israeli New Shekel',
        'JPY' => 'Yen (¥)',
        'MYR' => 'Malaysian Ringgit',
        'MXN' => 'Mexican Peso',
        'NOK' => 'Norwegian Krone',
        'NZD' => 'New Zealand Dollar ($)',
        'PHP' => 'Philippine Peso',
        'PLN' => 'Polish Zloty',
        'GBP' => 'Pounds Sterling (£)',
        'RUB' => 'Russian Ruble',
        'SGD' => 'Singapore Dollar ($)',
        'SEK' => 'Swedish Krona',
        'CHF' => 'Swiss Franc',
        'TWD' => 'Taiwan New Dollar',
        'THB' => 'Thai Baht',
        'TRY' => 'Turkish Lira',
        'USD' => 'U.S. Dollars ($)',
    );
    ?>
    <select id='currency_code' name='paypal_donation_button_options[currency]'>
        <?php
        foreach ($currency as $code => $label) :
            if ($code == $options['currency']) {
                $selected = "selected='selected'";
            } else {
                $selected = '';
            }
            echo "<option {$selected} value='{$code}'>{$label}</option>";
        endforeach;
        ?>
    </select>
    <?php
}

function paypal_donation_button_target_callback() {
    $options = get_option('paypal_donation_button_options');
    $target = array(
        '_blank' => 'Blank',
        '_self' => 'Self'
    );
    ?>
    <select id='target' name='paypal_donation_button_options[target]'>
        <?php
        foreach ($target as $key => $label) :
            if ($key == $options['target']) {
                $selected = "selected='selected'";
            } else {
                $selected = '';
            }
            echo "<option {$selected} value='{$key}'>{$label}</option>";
        endforeach;
        ?>
    </select>
    <p class="description"><?php _e('Select "Blank" to open the PayPal window in a new window or tab (this is default). Selcet "Self" to open the PayPal window in the same frame as it was clicked.', 'paypal-donation-button') ?></p>
    <?php
}

function paypal_donation_button_width_callback() {
    $options = get_option('paypal_donation_button_options');
    $target = array(
        '100px' => '100px',
        '150px' => '150px',
        '200px' => '200px',
        '250px' => '250px',
        '285px' => '285px',
        '300px' => '300px',
        '315px' => '315px'
    );
    ?>
    <select id='width-button' name='paypal_donation_button_options[width-button]'>
        <?php
        foreach ($target as $key => $label) :
            if ($key == $options['width-button']) {
                $selected = "selected='selected'";
            } else {
                $selected = '';
            }
            echo "<option {$selected} value='{$key}'>{$label}</option>";
        endforeach;
        ?>
    </select>
    <p class="description"><?php _e('You can choose a button width.', 'paypal-donation-button') ?></p>
    <?php
}

function paypal_donation_button_settings_and_fields() {

    register_setting(
            'paypal_donation_button_options', 'paypal_donation_button_options'
    );

    add_settings_section(
            'donate_plugin_main_section', __('Main Settings', 'paypal-donation-button'), 'paypal_donation_button_callback', __FILE__
    );

    add_settings_field(
            'paypal_user_id', __('PayPal ID (E-Mail):', 'paypal-donation-button'), 'paypal_donation_button_user_id_callback', __FILE__, 'donate_plugin_main_section', array('label_for' => 'paypal_user_id')
    );
     add_settings_field(
            'paypal_purpose', __('Donation Purpose:', 'paypal-donation-button'), 'paypal_donation_purpose_callback', __FILE__, 'donate_plugin_main_section', array('label_for' => 'paypal_purpose')
    );

    add_settings_field(
            'paypal_button', __('Choose Donate Button:', 'paypal-donation-button'), 'paypal_donation_button_button_callback', __FILE__, 'donate_plugin_main_section', array('label_for' => 'paypal_button')
    );

    add_settings_field(
            'currency', __('Select Currency:', 'paypal-donation-button'), 'paypal_donation_button_currency_callback', __FILE__, 'donate_plugin_main_section', array('label_for' => 'currency')
    );

    add_settings_field(
            'target', __('Open PayPal:', 'paypal-donation-button'), 'paypal_donation_button_target_callback', __FILE__, 'donate_plugin_main_section', array('label_for' => 'target')
    );

    add_settings_field(
            'width-button', __('Choose width button :', 'paypal-donation-button'), 'paypal_donation_button_width_callback', __FILE__, 'donate_plugin_main_section', array('label_for' => 'width-button')
    );
}

add_action('admin_init', 'paypal_donation_button_settings_and_fields');

function paypal_donation_button_options_init() {
    add_options_page(
            __('PayPal Donation', 'paypal-donation-button'), __('PayPal Donation', 'paypal-donation-button'), 'administrator', __FILE__, 'paypal_donation_button_options_page'
    );
}

add_action('admin_menu', 'paypal_donation_button_options_init');

function paypal_donation_button_options_page() {
    ?>
    <div class="wrap">
        <h2><?php _e('PayPal Donation Button Settings', 'paypal-donation-button') ?></h2>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php
            settings_fields('paypal_donation_button_options');
            do_settings_sections(__FILE__);
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
