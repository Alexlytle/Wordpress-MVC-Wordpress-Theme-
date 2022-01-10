<?php

/*
    Instructions:
        In functions.php file add:
        require get_template_directory() . '/router-theme/routes.php';
*/
require get_template_directory() . '/router/classes/class-custom-routes-page.php';

require get_template_directory() . '/router/classes/class-custom-routes.php';

require get_template_directory() . '/router/classes/class-json-routes.php';

require get_template_directory() . '/router/classes/ajax/class-custom-ajax.php';



require get_template_directory() . '/router/routes/web.php';

require get_template_directory() . '/router/routes/api.php';


require get_template_directory() . '/router/routes/ajax.php';





