<?php

class C_Test extends Controller {



    public function main()
    {
        $historyId = 'b90e0a30eda974c4e708886b5771b3da';
        $res = History::undo($historyId);
        var_dump($res);
        exit();
    }
}