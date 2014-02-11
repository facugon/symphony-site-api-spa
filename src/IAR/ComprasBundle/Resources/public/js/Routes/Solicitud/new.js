
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
        iar         : '/js/iar'
    }
});

// Start the main app logic.
require(['jquery','Controller/Solicitud'], function($, SolicitudController) {
        var solicitud = new SolicitudController();

        $(function(){
            $("select.controller-action#solicitud-brand").click(function() {
                solicitud.brandSelectAction(this);
            });
        });
    }
);
