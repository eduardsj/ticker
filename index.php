<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Bitcoin ticker">
        <meta name="author" content="Eduards Jašs">


        <title>Bitcoin ticker</title>

        <!-- Bootstrap core CSS -->
        <link href="./libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="./libs/css/navbar.css" rel="stylesheet">

        <link href="./libs/bootstrap/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <nav class="navbar navbar-inverse bg-inverse navbar-toggleable-md">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleCenteredNav" aria-controls="navbarsExampleCenteredNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExampleCenteredNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link disabled activatedEl">Activated</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link diactivatedEl">Disabled</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ticker action</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item activateAction" value="activate" onclick="changeTickerStatus(jQuery(this).attr('value'))">Activate bitcoin ticker</a>
                            <a class="dropdown-item disabled diactivateAction" value="deactivate" onclick="changeTickerStatus(jQuery(this).attr('value'))">Deactivate bitcoin ticker</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="jumbotron">
                <div class="col-sm-8 mx-auto">
                    <select id="currencySel" multiple="multiple">
                        <option value="e_1.05">USD/EUR</option>
                        <option value="g_0.95">USD/GBP</option>
                        <option value="d_10.00">USD/Dollar</option>
                    </select>  
                    <select id="bitCoinFeeds" multiple="multiple">
                        <option value="bitstamp">BitStamp</option>
                        <option value="kraken">Kraken</option>
                        <option value="campbox">Campbox</option>
                    </select>  
                   
                </div>
                <input type="text" id="bitcoinStatus" class="form-control mr-sm-2" style="border:none" readonly="true" value="ddddddddd" type="text" ></input>
            </div>
        </div>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="./libs/bootstrap/js/jquery.min.1.83.js"></script>
        <script src="./libs/jquery/slim.min.js"></script>
        <script src="./libs/jquery/jquery.min.js"></script>     
        <script src="./libs/jquery/tether.min.js"></script>
        <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"></script>
        <script src="./libs/bootstrap/js/bootstrap-multiselect.js" type="text/javascript"></script>
        <script src="./libs/js/index.js"></script>
    </body>
</html>
