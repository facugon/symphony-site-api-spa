
define("Entity/Model", ['underscore','iar/Entity'], function(_,Entity) {

    function ModelEntity(id,attr) {
        Entity.call(this,id,attr);
        return this;
    };

    ModelEntity.prototype = _.extend({}, Entity.prototype, ModelEntity.prototype);
    return ModelEntity;
});

