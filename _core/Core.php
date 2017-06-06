<?php

class Core {

    public function run() {
        $currentController = "";
        $currentAction = "";
        $uri = filter_input(INPUT_SERVER, "REQUEST_URI", FILTER_SANITIZE_URL); 
        $request = explode("/", $uri); 
        array_shift($request);
        if (strpos($request[0], "index") > -1) {
            array_shift($request);
        }
        if (!empty($request[0]) && file_exists("_controllers/" . ucfirst($request[0]) . "_controller.php")) {
            $currentController = $request[0] . "_controller";
            array_shift($request);
        } else {
            $currentController = "home_controller";
        }
        if (empty($request[0])) {
            $currentAction = "index";
        } elseif (method_exists($currentController, $request[0])) {
            $currentAction = $request[0];
            array_shift($request);
        } else {
            $currentAction = "erro";
        }
        $params = (count($request) > 0) ? $request : array();

        $start = new $currentController();
        call_user_func_array(array($start, $currentAction), $params);
    }

}
