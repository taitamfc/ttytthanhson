<!-- BEGIN: main -->
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <ul class="pcoded-item pcoded-left-item">
            <li style="background-color: #73b4ff;border-color: #73b4ff;outline: 1px dashed #fff;outline-offset: -5px;">
                <a href="{NV_BASE_SITEURL}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main"><strong>Manager</strong></span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
		<!-- BEGIN: loop -->
            <li class="{ROW.active}">
                <a href="{ROW.link}">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">{ROW.title}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        <!-- END: loop -->
        </ul>
    </div>
</nav>

<!-- END: main -->
