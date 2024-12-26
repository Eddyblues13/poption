"use strict";
(self.webpackChunk = self.webpackChunk || []).push([
    [957], {
        957: function(e, n, t) {
            t.r(n);
            var r = t(4651),
                o = t.n(r);

            function i(e) {
                return i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                    return typeof e
                } : function(e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                }, i(e)
            }

            function a(e, n) {
                for (var t = 0; t < n.length; t++) {
                    var r = n[t];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, u(r.key), r)
                }
            }

            function u(e) {
                var n = function(e, n) {
                    if ("object" != i(e) || !e) return e;
                    var t = e[Symbol.toPrimitive];
                    if (void 0 !== t) {
                        var r = t.call(e, n || "default");
                        if ("object" != i(r)) return r;
                        throw new TypeError("@@toPrimitive must return a primitive value.")
                    }
                    return ("string" === n ? String : Number)(e)
                }(e, "string");
                return "symbol" == i(n) ? n : n + ""
            }
            var l = function() {
                return e = function e() {
                    var n, t, r, i = this;
                    ! function(e, n) {
                        if (!(e instanceof n)) throw new TypeError("Cannot call a class as a function")
                    }(this, e), n = this, r = function() {
                        i.$banner.remove(), i.$body.removeClass("has-pwa-banner")
                    }, (t = u(t = "closeBannerClickHandler")) in n ? Object.defineProperty(n, t, {
                        value: r,
                        enumerable: !0,
                        configurable: !0,
                        writable: !0
                    }) : n[t] = r, this.$banner = o()(".pwa-banner"), this.$body = o()("body")
                }, (n = [{
                    key: "init",
                    value: function() {
                        0 !== this.$banner.length && this.events()
                    }
                }, {
                    key: "events",
                    value: function() {
                        this.$banner.find(".pwa-banner__close-icon").on("click", this.closeBannerClickHandler)
                    }
                }]) && a(e.prototype, n), t && a(e, t), Object.defineProperty(e, "prototype", {
                    writable: !1
                }), e;
                var e, n, t
            }();
            n.default = l
        }
    }
]);