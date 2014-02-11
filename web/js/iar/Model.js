
// my base class
define("iar/Model", [], function(){

    // this properties and functions could only be accesed from this scoupe
    var instanceCount = 0;

    var getNewInstanceID = function(){
        return( ++instanceCount );
    };

    // here starts our base model definition
    function Model () {
        this._instanceID = getNewInstanceID();
        return this;
    }

    // static method
    Model.getInstanceCount = function() {
        return instanceCount ;
    }

    Model.extends = function( children ) {
        children.prototype = Object.create( this.prototype ) ;
        children.prototype.constructor = this;
    }

    // model prototype definition
    Model.prototype = {
        getInstanceID : function() {
            return this._instanceID;
        }
    };

    return Model ;
});
