define(
    [],
    function () {
        'use strict';
        return {
            getRules: function() {
                return {
                    'term_of_use': {
                        'required': true
                    }
                };
            }
        };
    }
)