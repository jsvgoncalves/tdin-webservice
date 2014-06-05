<?php

/* /app/View/Helper/LinkHelper.php */
App::uses('AppHelper', 'View/Helper');

class StatusHelper extends AppHelper {
    public function code($status) {
	switch($status) {
		case 1:
		case '1':
			return 'Assigned';

                case 2:
                case '2':
                        return 'Wating for answers';

                case 3:
                case '3':
			return 'Solved';

		default:
			return 'Unassigned';
	}
    }
}
