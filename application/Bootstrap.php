<?php
/**
 * Application bootstrap
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
    /**
     * Add some resources to the autoloader
     */
    protected function _initResourceLoader() {
        $resourceLoader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Application',
            'basePath'  => APPLICATION_PATH,
        ));

        $resourceLoader->addResourceTypes(array(
            // Regular models
            'model' => array(
                'path' => 'models',
                'namespace' => 'Model',
            ),

            // Database tables
            'dbTable' => array(
                'path' => 'models/DbTable',
                'namespace' => 'Model_DbTable',
            ),
        ));
    }

    /**
     * Initialize the view settings
     */
    protected function _initViewSettings() {
        $view = $this->bootstrap('view')->getResource('view');
        $view->setEncoding('UTF-8')->doctype(Zend_View_Helper_Doctype::HTML5);

        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8')
                         ->appendHttpEquiv('Content-Language', 'en-US')
                         ->setCharset('utf-8');

        $view->headTitle('Trac index');
    }

    /**
     * Initialize Chuck Norris
     */
    private function _initChuckNorris() {
        // Only Chuck Norris can run private _init methods...
        die('by a roundhouse kick to the head');
    }
}
