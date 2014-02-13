
define("Entity/Solicitud",['underscore','iar/Entity'],function(_,Entity) {

    // private properties 
    var myAttributes = {
        'brand'   : null,
        'model'   : null,
        'details' : null
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
        getBrand : function() {
            return this._attributes.brand;
        },
        setBrand : function(aBrand) {
            this._attributes.brand = aBrand;
            return this;
        },
        getModel : function() {
            return this._attributes.model;
        },
        setModel : function(aModel) {
            this._attributes.model = aModel;
            return this;
        },
        setDetails : function(text) {
            this._attributes.details = text;
            return this;
        },
        getDetails : function(){
            return this._attributes.details ;
        }
    };

    // extends...
    SolicitudEntity.prototype = _.extend({}, Entity.prototype, SolicitudEntity.prototype);
    // returns definition
    return SolicitudEntity ;
});
