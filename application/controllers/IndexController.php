<?php
/**
 * Index controller
 */
class IndexController extends Zend_Controller_Action {
    /**
     * Index action
     */
    public function indexAction() {
        // Fetch configuration
        $config = $this->getInvokeArg('bootstrap')->getOption('tracindex');


        if (empty($config['rootPath'])) {
            throw new RuntimeException('Specify tracindex.rootPath in your application.ini file');
        }

        $config['rootPath'] = rtrim($config['rootPath'], '/');

        if (empty($config['tracUrl'])) {
            throw new RuntimeException('Specify tracindex.tracUrl in your application.ini file');
        }

        $config['tracs'] = array_filter($config['tracs']);

        if (empty($config['tracs'])) {
            throw new RuntimeException('Specify one or more Tracs in your application.ini file');
        }

        $tracs = array();

        foreach ($config['tracs'] as $trac) {
            $tracDir = $config['rootPath'] . '/' . $trac;

            if (!is_dir($tracDir)) {
                throw new RuntimeException('Path "' . $tracDir . '" does not exist.');
            }

            $dbname = $tracDir . '/db/trac.db';

            // Create database adapter for each Trac
            $db = new Zend_Db_Adapter_Pdo_Sqlite(array(
                'dbname' => $dbname,
            ));

            $tracs[] = new Application_Model_Trac($trac, $db);
        }

        $this->view->tracs = $tracs;
        $this->view->tracUrl = rtrim($config['tracUrl'], '/');
    }
}
