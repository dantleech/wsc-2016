/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
(function ($) {
    'use strict';

    function increaseAttributesNumber() {
        var currentIndex = parseInt(getNextIndex());
        $('#attributes .collection-list').attr('data-length', currentIndex+1);
    }

    function getNextIndex() {
        return $('#attributes .collection-list').attr('data-length');
    }

    function modifyModalOnItemDelete() {
        $('a[data-form-collection="delete"]').on('mousedown', function(){
            setTimeout(function(){
                controlAttributesList();
            }, 500);
        });
    }

    function controlAttributesList() {
        $.each($('#attributes-modal a'), function() {
            $(this).css('display', 'block');
            $(this).find('input').attr('checked', false);
        });
        $.each($('#attributes .collection-item'), function(){
            var usedAttributeId =  $(this).find('input').val();

            $('#attributes-modal').find('input[value="'+usedAttributeId+'"]').parent().css('display', 'none');
        });
    }

    function modifyAttributeForms(data) {
        $.each($(data).find('input,select,textarea'), function(){
            if ($(this).attr('data-name') != null) {
                $(this).attr('name', $(this).attr('data-name'));
            }
        });

        return data;
    }

    function setAttributeChoiceListener() {
        $('#attributeChoice').submit(function(event) {
            event.preventDefault();
            var form = $(this);

            $.ajax({
                type: 'GET',
                url: form.attr('action'),
                data: form.serialize()+'&count='+getNextIndex(),
                dataType: 'html'
            }).done(function(data){
                var finalData = modifyAttributeForms($(data));
                $('#attributes .collection-list').append(finalData);
                $('#attributes-modal').modal('hide');
                modifyModalOnItemDelete();
                increaseAttributesNumber();
            });
        });
    }

    $(document).ready(function(){
        var attributesModal = $('#attributes-modal');
        attributesModal
            .on('shown.bs.modal', function () {
                setAttributeChoiceListener();
            })
            .on('hide.bs.modal', function () {
                $('#attributeChoice').unbind();
            })
            .on('hidden.bs.modal', function() {
                controlAttributesList();
            })
        ;

        controlAttributesList();
        modifyModalOnItemDelete();
    });
})( jQuery );

(function ($) {
    'use strict';

    var methods = {
        init: function(options) {
            var settings = $.extend({
              'prototypePrefix': false,
              'containerSelector': false
            }, options);

            return this.each(function() {
                show($(this), false);
                $(this).change(function() {
                    show($(this), true);
                });

                function show(element, replace) {
                    var selectedValue = element.val();
                    var prototypePrefix = element.attr('id');
                    if (false != settings.prototypePrefix) {
                        prototypePrefix = settings.prototypePrefix;
                    }

                    var prototypeElement = $('#' + prototypePrefix + '_' + selectedValue);
                    var container;

                    if (settings.containerSelector) {
                        container = $(settings.containerSelector);
                    } else {
                        container = $(prototypeElement.data('container'));
                    }

                    if (!container.length) {
                        return;
                    }

                    if (!prototypeElement.length) {
                        container.empty();
                        return;
                    }

                    if (replace || !container.html().trim()) {
                        container.html(prototypeElement.data('prototype'));
                    }
                }
            });
        }
    };

    $.fn.handlePrototypes = function(method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error( 'Method ' +  method + ' does not exist on jQuery.handlePrototypes' );
        }
    };
})(jQuery);

$(document).ready(function() {
    'use strict';

    $('a[data-collection-button="add"]').on('click', function (e) {
        var collectionContainer = $('#' + $(this).data('collection'));
        var lastElementNumber = (collectionContainer.children().length) - 1;
        $('#sylius_product_properties_' + lastElementNumber + ' .property-chooser').handlePrototypes({
            prototypePrefix: 'property-prototype',
            prototypeElementPrefix: '',
            containerSelector: '#sylius_product_properties_' + lastElementNumber + ' .control-group:last .controls'
        });
        $('#sylius_product_properties_' + lastElementNumber + ' .property-chooser').change(function() {
            $('#sylius_product_properties_' + lastElementNumber + ' .control-group:last .controls input, #sylius_product_properties_' + lastElementNumber + ' .control-group:last .controls select').each(function() {
                this.name = this.name.replace(/__name__/g, lastElementNumber);
                this.id = this.id.replace(/__name__/g, lastElementNumber);
            });
        });
    });
});
