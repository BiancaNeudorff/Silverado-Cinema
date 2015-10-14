<?php

class ContactModel {
  public function __construct() {
    return $this;
  }

  public function getMessage() {
    return "We would love to hear from you, whether it is a general enquiry, for
    group bookings, suggestions & complaints or even just to say hello.";
  }

  public function getContactTypes(){
    return array(
      (object) array("name" => "General enquiry", "value" => "generalenquiry"),
      (object) array("name" => "Group and corporate bookings", "value" => "groupbookings"),
      (object) array("name" => "Suggestions and complains", "value" => "suggestions")
    );
  }

}

?>
