<?php
/**
 * Pwd Newrelic
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Pwd
 * @package     Pwd_Newrelic
 * @copyright   Copyright (c) 2013 Bluespell Ltd.
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
/**
 * Dummy filesystem Client logging all new relic activities to the filesystem
 *
 * @category	Pwd
 * @package		Pwd_Newrelic
 * @author      Istvan Orban
 */
class Pwd_Newrelic_Model_Client_Debug extends Pwd_Newrelic_Model_Client_Abstract {

    /**
     * in new relic call this if the appname is defined
     * if(!empty($appName)) newrelic_set_appname($appName, $license, $xmit);
     */
    public function setApplicationName($name) {
        Mage::log('setApplicationName: '.$name,null,'newrelic.log');
        return $this;
    }

    /**
     * in new relic call ->
            newrelic_capture_params(true);
     * @return null
     */
    public function captureParams() {
        Mage::log('capture request parameters: ',null,'newrelic.log');
        return $this;
    }

    /**
     *
     * record custom parameters to the call
     *      newrelic_add_custom_parameter()
     *
     * @param $name
     * @param $value
     * @return $this
     */
    public function addCustomParameter($name, $value) {
        Mage::log('add custom parameters ('.$name.') => '.$value,null,'newrelic.log');
        return $this;
    }

    /**
     * newrelic_ignore_transaction();
     * @return $this
     */
    public function ignoreTransaction() {
        Mage::log('ignoring this transaction',null,'newrelic.log');
        return $this;
    }

    /**
     * newrelic_ignore_apdex();
     * @return $this
     */
    public function ignoreApdex() {
        Mage::log('ignoring this apdex',null,'newrelic.log');
        return $this;
    }

    /**
     * record newrelic_set_user_attributes
     * @param $user
     * @param $account
     * @param $product
     */
    public function setUserAttributes($user, $account, $product) {
        Mage::log('set User Attributes user => '.$user.', account => '.$account.', product => '.$product,null,'newrelic.log');
        return $this;
    }

    /**
     * record newrelic_name_transaction
     * change the name of the transaction
     * @param $name
     */
    public function setNameTransaction($name) {
        Mage::log('set Transaction Name => '.$name,null,'newrelic.log');
        return $this;
    }

    /**
     * return newrelic_get_browser_timing_header();
     */
    public function getBrowserTimingHeader() {
        return "<script type='text/javascript'>//<![CDATA[ var _debug = 'enabled';//]]></script>";
    }

    /**
     * return newrelic_get_browser_timing_footer();
     */
    public function getBrowserTimingFooter() {
        return "<script type='text/javascript'>//<![CDATA[ var _footerdebug = 'enabled';//]]></script>";
    }


    /**
     * setting up new relic tracers using newrelic_add_custom_tracer()
     * @param $name
     * @return $this
     */
    public function addCustomTracer($name) {
        Mage::log('Adding custom tracer: '.$name,null,'newrelic.log');
        return $this;
    }

    /**
     * call newrelic_background_jo
     * @return $this
     */
    public function markBackgroundJob() {
        if ( $this->isMarkedBackground() ) {
            return $this;
        }
        parent::markBackgroundJob();
        Mage::log('mark job background: ',null,'newrelic.log');
        return $this;
    }

    /**
     *
     * call newrelic_notice_error (message [, exception] )
     *
     * @param $message
     * @param null $exception
     * @return $this
     */
    public function noticeError($message, $exception = null) {
        return $this;
    }

}