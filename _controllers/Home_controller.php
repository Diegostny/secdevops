<?php

class Home_controller extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->loadTemplate("home");
    }

    public function erro() {
        $this->loadTemplate("erro");
    }

}
