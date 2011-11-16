<?php
/**
 * Ticket table
 */
class Application_Model_DbTable_Ticket extends Zend_Db_Table_Abstract {
    /**
     * Name of the table
     *
     * @var string
     */
    protected $_name = 'ticket';

    /**
     * Get all tickets from the table
     *
     * @return Zend_Db_Table_Rowset
     */
    public function getTickets() {
        $select = $this->select()
            ->from(array('t' => 'ticket', '*'))
            ->joinLeft(array('p' => 'enum'), 'p.name = t.priority AND p.type = "priority"', array())
            ->where('t.status != ?', 'closed');

        return $this->fetchAll($select);
    }
}
