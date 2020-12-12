<?php

class Uid extends CI_Model {

    function __construct() {
        parent::__construct();

//        exec( 'C:\wamp\wampmanager.exe', &$output);
//        echo $output;

        $output = shell_exec("echo | {$_ENV['SystemRoot']}\System32\wbem\wmic.exe path win32_computersystemproduct get uuid");
        $unlocked = false;

        if ($_POST && isset($_POST['txtunlock'])) {
            
            $file = 'application/models/Mvytap.txt';
            // Write the contents back to the file
            file_put_contents($file, $_POST['txtunlock']);
        }

        if (file_exists("application/models/Mvytap.txt")) {
            if (sha1(sha1(md5($output))) == file_get_contents('application/models/Mvytap.txt')) {
                $unlocked = true;
            } else {
                $unlocked = false;
            }
        }

        if (!$unlocked) {

            if ($output) {
                ?>
                <form class="fromUnlock" method="post" action=""/>
                <style type="text/css">
                    .fromUnlock{
                        text-align: center;
                    }
                </style>
                <div>
                    <?php
                    echo $output;
                    ?>
                    <div>
                        <br/>
                        <input type="text" name="txtunlock" />
                    </div>
                    <div>
                        <br/>
                        <input type="submit" name="btnunlock" value="Submit" />
                    </div>
                </div>
                </form>
                <?php
            } else {
                echo "Command failed.";
                exit;
            }

            echo '<br/>==================<br/>';
            echo '<br/>';
            echo sha1(sha1(md5($output)));
            echo '<br/>';

            echo '<br/>==================<br/>';
            echo password_hash($output, PASSWORD_DEFAULT);
            echo '<br/>';
            exit;
        }
    }

    public function getItemsForAuto() {
        $this->db->select('name As label, id As value, price, gst');
        $this->db->from('items');
        $this->db->where('active', 'Y');

        return $this->db->get()->result();
    }

}
?>
