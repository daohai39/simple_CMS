var FormValidation = function() {
  FormValidation.prototype.validate = function(form) {
    $.listen('parsley:field:validate', function() {
      validateFront();
    });
    $(form + ' .btn').on('click', function() {
      $(form).parsley().validate();
      validateFront();
    });
    var validateFront = function() {
      if (true === $(form).parsley().isValid()) {
        $('.bs-callout-info').removeClass('hidden');
        $('.bs-callout-warning').addClass('hidden');
      } else {
        $('.bs-callout-info').addClass('hidden');
        $('.bs-callout-warning').removeClass('hidden');
      }
    };
  }
};
