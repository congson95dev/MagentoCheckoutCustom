/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            //customJS doesn't work because no where need to use that customJS.
            // customJs : 'Aht_MagentoCheckoutCustom/js/custom-js',
            'Magento_Checkout/js/model/shipping-save-processor/default': 'Aht_MagentoCheckoutCustom/js/model/shipping-save-processor/default'
        }
    }
    ,
    'config': {
        'mixins': {
            'Magento_Checkout/js/view/shipping': {
                'Aht_MagentoCheckoutCustom/js/view/shipping': true
            }
        }
    }
    // ,
    // deps:[
    //     'Aht_MagentoCheckoutCustom/js/custom-js'
    // ]
};
