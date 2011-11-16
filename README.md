# Trac index
Small [Zend Framework](http://framework.zend.com/) application that can be used to list tickets from one or more [Trac](http://trac.edgewall.org/) environments. The project is mostly suited for our setup, but feel free to fork it and play around with it. If you add some features, feel free to send pull requests.

**Use at your own risk**.

# Requirements & Configuration
Checkout the code, copy `application/configs/application-dist.ini` to `application/configs/application.ini`, and edit the `tracindex.*` values. You will also need Zend Framework in your PHP `include_path`.

## Example application.ini values
    tracindex.rootPath = "/path/to/your/trac/environments"
    tracindex.tracUrl = "https://example.com/trac"
    tracindex.tracs[] = "someTrac"
    tracindex.tracs[] = "someOtherTrac"

# Screenshot
![Screenshot](https://github.com/vgnett/tracindex/raw/master/public/screenshots/tracindex.png "Screenshot of tracindex with some Trac environments")
