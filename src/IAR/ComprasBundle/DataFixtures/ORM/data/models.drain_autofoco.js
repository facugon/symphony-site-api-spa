
var brands = [
    "1", "10", "1000", "1011", "1025", "1037", "1042", "1048", "11", "111", "112", "12", "13", "1323", "1341",
    "14", "146", "147", "15", "153", "1589", "1702", "173", "1776", "1792", "1797",
    "18", "1802", "1812", "1839", "1843", "1847", "1853", "1854", "1866", "1949", "1980",
    "20", "22", "222", "23", "236", "240", "243", "245", "25", "256", "26", "27", "28", "29", "29283", "29309",
    "30", "31", "32", "33", "34", "35", "37", "38", "39",
    "4", "40", "41", "43", "44", "46", "47", "48",
    "6", "69", "7", "8", "9"
];

var baseUrl = 'http://www.autofoco.com/App_WebServices/Dictionary/Dictionary.asmx';

var http = require('http'), fs = require('fs');

var all = '<?xml version="1.0" encoding="utf-8"?>\n<AllBrands>\n';

var dumpToFile = function()
{
    var dumpStream = fs.createWriteStream('models.xml', {flags: 'w'});

    all += "</AllBrands>";
    dumpStream.write(all);
}

var recursive = function(index)
{
    var url = baseUrl + '/GetDropDown?knownCategoryValues=Make:' + brands[index] + ';Category1:1;&category=Model';

    console.log(url);

    http.get(url, function(res){
        console.log("Got response: " + res.statusCode);

        var body = '<Brand id="' + brands[index] + '">\n';

        res.on('data', function(buffer){
            var str = buffer.toString();

            if( str.indexOf('<?xml') != -1 ){
                str = str.replace(new RegExp('<.xml.*\\?>'),'');
            }

            body += str;
        });

        res.on('end', function(){
            all += body + '\n</Brand>\n';

            index++;
            if( index < brands.length )
                recursive(index);

            else dumpToFile();
        });
    }).on('error', function(e){
        console.log("Got error: " + e.message);
    });
}

var i = 0;

recursive(i);
