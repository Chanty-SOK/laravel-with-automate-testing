import './app/user';
import './app/role';

import * as $ from 'jquery';

export default (function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}());
