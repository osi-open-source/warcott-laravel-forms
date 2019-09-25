/*!
 * warcottForm.js v2.0.1
 *
 * Licensed OSI
 */
(function ($) {
    var comparationFn = {
        '=': {exp: function (a, b) { return a == b; }, label: '='}
        , '<': {exp: function (a, b) { return a < b; }, label: '<'}
        , '>': {exp: function (a, b) { return a > b; }, label: '>'}
        , '<=': {exp: function (a, b) { return a <= b; }, label: '<='}
        , '>=': {exp: function (a, b) { return a >= b; }, label: '>='}
        , '!=': {exp: function (a, b) { return a != b; }, label: '!='}
        , 'null || >= ' : {exp: function (a, b) { b = parseInt(b, 10); return (angular.isUndefined(a) || a == '' || a == null || a >= b); }, label: 'null || >='}
        , 'null || = ' : {exp: function (a, b) { return (angular.isUndefined(a) || a == '' || a == null || a == b); }, label: 'null || ='}
        , 'in' : {exp: function (a, b) { var arr = b.split(','); return (arr.indexOf(a) > -1); }, label: 'in'}
    };

    var getValue = function ($field) {
        var val = undefined;
        var type = $field.attr('type');
        if (type === 'radio' || type === 'checkbox') {
            val = $field.filter(':checked').val();
        } else {
            val = $field.val();
        }
        return val;
    };

    var toggle = function ($togglediv, $toggledivinput, $inputToWatch, toggleFn) {
        var val = getValue($inputToWatch);
        var visible = $inputToWatch.is(':visible');
        var isShown = $togglediv.is(':visible');
        var show = toggleFn(val) && visible;
        if (isShown && show) {
            return;
        }
        if (!isShown && !show) {
            return;
        }
        if (!show) {
            if ($toggledivinput.attr('type') === 'radio') {
                var checked = false;
                $toggledivinput.each(function () {
                    if ($(this).prop('checked')) {
                        checked = true;
                        $(this).prop('checked', false);
                    }
                });
            } else {
                if ($toggledivinput.val()) {
                    $toggledivinput.val(undefined);
                }
            }
        }
        $toggledivinput.change();
        $togglediv.toggle(show);
    };

    var total = function ($totalField, $expressionFields, totalType, decimals, placeholder) {
        var sum = 0;
        $.each($expressionFields, function () {
            sum += Number(getValue($(this) || 0));
        });
        if (typeof(decimals) !== "undefined") {
            sum = sum.toFixed(decimals);
        }
        if (typeof(placeholder) !== "undefined") {
            if (totalType === "C") {
                sum = placeholder + sum;
            }
            if (totalType === "P") {
                sum += "%";
            }
        }
        if (getValue($totalField) !== sum) {
            $totalField.val(sum).change();
        }
        return;
    };

    var validateCustom = function ($field, $form, customFunctionName, name) {
        if (typeof(name) === "undefined") {
            name = true;
        }
        var val = getValue($field);
        var fn = window["ValidationRule" + customFunctionName];
        var valid = true;
        var data = $form.serializeArray();
        data.field = $field;
        if (typeof fn === 'function') {
            valid = fn(val, data, name);
        }
        //todo apply form validation errors
        return;
    };

    window.removeShowBindings = function () {
        var $form = $('.form-warcott');
        $form.find("[show-if!=''][show-if]").each(function () {
            var config =  $(this).attr('show-if').split('~');
            if (config.length === 3) {
                var $inputToWatch = $form.find(':input[name=' + config[0] + ']').unbind('change');
            }
        });
    };

    window.removeTotalBindings = function () {
        var $form = $('.form-warcott');
        $form.find("[data-expression!=''][data-expression]").each(function () {
            var fields =  $(this).data('expression').split("\n");
            var selectors = [];
            $.each(fields, function (index, value) {
                selectors.push(':input[name=' + value + ']');
            });
            $form.find(selectors.join(',')).unbind('change');
        });
    };

    window.removeCustomValidations = function () {
        var $form = $('.form-warcott');
        $form.find("[osi-input-rule!=''][osi-input-rule]").each(function () {
            $(this).unbind('change');
        });
    };

    window.addShowBindings = function () {
        var $form = $('.form-warcott');
        $form.find("[show-if!=''][show-if]").each(function () {
            var $togglediv = $(this);
            var config =  $togglediv.attr('show-if').split('~');
            if (config.length === 3) {

                var $inputToWatch = $form.find(':input[name=' + config[0] + ']');

                if ($inputToWatch && $inputToWatch.length) {
                    var $toggledivinput = $togglediv.find(':input');
                    var op = config[1];
                    var toggleFn;
                    if (comparationFn[op]) {
                        var valToWatch = config[2];
                        toggleFn = function (val){
                            return comparationFn[op].exp(val, valToWatch);
                        }
                    } else {
                        toggleFn = function (val) {
                            return !!val;
                        }
                    }
                    toggle($togglediv, $toggledivinput, $inputToWatch, toggleFn);
                    return $inputToWatch.change(
                        toggle.bind(
                            this,
                            $togglediv,
                            $toggledivinput,
                            $inputToWatch,
                            toggleFn
                        )
                    );
                }
            }
        });
    };

    window.addTotalBindings = function () {
        var $form = $('.form-warcott');
        $form.find("[data-expression!=''][data-expression]").each(function () {
            var $titalField = $(this);
            var fields =  $titalField.data('expression').split("\n");
            var type =  $titalField.data('expressionType');
            var decimals =  $titalField.data('decimals');
            var placeholder =  $titalField.attr('placeholder');
            var selectors = [];
            $.each(fields, function (index, value) {
                selectors.push(':input[name=' + value + ']');
            });
            var $fieldElements = $form.find(selectors.join(','));

            total($titalField, $fieldElements, type, decimals, placeholder);
            return $fieldElements.change(
                total.bind(
                    this,
                    $titalField,
                    $fieldElements,
                    type,
                    decimals,
                    placeholder
                )
            );
        });
    };

    window.addCustomValidations = function () {
        var $form = $('.form-warcott');
        $form.find("[osi-input-rule!=''][osi-input-rule]").each(function () {
            var $field = $(this);
            var rule = $field.attr('osi-input-rule');
            var name = $field.attr('name');
            console.log("Custom validation on " + name + " errors are not yet supported!");
            validateCustom($field, $form, rule, name);
            return $field.change(
                validateCustom.bind(
                    this,
                    $field,
                    $form,
                    rule
                )
            );

            return;
        });
    };

    window.warcottFormInitialize = function () {
        removeShowBindings();
        removeTotalBindings();
        removeCustomValidations();
        addShowBindings();
        addTotalBindings();
        addCustomValidations();
    };

    warcottFormInitialize();
})(jQuery);