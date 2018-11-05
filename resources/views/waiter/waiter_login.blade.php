<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CFC : Waiter Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="{{url('assets_w/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('assets_w/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('assets_w/css/my.css')}}">
    <script src="{{url('assets_w/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url('assets_w/js/bootstrap.min.js')}}"></script>
    <link href="{{url('assets_w/css/bootstrap-toggle.min.css')}}" rel="stylesheet"/>
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet"/>
    <style type="text/css">

    </style>
    <script type="text/javascript">

        +function (a) {
            "use strict";

            function b(b) {
                return this.each(function () {
                    var d = a(this),
                        e = d.data("bs.toggle"),
                        f = "object" == typeof b && b;
                    e || d.data("bs.toggle", e = new c(this, f)), "string" == typeof b && e[b] && e[b]()
                })
            }

            var c = function (b, c) {
                this.$element = a(b), this.options = a.extend({}, this.defaults(), c), this.render()
            };
            c.VERSION = "2.2.0", c.DEFAULTS = {
                on: "On",
                off: "Off",
                onstyle: "primary",
                offstyle: "default",
                size: "normal",
                style: "",
                width: null,
                height: null
            }, c.prototype.defaults = function () {
                return {
                    on: this.$element.attr("data-on") || c.DEFAULTS.on,
                    off: this.$element.attr("data-off") || c.DEFAULTS.off,
                    onstyle: this.$element.attr("data-onstyle") || c.DEFAULTS.onstyle,
                    offstyle: this.$element.attr("data-offstyle") || c.DEFAULTS.offstyle,
                    size: this.$element.attr("data-size") || c.DEFAULTS.size,
                    style: this.$element.attr("data-style") || c.DEFAULTS.style,
                    width: this.$element.attr("data-width") || c.DEFAULTS.width,
                    height: this.$element.attr("data-height") || c.DEFAULTS.height
                }
            }, c.prototype.render = function () {
                this._onstyle = "btn-" + this.options.onstyle, this._offstyle = "btn-" + this.options.offstyle;
                var b = "large" === this.options.size ? "btn-lg" : "small" === this.options.size ? "btn-sm" : "mini" === this.options.size ? "btn-xs" : "",
                    c = a('<label class="btn">').html(this.options.on).addClass(this._onstyle + " " + b),
                    d = a('<label class="btn">').html(this.options.off).addClass(this._offstyle + " " + b + " active"),
                    e = a('<span class="toggle-handle btn btn-default">').addClass(b),
                    f = a('<div class="toggle-group">').append(c, d, e),
                    g = a('<div class="toggle btn" data-toggle="toggle">').addClass(this.$element.prop("checked") ? this._onstyle : this._offstyle + " off").addClass(b).addClass(this.options.style);
                this.$element.wrap(g), a.extend(this, {
                    $toggle: this.$element.parent(),
                    $toggleOn: c,
                    $toggleOff: d,
                    $toggleGroup: f
                }), this.$toggle.append(f);
                var h = this.options.width || Math.max(c.outerWidth(), d.outerWidth()) + e.outerWidth() / 2,
                    i = this.options.height || Math.max(c.outerHeight(), d.outerHeight());
                c.addClass("toggle-on"), d.addClass("toggle-off"), this.$toggle.css({
                    width: h,
                    height: i
                }), this.options.height && (c.css("line-height", c.height() + "px"), d.css("line-height", d.height() + "px")), this.update(!0), this.trigger(!0)
            }, c.prototype.toggle = function () {
                this.$element.prop("checked") ? this.off() : this.on()
            }, c.prototype.on = function (a) {
                return this.$element.prop("disabled") ? !1 : (this.$toggle.removeClass(this._offstyle + " off").addClass(this._onstyle), this.$element.prop("checked", !0), void(a || this.trigger()))
            }, c.prototype.off = function (a) {
                return this.$element.prop("disabled") ? !1 : (this.$toggle.removeClass(this._onstyle).addClass(this._offstyle + " off"), this.$element.prop("checked", !1), void(a || this.trigger()))
            }, c.prototype.enable = function () {
                this.$toggle.removeAttr("disabled"), this.$element.prop("disabled", !1)
            }, c.prototype.disable = function () {
                this.$toggle.attr("disabled", "disabled"), this.$element.prop("disabled", !0)
            }, c.prototype.update = function (a) {
                this.$element.prop("disabled") ? this.disable() : this.enable(), this.$element.prop("checked") ? this.on(a) : this.off(a)
            }, c.prototype.trigger = function (b) {
                this.$element.off("change.bs.toggle"), b || this.$element.change(), this.$element.on("change.bs.toggle", a.proxy(function () {
                    this.update()
                }, this))
            }, c.prototype.destroy = function () {
                this.$element.off("change.bs.toggle"), this.$toggleGroup.remove(), this.$element.removeData("bs.toggle"), this.$element.unwrap()
            };
            var d = a.fn.bootstrapToggle;
            a.fn.bootstrapToggle = b, a.fn.bootstrapToggle.Constructor = c, a.fn.toggle.noConflict = function () {
                return a.fn.bootstrapToggle = d, this
            }, a(function () {
                a("input[type=checkbox][data-toggle^=toggle]").bootstrapToggle()
            }), a(document).on("click.bs.toggle", "div[data-toggle^=toggle]", function (b) {
                var c = a(this).find("input[type=checkbox]");
                c.bootstrapToggle("toggle"), b.preventDefault()
            })
        }(jQuery);
        //# sourceMappingURL=bootstrap-toggle.min.js.map
    </script>
</head>
<body class="bg_login_color">
<div class="Globalloading" id="main_pageloader">
    <div class="Globalloading-center">
        <div class="Glo-center-absolute">
            <div class="object loadblk_one">
            </div>
            <div class="object loadblk_two">
            </div>
            <div class="object loadblk_three">
            </div>
            <div class="object loadblk_four">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="content_block form-group">
        <div class="com-block block_header">
            <div class="row">
                <div class="col-sm-4">
                    <h2 class="h2_header">Choose & Login</h2>
                </div>
                <div class="col-sm-8">
                    @if($errors->any())
                        <div role="alert" id="alert" class="alert alert-danger">{{$errors->first()}}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="com-block content-body waiter_list">
            <div>
                @foreach($users as $user)
                    <div class="col-sm-3 col-md-2 col-xs-6 btnLogin" id="{{$user->id}}">
                        <div class="waiter_id_block" data-toggle="modal"{{-- data-target="#myModal_LoginWaiter"--}}>
                            <div class="waiter_imgbox"><img src="{{url('assets_w/images/Male_default.png')}}"/></div>
                            <div class="waiter_name">{{$user->name}}</div>
                        </div>
                    </div>
                @endforeach
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/user_profile.jpg"/></div>--}}
                {{--<div class="waiter_name">Pinku Kesharwani</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/Female_Default.png"/></div>--}}
                {{--<div class="waiter_name">Bijendra Sahu</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/user_profile.jpg"/></div>--}}
                {{--<div class="waiter_name">Rohit Mahra</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/Male_default.png"/></div>--}}
                {{--<div class="waiter_name">Pinku Kesharwani</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/user_profile.jpg"/></div>--}}
                {{--<div class="waiter_name">Bijendra Sahu</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/Female_Default.png"/></div>--}}
                {{--<div class="waiter_name">Rohit Mahra</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/Male_default.png"/></div>--}}
                {{--<div class="waiter_name">Pinku Kesharwani</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/Male_default.png"/></div>--}}
                {{--<div class="waiter_name">Bijendra Sahu</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/Female_Default.png"/></div>--}}
                {{--<div class="waiter_name">Rohit Mahra</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/user_profile.jpg"/></div>--}}
                {{--<div class="waiter_name">Pinku Kesharwani</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/Male_default.png"/></div>--}}
                {{--<div class="waiter_name">Bijendra Sahu</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/user_profile.jpg"/></div>--}}
                {{--<div class="waiter_name">Rohit Mahra</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/Male_default.png"/></div>--}}
                {{--<div class="waiter_name">Pinku Kesharwani</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-3 col-md-2">--}}
                {{--<div class="waiter_id_block" data-toggle="modal" data-target="#myModal_LoginWaiter">--}}
                {{--<div class="waiter_imgbox"><img src="images/user_profile.jpg"/></div>--}}
                {{--<div class="waiter_name">Bijendra Sahu</div>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
</div>
</body>
<!-- Modal Login Waiter-->
<div id="myModal_LoginWaiter" class="connect_LBbox modal fade in" role="dialog" aria-hidden="false">
    <div class="modal-dialog password_lb">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <div class="logindiv">
                    <input type="password" class="form-control password_txt" placeholder="Password" id="txtpassword"
                           autocomplete="off" data-validate="TT_btnpassword">
                    <div class="password_icon mdi mdi-lock-outline mdi-16px"></div>
                </div>
            </div>
            <div class="modal-footer text-center">
                {{--<button type="button" class="btn btn-primary" id="TT_btnpassword">Submit</button>--}}
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">

    /*Spinner Codes*/
    $(document).on('click', '.number-spinner button', function () {
        var btn = $(this),
            oldValue = btn.closest('.number-spinner').find('input').val().trim(),
            newVal = 0;
        if (btn.attr('data-dir') == 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        btn.closest('.number-spinner').find('input').val(newVal);
    });
    window.setTimeout(function () {
        $(".alert").fadeTo(3000, 0).slideUp(300, function () {
            $(this).remove();
        });
    }, 6000);
</script>
<script>
    $(".btnLogin").click(function () {
        $('#myModal_LoginWaiter').modal('show');
        $('.modal-title').html('Login');
        $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

        var id = $(this).attr('id');
        var editurl = '{{ url('/') }}' + "/waiter/" + id + "/login";
        $.ajax({
            type: "GET",
            contentType: "application/json; charset=utf-8",
            url: editurl,
            data: '{"data":"' + id + '"}',
            success: function (data) {
                $('.modal-body').html(data);
            },
            error: function (xhr, status, error) {
                $('.modal-body').html(xhr.responseText);
                //$('.modal-body').html("Technical Error Occured!");
            }
        });
    });
</script>
</html>
