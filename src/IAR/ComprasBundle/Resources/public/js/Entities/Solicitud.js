
define("Entity/Solicitud",['underscore','iar/Entity'],function(_,Entity) {

    // private properties 
    var myAttributes = {
        'brand' : null,
        'model' : null,
        'details' : null,
        'zone' : null,
        'nombre' : null,
        'apellido' : null,
        'email' : null,
        'telefono' : null
    }

    // constructor
    function SolicitudEntity(id,attr)
    {
        if( ! attr || typeof attr == "undefined" ) attr = myAttributes;
        if( ! id   || typeof id == "undefined"   ) id = null;

        Entity.call(this,id,attr);
        return this;
    };

    // public methods
    SolicitudEntity.prototype = {
    };

    // extends...
    SolicitudEntity.prototype = _.extend({}, Entity.prototype, SolicitudEntity.prototype);
    // returns definition
    return SolicitudEntity ;
});
