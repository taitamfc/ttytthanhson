<!-- BEGIN: submenu -->
	<ul class="sub-menu">
	<!-- BEGIN: loop -->
		<li class="menu-item">
		<a href="{SUBMENU.link}" title="{SUBMENU.note}"{SUBMENU.target}>{SUBMENU.title_trim}</a>
		</li>
	<!-- END: loop -->
	</ul>
<!-- END: submenu -->

<!-- BEGIN: main -->
	<div class="main-menu-top">
		<ul id="menu-main-menu" class="menu">
			<li class="menu-item menu-item-home current-menu-item page_item page-item-23648 current_page_item">
			<a title="{LANG.Home}" href="{THEME_SITE_HREF}">Trang chủ</a></li>
			<!-- BEGIN: top_menu -->
			<li <!-- BEGIN: has_sub --> class="menu-item-has-children" <!-- END: has_sub --> class="menu-item "  >
			<a href="{TOP_MENU.link}" title="{TOP_MENU.note}"{TOP_MENU.target}>{TOP_MENU.title_trim}</a>
			<!-- BEGIN: sub --> {SUB} <!-- END: sub -->
			</li>
			<!-- END: top_menu -->
		</ul>
	</div>
<!-- END: main -->
