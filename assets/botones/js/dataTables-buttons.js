/*!
 Buttons for DataTables 1.5.6
 ©2016-2019 SpryMedia Ltd - datatables.net/license
*/
var $jscomp = $jscomp || {};
$jscomp.scope = {};
$jscomp.findInternal = function(d, q, n) { d instanceof String && (d = String(d)); for (var l = d.length, u = 0; u < l; u++) { var p = d[u]; if (q.call(n, p, u, d)) return { i: u, v: p } } return { i: -1, v: void 0 } };
$jscomp.ASSUME_ES5 = !1;
$jscomp.ASSUME_NO_NATIVE_MAP = !1;
$jscomp.ASSUME_NO_NATIVE_SET = !1;
$jscomp.SIMPLE_FROUND_POLYFILL = !1;
$jscomp.defineProperty = $jscomp.ASSUME_ES5 || "function" == typeof Object.defineProperties ? Object.defineProperty : function(d, q, n) { d != Array.prototype && d != Object.prototype && (d[q] = n.value) };
$jscomp.getGlobal = function(d) { return "undefined" != typeof window && window === d ? d : "undefined" != typeof global && null != global ? global : d };
$jscomp.global = $jscomp.getGlobal(this);
$jscomp.polyfill = function(d, q, n, l) { if (q) { n = $jscomp.global;
        d = d.split("."); for (l = 0; l < d.length - 1; l++) { var u = d[l];
            u in n || (n[u] = {});
            n = n[u] }
        d = d[d.length - 1];
        l = n[d];
        q = q(l);
        q != l && null != q && $jscomp.defineProperty(n, d, { configurable: !0, writable: !0, value: q }) } };
$jscomp.polyfill("Array.prototype.find", function(d) { return d ? d : function(d, n) { return $jscomp.findInternal(this, d, n).v } }, "es6", "es3");
(function(d) { "function" === typeof define && define.amd ? define(["jquery", "datatables.net"], function(q) { return d(q, window, document) }) : "object" === typeof exports ? module.exports = function(q, n) { q || (q = window);
        n && n.fn.dataTable || (n = require("datatables.net")(q, n).$); return d(n, q, q.document) } : d(jQuery, window, document) })(function(d, q, n, l) {
    function u(a) { a = new p.Api(a); var b = a.init().buttons || p.defaults.buttons; return (new t(a, b)).container() }
    var p = d.fn.dataTable,
        B = 0,
        C = 0,
        r = p.ext.buttons,
        t = function(a, b) {
            if (!(this instanceof t)) return function(b) { return (new t(b, a)).container() };
            "undefined" === typeof b && (b = {});
            !0 === b && (b = {});
            d.isArray(b) && (b = { buttons: b });
            this.c = d.extend(!0, {}, t.defaults, b);
            b.buttons && (this.c.buttons = b.buttons);
            this.s = { dt: new p.Api(a), buttons: [], listenKeys: "", namespace: "dtb" + B++ };
            this.dom = { container: d("<" + this.c.dom.container.tag + "/>").addClass(this.c.dom.container.className) };
            this._constructor()
        };
    d.extend(t.prototype, {
        action: function(a, b) {
            a = this._nodeToButton(a);
            if (b === l) return a.conf.action;
            a.conf.action =
                b;
            return this
        },
        active: function(a, b) { var c = this._nodeToButton(a);
            a = this.c.dom.button.active;
            c = d(c.node); if (b === l) return c.hasClass(a);
            c.toggleClass(a, b === l ? !0 : b); return this },
        add: function(a, b) { var c = this.s.buttons; if ("string" === typeof b) { b = b.split("-");
                c = this.s; for (var d = 0, f = b.length - 1; d < f; d++) c = c.buttons[1 * b[d]];
                c = c.buttons;
                b = 1 * b[b.length - 1] }
            this._expandButton(c, a, !1, b);
            this._draw(); return this },
        container: function() { return this.dom.container },
        disable: function(a) {
            a = this._nodeToButton(a);
            d(a.node).addClass(this.c.dom.button.disabled);
            return this
        },
        destroy: function() { d("body").off("keyup." + this.s.namespace); var a = this.s.buttons.slice(),
                b; var c = 0; for (b = a.length; c < b; c++) this.remove(a[c].node);
            this.dom.container.remove();
            a = this.s.dt.settings()[0];
            c = 0; for (b = a.length; c < b; c++)
                if (a.inst === this) { a.splice(c, 1); break }
            return this },
        enable: function(a, b) { if (!1 === b) return this.disable(a);
            a = this._nodeToButton(a);
            d(a.node).removeClass(this.c.dom.button.disabled); return this },
        name: function() { return this.c.name },
        node: function(a) {
            if (!a) return this.dom.container;
            a = this._nodeToButton(a);
            return d(a.node)
        },
        processing: function(a, b) { a = this._nodeToButton(a); if (b === l) return d(a.node).hasClass("processing");
            d(a.node).toggleClass("processing", b); return this },
        remove: function(a) { var b = this._nodeToButton(a),
                c = this._nodeToHost(a),
                e = this.s.dt; if (b.buttons.length)
                for (var f = b.buttons.length - 1; 0 <= f; f--) this.remove(b.buttons[f].node);
            b.conf.destroy && b.conf.destroy.call(e.button(a), e, d(a), b.conf);
            this._removeKey(b.conf);
            d(b.node).remove();
            a = d.inArray(b, c);
            c.splice(a, 1); return this },
        text: function(a, b) { var c = this._nodeToButton(a);
            a = this.c.dom.collection.buttonLiner;
            a = c.inCollection && a && a.tag ? a.tag : this.c.dom.buttonLiner.tag; var e = this.s.dt,
                f = d(c.node),
                g = function(a) { return "function" === typeof a ? a(e, f, c.conf) : a }; if (b === l) return g(c.conf.text);
            c.conf.text = b;
            a ? f.children(a).html(g(b)) : f.html(g(b)); return this },
        _constructor: function() {
            var a = this,
                b = this.s.dt,
                c = b.settings()[0],
                e = this.c.buttons;
            c._buttons || (c._buttons = []);
            c._buttons.push({ inst: this, name: this.c.name });
            for (var f = 0, g = e.length; f <
                g; f++) this.add(e[f]);
            b.on("destroy", function(b, d) { d === c && a.destroy() });
            d("body").on("keyup." + this.s.namespace, function(b) { if (!n.activeElement || n.activeElement === n.body) { var c = String.fromCharCode(b.keyCode).toLowerCase(); - 1 !== a.s.listenKeys.toLowerCase().indexOf(c) && a._keypress(c, b) } })
        },
        _addKey: function(a) { a.key && (this.s.listenKeys += d.isPlainObject(a.key) ? a.key.key : a.key) },
        _draw: function(a, b) {
            a || (a = this.dom.container, b = this.s.buttons);
            a.children().detach();
            for (var c = 0, d = b.length; c < d; c++) a.append(b[c].inserter),
                a.append(" "), b[c].buttons && b[c].buttons.length && this._draw(b[c].collection, b[c].buttons)
        },
        _expandButton: function(a, b, c, e) {
            var f = this.s.dt,
                g = 0;
            b = d.isArray(b) ? b : [b];
            for (var h = 0, k = b.length; h < k; h++) {
                var v = this._resolveExtends(b[h]);
                if (v)
                    if (d.isArray(v)) this._expandButton(a, v, c, e);
                    else {
                        var m = this._buildButton(v, c);
                        if (m) {
                            e !== l ? (a.splice(e, 0, m), e++) : a.push(m);
                            if (m.conf.buttons) {
                                var y = this.c.dom.collection;
                                m.collection = d("<" + y.tag + "/>").addClass(y.className).attr("role", "menu");
                                m.conf._collection = m.collection;
                                this._expandButton(m.buttons, m.conf.buttons, !0, e)
                            }
                            v.init && v.init.call(f.button(m.node), f, d(m.node), v);
                            g++
                        }
                    }
            }
        },
        _buildButton: function(a, b) {
            var c = this.c.dom.button,
                e = this.c.dom.buttonLiner,
                f = this.c.dom.collection,
                g = this.s.dt,
                h = function(b) { return "function" === typeof b ? b(g, m, a) : b };
            b && f.button && (c = f.button);
            b && f.buttonLiner && (e = f.buttonLiner);
            if (a.available && !a.available(g, a)) return !1;
            var k = function(a, b, c, e) {
                e.action.call(b.button(c), a, b, c, e);
                d(b.table().node()).triggerHandler("buttons-action.dt", [b.button(c),
                    b, c, e
                ])
            };
            f = a.tag || c.tag;
            var v = a.clickBlurs === l ? !0 : a.clickBlurs,
                m = d("<" + f + "/>").addClass(c.className).attr("tabindex", this.s.dt.settings()[0].iTabIndex).attr("aria-controls", this.s.dt.table().node().id).on("click.dtb", function(b) { b.preventDefault();!m.hasClass(c.disabled) && a.action && k(b, g, m, a);
                    v && m.blur() }).on("keyup.dtb", function(b) { 13 === b.keyCode && !m.hasClass(c.disabled) && a.action && k(b, g, m, a) });
            "a" === f.toLowerCase() && m.attr("href", "#");
            "button" === f.toLowerCase() && m.attr("type", "button");
            e.tag ? (f =
                d("<" + e.tag + "/>").html(h(a.text)).addClass(e.className), "a" === e.tag.toLowerCase() && f.attr("href", "#"), m.append(f)) : m.html(h(a.text));
            !1 === a.enabled && m.addClass(c.disabled);
            a.className && m.addClass(a.className);
            a.titleAttr && m.attr("title", h(a.titleAttr));
            a.attr && m.attr(a.attr);
            a.namespace || (a.namespace = ".dt-button-" + C++);
            e = (e = this.c.dom.buttonContainer) && e.tag ? d("<" + e.tag + "/>").addClass(e.className).append(m) : m;
            this._addKey(a);
            this.c.buttonCreated && (e = this.c.buttonCreated(a, e));
            return {
                conf: a,
                node: m.get(0),
                inserter: e,
                buttons: [],
                inCollection: b,
                collection: null
            }
        },
        _nodeToButton: function(a, b) { b || (b = this.s.buttons); for (var c = 0, d = b.length; c < d; c++) { if (b[c].node === a) return b[c]; if (b[c].buttons.length) { var f = this._nodeToButton(a, b[c].buttons); if (f) return f } } },
        _nodeToHost: function(a, b) { b || (b = this.s.buttons); for (var c = 0, d = b.length; c < d; c++) { if (b[c].node === a) return b; if (b[c].buttons.length) { var f = this._nodeToHost(a, b[c].buttons); if (f) return f } } },
        _keypress: function(a, b) {
            if (!b._buttonsHandled) {
                var c = function(e) {
                    for (var f =
                            0, g = e.length; f < g; f++) { var h = e[f].conf,
                            k = e[f].node;
                        h.key && (h.key === a ? (b._buttonsHandled = !0, d(k).click()) : !d.isPlainObject(h.key) || h.key.key !== a || h.key.shiftKey && !b.shiftKey || h.key.altKey && !b.altKey || h.key.ctrlKey && !b.ctrlKey || h.key.metaKey && !b.metaKey || (b._buttonsHandled = !0, d(k).click()));
                        e[f].buttons.length && c(e[f].buttons) }
                };
                c(this.s.buttons)
            }
        },
        _removeKey: function(a) {
            if (a.key) {
                var b = d.isPlainObject(a.key) ? a.key.key : a.key;
                a = this.s.listenKeys.split("");
                b = d.inArray(b, a);
                a.splice(b, 1);
                this.s.listenKeys =
                    a.join("")
            }
        },
        _resolveExtends: function(a) {
            var b = this.s.dt,
                c, e = function(c) { for (var e = 0; !d.isPlainObject(c) && !d.isArray(c);) { if (c === l) return; if ("function" === typeof c) { if (c = c(b, a), !c) return !1 } else if ("string" === typeof c) { if (!r[c]) throw "Unknown button type: " + c;
                            c = r[c] }
                        e++; if (30 < e) throw "Buttons: Too many iterations"; } return d.isArray(c) ? c : d.extend({}, c) };
            for (a = e(a); a && a.extend;) {
                if (!r[a.extend]) throw "Cannot extend unknown button type: " + a.extend;
                var f = e(r[a.extend]);
                if (d.isArray(f)) return f;
                if (!f) return !1;
                var g = f.className;
                a = d.extend({}, f, a);
                g && a.className !== g && (a.className = g + " " + a.className);
                var h = a.postfixButtons;
                if (h) { a.buttons || (a.buttons = []);
                    g = 0; for (c = h.length; g < c; g++) a.buttons.push(h[g]);
                    a.postfixButtons = null }
                if (h = a.prefixButtons) { a.buttons || (a.buttons = []);
                    g = 0; for (c = h.length; g < c; g++) a.buttons.splice(g, 0, h[g]);
                    a.prefixButtons = null }
                a.extend = f.extend
            }
            return a
        }
    });
    t.background = function(a, b, c, e) {
        c === l && (c = 400);
        e || (e = n.body);
        a ? d("<div/>").addClass(b).css("display", "none").insertAfter(e).stop().fadeIn(c) :
            d("div." + b).stop().fadeOut(c, function() { d(this).removeClass(b).remove() })
    };
    t.instanceSelector = function(a, b) { if (!a) return d.map(b, function(a) { return a.inst }); var c = [],
            e = d.map(b, function(a) { return a.name }),
            f = function(a) { if (d.isArray(a))
                    for (var g = 0, k = a.length; g < k; g++) f(a[g]);
                else "string" === typeof a ? -1 !== a.indexOf(",") ? f(a.split(",")) : (a = d.inArray(d.trim(a), e), -1 !== a && c.push(b[a].inst)) : "number" === typeof a && c.push(b[a].inst) };
        f(a); return c };
    t.buttonSelector = function(a, b) {
        for (var c = [], e = function(a, b, c) {
                for (var d,
                        f, g = 0, k = b.length; g < k; g++)
                    if (d = b[g]) f = c !== l ? c + g : g + "", a.push({ node: d.node, name: d.conf.name, idx: f }), d.buttons && e(a, d.buttons, f + "-")
            }, f = function(a, b) {
                var g, h = [];
                e(h, b.s.buttons);
                var k = d.map(h, function(a) { return a.node });
                if (d.isArray(a) || a instanceof d)
                    for (k = 0, g = a.length; k < g; k++) f(a[k], b);
                else if (null === a || a === l || "*" === a)
                    for (k = 0, g = h.length; k < g; k++) c.push({ inst: b, node: h[k].node });
                else if ("number" === typeof a) c.push({ inst: b, node: b.s.buttons[a].node });
                else if ("string" === typeof a)
                    if (-1 !== a.indexOf(","))
                        for (h =
                            a.split(","), k = 0, g = h.length; k < g; k++) f(d.trim(h[k]), b);
                    else if (a.match(/^\d+(\-\d+)*$/)) k = d.map(h, function(a) { return a.idx }), c.push({ inst: b, node: h[d.inArray(a, k)].node });
                else if (-1 !== a.indexOf(":name"))
                    for (a = a.replace(":name", ""), k = 0, g = h.length; k < g; k++) h[k].name === a && c.push({ inst: b, node: h[k].node });
                else d(k).filter(a).each(function() { c.push({ inst: b, node: this }) });
                else "object" === typeof a && a.nodeName && (h = d.inArray(a, k), -1 !== h && c.push({ inst: b, node: k[h] }))
            }, g = 0, h = a.length; g < h; g++) f(b, a[g]);
        return c
    };
    t.defaults = { buttons: ["copy", "excel", "csv", "pdf", "print"], name: "main", tabIndex: 0, dom: { container: { tag: "div", className: "dt-buttons" }, collection: { tag: "div", className: "dt-button-collection" }, button: { tag: "ActiveXObject" in q ? "a" : "button", className: "dt-button", active: "active", disabled: "disabled" }, buttonLiner: { tag: "span", className: "" } } };
    t.version = "1.5.6";
    d.extend(r, {
        collection: {
            text: function(a) { return a.i18n("buttons.collection", "Collection") },
            className: "buttons-collection",
            init: function(a, b, c) {
                b.attr("aria-expanded", !1)
            },
            action: function(a, b, c, e) {
                var f = function() { b.buttons('[aria-haspopup="true"][aria-expanded="true"]').nodes().each(function() { var a = d(this).siblings(".dt-button-collection");
                        a.length && a.stop().fadeOut(e.fade, function() { a.detach() });
                        d(this).attr("aria-expanded", "false") });
                    d("div.dt-button-background").off("click.dtb-collection");
                    t.background(!1, e.backgroundClassName, e.fade, l);
                    d("body").off(".dtb-collection");
                    b.off("buttons-action.b-internal") };
                a = "true" === c.attr("aria-expanded");
                f();
                if (!a) {
                    var g =
                        d(c).parents("div.dt-button-collection");
                    a = c.position();
                    var h = d(b.table().container()),
                        k = !1,
                        l = c;
                    c.attr("aria-expanded", "true");
                    g.length && (k = d(".dt-button-collection").position(), l = g, d("body").trigger("click.dtb-collection"));
                    l.parents("body")[0] !== n.body && (l = n.body.lastChild);
                    e._collection.find(".dt-button-collection-title").remove();
                    e._collection.prepend('<div class="dt-button-collection-title">' + e.collectionTitle + "</div>");
                    e._collection.addClass(e.collectionLayout).css("display", "none").insertAfter(l).stop().fadeIn(e.fade);
                    g = e._collection.css("position");
                    if (k && "absolute" === g) e._collection.css({ top: k.top, left: k.left });
                    else if ("absolute" === g) {
                        e._collection.css({ top: a.top + c.outerHeight(), left: a.left });
                        k = h.offset().top + h.height();
                        k = a.top + c.outerHeight() + e._collection.outerHeight() - k;
                        g = a.top - e._collection.outerHeight();
                        var m = h.offset().top;
                        (k > m - g || e.dropup) && e._collection.css("top", a.top - e._collection.outerHeight() - 5);
                        e._collection.hasClass(e.rightAlignClassName) && e._collection.css("left", a.left + c.outerWidth() - e._collection.outerWidth());
                        k = a.left + e._collection.outerWidth();
                        h = h.offset().left + h.width();
                        k > h && e._collection.css("left", a.left - (k - h));
                        c = c.offset().left + e._collection.outerWidth();
                        c > d(q).width() && e._collection.css("left", a.left - (c - d(q).width()))
                    } else c = e._collection.height() / 2, c > d(q).height() / 2 && (c = d(q).height() / 2), e._collection.css("marginTop", -1 * c);
                    e.background && t.background(!0, e.backgroundClassName, e.fade, l);
                    setTimeout(function() {
                        d("div.dt-button-background").on("click.dtb-collection", function() {});
                        d("body").on("click.dtb-collection",
                            function(a) { var b = d.fn.addBack ? "addBack" : "andSelf";
                                d(a.target).parents()[b]().filter(e._collection).length || f() }).on("keyup.dtb-collection", function(a) { 27 === a.keyCode && f() });
                        if (e.autoClose) b.on("buttons-action.b-internal", function() { f() })
                    }, 10)
                }
            },
            background: !0,
            collectionLayout: "",
            collectionTitle: "",
            backgroundClassName: "dt-button-background",
            rightAlignClassName: "dt-button-right",
            autoClose: !1,
            fade: 400,
            attr: { "aria-haspopup": !0 }
        },
        copy: function(a, b) {
            if (r.copyHtml5) return "copyHtml5";
            if (r.copyFlash && r.copyFlash.available(a,
                    b)) return "copyFlash"
        },
        csv: function(a, b) { if (r.csvHtml5 && r.csvHtml5.available(a, b)) return "csvHtml5"; if (r.csvFlash && r.csvFlash.available(a, b)) return "csvFlash" },
        excel: function(a, b) { if (r.excelHtml5 && r.excelHtml5.available(a, b)) return "excelHtml5"; if (r.excelFlash && r.excelFlash.available(a, b)) return "excelFlash" },
        pdf: function(a, b) { if (r.pdfHtml5 && r.pdfHtml5.available(a, b)) return "pdfHtml5"; if (r.pdfFlash && r.pdfFlash.available(a, b)) return "pdfFlash" },
        pageLength: function(a) {
            a = a.settings()[0].aLengthMenu;
            var b = d.isArray(a[0]) ?
                a[0] : a,
                c = d.isArray(a[0]) ? a[1] : a;
            return {
                extend: "collection",
                text: function(a) { return a.i18n("buttons.pageLength", { "-1": "Show all rows", _: "Show %d rows" }, a.page.len()) },
                className: "buttons-page-length",
                autoClose: !0,
                buttons: d.map(b, function(a, b) { return { text: c[b], className: "button-page-length", action: function(b, c) { c.page.len(a).draw() }, init: function(b, c, d) { var e = this;
                            c = function() { e.active(b.page.len() === a) };
                            b.on("length.dt" + d.namespace, c);
                            c() }, destroy: function(a, b, c) { a.off("length.dt" + c.namespace) } } }),
                init: function(a, b, c) { var d = this;
                    a.on("length.dt" + c.namespace, function() { d.text(c.text) }) },
                destroy: function(a, b, c) { a.off("length.dt" + c.namespace) }
            }
        }
    });
    p.Api.register("buttons()", function(a, b) { b === l && (b = a, a = l);
        this.selector.buttonGroup = a; var c = this.iterator(!0, "table", function(c) { if (c._buttons) return t.buttonSelector(t.instanceSelector(a, c._buttons), b) }, !0);
        c._groupSelector = a; return c });
    p.Api.register("button()", function(a, b) { a = this.buttons(a, b);
        1 < a.length && a.splice(1, a.length); return a });
    p.Api.registerPlural("buttons().active()",
        "button().active()",
        function(a) { return a === l ? this.map(function(a) { return a.inst.active(a.node) }) : this.each(function(b) { b.inst.active(b.node, a) }) });
    p.Api.registerPlural("buttons().action()", "button().action()", function(a) { return a === l ? this.map(function(a) { return a.inst.action(a.node) }) : this.each(function(b) { b.inst.action(b.node, a) }) });
    p.Api.register(["buttons().enable()", "button().enable()"], function(a) { return this.each(function(b) { b.inst.enable(b.node, a) }) });
    p.Api.register(["buttons().disable()",
        "button().disable()"
    ], function() { return this.each(function(a) { a.inst.disable(a.node) }) });
    p.Api.registerPlural("buttons().nodes()", "button().node()", function() { var a = d();
        d(this.each(function(b) { a = a.add(b.inst.node(b.node)) })); return a });
    p.Api.registerPlural("buttons().processing()", "button().processing()", function(a) { return a === l ? this.map(function(a) { return a.inst.processing(a.node) }) : this.each(function(b) { b.inst.processing(b.node, a) }) });
    p.Api.registerPlural("buttons().text()", "button().text()", function(a) {
        return a ===
            l ? this.map(function(a) { return a.inst.text(a.node) }) : this.each(function(b) { b.inst.text(b.node, a) })
    });
    p.Api.registerPlural("buttons().trigger()", "button().trigger()", function() { return this.each(function(a) { a.inst.node(a.node).trigger("click") }) });
    p.Api.registerPlural("buttons().containers()", "buttons().container()", function() {
        var a = d(),
            b = this._groupSelector;
        this.iterator(!0, "table", function(c) { if (c._buttons) { c = t.instanceSelector(b, c._buttons); for (var d = 0, f = c.length; d < f; d++) a = a.add(c[d].container()) } });
        return a
    });
    p.Api.register("button().add()", function(a, b) { var c = this.context;
        c.length && (c = t.instanceSelector(this._groupSelector, c[0]._buttons), c.length && c[0].add(b, a)); return this.button(this._groupSelector, a) });
    p.Api.register("buttons().destroy()", function() { this.pluck("inst").unique().each(function(a) { a.destroy() }); return this });
    p.Api.registerPlural("buttons().remove()", "buttons().remove()", function() { this.each(function(a) { a.inst.remove(a.node) }); return this });
    var w;
    p.Api.register("buttons.info()",
        function(a, b, c) {
            var e = this;
            if (!1 === a) return d("#datatables_buttons_info").fadeOut(function() { d(this).remove() }), clearTimeout(w), w = null, this;
            w && clearTimeout(w);
            d("#datatables_buttons_info").length && d("#datatables_buttons_info").remove();
            a = a ? "<h2>" + a + "</h2>" : "";
            d('<div id="datatables_buttons_info" class="dt-button-info"/>').html(a).append(d("<div/>")["string" === typeof b ? "html" : "append"](b)).css("display", "none").appendTo("body").fadeIn();
            c !== l && 0 !== c && (w = setTimeout(function() { e.buttons.info(!1) }, c));
            return this
        });
    p.Api.register("buttons.exportData()", function(a) { if (this.context.length) return D(new p.Api(this.context[0]), a) });
    p.Api.register("buttons.exportInfo()", function(a) {
        a || (a = {});
        var b = a;
        var c = "*" === b.filename && "*" !== b.title && b.title !== l && null !== b.title && "" !== b.title ? b.title : b.filename;
        "function" === typeof c && (c = c());
        c === l || null === c ? c = null : (-1 !== c.indexOf("*") && (c = d.trim(c.replace("*", d("head > title").text()))), c = c.replace(/[^a-zA-Z0-9_\u00A1-\uFFFF\.,\-_ !\(\)]/g, ""), (b = x(b.extension)) ||
            (b = ""), c += b);
        b = x(a.title);
        b = null === b ? null : -1 !== b.indexOf("*") ? b.replace("*", d("head > title").text() || "Exported data") : b;
        return { filename: c, title: b, messageTop: z(this, a.message || a.messageTop, "top"), messageBottom: z(this, a.messageBottom, "bottom") }
    });
    var x = function(a) { return null === a || a === l ? null : "function" === typeof a ? a() : a },
        z = function(a, b, c) { b = x(b); if (null === b) return null;
            a = d("caption", a.table().container()).eq(0); return "*" === b ? a.css("caption-side") !== c ? null : a.length ? a.text() : "" : b },
        A = d("<textarea/>")[0],
        D = function(a, b) {
            var c = d.extend(!0, {}, { rows: null, columns: "", modifier: { search: "applied", order: "applied" }, orthogonal: "display", stripHtml: !0, stripNewlines: !0, decodeEntities: !0, trim: !0, format: { header: function(a) { return e(a) }, footer: function(a) { return e(a) }, body: function(a) { return e(a) } }, customizeData: null }, b),
                e = function(a) {
                    if ("string" !== typeof a) return a;
                    a = a.replace(/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi, "");
                    a = a.replace(/<!\-\-.*?\-\->/g, "");
                    c.stripHtml && (a = a.replace(/<[^>]*>/g, ""));
                    c.trim &&
                        (a = a.replace(/^\s+|\s+$/g, ""));
                    c.stripNewlines && (a = a.replace(/\n/g, " "));
                    c.decodeEntities && (A.innerHTML = a, a = A.value);
                    return a
                };
            b = a.columns(c.columns).indexes().map(function(b) { var d = a.column(b).header(); return c.format.header(d.innerHTML, b, d) }).toArray();
            var f = a.table().footer() ? a.columns(c.columns).indexes().map(function(b) { var d = a.column(b).footer(); return c.format.footer(d ? d.innerHTML : "", b, d) }).toArray() : null,
                g = d.extend({}, c.modifier);
            a.select && "function" === typeof a.select.info && g.selected === l &&
                a.rows(c.rows, d.extend({ selected: !0 }, g)).any() && d.extend(g, { selected: !0 });
            g = a.rows(c.rows, g).indexes().toArray();
            var h = a.cells(g, c.columns);
            g = h.render(c.orthogonal).toArray();
            h = h.nodes().toArray();
            for (var k = b.length, p = [], m = 0, n = 0, q = 0 < k ? g.length / k : 0; n < q; n++) { for (var t = [k], r = 0; r < k; r++) t[r] = c.format.body(g[m], n, r, h[m]), m++;
                p[n] = t }
            b = { header: b, footer: f, body: p };
            c.customizeData && c.customizeData(b);
            return b
        };
    d.fn.dataTable.Buttons = t;
    d.fn.DataTable.Buttons = t;
    d(n).on("init.dt plugin-init.dt", function(a, b) {
        "dt" ===
        a.namespace && (a = b.oInit.buttons || p.defaults.buttons) && !b._buttons && (new t(b, a)).container()
    });
    p.ext.feature.push({ fnInit: u, cFeature: "B" });
    p.ext.features && p.ext.features.register("buttons", u);
    return t
});