function changeTickerStatus(action) {
    if (action === 'activate') {
        jQuery('.activatedEl').attr('class', 'nav-link activatedEl');
        jQuery('.diactivatedEl').attr('class', 'nav-link disabled diactivatedEl');
        jQuery('.activateAction').attr('class', 'dropdown-item disabled activateAction');
        jQuery('.diactivateAction').attr('class', 'dropdown-item diactivateAction');
    } else if (action === 'deactivate') {
        jQuery('.activatedEl').attr('class', 'nav-link disabled activatedEl');
        jQuery('.diactivatedEl').attr('class', 'nav-link diactivatedEl');
        jQuery('.diactivateAction').attr('class', 'dropdown-item disabled diactivateAction');
        jQuery('.activateAction').attr('class', 'dropdown-item activateAction');
    }
}

//handle feed requests  
function getExChangeData(){
    var exchangeRates = jQuery('#currencySel').val();
    var requestedServiceNames = jQuery('#bitCoinFeeds').val();
    var myInitPar = { method: 'GET',
               headers: new Headers(),
               mode: 'no-cors',
               cache: 'default' };
    var bitstamp = fetch(document.location.href + 'libs/services/bitstamp.php', myInitPar).then(function(response){return response.json()});
    var kraken = fetch(document.location.href + 'libs/services/kraken.php', myInitPar ).then(function(krakenR){return krakenR.json()});
    var campbox = fetch(document.location.href + 'libs/services/xticker.php', myInitPar).then(function(response){return response.json()});
    Promise.all([kraken,bitstamp,campbox]).then(
            values =>{
                var keys = ['kraken', 'bitstamp', 'campbox'];
                var valueOfProperty = ['.result.XXBTZUSD.p[0],', '.last', '.last'];
                var exchangeKey = ['e', 'g', 'd'];  
                var currencyLabels = ['USD/EUR', 'USD/GBP', 'USD/Dollar'];
                console.log(exchangeRates)
                console.log(requestedServiceNames);
                var responseString = '';
                requestedServiceNames.forEach(function(entry) {
                    var indexOfService = keys.indexOf(entry);
                    var usdBasePrice = values[indexOfService] + valueOfProperty[indexOfService];
                    usdBasePrice = currencyParts[1]
                    responseString = responseString + 'BTC/USD ' + usdBasePrice + ' ';
                    exchangeRates.foreach(function(entryValue){
                        var currencyParts = entryValue.split('_');                        
                        var indexOgCurrency = exchangeKey.indexOf(currencyParts[0]);
                        responseString = responseString + currencyLabels[indexOgCurrency] + ' ' + currencyParts[1] + ' ';
                        var bitcoinPriceInCurrency = parseFloat(currencyParts[1]).toFixed(4) * currencyParts[1];
                        var singleTransferCurrency =  currencyLabels[indexOgCurrency].split('/');
                        responseString = responseString + ' BTC/' + singleTransferCurrency + ' ' + bitcoinPriceInCurrency;
                    });
                    console.log(entry);
                    jQuery('#bitcoinStatus').val(responseString);
                });
         }, failed => {
            jQuery('#bitcoinStatus').val('Data stream errors');
            return deffered.promise;
    })

}

window.setInterval(function(){
    var activeClass = jQuery('.activatedEl').attr('class');
    if (activeClass === 'nav-link activatedEl'){
        getExChangeData();
    }
}, 90);


//Multi select functionality Select all feature
jQuery(function () {
    jQuery('#currencySel').multiselect({
        includeSelectAllOption: true
    });
    jQuery('#bitCoinFeeds').multiselect({
        includeSelectAllOption: true
    });

});


