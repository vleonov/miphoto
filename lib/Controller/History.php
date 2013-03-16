<?php

class C_History extends Controller {



    public function cancel()
    {
        $historyId = Request()->args(1);
        History::undo($historyId);

        return Response()->redirect(Request()->backUrl());
    }
}