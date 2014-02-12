
define("Entity/Solicitud",['underscore','iar/Entity'],function(_,Entity) {

    var base_attributes = {
        'brand':null,
        'model':null
    }

    function SolicitudEntity(id,attr)
    {
        if( ! attr || typeof attr == "undefined" )
            attr = base_attributes;
        if( ! id || typeof id == "undefined" )
            id = null;

        Entity.call(this,id,attr);

        return this;
    };

    SolicitudEntity.prototype = {
        getBrand : function() {
            return this._attributes.brand;
        },
        getModel : function() {
            return this._attributes.model;
        },
        setBrand : function(aBrand) {
            this._attributes.brand = aBrand;
            return this;
        },
        setModel : function(aModel) {
            this._attributes.model = aModel;
            return this;
        }
    };

    SolicitudEntity.prototype = _.extend({}, Entity.prototype, SolicitudEntity.prototype);
    return SolicitudEntity ;
});
