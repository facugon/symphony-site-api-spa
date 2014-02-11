
var JSONRPC2Response = function(srvRsp) {
    var data = srvRsp;

    self = {} ;

    self.hasResult = function() {
        return typeof data != "undefined" && typeof data.result != "undefined" && ! data.error ;
    }

    self.getResult = function() {
        return data.result ;
    }

    self.getError = function() {
        return data.error ;
    }

    return self;
}

var Server = {
    post: function (url,params,doNext) {
        var self = this ;

        $.ajax({
            type: "POST",
            url: url ,
            data: params,
            dataType:'json',
            success:function(r) {
                var response = new JSONRPC2Response(r);
                if( response.hasResult() ) {
                    result = response.getResult() ;
                    if( doNext && typeof doNext === "function" ) {
                        doNext(result) ;
                    }
                    else {
                        // validate invalid callback
                    }
                }
                else {
                    // handle response error
                };
            }
        });
    },

    get: function (url,params,doNext) {
        var self = this ;

        $.ajax({
            type: "GET",
            url: url ,
            data: params,
            dataType:'json',
            success:function(r) {
                var response = new JSONRPC2Response(r);
                if( response.hasResult() ) {
                    result = response.getResult() ;
                    if( doNext && typeof doNext === "function" ) {
                        doNext(result) ;
                    }
                    else {
                        // validate invalid callback
                    }
                }
                else {
                    // handle response error
                }
            }
        });
    }
}

if( typeof define === "function" )
{
    define('iar/Server',['jquery'],function($){
        return Server ;
    });
}
