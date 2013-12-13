
var brands = [
    '2'  , '3'  , '4'  , '5'  , '6'  , '7'  , '8'  , '9'  , 
    '10' , '11' , '12' , '15' , '16' , '17' , '18' , '19' , 
    '20' , '21' , '22' , '23' , '24' , '25' , '26' , '27' , '28' , 
    '30' , '31' , '32' , '33' , '34' , '35' , '36' , '37' , '38' , '39' , 
    '40' , '41' , '42' , '43' , '44' , '45' , '46' , '47' , '48' , '49' , 
    '51' , '53' , '55' , '56'
];

var baseUrl = 'http://www.everybodycar.com/es/home/ajax_get_models_by_brand/';

var http = require('http'),
    fs = require('fs');

var all = new Array();

var dumpToFile = function()
{
    var dumpStream = fs.createWriteStream('models.json', {flags: 'a'});

    dumpStream.write(JSON.stringify(all));
}

var recursive = function(index)
{
    var url = baseUrl + brands[index];

    console.log(url);

    http.get(url, function(res) {
        console.log("Got response: " + res.statusCode);

        var body = '';

        res.on('data', function (chunk) {
            body += chunk;
        });

        res.on('end', function () {

            all.push( JSON.parse(body) );

            index++;
            if( index < brands.length )
                recursive(index);
            else
                dumpToFile();
        });

    }).on('error', function(e) {
        console.log("Got error: " + e.message);
    });
}

var i = 0;

recursive(i);
