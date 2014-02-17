
define('iar/Entity', ['iar/Model'], function(Model) {

    function Entity (id,attributes) {
        Model.call(this);
        // private properties
        this._id = id;
        this._attributes = attributes;
        return this;
    }

    Model.extends( Entity );

    Entity.prototype = {
        getId : function() {
            return this._id ;
        },
        getAttributes : function() {
            return this._attributes;
        },
        get : function(field) {
            return this._attributes[field] ;
        },
        set : function(field,value){
            this._attributes[field] = value;
            return this;
        }
    }

    Entity.prototype.constructor = Entity ;

    return Entity;
}
);

