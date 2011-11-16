<?php
/**
 * Trac model
 */
class Application_Model_Trac {
    /**
     * Name of the Trac
     *
     * @var string
     */
    private $name;

    /**
     * Database adapter
     *
     * @var Zend_Db_Adapter_Pdo_Sqlite
     */
    private $db;

    /**
     * Tickets owned by the current instance
     *
     * @var Zend_Db_Table_Rowset
     */
    private $tickets;

    /**
     * Class constructor
     *
     * @param string $name The name of the trac
     * @param Zend_Db_Adapter_Pdo_Sqlite $db Database adapter
     */
    public function __construct($name, Zend_Db_Adapter_Pdo_Sqlite $db) {
        $this->name = $name;
        $this->db = $db;
    }

    /**
     * Get the name of the Trac
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Get tickets for this trac
     *
     * @return Zend_Db_Table_Rowset
     */
    public function getTickets() {
        if ($this->tickets === null) {
            $table = new Application_Model_DbTable_Ticket($this->db);
            $this->tickets = $table->getTickets();
        }

        return $this->tickets;
    }
}
