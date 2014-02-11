
define('iar/Entity',
    ['jquery','iar/Model'],
    function($,Model) {

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
            }
        }

        return Entity;
    }
);

