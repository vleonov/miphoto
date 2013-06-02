<?php

class C_Test extends Controller {

    public function main()
    {
        U_Image_Raw::convert('/tmp/DSC_0015.NEF');
//        U_Image_Raw::convert(WWW_DIR . '/photos/2013/03/DSC_0314.JPG');
    }
}