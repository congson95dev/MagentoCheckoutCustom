/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            //customJS doesn't work because no where need to use that customJS.
            customJs : 'Aht_MagentoCheckoutCustom/js/custom-js.js',
            'Magento_Checkout/js/model/shipping-save-processor/default': 'Aht_MagentoCheckoutCustom/js/model/shipping-save-processor/default'
        }
    }
};
