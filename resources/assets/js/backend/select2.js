var Select2 = function(selector, options) {
	var options = $.extend(true, {
      language: "vi",
      escapeMarkup: function (markup) { return markup; },
      templateResult: function formatResult (obj) {
        if (obj.loading) return obj.text;
        return '<div>'+(obj.name || obj.text)+'</div>';
      },
      templateSelection: function formatSelection (obj) {
        return obj.name || obj.text;
      },
      ajax: {
        url: null,
        dataType: 'json',
        delay: 250,
        cache: true,
        method: 'GET',
        data: function (params) {
            return {
                q: params.term,
                page: params.page
            }
        },
        success: function(response) {
            // console.log(response);
        },
        processResults: function (data, params) {
            params.page = data.page || 1;
            return {
                results: data.data,
                pagination: {
                    more: data.to < data.total
                }
            };
        }
      }
    }, options);

    $(selector).select2(options);
}
