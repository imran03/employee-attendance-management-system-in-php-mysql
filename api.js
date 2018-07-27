function loadDoc(searchText) {
    if(searchText.length < 4){
        return;
    }
    document.getElementById("results").innerHTML = '';
    var xhttp = new XMLHttpRequest();
    var resultEle = document.getElementById("results");
    searchText =  searchText.split(' ').join('+');
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var resultData = JSON.parse(this.responseText);
            if(resultData.results.length) {
                var template = document.querySelector('script[name="location_view"]').innerHTML;
                var view = _.template(template);
                resultEle.innerHTML = view({
                    results: resultData.results
                });
            }else{
                document.getElementById("results").innerHTML = "No Results found..!!!";
            }


        }
    };
    xhttp.open("GET", "https://maps.googleapis.com/maps/api/place/textsearch/json?query="+searchText+"&key=AIzaSyD0id0CM0wW4HsX_DcLBV6g3moc_E0g7w4", true);
    xhttp.send();
}