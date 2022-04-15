<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>/css/page.css">

<div id="page" class="container">
    <?php
    $path_fic = base_url() . 'assets/rubriques/';

    switch ($this->uri->segment(3)) {
        case "viewpage" : include($rep . '/source.php');
            break;

        case "statics" :
            if ($this->uri->segment(4) == 'menu') {
                include($rep . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '.php');
                break;
            } else {
                include($rep . '/' . $this->uri->segment(5) . '.php');
                break;
            }

        default : include($page . '.php');
    }
    ?>
</div>
