/**
 * Created by geymur-vs on 18.08.17.
 */
var items;

(new (function Items() {
    var _this = items = this;

    var siteUrl;

    this.init = function (adminUrl) {

        siteUrl = adminUrl;

        $('#btn_add_item').click(_this.addItemRow);

        $('#groups_tree').jstree({
            'core' : {
                'data' : {
                    "url" : siteUrl + '/dependencies/populateCategoriesTree',
                    "dataType" : "json" // needed only if you do not supply JSON headers
                },
                "themes" : {
                    "responsive": false
                }
            },
            "types" : {
                "default" : {
                    "icon" : "fa fa-folder icon-state-warning icon-lg"
                },
                "file" : {
                    "icon" : "fa fa-file icon-state-warning icon-lg"
                }
            },
            "plugins" : [
                "state",
                "types",
                "unique",
                "wholerow",
                "changed",
                "themes"
            ]
        });

        $('#add_tree_item').click(_this.addTreeItem);

        $('#delete_tree_item').click(_this.deleteTreeItem);

        $('#refresh_tree').click(_this.refreshTree);
    };

    this.addTreeItem = function () {

        var category_id;
        var selected_nodes = $("#groups_tree").jstree().get_selected(true);

        $.each(selected_nodes, function( index, value ) {

            if (value.data.name === 'category') {
                parentNode = value;
                category_id = value.data.id;
            }
            else if (value.data.name === 'item') {

                // get parent node
                var parentNode = $('#groups_tree').jstree().get_node("[id="+value.parent+"]");

                if (parentNode && parentNode.data.name === 'category') {
                    category_id = parentNode.data.id;
                }
            }

            if (category_id) {

                m.dialog({
                    header: parentNode.text,
                    url: siteUrl + 'dependencies/manageCategoryItems',
                    data: {'category_id': category_id},
                    before: function(data) {
                        $('#category_items').multiSelect({
                            selectableHeader: "<div class='custom-header'>Selectable items</div>",
                            selectionHeader: "<div class='custom-header'>Already selected</div>"
                        });
                        $('#category_items').multiSelect('select', data.category_items);
                    },
                    btnOk: {
                        label: m.t("submit"),
                        callback: function(data) {
                            var selected_values = $('#category_items').val();
                            m.post(
                                siteUrl + '/dependencies/updateCategoryItems',
                                {
                                    category_id: parentNode.data.id,
                                    category_items: selected_values
                                },
                                function (data) {
                                    $("#groups_tree").jstree("refresh",value.parent);
                                    m.toast.success(data.message);
                                }
                            );
                        }
                    },
                    btnCancel: {
                        label: m.t("cancel"),
                        callback: function(data) {
                        }
                    }
                });
            }
        });
    };

    this.deleteTreeItem = function () {

        var selected_nodes = $("#groups_tree").jstree(true).get_selected('full',true);
        $.each(selected_nodes, function( index, value ) {

            if (value.data.name === 'item') {

                // get parent node
                var parentNode = $('#groups_tree').jstree().get_node("[id="+value.parent+"]");

                if (parentNode && parentNode.data.name === 'category') {

                    // delete item from category
                    m.post(
                        siteUrl + '/dependencies/deleteItemFromCategory',
                        {
                            category_id: parentNode.data.id,
                            item_id: value.data.id
                        },
                        function (data) {
                            $("#groups_tree").jstree("remove",value.id);
                            $("#groups_tree").jstree("refresh",value.parent);
                            m.toast.success(data.message);
                        }
                    );
                }
            }
        });
    };

    this.refreshTree = function () {
        $('#groups_tree').jstree("refresh");
    };

})());
