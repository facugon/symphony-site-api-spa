
define("Entity/Brand",['iar/Entity'], function(Entity) {

    function Brand(id,attr) {
        Entity.call(this,id,attr);
        return this;
    };

    Brand.prototype = Object.create( Entity.prototype );

    Brand.prototype = {
        getModels : function() {
            return this._attributes.models ;
        }
    }

    return Brand ;
});
