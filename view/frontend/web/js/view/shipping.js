define([
   'jquery',
    'ko'
], function ($, ko) {
    'use strict';

    return function (Target) {
        return Target.extend({
            errorDeliveryValidationMessage: ko.observable(false),
            validateShippingInformation: function () {
                this._super();
                if($('[name="term_of_use"]:checked').length > 0) {
                    console.log('1');
                    return true;
                }
                console.log('2');
                this.errorDeliveryValidationMessage('Please agree our term of use.');
                return false;
            }
        });
    }
});

