
require.config({
    // By default load any module IDs from js/lib
    // mached by filename
    baseUrl: '/js/lib',
    // exceptions, load as defined below.
    // config is relative to the baseUrl.
    // never includes a ".js" extension since
    // the paths config could be for a directory.
    paths: {
        Model       : '/bundles/compras/js/Models',
        Controller  : '/bundles/compras/js/Controllers',
        View        : '/bundles/compras/js/Views',
        Template    : '/bundles/compras/templates'
    }
});

// Start the main app logic.
require(['jquery','Controller/Solicitud'],
    function($, SolicitudController) {

        $(function(){
            $("select.controller-action#solicitud-brand").click(function(){
                SolicitudController.marcaselectAction();
            });
        });
    }
);
