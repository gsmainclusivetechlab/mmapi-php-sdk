# Running Sample Test Code

The sample test codes are all completely independent and self-contained. You can analyze them to get an understanding of how a particular method works.

-   Clone this repository:

```
git clone git@github.com:gsmainclusivetechlab/mmapi-php-sdk.git
cd mmapi-php-sdk
```

-   Create config.env file for API credentials:

```
cp sample/config.env.sample sample/config.env
```

-   Set the API credentials in the config.env file:

e.g.

```
    consumer_key = <your_consumer_key_here>
    consumer_secret = <your_consumer_secret_here>
    api_key = <your_api_key_here>
    callback_url = <your_callback_url_here>
```

-   Run each sample directly from the command line. For example:

```
php sample/MerchantPayment/InitiatePayment.php
```

---

**NOTE :**

-   callback_url in config.env is optional. Callback urls can also be passed as a parameter directly when calling the methods.
-   Before the methods are called, the SDK needs to be initialized. Initialization of the SDK for the test code is done in sample/bootstrap.php.
    You can analyze the file to get an understanding on how the SDK is initialized with all the credentials and configurations.

---
