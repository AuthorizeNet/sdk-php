<?php
/**
 * A map of classname => filename for SPL autoloading.
 *
 * @package AuthorizeNet
 */

$libDir    = __DIR__ . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR;
$sharedDir = $libDir . 'shared' . DIRECTORY_SEPARATOR;

return array(
    'AuthorizeNetAIM'            => $libDir    . 'AuthorizeNetAIM.php',
    'AuthorizeNetAIM_Response'   => $libDir    . 'AuthorizeNetAIM.php',
    'AuthorizeNetARB'            => $libDir    . 'AuthorizeNetARB.php',
    'AuthorizeNetARB_Response'   => $libDir    . 'AuthorizeNetARB.php',
    'AuthorizeNetAddress'        => $sharedDir . 'AuthorizeNetTypes.php',
    'AuthorizeNetBankAccount'    => $sharedDir . 'AuthorizeNetTypes.php',
    'AuthorizeNetCIM'            => $libDir    . 'AuthorizeNetCIM.php',
    'AuthorizeNetCIM_Response'   => $libDir    . 'AuthorizeNetCIM.php',
    'AuthorizeNetCP'             => $libDir    . 'AuthorizeNetCP.php',
    'AuthorizeNetCP_Response'    => $libDir    . 'AuthorizeNetCP.php',
    'AuthorizeNetCreditCard'     => $sharedDir . 'AuthorizeNetTypes.php',
    'AuthorizeNetCustomer'       => $sharedDir . 'AuthorizeNetTypes.php',
    'AuthorizeNetDPM'            => $libDir    . 'AuthorizeNetDPM.php',
    'AuthorizeNetException'      => $sharedDir . 'AuthorizeNetException.php',
    'AuthorizeNetLineItem'       => $sharedDir . 'AuthorizeNetTypes.php',
    'AuthorizeNetPayment'        => $sharedDir . 'AuthorizeNetTypes.php',
    'AuthorizeNetPaymentProfile' => $sharedDir . 'AuthorizeNetTypes.php',
    'AuthorizeNetRequest'        => $sharedDir . 'AuthorizeNetRequest.php',
    'AuthorizeNetResponse'       => $sharedDir . 'AuthorizeNetResponse.php',
    'AuthorizeNetSIM'            => $libDir    . 'AuthorizeNetSIM.php',
    'AuthorizeNetSIM_Form'       => $libDir    . 'AuthorizeNetSIM.php',
    'AuthorizeNetSOAP'           => $libDir    . 'AuthorizeNetSOAP.php',
    'AuthorizeNetTD'             => $libDir    . 'AuthorizeNetTD.php',
    'AuthorizeNetTD_Response'    => $libDir    . 'AuthorizeNetTD.php',
    'AuthorizeNetTransaction'    => $sharedDir . 'AuthorizeNetTypes.php',
    'AuthorizeNetXMLResponse'    => $sharedDir . 'AuthorizeNetXMLResponse.php',
    'AuthorizeNet_Subscription'  => $sharedDir . 'AuthorizeNetTypes.php',
);
