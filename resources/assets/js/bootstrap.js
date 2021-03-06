window._ = require('lodash');
window.$ = window.jQuery = require("jquery");
window.Popper = require('popper.js').default;

require('jquery-ui/ui/core');
require('jquery-ui/ui/effect');
require('jquery-ui/ui/effects/effect-fade');
require('jquery-ui/ui/position');
require('jquery-ui/ui/tabbable');
require('jquery-ui/ui/widget');
require('jquery-ui/ui/widgets/mouse');
require('jquery-ui/ui/widgets/draggable');
require('jquery-ui/ui/widgets/droppable');
require('jquery-ui/ui/widgets/sortable');
require('jquery-ui/ui/widgets/spinner');
require('jquery-ui/ui/widgets/tabs');
require('jquery-ui/ui/widgets/datepicker');
require('jquery-ui/ui/i18n/datepicker-ru');

require('bootstrap');
require('select2/dist/js/select2.full');
require('bootstrap-notify');
require('jquery.scrollto');

window.Mustache = require('mustache');
window.DataTable = require('datatables.net-bs4');
window.InputMask = require('inputmask');

import swal from 'sweetalert';
window.swal = swal;

const notifyService = require("./vali-admin/notify");
window.notifyService = notifyService;
