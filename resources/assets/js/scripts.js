// Avoid console errors in browsers that lack a console.

(function () {
    'use strict';
    var method,
        noop = function () { return true; },
        methods = [ 'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeStamp', 'trace', 'warn'],
        length = methods.length,
        console = (window.console = window.console || {});
    while (length >= 0) {
        length -= 1;
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Fix ios5 fixed headers

(function () {
    'use strict';
    if ((/iphone|ipod|ipad.*os 5/gi).test(navigator.appVersion)) {
        window.onpageshow = function (e) {
            if (e.persisted) {
                window.scrollTo(0, 0);
            }
        };
    }
}());

// Main UI functionality

(function ($) {
    'use strict';
    $.mainUI = function (options) {
        var defaults = {
                'tooltip': $('<div class="tooltip"></div>'),
                'tooltiptimer': null,
                'notificationtimer': null,
                'uispeed': 500,
                'gmaps': []
            },
            ui = {
                init: function () {
                    var cntrlIsPressed = false;

                    $.mainUI.options = $.extend({}, defaults, options);

                    // Tag mac for css switch

                    if (navigator.appVersion.indexOf('Mac') !== -1) {
                        $('HTML').addClass('ismac');
                    }

                    // Tag touch devices

                    if ('ontouchstart' in window || 'onmsgesturechange' in window) {
                        $('HTML').addClass('hastouch');
                    } else {
                        $('HTML').addClass('notouch');
                    }

                    // Tag framed windows

                    if (window.self !== window.top) {
                        $('HTML').addClass('framed');
                        $('.supported').bind('click', function () {
                            window.top.$.mainUI().hideOverlay();
                        });
                        $('.box03').bind('click', function (e) {
                            e.stopPropagation();
                        });
                        $('[data-action="close"]').click(function (e) {
                            e.preventDefault();
                            ui.hideOverlay();
                        });
                    }

                    // Fix mobile devices headers

                    window.onpageshow = function () {
                        window.setTimeout(function () {
                            $(window).trigger('resize orientationchange');
                        }, $.mainUI.options.uispeed);
                    };

                    // Tooltips

                    $.mainUI.options.tooltip
                        .bind('mouseenter', function () {
                            window.clearTimeout($.mainUI.options.tooltiptimer);
                        }).bind('mouseleave', function () {
                            if ($.mainUI.options.tooltip.data('owner') !== undefined) {
                                $.mainUI.options.tooltip.data('owner').trigger('mouseleave');
                            }
                        });
                    $('.box01').on('mouseenter.tooltip mouseleave.tooltip click.tooltip', '.showtooltip[title], .showtooltip[alt], .mceButton, [data-tooltip-url]', function (e) {
                        var t = $(this),
                            holder = $('BODY'),
                            offsetParent = $('BODY'),
                            pos1,
                            pos2,
                            pos3 = '';
                        if (t.data('tooltip') === undefined) {
                            if (t.attr('data-tooltip-url') !== undefined) {
                                $.ajax({
                                    url: t.attr('data-tooltip-url'),
                                    success: function (data) {
                                        t.data('tooltip', data);
                                        if (t.data('tooltip-active') === true) {
                                            t.trigger(e);
                                        }
                                    },
                                    error: function (error) {
                                        if (error.status !== 0) {
                                            t.data('tooltip', error.statusText);
                                            if (t.data('tooltip-active') === true) {
                                                t.trigger(e);
                                            }
                                        }
                                    }
                                });
                            } else if (t.attr('alt') !== undefined) {
                                t.data('tooltip', t.attr('alt')).attr('alt', '');
                            } else {
                                t.data('tooltip', t.attr('title')).attr('title', '');
                            }
                        }

                        if (e.type === 'mouseenter') {
                            window.clearTimeout($.mainUI.options.tooltiptimer);
                            if (t.data('tooltip') !== undefined) {
                                $.mainUI.options.tooltiptimer = window.setTimeout(function () {
                                    // Hide previous
                                    if ($.mainUI.options.tooltip.data('owner') !== undefined) {
                                        $.mainUI.options.tooltip.data('owner').data('tooptip-active', false);
                                    }
                                    $.mainUI.options.tooltip.css({
                                        left: '',
                                        right: '',
                                        top: ''
                                    });
                                    $.mainUI.options.tooltip.data('owner', t).html(t.data('tooltip')).append('<span class="tooltip-arrow"></span>').appendTo(offsetParent);

                                    // Set horizontal
                                    if (offsetParent.outerWidth() < $.mainUI.options.tooltip.outerWidth()) {
                                        pos1 = 0;
                                        pos3 = 0;
                                    } else {
                                        // Test fitting
                                        if (holder.outerWidth() + holder.offset().left - holder.scrollLeft() - t.offset().left - $.mainUI.options.tooltip.outerWidth() >= 0) {
                                            // Test for right side
                                            pos1 = t.offset().left - holder.offset().left + holder.scrollLeft() - offsetParent.position().left + holder.position().left;
                                        } else if (t.offset().left - offsetParent.offset().left + t.outerWidth() >= $.mainUI.options.tooltip.outerWidth()) {
                                            // Test for right
                                            pos1 = t.offset().left - holder.offset().left + holder.scrollLeft() - offsetParent.position().left + holder.position().left + t.outerWidth() - $.mainUI.options.tooltip.outerWidth();
                                        } else {
                                            // Give up, position to center
                                            if (t.offset().left - holder.offset().left + holder.scrollLeft() - offsetParent.position().left + holder.position().left + (t.outerWidth() / 2) + ($.mainUI.options.tooltip.outerWidth() / 2) > offsetParent.outerWidth()) {
                                                pos1 = 0;
                                                pos3 = '';
                                            } else {
                                                pos1 = t.offset().left - holder.offset().left + holder.scrollLeft() - offsetParent.position().left + holder.position().left + (t.outerWidth() / 2) - ($.mainUI.options.tooltip.outerWidth() / 2);
                                                if (pos1 < 0) {
                                                    pos1 = 0;
                                                    pos3 = '';
                                                }
                                            }
                                        }
                                    }
                                    $.mainUI.options.tooltip.css({
                                        left: pos1,
                                        right: pos3
                                    });
                                    $.mainUI.options.tooltip.find('.tooltip-arrow').css({
                                        left: t.offset().left + (t.outerWidth() / 2) - ($.mainUI.options.tooltip.find('.tooltip-arrow').outerWidth() / 2) - holder.offset().left + holder.scrollLeft() - offsetParent.position().left + holder.position().left - pos1
                                    });
                                    // Set vertical
                                    // Test fitting
                                    if (t.offset().top - holder.offset().top + holder.scrollTop() - $.mainUI.options.tooltip.outerHeight() >= 0) {
                                        $.mainUI.options.tooltip.removeClass('arrowtop').addClass('arrowbottom');
                                        pos2 = t.offset().top - holder.offset().top + holder.scrollTop() - $.mainUI.options.tooltip.outerHeight();
                                    } else {
                                        $.mainUI.options.tooltip.removeClass('arrowbottom').addClass('arrowtop');
                                        pos2 = t.offset().top - holder.offset().top + holder.scrollTop() + t.outerHeight();
                                    }
                                    // Test that it's possible to fit in parent
                                    $.mainUI.options.tooltip.css({
                                        top: pos2
                                    });

                                }, $.mainUI.options.uispeed);
                            }
                            t.data('tooltip-active', true);
                        } else if (e.type === 'mouseleave') {
                            window.clearTimeout($.mainUI.options.tooltiptimer);
                            $.mainUI.options.tooltiptimer = window.setTimeout(function () {
                                if ($.mainUI.options.tooltip.data('owner') !== undefined) {
                                    $.mainUI.options.tooltip.data('owner').data('tooptip-active', false);
                                }
                                $.mainUI.options.tooltip.detach().removeData('owner');
                            }, $.mainUI.options.uispeed);
                            t.data('tooltip-active', false);
                        }
                    });

                    // Fix google maps

                    $(window).bind('resize.gmaps orientationchange.gmaps', function () {
                        ui.fixMaps();
                    });

                    // Mobile sidebar toggler

                    $('.openmenu1').click(function (e) {
                        e.preventDefault();
                        $('.box01').toggleClass('open-sidebar01');
                    });
                    $('.openmenu2').click(function (e) {
                        e.preventDefault();
                        $('.box01').toggleClass('open-sidebar02');
                    });
                    $('.closemenus').click(function (e) {
                        e.preventDefault();
                        $('.box01').removeClass('open-sidebar01 open-sidebar02');
                    });

                    // Langselect dropdown

                    $('ul.tools > LI:has(UL) A').click(function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var t = $(this).closest('LI');
                        if (t.hasClass('open')) {
                            t.removeClass('open');
                            $('.box01').unbind('click.tools');
                        } else {
                            t.addClass('open');
                            $('.box01').bind('click.tools', function () {
                                t.removeClass('open');
                                $('.box01').unbind('click.tools');
                            });
                        }
                    });

                    // Tabs

                    $('[data-behaviour="tabs"]')
                        .attr('role', 'tablist')
                        .on('click', 'A', function (e) {
                            if ($($(this).attr('href').substring($(this).attr('href').indexOf('#'))).length !== 0) {
                                e.preventDefault();
                                $(this).closest('UL').find('A').each(function () {
                                    $(this).removeClass('active');
                                    $($(this).attr('href').substring($(this).attr('href').indexOf('#'))).addClass('hidden').attr('aria-expanded', 'false').attr('aria-hidden', 'true');
                                });
                                $($(this).attr('href').substring($(this).attr('href').indexOf('#'))).removeClass('hidden').attr('aria-expanded', 'true').attr('aria-hidden', 'false');
                                $(this).closest('UL').find('LI').attr('aria-selected', 'false');
                                $(this).addClass('active').closest('LI').attr('aria-selected', 'true');
                                if ($(this).attr('rel')) {
                                    document.location.hash = $(this).attr('rel');
                                }
                            } else {
                                document.location.href = $(this).attr('href');
                            }
                            $(window).resize();
                        })
                        .find('LI').attr('role', 'tab').end()
                        .find('A').each(function () {
                            var ariaid = 'ui-' + new Date().getMilliseconds() + Math.random().toString(36).substr(2, 5),
                                t = $(this),
                                str = t.attr('href').substring(t.attr('href').indexOf('#'));
                            if ($(str).length !== 0) {
                                if (t.hasClass('active')) {
                                    t.closest('LI').attr('aria-selected', 'true');
                                    $(str).removeClass('hidden').attr('role', 'tabpanel').attr('aria-labelledby', ariaid).attr('aria-expanded', 'true').attr('aria-hidden', 'false');
                                } else {
                                    t.closest('LI').attr('aria-selected', 'false');
                                    $(str).addClass('hidden').attr('role', 'tabpanel').attr('aria-labelledby', ariaid).attr('aria-expanded', 'false').attr('aria-hidden', 'true');
                                }
                                t
                                    .attr('id', ariaid).attr('role', 'presentation')
                                    .closest('LI')
                                    .attr('aria-labelledby', ariaid)
                                    .attr('aria-controls', t.attr('href').substring(t.attr('href').indexOf('#') + 1));
                            }
                        })
                        .end();

                    // Collapsible blocks

                    $('.grouped01 .group:not(.static,.multilevel) .group-heading, .grouped02 .group:not(.static,.multilevel) .group-heading').click(function (e) {
                        e.preventDefault();
                        $(this).closest('.group').toggleClass('open');
                    });
                    $('.grouped01 .group.multilevel .group-heading INPUT, .grouped02 .group.multilevel .group-heading INPUT').change(function () {
                        if ($(this).is(':checked')) {
                            $(this).closest('.group').addClass('open');
                        } else {
                            $(this).closest('.group').removeClass('open');
                        }
                    });

                    // Extend options

                    $('.checklist01 .toggle A').click(function (e) {
                        e.preventDefault();
                        $(this).closest('LI').addClass('hidden').nextAll('.hidden').removeClass('hidden');
                    });

                    // Overlay windows

                    $(document).keydown(function (event) { if (event.which === 17) { cntrlIsPressed = true; } });
                    $(document).keyup(function () { cntrlIsPressed = false; });

                    $('[data-action="showOverlay"]').click(function (e) {
                        if (!cntrlIsPressed) {
                            e.preventDefault();
                            $.mainUI().showOverlay($(this).attr('href')); // sleep.php?time=2&q=
                        }
                    });

                    // Multiselects
                    if ($('SELECT.multiselect').length > 0) {
                        require(
                            ['multiselect'],
                            function () {
                                $('SELECT.multiselect').filter(function () {
                                    if ($(this).hasClass('initdone')) { return false; }
                                    return !!$(this).is(':visible');

                                }).each(function (a, b) {
                                    var opt = {
                                            numberDisplayed: $(b).attr('data-showitems') !== 'undefined' ? $(b).attr('data-showitems') : 1,
                                            buttonContainer: '<div class="fakeselect ' + $(b).attr('class') + '" />',
                                            includeSelectAllOption: $(b).attr('data-selectall') === 'true',
                                            buttonWidth: false,
                                            enableCaseInsensitiveFiltering: $(b).attr('data-search') === 'enabled',
                                            filterBehavior: 'text',
                                            cssChildRow: 'details',
                                            selectAllText: locales.selectAllText,
                                            filterPlaceholder: locales.filterPlaceholder,
                                            nonSelectedText: locales.nonSelectedText,
                                            nSelectedText: locales.nSelectedText,
                                            maxHeight: 300
                                        },
                                        valblock = $('<ul class="valblock hidden"></ul>'),
                                        showValues = function (sel) {
                                            var selected = $(sel).find('OPTION:selected[value!="' + $(b).data('multiselect').opt.selectAllValue + '"]');
                                            if (selected.length > 0) {
                                                valblock.removeClass('hidden').empty();
                                                $.each(selected, function (c, d) {
                                                    var item = $('<li><div>' + $(d).val() + '</div></li>'),
                                                        rem = $('<a href="#"></a>');
                                                    rem.click(function (e) {
                                                        e.preventDefault();
                                                        $(b).multiselect('deselect', $(d).val());
                                                        showValues(sel);
                                                    });
                                                    item.find('div').append(rem);
                                                    valblock.append(item);
                                                });
                                            } else {
                                                valblock.addClass('hidden').empty();
                                            }
                                        };
                                    $(b).multiselect(opt);
                                    if ($(b).attr('data-showvalues') === 'true' && $(b).attr('multiple') === 'multiple') {
                                        $(b).data('valblock', valblock);
                                        $(b).multiselect('setOptions', $.extend({}, opt, {
                                            onChange: function () {
                                                showValues($(b));
                                            }
                                        })).multiselect('rebuild');
                                        $(b).data('multiselect').$container.after(valblock);
                                        showValues($(b));
                                    }
                                    $(b).addClass('initdone');
                                });
                            }
                        );
                    }

                    // Page
                    // specifics

                    $('[data-related]').bind('click change init', function (e) {
                        if ($(this).is(':checkbox')) {
                            if ($(this).is(':checked')) {
                                $('#' + $(this).attr('data-related')).removeClass('hidden');
                            } else {
                                $('#' + $(this).attr('data-related')).addClass('hidden');
                            }
                        } else {
                            if ($(this).is('A')) {
                                e.preventDefault();
                            }
                            $('#' + $(this).attr('data-related')).removeClass('hidden');
                        }
                    });
                    $('[data-related] INPUT').bind('click change init', function () {
                        $('#' + $(this).closest('.starsrating').attr('data-related')).removeClass('hidden');
                    });
                    $(':checkbox[data-related]').trigger('init');

                    // Scrollable planner

                    if ($('.planner01').length > 0) {
                        require(['hammer'], function (Hammer) {
                            $('.planner01').each(function (a, b) {
                                var scroller = $('<span class="planner01scroller"><span></span></span>'),
                                    hammertime = new Hammer(b, {
                                        drag_lock_to_axis: false
                                    }),
                                    start = 0,
                                    ignoreScroll = false;

                                scroller.find('span').css('width', b.scrollWidth);
                                scroller.insertAfter(b);

                                hammertime.on('panstart', function () {
                                    start = $(b).scrollLeft();
                                    ignoreScroll = true;
                                });
                                hammertime.on('panend', function () {
                                    ignoreScroll = false;
                                });
                                hammertime.on('pan', function (e) { $(b).scrollLeft(start - e.deltaX); });

                                $(b).bind('scroll', function () {
                                    scroller.scrollLeft($(b).scrollLeft());
                                });
                                scroller.bind('scroll', function () {
                                    if (ignoreScroll === false) {
                                        $(b).scrollLeft(scroller.scrollLeft());
                                    }
                                });

                                $(document).on('scroll.planner init.planner', function () {
                                    if (ui.isVisible($('.footer01')[0])) {
                                        scroller.removeClass('fixed');
                                    } else {
                                        scroller.addClass('fixed');
                                    }
                                }).trigger('init.planner');
                            });
                        });
                    }

                    $('.image.gallery')
                        .on('click', 'A.prev', function (e) {
                            e.preventDefault();
                            var gallery = $(this).closest('.gallery'),
                                current = gallery.find('IMG:not(.hidden)');
                            if (current.prev('IMG').length > 0) {
                                current.addClass('hidden');
                                current.prev('IMG').removeClass('hidden');
                            } else {
                                gallery.find('IMG:last').removeClass('hidden');
                            }
                        })
                        .on('click', 'A.next', function (e) {
                            e.preventDefault();
                            var gallery = $(this).closest('.gallery'),
                                current = gallery.find('IMG:not(.hidden)');
                            if (current.next('IMG').length > 0) {
                                current.addClass('hidden');
                                current.next('IMG').removeClass('hidden');
                            } else {
                                gallery.find('IMG:first').removeClass('hidden');
                            }
                        });

                    ui.makeIncludes($('BODY'), false);

                },
                dummy: function (w, h) {
                    var canvas = document.createElement('canvas'),
                        context,
                        data,
                        out = '',
                        ctr,
                        Base64,
                        ret;
                    if (!!(canvas.getContext && canvas.getContext('2d'))) {
                        context = canvas.getContext('2d');
                        context.canvas.width = w;
                        context.canvas.height = h;
                        ret = canvas.toDataURL('image/png');
                    } else {
                        data = [0x47, 0x49, 0x46, 0x38, 0x39, 0x61, w - Math.floor(w / 256) * 256, Math.floor(w / 256), h - Math.floor(h / 256) * 256, Math.floor(h / 256), 0x80, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x21, 0xF9, 0x04, 0x01, 0x00, 0x00, 0x00, 0x00, 0x2C, 0x00, 0x00, 0x00, 0x00, 0x01, 0x00, 0x01, 0x00, 0x00, 0x02, 0x02, 0x44, 0x01, 0x00, 0x3B];
                        for (ctr = 0; ctr < data.length; ctr = ctr + 1) {
                            out += String.fromCharCode(data[ctr]);
                        }
                        Base64 = {
                            keyStr: 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=',
                            encode: function (input) {
                                var output = '',
                                    chr1,
                                    chr2,
                                    chr3,
                                    enc1,
                                    enc2,
                                    enc3,
                                    enc4,
                                    i = 0;
                                while (i < input.length) {
                                    chr1 = input.charCodeAt(i = i + 1);
                                    chr2 = input.charCodeAt(i = i + 1);
                                    chr3 = input.charCodeAt(i = i + 1);

                                    enc1 = chr1 >> 2;
                                    enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                                    enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                                    enc4 = chr3 & 63;
                                    if (isNaN(chr2)) {
                                        enc3 = enc4 = 64;
                                    } else if (isNaN(chr3)) {
                                        enc4 = 64;
                                    }
                                    output = output + this.keyStr.charAt(enc1) + this.keyStr.charAt(enc2) + this.keyStr.charAt(enc3) + this.keyStr.charAt(enc4);
                                }
                                return output;
                            }
                        };
                        ret = 'data:image/gif;base64,' + Base64.encode(out);
                    }
                    return ret;
                },
                genHolder: function (w, h) {
                    var canvas = document.createElement('canvas'),
                        context,
                        data,
                        out = '',
                        ctr,
                        Base64,
                        ret;
                    if (!!(canvas.getContext && canvas.getContext('2d'))) {
                        context = canvas.getContext('2d');
                        context.canvas.width = w;
                        context.canvas.height = h;
                        ret = canvas.toDataURL('image/png');
                    } else {
                        data = [0x47, 0x49, 0x46, 0x38, 0x39, 0x61, w - Math.floor(w / 256) * 256, Math.floor(w / 256), h - Math.floor(h / 256) * 256, Math.floor(h / 256), 0x80, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x21, 0xF9, 0x04, 0x01, 0x00, 0x00, 0x00, 0x00, 0x2C, 0x00, 0x00, 0x00, 0x00, 0x01, 0x00, 0x01, 0x00, 0x00, 0x02, 0x02, 0x44, 0x01, 0x00, 0x3B];
                        for (ctr = 0; ctr < data.length; ctr = ctr + 1) {
                            out += String.fromCharCode(data[ctr]);
                        }
                        Base64 = {
                            _keyStr: 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=',
                            encode: function (input) {
                                var output = '',
                                    chr1,
                                    chr2,
                                    chr3,
                                    enc1,
                                    enc2,
                                    enc3,
                                    enc4,
                                    i = 0;
                                while (i < input.length) {
                                    chr1 = input.charCodeAt(i = i + 1);
                                    chr2 = input.charCodeAt(i = i + 1);
                                    chr3 = input.charCodeAt(i = i + 1);
                                    enc1 = chr1 >> 2;
                                    enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                                    enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                                    enc4 = chr3 & 63;
                                    if (isNaN(chr2)) {
                                        enc3 = enc4 = 64;
                                    } else if (isNaN(chr3)) {
                                        enc4 = 64;
                                    }
                                    output = output + this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) + this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);
                                }
                                return output;
                            }
                        };
                        ret = 'data:image/gif;base64,' + Base64.encode(out);
                    }
                    return ret;
                },
                makeIncludes: function (chunk, zone) {

                    // Video placeholders

                    chunk.find('[data-html][data-width][data-height]').each(function (a, b) {
                        $('<img alt="" class="holder" />').attr('src', ui.genHolder($(b).attr('data-width'), $(b).attr('data-height'))).prependTo(b);
                        $(b).one('click', function (e) {
                            e.preventDefault();
                            if ($(this).closest('DIV.row, LI.item').length > 0) {
                                $(this).closest('DIV.row, LI.item').addClass('mediaopen');
                            }
                            $(this).append($(this).attr('data-html'));
                            $(this).find('img.thumbnail').remove();
                        });
                    });

                    // Image placeholders

                    chunk.find('[data-width][data-height]:not([data-html])').each(function (a, b) {
                        $('<img alt="" class="holder" />').attr('src', ui.genHolder($(b).attr('data-width'), $(b).attr('data-height'))).prependTo($(b).find('.holder div'));
                    });

                    // Ajax includes

                    chunk.find('[data-include]').each(function (a, b) {
                        $.ajax({
                            url: $(b).attr('data-include'),
                            success: function (d) {
                                var tmp01 = $(d);
                                ui.makeIncludes(tmp01, zone);
                                $(b).replaceWith(tmp01);
                                if (zone) {
                                    $(zone).trigger('enter');
                                }
                            }
                        });
                    });

                    // Uncheckable radiobuttons

                    $('SPAN.stars :radio').uncheckableRadio();
                },
                addMap: function (map, container) {
                    if (container) {
                        map.container = container;
                    }
                    $.mainUI.options.gmaps.push(map);
                    ui.fixMaps();
                },
                fixMaps: function () {
                    $.each($.mainUI.options.gmaps, function (index, value) {
                        if ($.contains(document, value.container)) {
                            google.maps.event.trigger(value, 'resize');
                            if (value.scaling !== undefined) {
                                value.scaling();
                            }
                        }
                    });
                    $.mainUI.options.gmaps = $($.mainUI.options.gmaps).filter(function (a, b) {
                        return $.contains(document, b.container);
                    });
                },
                showOverlay: function (url) {
                    var overlay = $('<div class="overlaybox01"><iframe frameborder="0" allowfullscreen="true" seamless></iframe></div>'),
                        docpos = $(document).scrollTop();
                    ui.hideOverlay();
                    overlay
                        .data('pos', docpos)
                        .find('iframe')
                        .attr('src', url)
                        .load(function () {
                            overlay.removeClass('loading');
                            $(this).focus();
                        });
                    ui.setUniqueName(overlay.find('iframe'));
                    $('HTML').addClass('overlayed');
                    $('.supported').scrollTop(docpos);
                    overlay.appendTo('BODY');
                    window.setTimeout(function () {
                        overlay.addClass('loading visible');
                    }, 1);
                    $(document).bind('keyup.overlay', function (e) {
                        if (e.keyCode === 27) {
                            ui.hideOverlay();
                        }
                    });
                },
                hideOverlay: function () {
                    if (window.self !== window.top) {
                        window.parent.$.mainUI().hideOverlay();
                    } else {
                        if ($('.overlaybox01').length > 0) {
                            $(document).scrollTop($('.overlaybox01:first').data('pos'));
                            $('.overlaybox01').remove();
                            $(document).unbind('keyup.overlay');
                        }
                    }
                },
                setUniqueName: function (set) {
                    var charstoformid = '_0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz',
                        getId,
                        i,
                        idlength = 10;
                    charstoformid = charstoformid.split('');
                    getId = function () {
                        var uniqid = 'rnd';
                        for (i = 0; i < idlength; i = i + 1) {
                            uniqid += charstoformid[Math.floor(Math.random() * charstoformid.length)];
                        }
                        return uniqid;
                    };
                    return $(set).each(function () {
                        var id = getId();
                        while ($('#' + id).length) {
                            id = getId();
                        }
                        $(this).attr('id', id).attr('name', id);
                    });
                },
                isVisible: function (el) {
                    var eap,
                        rect = el.getBoundingClientRect(),
                        docEl = document.documentElement,
                        vWidth = window.innerWidth || docEl.clientWidth,
                        vHeight = window.innerHeight || docEl.clientHeight,
                        efp = function (x, y) {
                            return document.elementFromPoint(x, y);
                        },
                        contains = 'contains' in el ? 'contains' : 'compareDocumentPosition',
                        has = contains == 'contains' ? 1 : 0x14;

                    if (rect.right < 0 || rect.bottom < 0 || rect.left > vWidth || rect.top > vHeight) { return false; }

                    return ((eap = efp(rect.left, rect.top)) == el || el[contains](eap) == has || (eap = efp(rect.right, rect.top)) == el || el[contains](eap) == has || (eap = efp(rect.right, rect.bottom)) == el || el[contains](eap) == has || (eap = efp(rect.left, rect.bottom)) == el || el[contains](eap) == has);
                },
                openmenu: function () {
                    alert('open menu');
                }
            };
        return {
            options: ui.opts,
            init: ui.init,
            dummy: ui.dummy,
            genHolder: ui.genHolder,
            makeIncludes: ui.makeIncludes,
            passwordFields: ui.passwordFields,
            addMap: ui.addMap,
            fixMaps: ui.fixMaps,
            showOverlay: ui.showOverlay,
            hideOverlay: ui.hideOverlay,
            setUniqueName: ui.setUniqueName,
            isVisible: ui.isVisible,
            openmenu: ui.openmenu
        };
    };
    $(document).ready(function () {
        $.mainUI().init();
    });
    $.fn.uncheckableRadio = function () {
        return this.each(function () {
            var radio = this;
            $('label[for="' + radio.id + '"]').add(radio).mousedown(function () {
                $(radio).data('wasChecked', radio.checked);
            });

            $('label[for="' + radio.id + '"]').add(radio).click(function () {
                if ($(radio).data('wasChecked')) {
                    radio.checked = false;
                }
            });
        });
    };
}(jQuery));