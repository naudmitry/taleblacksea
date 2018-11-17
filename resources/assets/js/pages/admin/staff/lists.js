$(function () {
    let $adminLists = $('.admin-lists');

    if (!$adminLists.length) {
        return;
    }

    let $adminListsTable = $('#adminListsTable');

    let mustacheTemplateAdminListsTableColumnIp = $('.template-admin-lists-table-column-ip').text();
    let mustacheTemplateAdminListsTableColumnUser = $('.template-admin-lists-table-column-user').text();
    let mustacheTemplateAdminListsTableColumnPhone = $('.template-admin-lists-table-column-phone').text();
    let mustacheTemplateAdminListsTableColumnEmail = $('.template-admin-lists-table-column-email').text();
    let mustacheTemplateAdminListsTableColumnLastIp = $('.template-admin-lists-table-column-last-ip').text();
    let mustacheTemplateAdminListsTableColumnStatus = $('.template-admin-lists-table-column-status').text();
    let mustacheTemplateAdminListsTableColumnActions = $('.template-admin-lists-table-column-actions').text();

    $adminListsTable.DataTable({
        info: true,
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax:
            {
                url: $adminListsTable.data('href'),
                // data: function (data) {
                //     $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //         data[filter.name] = filter.value;
                //     });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                data: 'ip',
                render: (data, type, admin) => Mustache.render(mustacheTemplateAdminListsTableColumnIp, {admin}),
            },
            {
                targets: 1,
                data: 'name',
                render: (data, type, admin) => Mustache.render(mustacheTemplateAdminListsTableColumnUser, {admin}),
            },
            {
                targets: 2,
                data: 'phone',
                sortable: false,
                render: (data, type, admin) => Mustache.render(mustacheTemplateAdminListsTableColumnPhone, {admin}),
            },
            {
                targets: 3,
                data: 'email',
                render: (data, type, admin) => Mustache.render(mustacheTemplateAdminListsTableColumnEmail, {admin}),
            },
            {
                targets: 4,
                data: 'last_ip',
                sortable: false,
                render: (data, type, admin) => Mustache.render(mustacheTemplateAdminListsTableColumnLastIp, {admin}),
            },
            {
                targets: 5,
                data: 'status',
                render: (data, type, admin) => Mustache.render(mustacheTemplateAdminListsTableColumnStatus, {admin}),
            },
            {
                targets: 6,
                orderable: false,
                render: (data, type, admin) => Mustache.render(mustacheTemplateAdminListsTableColumnActions, {admin}),
            },
        ],
        order: [[0, 'asc']],
        dom: '<"datatable-scroll-lg"t><"datatable-footer"ilp>',
        language: {
            processing: "Подождите...",
            search: "Поиск:",
            lengthMenu: "Показать: _MENU_",
            info: "Записи с _START_ до _END_ из _TOTAL_ записей",
            infoEmpty: "Записи с 0 до 0 из 0 записей",
            infoFiltered: "(отфильтровано из _MAX_ записей)",
            infoPostFix: "",
            loadingRecords: "Загрузка записей...",
            zeroRecords: "Записи отсутствуют.",
            emptyTable: "В таблице отсутствуют данные",
            paginate: {
                previous: "←",
                next: "→",
            }
        },
        lengthMenu: [15, 25, 50, 75, 100],
        displayLength: 15,
        drawCallback: function (settings) {
            $('.admins-count').text(settings.json.counters.admins_count);
            $('.admins-online').text(settings.json.counters.admins_online);
        },
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });

    $(document).on('keyup', '.search', function (e) {
        if (e.keyCode == 13) {
            $('#adminListsTable').DataTable().search(this.value).draw();
        }
    });

    $(document).on('click', '.open-add-admin-modal', function (e) {
        e.preventDefault();
        let $this = $(this);
        if ($this.data('ajax')) {
            return;
        }
        let $divForModal = $('.div-for-modal');
        $this.data('ajax', $.ajax({
            url: $this.attr('href'),
            success: response => {
                $divForModal.html(response.view);
                let $modalStaff = $('#modal-staff');
                $modalStaff.find('.select2').select2({
                    minimumResultsForSearch: Infinity,
                    width: '100%'
                });
                $modalStaff.modal('show');
                $modalStaff.on('hidden.bs.modal', function (event) {
                    $divForModal.empty();
                });
            },
            error: xhr => {
                console.error(xhr);
            },
            complete: () => $this.removeData('ajax'),
        }));
    });

    $(document).on('submit', '.admin-list-edit-form', function (e) {
        e.preventDefault();
        let $form = $(this);
        let $modal = $form.closest('.modal');
        if ($form.data('ajax')) {
            $form.data('ajax').abort();
        }
        $form.find('.has-error').removeClass('has-error');
        $form.data('ajax', $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: response => {
                $adminListsTable.DataTable().ajax.reload();
                $modal.modal('hide');
            },
            error: xhr => {
                if (xhr.statusText == 'abort') {
                    return;
                }
                if ('object' === typeof xhr.responseJSON) {
                    for (let key in xhr.responseJSON) {
                        $form.find('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                    }
                    return;
                }
                console.error(xhr);
            },
            complete: () => {
                $form.removeData('ajax');
            },
        }));
    });
});