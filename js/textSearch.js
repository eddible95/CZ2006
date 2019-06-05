/* global google */

function searchAutoComplete(){
    var userSearchInput = document.getElementById("searchInput");
    var autocomplete = new google.maps.places.Autocomplete(userSearchInput);
    var userSearchInput = document.getElementById("searchInput2");
    var autocomplete = new google.maps.places.Autocomplete(userSearchInput);
}