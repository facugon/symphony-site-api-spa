/**
  *
  * This class is intended to be a replacement for all ajax function callbacks.
  * Due to the asynchronous ajax nature, it is the best way to manage responces.
  *
  * Using observer, when the service finished the result is informed
  * to the subscriptor, so it is not necesary to pass a callback as a parameter.
  *
  * Also, if it is used a complex MVC structure to organice the code, it is very
  * difficult to callback every behavior.
  *
  * Facundo Gonzalez, facundo.siquot@gmail.com
  *
  */
define('iar/Observable',['iar/Model'],function(Model){
    function Observable() {
        this.observers = {
            'any' : [] // undefined type of observer
        };
        return this;
    }

    Observable.prototype = {
        addObserver : function (observer,type,callback) {
            type = type || 'any';

            if (typeof this.observers[type] === "undefined") {
                this.observers[type] = [];
            }

            this.observers[type].push({name:observer, update:callback, onetime:false});
        } ,
        // notify one time and then remove the observer from the stack
        addOneTimeObserver : function (observer,type,callback) {
            type = type || 'any';

            if (typeof this.observers[type] === "undefined") {
                this.observers[type] = [];
            }

            this.observers[type].push({name:observer, update:callback, onetime:true});
        } ,
        notifyObservers : function (type,data) {
            if (typeof this.observers[type] !== "undefined") {
                for(var i=0; i < this.observers[type].length; i++) {
                    var observer = this.observers[type][i] ;
                    observer.update(data);

                    if( observer.onetime )
                        this.removeObserver(observer.name,type);
                }
            }
        } ,
        removeObserver : function (observer,type) {
            type = type || 'any';

            for(var i=0; i < this.observers[type].length; i++) {
                if( this.observers[type][i].name === observer )
                {
                    delete this.observers[type][i];
                    this.observers[type].splice(i,1); // remove element
                }
            }
        }
    }

    return Observable ;
});
