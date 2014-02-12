
define("Entity/Brand", ['underscore','iar/Entity'], function(_, Entity) {

    function BrandEntity(id,attr) {
        Entity.call(this,id,attr);
        return this;
    };

    BrandEntity.prototype = {
        getModels : function() {
            return this._attributes.models ;
        }
    };

    BrandEntity.prototype = _.extend({}, Entity.prototype, BrandEntity.prototype);
    return BrandEntity ;
});
