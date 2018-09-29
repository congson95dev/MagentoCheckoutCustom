define([
   'jquery',
    'ko'
], function ($, ko) {
    'use strict';

    return function (Target) {
        return Target.extend({
            // errorDeliveryValidationMessage: ko.observable(false),
            validateShippingInformation: function () {
                var result = this._super();
                if($('[name="term_of_use"]:checked').length == 0) {
                    $('.delivery-validate').css('display','block');
                    // this.errorDeliveryValidationMessage('Please agree our term of use.');
                    
                    return false;
                } else {
                    $('.delivery-validate').css('display','none');

                    return result;
                }
            }
        });
    }
});

