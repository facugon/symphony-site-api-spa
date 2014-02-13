
require.config({
    // By default load any module IDs from js/lib
    // mached by filename
    baseUrl: '/js/lib',
    // exceptions, load as defined below.
    // config is relative to the baseUrl.
    // never includes a ".js" extension since
    // the paths config could be for a directory.
    paths: {
        Controller  : '/bundles/iarcompras/js/Controllers',
        View        : '/bundles/iarcompras/js/Views',
        Entity      : '/bundles/iarcompras/js/Entities',
        Service     : '/bundles/iarcompras/js/Services',
        template    : '/bundles/iarcompras/templates',
    },
    shim : {
        'underscore': {
            exports: '_'
        },
        'jquery': {
            exports: '$'
        },
    }
});

// Start the main app logic for this route. todo: build a router and a main application entry point
require(['Controller/Solicitud'], function(SolicitudController) {
        var solicitudController = new SolicitudController();
    }
);
