<?php
/**
 * Class PremiumMember
 * @package dating
 * @subpackage classes
 * @author  Laxmi Kandel
 */
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    /**
     * PremiumMember constructor.
     * @param $fName
     * @param $lName
     * @param $age
     * @param $gender
     * @param $phone
     * @param string $inDoorInterests
     * @param string $outDoorInterests
     */
    function __construct($fName, $lName,$age,$gender,$phone,$inDoorInterests="?",$outDoorInterests="?")
    {
        parent::__construct($fName, $lName,$age,$gender,$phone);
        $this->_inDoorInterests = $inDoorInterests;
        $this->_outDoorInterests = $outDoorInterests;

    }

    /**
     * getIndoor
     * @return string
     */
    function getIndoor()
    {
        return $this->_inDoorInterests;
    }

    /**
     * setIndoor
     * @param $inDoorInterests
     */
    function setIndoor($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * getOutdoor
     * @return string
     */
    function getOutdoor()
    {
        return $this->_outDoorInterests;
    }

    /**
     * setOutdoor
     * @param $outDoorInterests
     */
    function setOutdoor($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }


}