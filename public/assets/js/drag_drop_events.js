!function (t) {
    function e(r) {
        if (n[r]) return n[r].exports;
        var i = n[r] = {i: r, l: !1, exports: {}};
        return t[r].call(i.exports, i, i.exports, e), i.l = !0, i.exports
    }

    var n = {};
    e.m = t, e.c = n, e.d = function (t, n, r) {
        e.o(t, n) || Object.defineProperty(t, n, {configurable: !1, enumerable: !0, get: r})
    }, e.n = function (t) {
        var n = t && t.__esModule ? function () {
            return t.default
        } : function () {
            return t
        };
        return e.d(n, "a", n), n
    }, e.o = function (t, e) {
        return Object.prototype.hasOwnProperty.call(t, e)
    }, e.p = "", e(e.s = 24)
}({
    24: function (t, e, n) {
        t.exports = n(25)
    }, 25: function (t, e) {
        function n() {
            $(".fc-draggable").each(function () {
                $(this).data("event", {
                    title: $.trim($(this).text()),
                    stick: !0,
                    color: $(this).data("color")
                }), $(this).draggable({zIndex: 999, revert: !0, revertDuration: 0}), $("td").removeClass("fc-highlight")
            })
        }

        var r = [], i = function (t, e) {
            var n = $("#external-events"), r = n.offset();
            return r.right = n.width() + r.left, r.bottom = n.height() + r.top, t >= r.left && e >= r.top && t <= r.right && e <= r.bottom
        };
        $("#external-events .fc-event").each(function () {
            $(this).css("background", $(this).data("color")), $(this).data("event", {
                title: $.trim($(this).text()),
                stick: !0,
                color: $(this).data("color"),
                textColor: "#ffffff"
            }), $(this).draggable({zIndex: 999, revert: !0, revertDuration: 0})
        }), $("#calendar1").fullCalendar({
            header: !1,
            editable: !0,
            droppable: !0,
            dragRevertDuration: 0,
            eventLimit: !0,
            eventClick: function (t, e) {
                $("#editEventModal").modal("show")
            },
            drop: function (t, e, i) {
                $(".custom-control-input.drop-remove").is(":checked") && $(this).remove(), void 0 !== r.calendar && $(r.calendar).fullCalendar("removeEvents", r.event_id), n()
            },
            eventReceive: function (t) {
                n()
            },
            eventDrop: function (t, e, r, i, o, a) {
                n()
            },
            eventDragStart: function (t, e, n, i) {
                r.calendar = "#calendar1", r.event_id = t._id
            },
            eventDragStop: function (t, e, o, a) {
                if (i(e.clientX, e.clientY)) {
                    $("#calendar1").fullCalendar("removeEvents", t._id);
                    var l = $("<div class='fc-event'>").appendTo("#external-events-listing").text(t.title);
                    l.draggable({zIndex: 999, revert: !0, revertDuration: 0}), l.data("event", {
                        title: t.title,
                        id: t.id,
                        stick: !0
                    })
                }
                r = [], n()
            }
        })
    }
});