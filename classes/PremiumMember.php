<?php
class PremiumMember extends Member
{
//    private array $_inDoorInterests;
//    private  array $_outDoorInterests ;
    private $_inDoorInterests;
    private $_outDoorInterests;

//
//    function __Construct($inDoorInterests,$outDoorInterests)
//    {
//        parent::__construct();
//        $this->_inDoorInterests = $inDoorInterests;
//        $this->_outDoorInterests = $outDoorInterests;
//
//    }
    function __construct($fName, $lName,$age,$gender,$phone)
    {
        parent::__construct($fName, $lName,$age,$gender,$phone);

    }

    function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    function setOutDoorInterests($outDoorInterests)
    {
        $this->_inDoorInterests = $outDoorInterests;
    }

}