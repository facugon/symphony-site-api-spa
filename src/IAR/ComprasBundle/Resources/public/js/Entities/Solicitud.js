
define("Entity/Solicitud",['underscore','iar/Entity'],function( _, Entity ) {

    // private properties 
    var myAttributes = {
        'brand' : null,
        'model' : null,
        'details' : null,
        'zona' : null,
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
        getAttributes : function() { // this reaplace parent method
            var attr = _.clone( this._attributes ); // Any nested objects or arrays will be copied by reference, not duplicated! http://underscorejs.org/#clone

            var brand = this.get('brand') ;
            var model = this.get('model') ;

            attr.brand = brand != null ? brand.get('id') : null ;
            attr.model = model != null ? model.get('id') : null ;

            return attr ;
        }
    };

    // extends...order matters http://underscorejs.org/#extend
    SolicitudEntity.prototype = _.extend({}, Entity.prototype, SolicitudEntity.prototype);

    // returns definition
    return SolicitudEntity ;
});
