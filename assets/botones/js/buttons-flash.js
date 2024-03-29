/*!
 Flash export buttons for Buttons and DataTables.
 2015-2017 SpryMedia Ltd - datatables.net/license

 ZeroClipbaord - MIT license
 Copyright (c) 2012 Joseph Huckaby
*/
(function(g) { "function" === typeof define && define.amd ? define(["jquery", "datatables.net", "datatables.net-buttons"], function(n) { return g(n, window, document) }) : "object" === typeof exports ? module.exports = function(n, m) { n || (n = window);
        m && m.fn.dataTable || (m = require("datatables.net")(n, m).$);
        m.fn.dataTable.Buttons || require("datatables.net-buttons")(n, m); return g(m, n, n.document) } : g(jQuery, window, document) })(function(g, n, m, u) {
    function A(a) {
        for (var b = ""; 0 <= a;) b = String.fromCharCode(a % 26 + 65) + b, a = Math.floor(a / 26) - 1;
        return b
    }

    function r(a, b, c) { var d = a.createElement(b);
        c && (c.attr && g(d).attr(c.attr), c.children && g.each(c.children, function(a, b) { d.appendChild(b) }), null !== c.text && c.text !== u && d.appendChild(a.createTextNode(c.text))); return d }

    function G(a, b) {
        var c = a.header[b].length;
        a.footer && a.footer[b].length > c && (c = a.footer[b].length);
        for (var d = 0, f = a.body.length; d < f; d++) {
            var e = a.body[d][b];
            e = null !== e && e !== u ? e.toString() : ""; - 1 !== e.indexOf("\n") ? (e = e.split("\n"), e.sort(function(a, b) { return b.length - a.length }), e = e[0].length) :
                e = e.length;
            e > c && (c = e);
            if (40 < c) return 52
        }
        c *= 1.3;
        return 6 < c ? c : 6
    }

    function B(a) {
        v === u && (v = -1 === z.serializeToString(g.parseXML(t["xl/worksheets/sheet1.xml"])).indexOf("xmlns:r"));
        g.each(a, function(b, c) {
            if (g.isPlainObject(c)) B(c);
            else {
                if (v) {
                    var d = c.childNodes[0],
                        f, e = [];
                    for (f = d.attributes.length - 1; 0 <= f; f--) { var h = d.attributes[f].nodeName; var k = d.attributes[f].nodeValue; - 1 !== h.indexOf(":") && (e.push({ name: h, value: k }), d.removeAttribute(h)) }
                    f = 0;
                    for (h = e.length; f < h; f++) k = c.createAttribute(e[f].name.replace(":",
                        "_dt_b_namespace_token_")), k.value = e[f].value, d.setAttributeNode(k)
                }
                c = z.serializeToString(c);
                v && (-1 === c.indexOf("<?xml") && (c = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' + c), c = c.replace(/_dt_b_namespace_token_/g, ":"));
                c = c.replace(/<([^<>]*?) xmlns=""([^<>]*?)>/g, "<$1 $2>");
                a[b] = c
            }
        })
    }
    var l = g.fn.dataTable,
        h = {
            version: "1.0.4-TableTools2",
            clients: {},
            moviePath: "",
            nextId: 1,
            $: function(a) {
                "string" == typeof a && (a = m.getElementById(a));
                a.addClass || (a.hide = function() { this.style.display = "none" }, a.show =
                    function() { this.style.display = "" }, a.addClass = function(a) { this.removeClass(a);
                        this.className += " " + a }, a.removeClass = function(a) { this.className = this.className.replace(new RegExp("\\s*" + a + "\\s*"), " ").replace(/^\s+/, "").replace(/\s+$/, "") }, a.hasClass = function(a) { return !!this.className.match(new RegExp("\\s*" + a + "\\s*")) });
                return a
            },
            setMoviePath: function(a) { this.moviePath = a },
            dispatch: function(a, b, c) {
                (a = this.clients[a]) && a.receiveEvent(b, c) },
            log: function(a) { console.log("Flash: " + a) },
            register: function(a,
                b) { this.clients[a] = b },
            getDOMObjectPosition: function(a) { var b = { left: 0, top: 0, width: a.width ? a.width : a.offsetWidth, height: a.height ? a.height : a.offsetHeight }; "" !== a.style.width && (b.width = a.style.width.replace("px", "")); "" !== a.style.height && (b.height = a.style.height.replace("px", "")); for (; a;) b.left += a.offsetLeft, b.top += a.offsetTop, a = a.offsetParent; return b },
            Client: function(a) { this.handlers = {};
                this.id = h.nextId++;
                this.movieId = "ZeroClipboard_TableToolsMovie_" + this.id;
                h.register(this.id, this);
                a && this.glue(a) }
        };
    h.Client.prototype = {
        id: 0,
        ready: !1,
        movie: null,
        clipText: "",
        fileName: "",
        action: "copy",
        handCursorEnabled: !0,
        cssEffects: !0,
        handlers: null,
        sized: !1,
        sheetName: "",
        glue: function(a, b) {
            this.domElement = h.$(a);
            a = 99;
            this.domElement.style.zIndex && (a = parseInt(this.domElement.style.zIndex, 10) + 1);
            var c = h.getDOMObjectPosition(this.domElement);
            this.div = m.createElement("div");
            var d = this.div.style;
            d.position = "absolute";
            d.left = "0px";
            d.top = "0px";
            d.width = c.width + "px";
            d.height = c.height + "px";
            d.zIndex = a;
            "undefined" != typeof b &&
                "" !== b && (this.div.title = b);
            0 !== c.width && 0 !== c.height && (this.sized = !0);
            this.domElement && (this.domElement.appendChild(this.div), this.div.innerHTML = this.getHTML(c.width, c.height).replace(/&/g, "&amp;"))
        },
        positionElement: function() { var a = h.getDOMObjectPosition(this.domElement),
                b = this.div.style;
            b.position = "absolute";
            b.width = a.width + "px";
            b.height = a.height + "px";
            0 !== a.width && 0 !== a.height && (this.sized = !0, b = this.div.childNodes[0], b.width = a.width, b.height = a.height) },
        getHTML: function(a, b) {
            var c = "",
                d = "id=" + this.id +
                "&width=" + a + "&height=" + b;
            if (navigator.userAgent.match(/MSIE/)) {
                var f = location.href.match(/^https/i) ? "https://" : "http://";
                c += '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="' + f + 'download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="' + a + '" height="' + b + '" id="' + this.movieId + '" align="middle"><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="false" /><param name="movie" value="' + h.moviePath + '" /><param name="loop" value="false" /><param name="menu" value="false" /><param name="quality" value="best" /><param name="bgcolor" value="#ffffff" /><param name="flashvars" value="' +
                    d + '"/><param name="wmode" value="transparent"/></object>'
            } else c += '<embed id="' + this.movieId + '" src="' + h.moviePath + '" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="' + a + '" height="' + b + '" name="' + this.movieId + '" align="middle" allowScriptAccess="always" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="' + d + '" wmode="transparent" />';
            return c
        },
        hide: function() { this.div && (this.div.style.left = "-2000px") },
        show: function() { this.reposition() },
        destroy: function() { var a = this;
            this.domElement && this.div && (g(this.div).remove(), this.div = this.domElement = null, g.each(h.clients, function(b, c) { c === a && delete h.clients[b] })) },
        reposition: function(a) { a && ((this.domElement = h.$(a)) || this.hide()); if (this.domElement && this.div) { a = h.getDOMObjectPosition(this.domElement); var b = this.div.style;
                b.left = "" + a.left + "px";
                b.top = "" + a.top + "px" } },
        clearText: function() { this.clipText = "";
            this.ready && this.movie.clearText() },
        appendText: function(a) {
            this.clipText +=
                a;
            this.ready && this.movie.appendText(a)
        },
        setText: function(a) { this.clipText = a;
            this.ready && this.movie.setText(a) },
        setFileName: function(a) { this.fileName = a;
            this.ready && this.movie.setFileName(a) },
        setSheetData: function(a) { this.ready && this.movie.setSheetData(JSON.stringify(a)) },
        setAction: function(a) { this.action = a;
            this.ready && this.movie.setAction(a) },
        addEventListener: function(a, b) { a = a.toString().toLowerCase().replace(/^on/, "");
            this.handlers[a] || (this.handlers[a] = []);
            this.handlers[a].push(b) },
        setHandCursor: function(a) {
            this.handCursorEnabled =
                a;
            this.ready && this.movie.setHandCursor(a)
        },
        setCSSEffects: function(a) { this.cssEffects = !!a },
        receiveEvent: function(a, b) {
            a = a.toString().toLowerCase().replace(/^on/, "");
            switch (a) {
                case "load":
                    this.movie = m.getElementById(this.movieId);
                    if (!this.movie) { var c = this;
                        setTimeout(function() { c.receiveEvent("load", null) }, 1); return }
                    if (!this.ready && navigator.userAgent.match(/Firefox/) && navigator.userAgent.match(/Windows/)) { c = this;
                        setTimeout(function() { c.receiveEvent("load", null) }, 100);
                        this.ready = !0; return }
                    this.ready = !0;
                    this.movie.clearText();
                    this.movie.appendText(this.clipText);
                    this.movie.setFileName(this.fileName);
                    this.movie.setAction(this.action);
                    this.movie.setHandCursor(this.handCursorEnabled);
                    break;
                case "mouseover":
                    this.domElement && this.cssEffects && this.recoverActive && this.domElement.addClass("active");
                    break;
                case "mouseout":
                    this.domElement && this.cssEffects && (this.recoverActive = !1, this.domElement.hasClass("active") && (this.domElement.removeClass("active"), this.recoverActive = !0));
                    break;
                case "mousedown":
                    this.domElement &&
                        this.cssEffects && this.domElement.addClass("active");
                    break;
                case "mouseup":
                    this.domElement && this.cssEffects && (this.domElement.removeClass("active"), this.recoverActive = !1)
            }
            if (this.handlers[a])
                for (var d = 0, f = this.handlers[a].length; d < f; d++) { var e = this.handlers[a][d]; if ("function" == typeof e) e(this, b);
                    else if ("object" == typeof e && 2 == e.length) e[0][e[1]](this, b);
                    else if ("string" == typeof e) n[e](this, b) }
        }
    };
    h.hasFlash = function() {
        try { return new ActiveXObject("ShockwaveFlash.ShockwaveFlash"), !0 } catch (a) {
            if (navigator.mimeTypes &&
                navigator.mimeTypes["application/x-shockwave-flash"] !== u && navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin) return !0
        }
        return !1
    };
    n.ZeroClipboard_TableTools = h;
    var C = function(a, b) { b.attr("id");
            b.parents("html").length ? a.glue(b[0], "") : setTimeout(function() { C(a, b) }, 500) },
        H = function(a) { var b = "Sheet1";
            a.sheetName && (b = a.sheetName.replace(/[\[\]\*\/\\\?:]/g, "")); return b },
        x = function(a, b) { b = b.match(/[\s\S]{1,8192}/g) || [];
            a.clearText(); for (var c = 0, d = b.length; c < d; c++) a.appendText(b[c]) },
        D = function(a) {
            return a.newline ?
                a.newline : navigator.userAgent.match(/Windows/) ? "\r\n" : "\n"
        },
        E = function(a, b) { var c = D(b);
            a = a.buttons.exportData(b.exportOptions); var d = b.fieldBoundary,
                f = b.fieldSeparator,
                e = new RegExp(d, "g"),
                g = b.escapeChar !== u ? b.escapeChar : "\\",
                h = function(a) { for (var b = "", c = 0, h = a.length; c < h; c++) 0 < c && (b += f), b += d ? d + ("" + a[c]).replace(e, g + d) + d : a[c]; return b },
                n = b.header ? h(a.header) + c : "";
            b = b.footer && a.footer ? c + h(a.footer) : ""; for (var m = [], p = 0, r = a.body.length; p < r; p++) m.push(h(a.body[p])); return { str: n + m.join(c) + b, rows: m.length } },
        y = { available: function() { return h.hasFlash() }, init: function(a, b, c) { h.moviePath = l.Buttons.swfPath; var d = new h.Client;
                d.setHandCursor(!0);
                d.addEventListener("mouseDown", function(d) { c._fromFlash = !0;
                    a.button(b[0]).trigger();
                    c._fromFlash = !1 });
                C(d, b);
                c._flash = d }, destroy: function(a, b, c) { c._flash.destroy() }, fieldSeparator: ",", fieldBoundary: '"', exportOptions: {}, title: "*", messageTop: "*", messageBottom: "*", filename: "*", extension: ".csv", header: !0, footer: !1 },
        z = "";
    z = "undefined" === typeof n.XMLSerializer ? new function() {
        this.serializeToString =
            function(a) { return a.xml }
    } : new XMLSerializer;
    var v, t = {
            "_rels/.rels": '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/></Relationships>',
            "xl/_rels/workbook.xml.rels": '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/><Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/></Relationships>',
            "[Content_Types].xml": '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types"><Default Extension="xml" ContentType="application/xml" /><Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml" /><Default Extension="jpeg" ContentType="image/jpeg" /><Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml" /><Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml" /><Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml" /></Types>',
            "xl/workbook.xml": '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships"><fileVersion appName="xl" lastEdited="5" lowestEdited="5" rupBuild="24816"/><workbookPr showInkAnnotation="0" autoCompressPictures="0"/><bookViews><workbookView xWindow="0" yWindow="0" windowWidth="25600" windowHeight="19020" tabRatio="500"/></bookViews><sheets><sheet name="" sheetId="1" r:id="rId1"/></sheets></workbook>',
            "xl/worksheets/sheet1.xml": '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" mc:Ignorable="x14ac" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac"><sheetData/><mergeCells count="0"/></worksheet>',
            "xl/styles.xml": '<?xml version="1.0" encoding="UTF-8"?><styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" mc:Ignorable="x14ac" xmlns:x14ac="http://schemas.microsoft.com/office/spreadsheetml/2009/9/ac"><numFmts count="6"><numFmt numFmtId="164" formatCode="#,##0.00_- [$$-45C]"/><numFmt numFmtId="165" formatCode="&quot;£&quot;#,##0.00"/><numFmt numFmtId="166" formatCode="[$€-2] #,##0.00"/><numFmt numFmtId="167" formatCode="0.0%"/><numFmt numFmtId="168" formatCode="#,##0;(#,##0)"/><numFmt numFmtId="169" formatCode="#,##0.00;(#,##0.00)"/></numFmts><fonts count="5" x14ac:knownFonts="1"><font><sz val="11" /><name val="Calibri" /></font><font><sz val="11" /><name val="Calibri" /><color rgb="FFFFFFFF" /></font><font><sz val="11" /><name val="Calibri" /><b /></font><font><sz val="11" /><name val="Calibri" /><i /></font><font><sz val="11" /><name val="Calibri" /><u /></font></fonts><fills count="6"><fill><patternFill patternType="none" /></fill><fill><patternFill patternType="none" /></fill><fill><patternFill patternType="solid"><fgColor rgb="FFD9D9D9" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="FFD99795" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="ffc6efce" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="ffc6cfef" /><bgColor indexed="64" /></patternFill></fill></fills><borders count="2"><border><left /><right /><top /><bottom /><diagonal /></border><border diagonalUp="false" diagonalDown="false"><left style="thin"><color auto="1" /></left><right style="thin"><color auto="1" /></right><top style="thin"><color auto="1" /></top><bottom style="thin"><color auto="1" /></bottom><diagonal /></border></borders><cellStyleXfs count="1"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" /></cellStyleXfs><cellXfs count="61"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="left"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="center"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="right"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="fill"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment textRotation="90"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment wrapText="1"/></xf><xf numFmtId="9"   fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="164" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="165" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="166" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="167" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="168" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="169" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="3" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="4" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/></cellXfs><cellStyles count="1"><cellStyle name="Normal" xfId="0" builtinId="0" /></cellStyles><dxfs count="0" /><tableStyles count="0" defaultTableStyle="TableStyleMedium9" defaultPivotStyle="PivotStyleMedium4" /></styleSheet>'
        },
        F = [{ match: /^\-?\d+\.\d%$/, style: 60, fmt: function(a) { return a / 100 } }, { match: /^\-?\d+\.?\d*%$/, style: 56, fmt: function(a) { return a / 100 } }, { match: /^\-?\$[\d,]+.?\d*$/, style: 57 }, { match: /^\-?£[\d,]+.?\d*$/, style: 58 }, { match: /^\-?€[\d,]+.?\d*$/, style: 59 }, { match: /^\([\d,]+\)$/, style: 61, fmt: function(a) { return -1 * a.replace(/[\(\)]/g, "") } }, { match: /^\([\d,]+\.\d{2}\)$/, style: 62, fmt: function(a) { return -1 * a.replace(/[\(\)]/g, "") } }, { match: /^[\d,]+$/, style: 63 }, { match: /^[\d,]+\.\d{2}$/, style: 64 }];
    l.Buttons.swfPath = "//cdn.datatables.net/buttons/" +
        l.Buttons.version + "/swf/flashExport.swf";
    l.Api.register("buttons.resize()", function() { g.each(h.clients, function(a, b) { b.domElement !== u && b.domElement.parentNode && b.positionElement() }) });
    l.ext.buttons.copyFlash = g.extend({}, y, {
        className: "buttons-copy buttons-flash",
        text: function(a) { return a.i18n("buttons.copy", "Copy") },
        action: function(a, b, c, d) {
            if (d._fromFlash) {
                this.processing(!0);
                a = d._flash;
                var f = E(b, d);
                c = b.buttons.exportInfo(d);
                var e = D(d);
                f = f.str;
                c.title && (f = c.title + e + e + f);
                c.messageTop && (f = c.messageTop +
                    e + e + f);
                c.messageBottom && (f = f + e + e + c.messageBottom);
                d.customize && (f = d.customize(f, d, b));
                a.setAction("copy");
                x(a, f);
                this.processing(!1);
                b.buttons.info(b.i18n("buttons.copyTitle", "Copy to clipboard"), b.i18n("buttons.copySuccess", { _: "Copied %d rows to clipboard", 1: "Copied 1 row to clipboard" }, data.rows), 3E3)
            }
        },
        fieldSeparator: "\t",
        fieldBoundary: ""
    });
    l.ext.buttons.csvFlash = g.extend({}, y, {
        className: "buttons-csv buttons-flash",
        text: function(a) { return a.i18n("buttons.csv", "CSV") },
        action: function(a, b, c, d) {
            a =
                d._flash;
            var f = E(b, d);
            c = b.buttons.exportInfo(d);
            b = d.customize ? d.customize(f.str, d, b) : f.str;
            a.setAction("csv");
            a.setFileName(c.filename);
            x(a, b)
        },
        escapeChar: '"'
    });
    l.ext.buttons.excelFlash = g.extend({}, y, {
        className: "buttons-excel buttons-flash",
        text: function(a) { return a.i18n("buttons.excel", "Excel") },
        action: function(a, b, c, d) {
            this.processing(!0);
            a = d._flash;
            var f = 0,
                e = g.parseXML(t["xl/worksheets/sheet1.xml"]),
                h = e.getElementsByTagName("sheetData")[0];
            c = {
                _rels: { ".rels": g.parseXML(t["_rels/.rels"]) },
                xl: {
                    _rels: { "workbook.xml.rels": g.parseXML(t["xl/_rels/workbook.xml.rels"]) },
                    "workbook.xml": g.parseXML(t["xl/workbook.xml"]),
                    "styles.xml": g.parseXML(t["xl/styles.xml"]),
                    worksheets: { "sheet1.xml": e }
                },
                "[Content_Types].xml": g.parseXML(t["[Content_Types].xml"])
            };
            var k = b.buttons.exportData(d.exportOptions),
                m, n, p = function(a) {
                    m = f + 1;
                    n = r(e, "row", { attr: { r: m } });
                    for (var b = 0, c = a.length; b < c; b++) {
                        var l = A(b) + "" + m,
                            k = null;
                        if (null === a[b] || a[b] === u || "" === a[b])
                            if (!0 === d.createEmptyCells) a[b] = "";
                            else continue;
                        a[b] = g.trim(a[b]);
                        for (var p = 0, t = F.length; p < t; p++) {
                            var q = F[p];
                            if (a[b].match && !a[b].match(/^0\d+/) &&
                                a[b].match(q.match)) { k = a[b].replace(/[^\d\.\-]/g, "");
                                q.fmt && (k = q.fmt(k));
                                k = r(e, "c", { attr: { r: l, s: q.style }, children: [r(e, "v", { text: k })] }); break }
                        }
                        k || ("number" === typeof a[b] || a[b].match && a[b].match(/^-?\d+(\.\d+)?$/) && !a[b].match(/^0\d+/) ? k = r(e, "c", { attr: { t: "n", r: l }, children: [r(e, "v", { text: a[b] })] }) : (q = a[b].replace ? a[b].replace(/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F-\x9F]/g, "") : a[b], k = r(e, "c", { attr: { t: "inlineStr", r: l }, children: { row: r(e, "is", { children: { row: r(e, "t", { text: q }) } }) } })));
                        n.appendChild(k)
                    }
                    h.appendChild(n);
                    f++
                };
            g("sheets sheet", c.xl["workbook.xml"]).attr("name", H(d));
            d.customizeData && d.customizeData(k);
            var l = function(a, b) { var c = g("mergeCells", e);
                    c[0].appendChild(r(e, "mergeCell", { attr: { ref: "A" + a + ":" + A(b) + a } }));
                    c.attr("count", c.attr("count") + 1);
                    g("row:eq(" + (a - 1) + ") c", e).attr("s", "51") },
                q = b.buttons.exportInfo(d);
            q.title && (p([q.title], f), l(f, k.header.length - 1));
            q.messageTop && (p([q.messageTop], f), l(f, k.header.length - 1));
            d.header && (p(k.header, f), g("row:last c", e).attr("s", "2"));
            for (var w = 0, v = k.body.length; w <
                v; w++) p(k.body[w], f);
            d.footer && k.footer && (p(k.footer, f), g("row:last c", e).attr("s", "2"));
            q.messageBottom && (p([q.messageBottom], f), l(f, k.header.length - 1));
            p = r(e, "cols");
            g("worksheet", e).prepend(p);
            l = 0;
            for (w = k.header.length; l < w; l++) p.appendChild(r(e, "col", { attr: { min: l + 1, max: l + 1, width: G(k, l), customWidth: 1 } }));
            d.customize && d.customize(c, d, b);
            B(c);
            a.setAction("excel");
            a.setFileName(q.filename);
            a.setSheetData(c);
            x(a, "");
            this.processing(!1)
        },
        extension: ".xlsx",
        createEmptyCells: !1
    });
    l.ext.buttons.pdfFlash =
        g.extend({}, y, {
            className: "buttons-pdf buttons-flash",
            text: function(a) { return a.i18n("buttons.pdf", "PDF") },
            action: function(a, b, c, d) {
                this.processing(!0);
                a = d._flash;
                c = b.buttons.exportData(d.exportOptions);
                var f = b.buttons.exportInfo(d),
                    e = b.table().node().offsetWidth,
                    g = b.columns(d.columns).indexes().map(function(a) { return b.column(a).header().offsetWidth / e });
                a.setAction("pdf");
                a.setFileName(f.filename);
                x(a, JSON.stringify({
                    title: f.title || "",
                    messageTop: f.messageTop || "",
                    messageBottom: f.messageBottom || "",
                    colWidth: g.toArray(),
                    orientation: d.orientation,
                    size: d.pageSize,
                    header: d.header ? c.header : null,
                    footer: d.footer ? c.footer : null,
                    body: c.body
                }));
                this.processing(!1)
            },
            extension: ".pdf",
            orientation: "portrait",
            pageSize: "A4",
            newline: "\n"
        });
    return l.Buttons
});