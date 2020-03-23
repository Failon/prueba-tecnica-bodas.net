# ClientExport

Console application that executes a command and generates a csv file with the clients data provided from two different sources (XML file and WS).


### Prerequisites

- PHP version >= 7.1.3 

- php-curl extension

We use Guzzle to connect to the WS. If you run this application in Windows,
you will need to define your CURL certificate authority information path

To do that,

1. Download the latest curl recognized certificates here: https://curl.haxx.se/ca/cacert.pem
2. Save the cacert.pem file in a reachable destination.
3. Then, in your php.ini file, scroll down to where you find [curl].
4. You should see the CURLOPT_CAINFO option commented out. Uncomment and point it to the cacert.pem file. You should have a line like this:
```
curl.cainfo = “certificate path\cacert.pem”
```

Save and close your php.ini. Restart your webserver and try your request again.

If you do not set the right location, you will get a CURL 77 error.

### Installing

Run composer install (on your local machine) in the root directory of the project to install the required packages and generate a composer.lock file.

To start the server, you have to run the following command:
```
php bin/console server:run
```

## Usage

To execute the application, you have to open a CLI in the root project directory and execute the following command:
```
php bin/console app:generate-csv
```

A CSV file named clients.csv should have been generated in the following path: ..\public\clients.csv


## Authors

* ** Amadoor Rosa Garrido *



