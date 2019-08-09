<?php
/**
 * @category   Webkul
 * @package    Test_TestCustomMenu
 * @author     Webkul Software Private Limited
 * @license    https://store.webkul.com/license.html
 */

namespace Codilar\EcommageBlog\Plugin;

class Topmenu
{
    /**
     * @param Context                                   $context
     * @param array                                     $data
     */
    public function __construct(
        \Magento\Customer\Model\Session $session
    ) {
        $this->Session = $session;
    }


    public function afterGetHtml(\Magento\Theme\Block\Html\Topmenu $topmenu, $html)
    {
        $swappartyUrl = $topmenu->getUrl('EcommageBlog');//here you can set link
        $magentoCurrentUrl = $topmenu->getUrl('*/*/*', ['_current' => true, '_use_rewrite' => true]);
        if (strpos($magentoCurrentUrl,'testCustomMenu/custommenu') !== false) {
            $html .= "<li class=\"level0 nav-5 active level-top parent ui-menu-item\">";
        } else {
            $html .= "<li class=\"level0 nav-4 level-top parent ui-menu-item\">";
        }
        $html .= "<a href=\"" . $swappartyUrl . "\" class=\"level-top ui-corner-all\"></span><span>" . __("Blog") . "</span></a>";
        $html .= "</li>";
        return $html;
    }
}