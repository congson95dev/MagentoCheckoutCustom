define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/shipping-rates-validator',
        'Magento_Checkout/js/model/shipping-rates-validation-rules',
        'Aht_MagentoCheckoutCustom/js/model/custom-validator',
        'Aht_MagentoCheckoutCustom/js/model/custom-shipping-rates-validation-rules'
    ],
    function (Component,
              defaultShippingRatesValidator,
              defaultShippingRatesValidationRules,
              shippingRatesValidator,
              shippingRatesValidationRules)
    {
        console.log('123');
        'use strict';
        defaultShippingRatesValidator.registerValidator('custom-validator', shippingRatesValidator);
        defaultShippingRatesValidationRules.registerRules('custom-shipping-rates-validation-rules', shippingRatesValidationRules);
        return Component;
    }
);