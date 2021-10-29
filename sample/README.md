# Running Sample Test Code

The sample test codes are all completely independent and self-contained. You can analyze them to get an understanding of how a particular method works.

-   Clone this repository:

```
git clone https://github.com/gsmainclusivetechlab/mmapi-php-sdk.git
cd mmapi-php-sdk
```

-   Create config.ini file for API credentials:

```
cp sample/config-sample.ini sample/config.ini
```

-   Set the API credentials in the config.ini file:

e.g.

```
    [sdk]
    consumer_key = <your_consumer_key_here>
    consumer_secret = <your_consumer_secret_here>
    api_key = <your_api_key_here>
    callback_url = <your_callback_url_here>
```

**NOTE : callback_url in config.ini is optional. Callback urls can also be passed as a parameter when calling the methods.**

-   Run the individual test code by name. For example:

```
php sample/MerchantPayment/InitiatePayment.php
```
