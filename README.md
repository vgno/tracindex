# Trac index
Small Zend Framework application that can be used to list tickets from one or more Trac environments. The project is mostly suited for our setup, but feel free to fork it and play around with it. If you add some features, feel free to send pull requests.

*Use at your own risk*.

# Configuration
Checkout the code, copy `application/configs/application-dist.ini` to `application/configs/application.ini`, and edit the `tracindex.*` values.

## Example application.ini values
    tracindex.rootPath = "/path/to/your/trac/environments"
    tracindex.tracUrl = "https://example.com/trac"
    tracindex.tracs[] = "someTrac"
    tracindex.tracs[] = "someOtherTrac"
