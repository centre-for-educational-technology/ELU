// Require.js config

requirejs.config({
    urlArgs: 'bust=' + (new Date()).getTime(),
    paths: {
        'jquery': 'bower_components/jquery/dist/jquery.min'
    },
    priority: [
        'jquery'
    ],
    shim: {
        'jquery': {
            exports: '$'
        },
        'jquery-ui': {
            exports: '$',
            deps: ['jquery']
        },
        'infobox': {
            deps: ['gmaps']
        },
        'multiselect': {
            deps: ['bootstrap']
        },
        hammer: {
            exports: 'Hammer'
        }
    }
});

define('jquery', [], function () {
    'use strict';
    return jQuery;
});

define('gmaps', ['async!http://maps.google.com/maps/api/js?v=3&sensor=false&libraries=places'], function () {
    'use strict';
    return window.google.maps;
});

var locales = {
    selectAllText: 'Choose all',
    filterPlaceholder: 'Search',
    nonSelectedText: '',
    nSelectedText: ''
};